<?php
/**
 * FreshBite — Product Variant Multiplier
 *
 * Toma los productos existentes y crea variantes por tamaño
 * Resultado esperado: 761 base × 4 tamaños = ~3,044 productos
 *
 * CÓMO USAR:
 * cp scripts/multiply-products.php /Users/admin/Local\ Sites/freshbite-marketplace/app/public/
 * wp eval-file multiply-products.php
 */

WP_CLI::log( '🔄 FreshBite — Iniciando multiplicador de variantes...' );
WP_CLI::log( '━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━' );

// Tamaños y sus multiplicadores de precio
$sizes = [
    '250g' => 0.5,
    '500g' => 0.8,
    '1kg'  => 1.0,
    '2kg'  => 1.8,
];

// Obtener SOLO productos base (sin variantes ya creadas)
$products = get_posts([
    'post_type'      => 'product',
    'posts_per_page' => -1,
    'post_status'    => 'publish',
    'meta_query'     => [
        [
            'key'     => '_is_variant',
            'compare' => 'NOT EXISTS',
        ],
    ],
]);

WP_CLI::log( '📦 Productos base encontrados: ' . count( $products ) );
WP_CLI::log( '📐 Tamaños a generar: ' . implode( ', ', array_keys( $sizes ) ) );
WP_CLI::log( '📊 Variantes esperadas: ' . ( count( $products ) * count( $sizes ) ) );
WP_CLI::log( '' );

$count_created = 0;
$count_skipped = 0;

foreach ( $products as $p ) {

    $regular_price = get_post_meta( $p->ID, '_regular_price', true );
    $sale_price    = get_post_meta( $p->ID, '_sale_price', true );
    $category_ids  = wc_get_product_term_ids( $p->ID, 'product_cat' );
    $tag_ids       = wc_get_product_term_ids( $p->ID, 'product_tag' );

    // Si no tiene precio, asignar uno por defecto
    if ( empty( $regular_price ) ) {
        $regular_price = 5.00;
        $sale_price    = 3.50;
    }

    foreach ( $sizes as $size => $multiplier ) {

        $new_title = $p->post_title . ' - ' . $size;

        // Verificar si ya existe esta variante
        $existing = get_posts([
            'post_type'   => 'product',
            'post_status' => 'publish',
            'title'       => $new_title,
            'numberposts' => 1,
        ]);

        if ( ! empty( $existing ) ) {
            $count_skipped++;
            continue;
        }

        // Crear variante
        $variant = new WC_Product_Simple();
        $variant->set_name( $new_title );
        $variant->set_status( 'publish' );
        $variant->set_catalog_visibility( 'visible' );
        $variant->set_regular_price( number_format( $regular_price * $multiplier, 2, '.', '' ) );
        $variant->set_sale_price( number_format( $sale_price * $multiplier, 2, '.', '' ) );
        $variant->set_manage_stock( true );
        $variant->set_stock_quantity( rand( 10, 200 ) );
        $variant->set_stock_status( 'instock' );
        $variant->set_category_ids( $category_ids );
        $variant->set_tag_ids( $tag_ids );
        $variant->set_short_description(
            get_post_field( 'post_excerpt', $p->ID )
        );

        $variant_id = $variant->save();

        // Marcar como variante para no duplicar
        update_post_meta( $variant_id, '_is_variant', '1' );
        update_post_meta( $variant_id, '_parent_product', $p->ID );

        $count_created++;
    }
}

WP_CLI::log( '' );
WP_CLI::log( '━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━' );
WP_CLI::success( '🎉 Multiplicación completada!' );
WP_CLI::log( '   ✅ Variantes creadas:  ' . $count_created );
WP_CLI::log( '   ⏭  Variantes omitidas: ' . $count_skipped );
WP_CLI::log( '   📦 Total en tienda:    ' . ( $count_created + $count_skipped + 761 ) );
WP_CLI::log( '━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━' );