<?php
/**
 * FreshBite — Mass Product Import Script
 * Ejecutar con: wp eval-file import-products.php --path=/path/to/wordpress
 * 
 * Genera 2000+ productos distribuidos en todas las categorías
 */

if ( ! defined( 'ABSPATH' ) ) {
    // Permite ejecución directa con WP-CLI
    define( 'ABSPATH', dirname(__FILE__) . '/' );
}

// ============================================================
// CONFIGURACIÓN DE CATEGORÍAS
// ============================================================
$categories = [
    'frutas-frescas'    => [ 'name' => 'Frutas Frescas',    'emoji' => '🍎' ],
    'verduras'          => [ 'name' => 'Verduras',           'emoji' => '🥦' ],
    'lacteos-huevos'    => [ 'name' => 'Lácteos y Huevos',  'emoji' => '🥛' ],
    'panaderia'         => [ 'name' => 'Panadería',          'emoji' => '🍞' ],
    'carnes-aves'       => [ 'name' => 'Carnes y Aves',      'emoji' => '🥩' ],
    'mariscos'          => [ 'name' => 'Mariscos',           'emoji' => '🦐' ],
    'bebidas'           => [ 'name' => 'Bebidas',            'emoji' => '🧃' ],
    'organicos'         => [ 'name' => 'Orgánicos',          'emoji' => '🌿' ],
    'snacks-naturales'  => [ 'name' => 'Snacks Naturales',   'emoji' => '🥜' ],
    'hierbas-especias'  => [ 'name' => 'Hierbas y Especias', 'emoji' => '🌿' ],
    'congelados'        => [ 'name' => 'Congelados',         'emoji' => '❄️'  ],
    'despensa'          => [ 'name' => 'Despensa',           'emoji' => '🫙'  ],
    'ensaladas'         => [ 'name' => 'Ensaladas Frescas',  'emoji' => '🥗'  ],
    'miel-apicultura'   => [ 'name' => 'Miel y Apicultura',  'emoji' => '🍯'  ],
    'en-oferta'         => [ 'name' => 'En Oferta',          'emoji' => '🔥'  ],
];

// ============================================================
// BANCO DE PRODUCTOS POR CATEGORÍA
// ============================================================
$product_bank = [

    // ── FRUTAS FRESCAS ──────────────────────────────────────
    'frutas-frescas' => [
        ['Manzana Roja Gala', 2.99, 4.50],
        ['Manzana Verde Granny Smith', 3.20, 4.80],
        ['Manzana Fuji Orgánica', 3.80, 5.50],
        ['Manzana Pink Lady', 4.20, 6.00],
        ['Manzana Golden Delicious', 2.80, 4.20],
        ['Pera Bosc', 3.50, 5.00],
        ['Pera Bartlett Amarilla', 2.90, 4.40],
        ['Pera Asiática Crocante', 4.10, 6.20],
        ['Naranja Valencia', 2.50, 3.80],
        ['Naranja Navel Premium', 3.00, 4.50],
        ['Naranja Sanguina', 4.50, 6.80],
        ['Mandarina Clementina', 3.20, 4.80],
        ['Mandarina Honey', 3.50, 5.20],
        ['Limón Eureka', 1.99, 3.20],
        ['Limón Meyer', 2.80, 4.20],
        ['Lima Persa', 2.20, 3.50],
        ['Toronja Roja', 3.00, 4.60],
        ['Pomelo Blanco', 2.50, 3.80],
        ['Uvas Rojas sin Semilla', 5.50, 7.80],
        ['Uvas Verdes Thompson', 4.80, 7.20],
        ['Uvas Negras Cotton Candy', 6.50, 9.20],
        ['Uvas Moradas Orgánicas', 7.20, 10.50],
        ['Fresas Premium Californianas', 4.50, 6.80],
        ['Fresas Orgánicas Locales', 5.80, 8.20],
        ['Frambuesas Frescas', 5.20, 7.80],
        ['Arándanos Jumbo', 6.80, 9.50],
        ['Arándanos Silvestres', 7.50, 10.80],
        ['Moras Negras', 5.50, 8.00],
        ['Zarzamoras Orgánicas', 6.20, 9.00],
        ['Cerezas Bing', 8.50, 12.00],
        ['Cerezas Rainier Amarillas', 9.20, 13.50],
        ['Durazno Amarillo', 3.80, 5.80],
        ['Durazno Blanco Premium', 4.50, 6.80],
        ['Nectarina Roja', 4.20, 6.20],
        ['Ciruela Roja Santa Rosa', 3.50, 5.20],
        ['Ciruela Morada', 3.80, 5.60],
        ['Damasco / Albaricoque', 4.80, 7.20],
        ['Mango Ataulfo (Honey)', 3.50, 5.20],
        ['Mango Tommy Atkins', 2.80, 4.50],
        ['Mango Kent Premium', 4.20, 6.50],
        ['Mango Keitt Verde', 3.80, 5.80],
        ['Piña Golden Extra Sweet', 4.50, 6.80],
        ['Piña Mini Hawaiana', 5.20, 7.80],
        ['Papaya Maradol', 3.20, 4.80],
        ['Papaya Solo Hawaiana', 5.50, 8.20],
        ['Sandía sin Semilla', 6.80, 9.50],
        ['Sandía Amarilla', 7.50, 11.00],
        ['Melón Cantaloupe', 4.50, 6.80],
        ['Melón Honeydew', 4.20, 6.50],
        ['Melón Galia', 5.80, 8.50],
        ['Kiwi Verde', 3.20, 4.80],
        ['Kiwi Dorado', 4.80, 7.20],
        ['Plátano Cavendish', 1.80, 2.80],
        ['Plátano Orgánico', 2.50, 3.80],
        ['Plátano Rojo', 3.50, 5.20],
        ['Plátano Baby', 2.80, 4.20],
        ['Maracuyá / Fruta de la Pasión', 5.20, 7.80],
        ['Guayaba Tropical', 3.80, 5.80],
        ['Lichi Fresco', 7.50, 11.00],
        ['Rambután', 6.80, 9.80],
        ['Dragonfruit Roja', 8.50, 12.00],
        ['Dragonfruit Blanca', 7.80, 11.50],
        ['Carambola', 5.50, 8.20],
        ['Coco Joven para Agua', 3.80, 5.80],
        ['Higo Negro Misión', 6.20, 9.20],
        ['Granada Arils Premium', 7.50, 11.00],
        ['Caqui / Kaki', 4.80, 7.20],
        ['Níspero', 5.50, 8.20],
        ['Chirimoyas', 6.80, 9.80],
        ['Mangostán', 9.50, 14.00],
        ['Jackfruit / Yaca', 8.20, 12.50],
        ['Aguacate Hass', 2.50, 3.80],
        ['Aguacate Florida', 3.20, 4.80],
        ['Aguacate Orgánico', 3.80, 5.80],
        ['Tomate Cherry Rojo', 3.50, 5.20],
        ['Tomate Cherry Amarillo', 3.80, 5.80],
        ['Tomate Cherry Heirloom Mix', 5.50, 8.20],
    ],

    // ── VERDURAS ────────────────────────────────────────────
    'verduras' => [
        ['Brócoli Fresco', 2.80, 4.20],
        ['Coliflor Blanca', 3.20, 4.80],
        ['Coliflor Morada', 4.50, 6.80],
        ['Coliflor Romanesco', 5.20, 7.80],
        ['Col Rizada / Kale', 2.50, 3.80],
        ['Col Lombarda', 2.80, 4.20],
        ['Repollo Verde', 1.80, 2.80],
        ['Repollo Napa', 2.20, 3.50],
        ['Espinaca Baby', 3.50, 5.20],
        ['Espinaca Orgánica', 4.20, 6.20],
        ['Rúcula Fresca', 3.80, 5.80],
        ['Acelga Arcoíris', 3.20, 4.80],
        ['Lechuga Romana', 2.20, 3.50],
        ['Lechuga Iceberg', 1.80, 2.80],
        ['Lechuga Butter Bibb', 2.80, 4.20],
        ['Lechuga Oak Leaf', 3.20, 4.80],
        ['Mix de Lechugas Gourmet', 5.50, 8.20],
        ['Apio', 2.20, 3.50],
        ['Puerro / Poro', 2.80, 4.20],
        ['Cebolla Amarilla', 1.50, 2.50],
        ['Cebolla Roja', 1.80, 2.80],
        ['Cebolla Blanca', 1.60, 2.60],
        ['Cebolla de Cambray / Scallion', 2.20, 3.50],
        ['Cebolla Chalote / Shallot', 3.80, 5.80],
        ['Ajo Blanco', 3.50, 5.20],
        ['Ajo Morado', 4.20, 6.20],
        ['Ajo Negro Fermentado', 7.50, 11.00],
        ['Jengibre Fresco', 3.20, 4.80],
        ['Cúrcuma Fresca', 4.80, 7.20],
        ['Zanahoria Premium', 2.20, 3.50],
        ['Zanahoria Baby', 3.20, 4.80],
        ['Zanahoria Morada', 3.80, 5.80],
        ['Rábano Rojo', 2.50, 3.80],
        ['Rábano Daikon', 2.80, 4.20],
        ['Remolacha Roja', 2.80, 4.20],
        ['Remolacha Dorada', 3.50, 5.20],
        ['Chirivía / Parsnip', 3.20, 4.80],
        ['Nabo', 2.20, 3.50],
        ['Rutabaga', 2.50, 3.80],
        ['Papa Russet', 2.20, 3.50],
        ['Papa Roja', 2.50, 3.80],
        ['Papa Amarilla Yukon', 2.80, 4.20],
        ['Papa Morada', 3.50, 5.20],
        ['Papa Fingerling Mix', 4.20, 6.20],
        ['Papa Baby Mini', 3.80, 5.80],
        ['Batata / Camote Naranja', 2.50, 3.80],
        ['Batata Morada', 3.50, 5.20],
        ['Yuca Fresca', 2.20, 3.50],
        ['Malanga / Taro', 3.20, 4.80],
        ['Ñame', 2.80, 4.20],
        ['Calabacín / Zucchini Verde', 2.20, 3.50],
        ['Calabacín Amarillo', 2.50, 3.80],
        ['Calabaza Butternut', 3.50, 5.20],
        ['Calabaza Kabocha', 4.20, 6.20],
        ['Calabaza Acorn', 3.80, 5.80],
        ['Calabaza Espagueti', 4.50, 6.80],
        ['Pepino Europeo', 2.20, 3.50],
        ['Pepino Persa Mini', 3.20, 4.80],
        ['Pepino Kirby', 2.50, 3.80],
        ['Berenjena Italiana', 2.80, 4.20],
        ['Berenjena China', 3.20, 4.80],
        ['Berenjena Japonesa', 3.50, 5.20],
        ['Pimiento Rojo', 2.80, 4.20],
        ['Pimiento Amarillo', 2.80, 4.20],
        ['Pimiento Verde', 2.20, 3.50],
        ['Pimiento Naranja', 3.20, 4.80],
        ['Mini Pimientos Dulces Mix', 4.50, 6.80],
        ['Chile Jalapeño', 2.50, 3.80],
        ['Chile Habanero', 3.50, 5.20],
        ['Chile Serrano', 2.80, 4.20],
        ['Chile Poblano', 3.20, 4.80],
        ['Tomate Roma', 2.20, 3.50],
        ['Tomate Beefsteak', 3.50, 5.20],
        ['Tomate Heirloom', 5.50, 8.20],
        ['Ejotes / Vainitas Verdes', 2.80, 4.20],
        ['Ejotes Amarillos', 3.20, 4.80],
        ['Chícharos / Arvejas Frescas', 3.50, 5.20],
        ['Habas Frescas', 3.80, 5.80],
        ['Edamame Fresco', 4.20, 6.20],
        ['Maíz Dulce Amarillo', 2.20, 3.50],
        ['Maíz Bicolor', 2.50, 3.80],
        ['Maíz Morado', 3.80, 5.80],
        ['Espárragos Verdes', 4.50, 6.80],
        ['Espárragos Blancos', 6.20, 9.20],
        ['Alcachofa Globe', 3.50, 5.20],
        ['Alcachofa Baby', 5.50, 8.20],
        ['Hongos Champiñón Blanco', 3.20, 4.80],
        ['Hongos Cremini', 3.80, 5.80],
        ['Hongos Portobello', 4.50, 6.80],
        ['Hongos Shiitake', 5.80, 8.50],
        ['Hongos Oyster', 6.20, 9.20],
        ['Hongos Enoki', 4.80, 7.20],
        ['Hongos Maitake', 7.50, 11.00],
        ['Trufa Negra (pequeña)', 18.00, 25.00],
        ['Bok Choy', 2.80, 4.20],
        ['Bok Choy Baby', 3.50, 5.20],
        ['Pak Choi Morado', 4.20, 6.20],
        ['Brotes de Bambú', 3.80, 5.80],
        ['Brotes de Soya', 2.20, 3.50],
        ['Germinados Mix', 3.50, 5.20],
        ['Alcaparras', 4.80, 7.20],
        ['Palmitos', 5.50, 8.20],
        ['Nopal Fresco', 2.50, 3.80],
        ['Jícama', 2.80, 4.20],
        ['Chayote', 2.20, 3.50],
    ],

    // ── LÁCTEOS Y HUEVOS ────────────────────────────────────
    'lacteos-huevos' => [
        ['Huevos de Granja Marrones Docena', 5.80, 8.50],
        ['Huevos Orgánicos Free-Range Docena', 7.50, 11.00],
        ['Huevos Blancos Grandes Docena', 4.20, 6.50],
        ['Huevos de Pato Docena', 8.80, 13.00],
        ['Huevos de Codorniz (18 piezas)', 5.50, 8.20],
        ['Huevos Extra Large Premium', 6.20, 9.20],
        ['Leche Entera Orgánica 1L', 4.80, 7.20],
        ['Leche Semidescremada 1L', 3.50, 5.20],
        ['Leche Descremada 1L', 3.20, 4.80],
        ['Leche de Cabra 1L', 6.50, 9.80],
        ['Leche A2 Premium 1L', 5.80, 8.50],
        ['Leche sin Lactosa 1L', 4.20, 6.20],
        ['Leche de Almendra Artesanal 1L', 5.50, 8.20],
        ['Leche de Avena Artesanal 1L', 4.80, 7.20],
        ['Leche de Coco Fresca 1L', 6.20, 9.20],
        ['Crema de Leche 35% 500ml', 4.50, 6.80],
        ['Crema Agria Premium 300ml', 3.20, 4.80],
        ['Crema Ácida Light 300ml', 2.80, 4.20],
        ['Half & Half 1L', 3.80, 5.80],
        ['Mantequilla sin Sal Premium 250g', 5.20, 7.80],
        ['Mantequilla con Sal 250g', 4.80, 7.20],
        ['Mantequilla de Cabra 150g', 7.50, 11.00],
        ['Ghee / Mantequilla Clarificada 250g', 8.50, 12.50],
        ['Mantequilla Orgánica Grass-Fed 250g', 7.20, 10.50],
        ['Yogur Griego Natural 500g', 5.50, 8.20],
        ['Yogur Griego Miel 200g', 3.80, 5.80],
        ['Yogur de Frutas del Bosque 200g', 2.80, 4.20],
        ['Yogur Orgánico Natural 500g', 6.20, 9.20],
        ['Yogur de Cabra 400g', 7.50, 11.00],
        ['Yogur de Coco Sin Lácteos 400g', 5.80, 8.50],
        ['Kéfir Natural 1L', 6.80, 10.00],
        ['Kéfir de Cabra 1L', 8.20, 12.00],
        ['Queso Cheddar Artesanal 200g', 6.50, 9.80],
        ['Queso Mozzarella Fresca 250g', 5.80, 8.50],
        ['Queso Brie Premium 200g', 8.50, 12.50],
        ['Queso Camembert 200g', 9.20, 13.50],
        ['Queso Parmesano Italiano 150g', 9.80, 14.50],
        ['Queso Ricotta Artesanal 300g', 5.20, 7.80],
        ['Queso Cottage 400g', 4.50, 6.80],
        ['Queso Feta Griego 200g', 6.80, 10.00],
        ['Queso Gouda Curado 200g', 7.50, 11.00],
        ['Queso Swiss Emmental 200g', 8.20, 12.00],
        ['Queso Gruyère 150g', 9.50, 14.00],
        ['Queso Manchego Artesanal 200g', 10.50, 15.50],
        ['Queso Oaxaca (Quesillo) 300g', 6.50, 9.80],
        ['Queso Panela Fresco 300g', 5.20, 7.80],
        ['Queso Cotija Añejo 200g', 7.80, 11.50],
        ['Queso Asadero 300g', 6.20, 9.20],
        ['Queso Crema Light 200g', 4.80, 7.20],
        ['Burrata Premium 150g', 8.80, 13.00],
        ['Queso Halloumi 200g', 7.50, 11.00],
        ['Requesón Artesanal 400g', 5.50, 8.20],
    ],

    // ── PANADERÍA ───────────────────────────────────────────
    'panaderia' => [
        ['Pan Artesanal de Masa Madre', 6.80, 9.80],
        ['Pan Integral de Centeno', 5.50, 8.20],
        ['Baguette Francesa Artesanal', 3.80, 5.80],
        ['Pan Multigrano Orgánico', 6.20, 9.20],
        ['Pan de Nuez y Arándano', 7.50, 11.00],
        ['Brioche Artesanal', 6.50, 9.80],
        ['Challah Trenzado', 7.20, 10.50],
        ['Focaccia con Romero', 5.80, 8.50],
        ['Ciabatta Italiana', 4.80, 7.20],
        ['Pan de Pita Artesanal 6pcs', 4.20, 6.20],
        ['Tortillas de Maíz Orgánicas 12pcs', 3.80, 5.80],
        ['Tortillas de Harina Artesanales 8pcs', 4.20, 6.20],
        ['Bagel Everything 4pcs', 5.50, 8.20],
        ['Croissant de Mantequilla 4pcs', 7.80, 11.50],
        ['Muffin de Arándanos 4pcs', 6.50, 9.80],
        ['Muffin de Plátano y Nuez 4pcs', 6.20, 9.20],
        ['Scone de Cranberry 4pcs', 5.80, 8.50],
        ['Danish de Queso Crema', 3.50, 5.20],
        ['Cinnamon Roll Artesanal', 4.80, 7.20],
        ['Galleta de Choco Chip Artesanal 6pcs', 5.20, 7.80],
        ['Galletas de Mantequilla 8pcs', 4.80, 7.20],
        ['Brownie de Chocolate 4pcs', 6.80, 10.00],
        ['Tarta de Manzana Artesanal', 9.50, 14.00],
        ['Pastel de Zanahoria con Glaseado', 12.00, 17.50],
        ['Banana Bread Artesanal', 7.20, 10.50],
        ['Zucchini Bread', 6.80, 10.00],
        ['Pan de Ajo Artesanal', 5.50, 8.20],
        ['Pan de Queso (Pão de Queijo) 6pcs', 5.80, 8.50],
        ['Empanadas de Manzana 4pcs', 6.50, 9.80],
        ['Pretzel Artesanal 4pcs', 5.20, 7.80],
        ['Pan de Espelta 100%', 6.80, 10.00],
        ['Pan Kamut Premium', 7.50, 11.00],
        ['Pan Sin Gluten de Quinoa', 7.80, 11.50],
        ['Pan Keto de Almendra', 8.50, 12.50],
        ['Granola Artesanal 400g', 8.20, 12.00],
        ['Granola con Coco 400g', 7.80, 11.50],
        ['Müesli Sin Azúcar 500g', 6.50, 9.80],
        ['Avena Artesanal Cortada 500g', 5.50, 8.20],
        ['Waffles Belgas Artesanales 4pcs', 6.80, 10.00],
        ['Pancakes de Arándanos Mix 400g', 5.50, 8.20],
        ['Tostadas de Centeno 200g', 4.80, 7.20],
        ['Crispbread Escandinavo 200g', 5.20, 7.80],
        ['Pan Pumpernickel 400g', 6.20, 9.20],
        ['Buñuelos de Queso 6pcs', 5.80, 8.50],
        ['Palitos de Sésamo 200g', 4.50, 6.80],
        ['Pita Chips Artesanales 200g', 4.20, 6.20],
        ['Pan de Maíz Cornbread', 5.80, 8.50],
        ['Biscuits del Sur 6pcs', 5.50, 8.20],
        ['Donuts Artesanales 4pcs', 6.50, 9.80],
        ['Éclair de Chocolate 4pcs', 8.50, 12.50],
    ],

    // ── CARNES Y AVES ───────────────────────────────────────
    'carnes-aves' => [
        ['Pechuga de Pollo Orgánica 1kg', 9.80, 14.50],
        ['Muslo de Pollo Free-Range 1kg', 7.50, 11.00],
        ['Pollo Entero Orgánico 1.5kg', 14.50, 21.00],
        ['Alitas de Pollo 1kg', 8.20, 12.00],
        ['Pechuga de Pavo 500g', 8.80, 13.00],
        ['Molida de Pavo 500g', 7.50, 11.00],
        ['Bistec de Res Grass-Fed 300g', 12.50, 18.50],
        ['Molida de Res Premium 500g', 9.20, 13.50],
        ['Costillas de Res Premium 1kg', 16.50, 24.00],
        ['Lomo de Res Angus 300g', 22.00, 32.00],
        ['Filete Mignon 200g', 28.00, 40.00],
        ['Rib Eye Premium 350g', 26.00, 38.00],
        ['New York Strip 300g', 24.00, 35.00],
        ['Tri-Tip de Res 500g', 18.50, 27.00],
        ['Brisket de Res 1kg', 20.00, 29.00],
        ['Short Ribs de Res 1kg', 22.00, 32.00],
        ['Chuleta de Cerdo 400g', 8.50, 12.50],
        ['Lomo de Cerdo 500g', 10.50, 15.50],
        ['Pierna de Cerdo 1kg', 12.00, 17.50],
        ['Tocino / Bacon Ahumado 300g', 8.20, 12.00],
        ['Salchicha de Res Artesanal 6pcs', 9.50, 14.00],
        ['Salchicha Italiana 6pcs', 9.20, 13.50],
        ['Chorizo Artesanal 300g', 8.80, 13.00],
        ['Jamón Serrano 200g', 12.50, 18.50],
        ['Jamón de Pavo 200g', 8.50, 12.50],
        ['Pepperoni Artesanal 200g', 7.80, 11.50],
        ['Pato Entero 1.2kg', 22.00, 32.00],
        ['Pechuga de Pato 300g', 16.50, 24.00],
        ['Codorniz Entera 2pcs', 14.00, 20.50],
        ['Conejo Entero 1kg', 18.00, 26.00],
        ['Cordero Rack 500g', 28.00, 40.00],
        ['Pierna de Cordero 1kg', 24.00, 35.00],
        ['Chuleta de Cordero 400g', 22.00, 32.00],
        ['Molida de Cordero 500g', 18.00, 26.00],
        ['Hígado de Res 500g', 6.80, 10.00],
        ['Corazón de Res 500g', 7.50, 11.00],
        ['Huesos para Caldo 1kg', 5.50, 8.20],
        ['Caldo de Hueso de Res 1L', 9.80, 14.50],
        ['Caldo de Hueso de Pollo 1L', 8.50, 12.50],
    ],

    // ── MARISCOS ────────────────────────────────────────────
    'mariscos' => [
        ['Camarón Jumbo Fresco 500g', 18.50, 27.00],
        ['Camarón Mediano 1kg', 22.00, 32.00],
        ['Camarón Orgánico 500g', 24.00, 35.00],
        ['Salmón Atlántico Filete 300g', 16.50, 24.00],
        ['Salmón Salvaje del Pacífico 300g', 22.00, 32.00],
        ['Atún Aleta Amarilla Fresco 300g', 18.00, 26.00],
        ['Tilapia Fresca 500g', 9.50, 14.00],
        ['Filete de Bacalao 400g', 14.00, 20.50],
        ['Filete de Trucha 400g', 13.50, 19.50],
        ['Langosta Entera 600g', 45.00, 65.00],
        ['Cola de Langosta 300g', 38.00, 55.00],
        ['Cangrejo Real 1kg', 55.00, 79.00],
        ['Cangrejo Blue Cocido 500g', 22.00, 32.00],
        ['Jaiba / Cangrejo de Bahía 500g', 18.00, 26.00],
        ['Almejas Littleneck 1kg', 16.50, 24.00],
        ['Mejillones Frescos 1kg', 12.00, 17.50],
        ['Ostras Frescas Media Docena', 18.00, 26.00],
        ['Ostiones Jumbo 6pcs', 24.00, 35.00],
        ['Vieiras / Scallops 300g', 22.00, 32.00],
        ['Pulpo Limpio 500g', 18.50, 27.00],
        ['Calamar Fresco 500g', 10.50, 15.50],
        ['Sepia / Jibia 400g', 12.00, 17.50],
        ['Pez Espada Fresco 300g', 20.00, 29.00],
        ['Mahi-Mahi Fresco 400g', 16.50, 24.00],
        ['Halibut Fresco 300g', 22.00, 32.00],
        ['Lubina / Sea Bass 400g', 24.00, 35.00],
        ['Corvina Fresca 500g', 14.00, 20.50],
        ['Dorada Fresca 400g', 15.50, 22.50],
        ['Sardinas Frescas 500g', 8.50, 12.50],
        ['Anchoas Frescas 300g', 9.80, 14.50],
        ['Arenque Fresco 400g', 8.20, 12.00],
        ['Trucha Ahumada 200g', 12.50, 18.50],
        ['Salmón Ahumado Premium 200g', 16.50, 24.00],
        ['Bacalao Salado 500g', 11.00, 16.50],
        ['Surimi Premium 300g', 6.80, 10.00],
        ['Huevas de Salmón 100g', 18.00, 26.00],
        ['Huevas de Trucha 100g', 14.00, 20.50],
        ['Erizo de Mar / Uni 100g', 28.00, 40.00],
        ['Pepino de Mar 200g', 16.50, 24.00],
        ['Algas Wakame Frescas 200g', 5.80, 8.50],
    ],

    // ── BEBIDAS ─────────────────────────────────────────────
    'bebidas' => [
        ['Jugo de Naranja Fresco 1L', 5.50, 8.20],
        ['Jugo de Manzana Premium 1L', 4.80, 7.20],
        ['Jugo de Uva Morada 1L', 5.20, 7.80],
        ['Jugo Verde Detox 500ml', 6.50, 9.80],
        ['Smoothie de Frutos Rojos 350ml', 5.80, 8.50],
        ['Smoothie Verde Kale-Mango 350ml', 6.20, 9.20],
        ['Smoothie de Mango Tropical 350ml', 5.50, 8.20],
        ['Agua de Coco Natural 350ml', 4.20, 6.20],
        ['Agua de Coco con Piña 350ml', 4.50, 6.80],
        ['Kombucha Original 330ml', 5.50, 8.20],
        ['Kombucha de Jengibre-Limón 330ml', 5.80, 8.50],
        ['Kombucha de Granada 330ml', 6.20, 9.20],
        ['Kéfir de Agua Frutos Rojos 500ml', 5.50, 8.20],
        ['Tepache Artesanal de Piña 500ml', 5.20, 7.80],
        ['Agua Mineral con Gas 1L', 2.80, 4.20],
        ['Agua Alcalina pH9 1L', 3.80, 5.80],
        ['Agua de Manantial Premium 1L', 3.20, 4.80],
        ['Té Verde Matcha Premium 250ml', 6.50, 9.80],
        ['Té Kombucha Multi Probiótico 330ml', 5.80, 8.50],
        ['Té Frío de Durazno 500ml', 3.80, 5.80],
        ['Cold Brew Café Orgánico 330ml', 5.50, 8.20],
        ['Café de Especialidad Cold Brew 330ml', 6.20, 9.20],
        ['Leche Dorada Cúrcuma 250ml', 5.80, 8.50],
        ['Bebida de Remolacha + Jengibre 250ml', 5.50, 8.20],
        ['Bebida de Jengibre Picante 250ml', 4.80, 7.20],
        ['Limonada Artesanal 500ml', 4.50, 6.80],
        ['Limonada de Lavanda 500ml', 5.20, 7.80],
        ['Agua Fresca de Jamaica 500ml', 4.20, 6.20],
        ['Agua Fresca de Tamarindo 500ml', 4.20, 6.20],
        ['Horchata Artesanal 500ml', 4.50, 6.80],
        ['Bebida de Avena con Canela 500ml', 4.80, 7.20],
        ['Lassi de Mango 350ml', 5.20, 7.80],
        ['Masala Chai Latte 250ml', 4.80, 7.20],
        ['Bebida Energética Natural Guaraná 330ml', 5.50, 8.20],
        ['Jugo de Remolacha Puro 250ml', 5.80, 8.50],
        ['Shot de Jengibre + Cúrcuma 60ml', 3.50, 5.20],
        ['Shot de Wheatgrass 60ml', 3.80, 5.80],
        ['Vinagre de Sidra de Manzana Premium 500ml', 7.80, 11.50],
        ['Shrub de Frambuesa 250ml', 6.50, 9.80],
        ['Agua Saborizada sin Azúcar 500ml', 2.80, 4.20],
    ],

    // ── ORGÁNICOS ───────────────────────────────────────────
    'organicos' => [
        ['Manzana Orgánica Certificada 1kg', 5.50, 8.20],
        ['Zanahoria Orgánica Certificada 1kg', 4.20, 6.20],
        ['Espinaca Orgánica Baby 200g', 5.80, 8.50],
        ['Kale Orgánico 200g', 5.20, 7.80],
        ['Tomates Cherry Orgánicos 250g', 5.50, 8.20],
        ['Fresas Orgánicas Premium 300g', 7.50, 11.00],
        ['Arándanos Orgánicos 250g', 8.20, 12.00],
        ['Aguacate Orgánico Hass 2pcs', 5.80, 8.50],
        ['Brócoli Orgánico 500g', 4.80, 7.20],
        ['Pepino Orgánico 2pcs', 3.80, 5.80],
        ['Lechuga Romana Orgánica', 4.20, 6.20],
        ['Huevos Orgánicos Free-Range Docena', 8.50, 12.50],
        ['Leche Orgánica Entera 1L', 5.80, 8.50],
        ['Yogur Orgánico Natural 500g', 6.50, 9.80],
        ['Quinoa Orgánica 500g', 7.80, 11.50],
        ['Arroz Integral Orgánico 1kg', 5.20, 7.80],
        ['Avena Orgánica 500g', 4.80, 7.20],
        ['Lentejas Orgánicas 500g', 4.50, 6.80],
        ['Garbanzos Orgánicos 500g', 4.80, 7.20],
        ['Frijoles Negros Orgánicos 500g', 4.50, 6.80],
        ['Aceite de Oliva Orgánico Extra Virgen 500ml', 12.50, 18.50],
        ['Aceite de Coco Orgánico 250ml', 8.80, 13.00],
        ['Miel Orgánica Cruda 350g', 9.50, 14.00],
        ['Mantequilla de Maní Orgánica 350g', 7.80, 11.50],
        ['Mantequilla de Almendra Orgánica 350g', 10.50, 15.50],
        ['Tahini Orgánico 250g', 7.50, 11.00],
        ['Cacao en Polvo Orgánico 250g', 8.20, 12.00],
        ['Chips de Chocolate Oscuro Orgánico 200g', 6.80, 10.00],
        ['Pasas Orgánicas 250g', 5.50, 8.20],
        ['Dátiles Medjool Orgánicos 250g', 9.80, 14.50],
        ['Coco Rallado Orgánico 200g', 4.80, 7.20],
        ['Semillas de Chía Orgánicas 250g', 6.50, 9.80],
        ['Semillas de Linaza Orgánicas 250g', 5.20, 7.80],
        ['Semillas de Cáñamo Orgánicas 250g', 8.50, 12.50],
        ['Semillas de Calabaza Orgánicas 250g', 6.80, 10.00],
        ['Almendras Orgánicas 250g', 9.50, 14.00],
        ['Nueces Orgánicas 200g', 10.50, 15.50],
        ['Anacardos / Cashews Orgánicos 250g', 10.00, 14.80],
        ['Arándanos Deshidratados Orgánicos 200g', 7.80, 11.50],
        ['Goji Berries Orgánicos 100g', 8.50, 12.50],
    ],

    // ── SNACKS NATURALES ────────────────────────────────────
    'snacks-naturales' => [
        ['Chips de Manzana Deshidratada 50g', 3.80, 5.80],
        ['Chips de Betabel / Remolacha 50g', 4.20, 6.20],
        ['Chips de Plátano Macho 80g', 3.50, 5.20],
        ['Chips de Zanahoria y Remolacha 60g', 4.50, 6.80],
        ['Chips de Col Rizada / Kale 40g', 5.20, 7.80],
        ['Palomitas de Maíz Orgánicas 100g', 3.80, 5.80],
        ['Palomitas con Queso Cheddar 100g', 4.20, 6.20],
        ['Palomitas de Mantequilla Premium 100g', 3.50, 5.20],
        ['Trail Mix Premium 200g', 8.50, 12.50],
        ['Trail Mix Tropical 200g', 7.80, 11.50],
        ['Mezcla de Frutos Secos Energética 150g', 9.20, 13.50],
        ['Barrita de Proteína Natural Cacao 60g', 4.80, 7.20],
        ['Barrita de Avena y Miel 60g', 3.80, 5.80],
        ['Barrita de Arándano y Quinoa 60g', 4.50, 6.80],
        ['Barrita de Dátil y Almendra 50g', 5.20, 7.80],
        ['Larabar Original 50g', 3.50, 5.20],
        ['RxBar Chocolate 52g', 3.80, 5.80],
        ['Gomitas de Fruta 100% Natural 100g', 5.80, 8.50],
        ['Frutas Deshidratadas Mix 150g', 6.50, 9.80],
        ['Mango Deshidratado 100g', 5.80, 8.50],
        ['Piña Deshidratada 100g', 5.20, 7.80],
        ['Coco Tostado Chips 80g', 4.80, 7.20],
        ['Nueces Caramelizadas 150g', 8.20, 12.00],
        ['Almendras Tostadas con Sal Marina 150g', 7.50, 11.00],
        ['Pistachos Tostados 150g', 8.80, 13.00],
        ['Cacahuates Orgánicos Tostados 200g', 5.50, 8.20],
        ['Edamame Tostado Crocante 100g', 4.80, 7.20],
        ['Garbanzos Tostados Barbecue 100g', 4.50, 6.80],
        ['Tostadas de Arroz Integral 150g', 4.20, 6.20],
        ['Galletas de Avena y Choco 150g', 5.80, 8.50],
        ['Pretzels de Espelta 150g', 5.20, 7.80],
        ['Crackers de Semillas 150g', 6.50, 9.80],
        ['Hummus Original 200g', 5.50, 8.20],
        ['Hummus de Pimiento Asado 200g', 5.80, 8.50],
        ['Hummus de Remolacha 200g', 6.20, 9.20],
        ['Guacamole Fresco 200g', 6.80, 10.00],
        ['Salsa Verde Artesanal 200g', 5.50, 8.20],
        ['Salsa Pico de Gallo 200g', 4.80, 7.20],
        ['Dip de Espinaca y Alcachofa 200g', 6.50, 9.80],
        ['Tzatziki Artesanal 200g', 5.80, 8.50],
    ],

    // ── HIERBAS Y ESPECIAS ──────────────────────────────────
    'hierbas-especias' => [
        ['Albahaca Fresca en Maceta', 4.80, 7.20],
        ['Cilantro Fresco Manojo', 1.80, 2.80],
        ['Perejil Italiano Fresco', 1.80, 2.80],
        ['Perejil Rizado Fresco', 1.80, 2.80],
        ['Romero Fresco en Maceta', 4.80, 7.20],
        ['Tomillo Fresco en Maceta', 4.50, 6.80],
        ['Orégano Fresco en Maceta', 4.50, 6.80],
        ['Menta Fresca en Maceta', 4.80, 7.20],
        ['Estragón Fresco', 4.20, 6.20],
        ['Salvia Fresca en Maceta', 4.80, 7.20],
        ['Eneldo Fresco', 3.80, 5.80],
        ['Cebollín Fresco', 2.50, 3.80],
        ['Hierba Santa / Epazote', 3.20, 4.80],
        ['Hierba Luisa / Lemon Verbena', 4.50, 6.80],
        ['Lavanda Culinaria Fresca', 5.80, 8.50],
        ['Canela en Rama Ceylon Premium', 4.80, 7.20],
        ['Canela en Polvo Ceylon 50g', 3.80, 5.80],
        ['Cardamomo Verde Entero 50g', 6.50, 9.80],
        ['Cardamomo Negro 50g', 7.20, 10.50],
        ['Comino en Semilla 50g', 3.20, 4.80],
        ['Comino en Polvo 50g', 3.20, 4.80],
        ['Cúrcuma en Polvo Premium 100g', 5.50, 8.20],
        ['Jengibre en Polvo 50g', 4.20, 6.20],
        ['Pimienta Negra Tellicherry 50g', 5.80, 8.50],
        ['Pimienta Blanca 50g', 5.20, 7.80],
        ['Pimienta Rosa en Grano 30g', 6.50, 9.80],
        ['Pimienta de Jamaica / Allspice 50g', 4.80, 7.20],
        ['Clavo de Olor Entero 30g', 4.50, 6.80],
        ['Nuez Moscada Entera', 4.20, 6.20],
        ['Semillas de Mostaza Amarilla 50g', 3.20, 4.80],
        ['Semillas de Mostaza Negra 50g', 3.80, 5.80],
        ['Páprika Dulce Española 50g', 4.20, 6.20],
        ['Páprika Ahumada 50g', 4.80, 7.20],
        ['Ají Molido / Cayena 30g', 3.80, 5.80],
        ['Chile Ancho en Polvo 50g', 4.50, 6.80],
        ['Achiote en Pasta 100g', 3.50, 5.20],
        ['Azafrán Premium 1g', 8.50, 12.50],
        ['Vainilla en Vainas 2pcs Premium', 9.80, 14.50],
        ['Extracto de Vainilla Puro 60ml', 7.50, 11.00],
        ['Mix 5 Especias Chinas 50g', 5.80, 8.50],
        ['Garam Masala Artesanal 50g', 5.20, 7.80],
        ['Curry Madras Premium 50g', 4.80, 7.20],
        ['Ras el Hanout 50g', 6.50, 9.80],
        ['Za\'atar Premium 50g', 6.20, 9.20],
        ['Sumac 50g', 5.80, 8.50],
        ['Semillas de Sésamo Blanco 100g', 3.80, 5.80],
        ['Semillas de Sésamo Negro 100g', 4.20, 6.20],
        ['Semillas de Amapola 50g', 4.50, 6.80],
        ['Sal Rosa del Himalaya Gruesa 200g', 5.20, 7.80],
        ['Sal de Mar Fleur de Sel 100g', 7.50, 11.00],
        ['Sal Ahumada Artesanal 100g', 6.80, 10.00],
    ],

    // ── CONGELADOS ──────────────────────────────────────────
    'congelados' => [
        ['Edamame Congelado 500g', 4.50, 6.80],
        ['Maíz Dulce Congelado 500g', 3.80, 5.80],
        ['Chícharos Congelados 500g', 3.50, 5.20],
        ['Mezcla Vegetales Congelados 500g', 4.20, 6.20],
        ['Brócoli Congelado 500g', 4.20, 6.20],
        ['Espinaca Congelada 500g', 3.80, 5.80],
        ['Habas Congeladas 500g', 4.50, 6.80],
        ['Coliflor Congelada 500g', 4.20, 6.20],
        ['Coles de Bruselas Congeladas 500g', 4.50, 6.80],
        ['Papas para Freír Premium 1kg', 5.50, 8.20],
        ['Papas Rústicas Congeladas 1kg', 5.20, 7.80],
        ['Camote Congelado en Cubos 500g', 4.80, 7.20],
        ['Fresas Congeladas 500g', 5.50, 8.20],
        ['Mango Congelado en Trozos 500g', 5.80, 8.50],
        ['Mezcla Berries Congelada 500g', 6.50, 9.80],
        ['Piña Congelada en Cubos 500g', 5.20, 7.80],
        ['Cereza Congelada 500g', 6.80, 10.00],
        ['Aguacate Congelado en Mitades 400g', 7.50, 11.00],
        ['Camarón Congelado IQF 1kg', 18.50, 27.00],
        ['Salmón Congelado Porciones 500g', 16.50, 24.00],
        ['Filete de Tilapia Congelado 500g', 9.50, 14.00],
        ['Mezcla Mariscos Congelada 500g', 14.00, 20.50],
        ['Pulpo Congelado Limpio 500g', 16.50, 24.00],
        ['Calamar Anillas Congeladas 500g', 9.80, 14.50],
        ['Pizza Artesanal Margherita', 9.50, 14.00],
        ['Pizza Vegetal Premium', 10.50, 15.50],
        ['Lasaña de Res Artesanal 400g', 11.00, 16.50],
        ['Empanadas de Espinaca 6pcs', 8.50, 12.50],
        ['Gyozas de Pollo 12pcs', 9.20, 13.50],
        ['Dumplings Vegetarianos 12pcs', 8.80, 13.00],
        ['Taquitos de Pollo 10pcs', 9.50, 14.00],
        ['Burritos Congelados 2pcs', 7.80, 11.50],
        ['Waffles Orgánicos 6pcs', 6.50, 9.80],
        ['Pancakes Premium 6pcs', 6.20, 9.20],
        ['Helado de Vainilla Artesanal 500ml', 8.50, 12.50],
        ['Helado de Chocolate Oscuro 500ml', 8.50, 12.50],
        ['Helado de Fresa Natural 500ml', 8.20, 12.00],
        ['Sorbete de Mango 500ml', 7.80, 11.50],
        ['Sorbete de Frambuesa 500ml', 7.80, 11.50],
        ['Paletas de Fruta Natural 6pcs', 7.50, 11.00],
    ],

    // ── DESPENSA ────────────────────────────────────────────
    'despensa' => [
        ['Aceite de Oliva Extra Virgen 500ml', 12.50, 18.50],
        ['Aceite de Aguacate Prensado en Frío 250ml', 10.50, 15.50],
        ['Aceite de Coco Orgánico 500ml', 11.00, 16.50],
        ['Aceite de Girasol Premium 1L', 6.50, 9.80],
        ['Aceite de Sésamo Tostado 250ml', 8.20, 12.00],
        ['Vinagre Balsámico de Módena 250ml', 9.50, 14.00],
        ['Vinagre de Vino Tinto Artesanal 500ml', 6.80, 10.00],
        ['Vinagre de Manzana Raw 500ml', 7.50, 11.00],
        ['Salsa de Soya Premium 250ml', 4.80, 7.20],
        ['Tamari Sin Gluten 250ml', 5.80, 8.50],
        ['Salsa Worcestershire Artesanal 150ml', 5.20, 7.80],
        ['Salsa de Ostión Premium 150ml', 5.50, 8.20],
        ['Sriracha Artesanal 250ml', 5.80, 8.50],
        ['Salsa Tabasco Premium 60ml', 3.80, 5.80],
        ['Harissa Premium 150g', 6.50, 9.80],
        ['Pasta de Miso Blanca 300g', 6.80, 10.00],
        ['Pasta de Miso Roja 300g', 7.20, 10.50],
        ['Tahini Premium 300g', 7.80, 11.50],
        ['Mantequilla de Maní Natural 350g', 6.80, 10.00],
        ['Mantequilla de Almendra 350g', 10.50, 15.50],
        ['Mantequilla de Anacardo 300g', 10.00, 14.80],
        ['Pasta de Avellana y Cacao 400g', 9.50, 14.00],
        ['Mermelada de Fresa Artesanal 300g', 6.50, 9.80],
        ['Mermelada de Frambuesa Sin Azúcar 300g', 7.20, 10.50],
        ['Mermelada de Arándano 300g', 7.50, 11.00],
        ['Mermelada de Mango-Jengibre 300g', 6.80, 10.00],
        ['Miel Cruda de Trébol 350g', 8.50, 12.50],
        ['Miel de Manuka UMF10+ 250g', 18.00, 26.00],
        ['Miel de Flores Silvestres 350g', 7.80, 11.50],
        ['Jarabe de Maple Grado A 250ml', 9.50, 14.00],
        ['Jarabe de Agave Orgánico 350ml', 7.80, 11.50],
        ['Jarabe de Yacón 250ml', 11.00, 16.50],
        ['Pasta de Tomate Artesanal 400g', 4.80, 7.20],
        ['Salsa Marinara Premium 500ml', 7.50, 11.00],
        ['Pesto Genovese Artesanal 190g', 8.50, 12.50],
        ['Caldo de Pollo Orgánico 1L', 5.50, 8.20],
        ['Caldo de Verduras Premium 1L', 5.20, 7.80],
        ['Leche de Coco Premium 400ml', 3.80, 5.80],
        ['Leche de Almendra Sin Azúcar 1L', 4.80, 7.20],
        ['Arroz Basmati Premium 1kg', 6.50, 9.80],
        ['Arroz Jazmín Tailandés 1kg', 6.20, 9.20],
        ['Arroz Negro / Forbidden Rice 500g', 7.80, 11.50],
        ['Pasta Spaghetti de Espelta 500g', 5.20, 7.80],
        ['Pasta Penne de Lentejas Rojas 300g', 5.80, 8.50],
        ['Pasta de Garbanzos Penne 300g', 5.80, 8.50],
        ['Pasta de Arroz Integral 300g', 4.80, 7.20],
        ['Fideos Soba de Trigo Sarraceno 300g', 5.50, 8.20],
        ['Fideos Udon Premium 300g', 5.20, 7.80],
        ['Fideos de Arroz Vermicelli 300g', 3.80, 5.80],
        ['Quinoa Blanca Orgánica 500g', 7.80, 11.50],
        ['Quinoa Tricolor 500g', 8.20, 12.00],
        ['Mijo Orgánico 500g', 5.50, 8.20],
        ['Amaranto 500g', 6.50, 9.80],
        ['Trigo Sarraceno / Buckwheat 500g', 5.80, 8.50],
        ['Freekeh Verde 400g', 6.80, 10.00],
        ['Farro Premium 500g', 6.50, 9.80],
        ['Cebada Perla 500g', 4.80, 7.20],
        ['Lentejas Verdes 500g', 4.50, 6.80],
        ['Lentejas Rojas 500g', 4.20, 6.20],
        ['Lentejas Beluga Negras 500g', 5.80, 8.50],
        ['Garbanzos Secos 500g', 4.50, 6.80],
        ['Frijoles Negros 500g', 4.20, 6.20],
        ['Frijoles Pintos 500g', 4.20, 6.20],
        ['Frijoles Rojos Kidney 500g', 4.50, 6.80],
        ['Frijoles Blancos Cannellini 500g', 4.80, 7.20],
        ['Frijoles Caritas / Black Eyed Peas 500g', 4.50, 6.80],
        ['Alubias de Mantequilla 500g', 5.20, 7.80],
        ['Harina de Almendra 500g', 9.50, 14.00],
        ['Harina de Avena 500g', 5.50, 8.20],
        ['Harina de Coco Orgánica 300g', 7.80, 11.50],
        ['Harina de Garbanzo 500g', 5.80, 8.50],
        ['Harina de Arroz Integral 500g', 5.20, 7.80],
        ['Harina Sin Gluten Mix 500g', 6.50, 9.80],
        ['Chocolate Oscuro 85% 100g', 5.80, 8.50],
        ['Chocolate Oscuro 70% 100g', 5.20, 7.80],
        ['Cacao Nibs Orgánicos 150g', 7.50, 11.00],
        ['Cacao en Polvo Raw 200g', 7.80, 11.50],
        ['Chips de Chocolate Sin Azúcar 200g', 6.80, 10.00],
    ],

    // ── ENSALADAS FRESCAS ───────────────────────────────────
    'ensaladas' => [
        ['Ensalada César Premium 300g', 7.50, 11.00],
        ['Ensalada Griega Fresca 300g', 7.80, 11.50],
        ['Ensalada Nicoise 350g', 8.50, 12.50],
        ['Ensalada Caprese con Burrata 300g', 9.80, 14.50],
        ['Ensalada de Quinoa y Aguacate 300g', 8.20, 12.00],
        ['Ensalada de Kale y Arándanos 250g', 7.50, 11.00],
        ['Ensalada Waldorf Premium 300g', 8.80, 13.00],
        ['Ensalada de Espinaca y Fresas 250g', 7.80, 11.50],
        ['Ensalada de Rúcula y Parmesano 250g', 8.20, 12.00],
        ['Ensalada Mediterránea 350g', 9.50, 14.00],
        ['Ensalada de Remolacha y Queso de Cabra 300g', 8.80, 13.00],
        ['Ensalada de Zanahoria Rallada y Naranja 250g', 6.80, 10.00],
        ['Ensalada de Lentejas Verdes 300g', 7.50, 11.00],
        ['Ensalada de Garbanzos Mediterránea 300g', 7.80, 11.50],
        ['Ensalada de Pasta Integral 350g', 7.20, 10.50],
        ['Ensalada de Arroz Salvaje 300g', 7.80, 11.50],
        ['Ensalada Tailandesa de Mango Verde 300g', 8.50, 12.50],
        ['Ensalada de Pepino y Eneldo 250g', 6.50, 9.80],
        ['Coleslaw Premium 300g', 6.20, 9.20],
        ['Coleslaw Sin Mayonesa 300g', 5.80, 8.50],
        ['Ensalada de Col Asiática 300g', 7.20, 10.50],
        ['Tabbouleh Artesanal 300g', 7.50, 11.00],
        ['Fattoush Premium 300g', 7.80, 11.50],
        ['Ensalada de Tomate Heirloom 300g', 8.50, 12.50],
        ['Mix de Baby Greens 200g', 5.80, 8.50],
        ['Mesclun Premium 200g', 6.20, 9.20],
        ['Ensalada de Brócoli y Tocino 300g', 8.20, 12.00],
        ['Ensalada de Sandía y Feta 300g', 8.80, 13.00],
        ['Ensalada de Maíz Asado 300g', 7.50, 11.00],
        ['Poke Bowl de Salmón 400g', 13.50, 19.50],
        ['Poke Bowl Vegano 400g', 11.50, 17.00],
        ['Buddha Bowl Premium 450g', 12.50, 18.50],
        ['Grain Bowl de Farro 400g', 11.00, 16.50],
        ['Wrap de Lechuga con Pollo 300g', 9.50, 14.00],
        ['Ensalada de Papa Alemana 300g', 7.20, 10.50],
        ['Ensalada de Papa con Hierbas 300g', 6.80, 10.00],
        ['Ensalada de Aguacate y Tomate 250g', 8.50, 12.50],
        ['Ensalada Detox de Pepino 250g', 6.50, 9.80],
        ['Ensalada de Zanahoria y Jengibre 250g', 6.80, 10.00],
        ['Ensalada de Papaya Verde Estilo Thai 300g', 8.20, 12.00],
        ['Ensalada de Hinojo y Naranja 250g', 7.80, 11.50],
        ['Ensalada de Betabel Asado 300g', 7.50, 11.00],
        ['Ensalada de Edamame y Maíz 300g', 7.20, 10.50],
        ['Ensalada de Jícama y Naranja 250g', 6.80, 10.00],
        ['Ensalada Antiinflamatoria Cúrcuma 300g', 8.50, 12.50],
        ['Ensalada de Trucha Ahumada 300g', 11.00, 16.50],
        ['Ensalada Nicoise Vegana 350g', 9.50, 14.00],
        ['Ensalada de Pollo a las Hierbas 350g', 10.50, 15.50],
        ['Ensalada de Atún Premium 300g', 10.00, 14.80],
        ['Ensalada de Camote Asado 300g', 7.80, 11.50],
        ['Ensalada de Hongos Asados 250g', 8.20, 12.00],
    ],

    // ── MIEL Y APICULTURA ───────────────────────────────────
    'miel-apicultura' => [
        ['Miel Natural de Trébol 350g', 7.80, 11.50],
        ['Miel de Flores Silvestres 350g', 8.20, 12.00],
        ['Miel de Lavanda Premium 250g', 10.50, 15.50],
        ['Miel de Naranjo 350g', 9.50, 14.00],
        ['Miel de Acacia Premium 350g', 10.00, 14.80],
        ['Miel de Eucalipto 350g', 8.80, 13.00],
        ['Miel de Canela Artesanal 350g', 9.20, 13.50],
        ['Miel de Manuka UMF5+ 250g', 14.00, 20.50],
        ['Miel de Manuka UMF10+ 250g', 18.00, 26.00],
        ['Miel de Manuka UMF15+ 250g', 28.00, 40.00],
        ['Miel de Manuka UMF20+ 250g', 45.00, 65.00],
        ['Miel Cruda Sin Filtrar 500g', 11.00, 16.50],
        ['Miel Cruda con Panal 350g', 13.50, 19.50],
        ['Miel Cremosa Batida 350g', 9.80, 14.50],
        ['Miel Infusionada con Ajo 300g', 11.00, 16.50],
        ['Miel Infusionada con Jengibre 300g', 10.50, 15.50],
        ['Miel Infusionada con Chile 300g', 10.50, 15.50],
        ['Miel Infusionada con Trufa 200g', 18.00, 26.00],
        ['Miel de Maple-Miel Blend 350g', 12.00, 17.50],
        ['Polen de Abeja Premium 200g', 12.50, 18.50],
        ['Polen de Abeja Fresco 100g', 9.80, 14.50],
        ['Propóleo en Gotas 30ml', 11.00, 16.50],
        ['Propóleo en Cápsulas 60pcs', 14.00, 20.50],
        ['Jalea Real Fresca 20g', 16.50, 24.00],
        ['Jalea Real en Miel 150g', 18.00, 26.00],
        ['Cera de Abeja Natural 100g', 8.50, 12.50],
        ['Cera de Abeja en Velas 2pcs', 12.00, 17.50],
        ['Panal de Miel Natural 250g', 14.00, 20.50],
        ['Vinagre de Miel Artesanal 250ml', 9.50, 14.00],
        ['Miel de Bambú Japonesa 250g', 22.00, 32.00],
        ['Miel de Sidr Yemení 200g', 35.00, 50.00],
        ['Miel de Buckwheat / Alforfón 350g', 10.50, 15.50],
        ['Miel de Tilo / Linden 350g', 10.00, 14.80],
        ['Miel de Castaño 350g', 9.80, 14.50],
        ['Miel de Cardamomo 250g', 12.00, 17.50],
        ['Miel de Vainilla 300g', 11.50, 17.00],
        ['Miel de Chocolate (blend) 300g', 12.50, 18.50],
        ['Set Degustación Mieles Premium 5x50g', 22.00, 32.00],
        ['Mead / Hidromiel Artesanal 375ml', 18.00, 26.00],
        ['Jabón de Miel y Avena Artesanal', 8.50, 12.50],
    ],

    // ── EN OFERTA ───────────────────────────────────────────
    'en-oferta' => [
        ['OFERTA: Mix de Frutas de Temporada 2kg', 8.50, 14.00],
        ['OFERTA: Cesta Verduras Orgánicas Semana', 22.00, 35.00],
        ['OFERTA: Pack Quesos Artesanales 3x200g', 18.00, 28.00],
        ['OFERTA: Caja Huevos Premium 2 docenas', 10.00, 16.00],
        ['OFERTA: Pack Yogures Griegos 6x200g', 14.00, 22.00],
        ['OFERTA: Pack Panes Artesanales x3', 14.00, 22.00],
        ['OFERTA: Box Snacks Saludables 10pcs', 18.00, 28.00],
        ['OFERTA: Kit Especias Premium 5 frascos', 20.00, 32.00],
        ['OFERTA: Pack Bebidas Kombucha 6pcs', 22.00, 35.00],
        ['OFERTA: Mix Frutos Secos Premium 500g', 16.00, 25.00],
        ['OFERTA: Pack Salmón + Camarón 1kg', 28.00, 42.00],
        ['OFERTA: Cesta Orgánica Familiar Semanal', 45.00, 70.00],
        ['OFERTA: Box Mieles Premium 3x250g', 20.00, 32.00],
        ['OFERTA: Pack Superfoods Semillas 5x150g', 24.00, 38.00],
        ['OFERTA: Kit Smoothies Semana 7 botellas', 28.00, 42.00],
        ['OFERTA: Pack Congelados Premium 4pcs', 22.00, 35.00],
        ['OFERTA: Box Desayuno Saludable Semana', 32.00, 50.00],
        ['OFERTA: Pack Carnes Premium Fin de Semana', 40.00, 62.00],
        ['OFERTA: Cesta Mediterránea Premium', 35.00, 55.00],
        ['OFERTA: Pack Lácteos Orgánicos Semana', 28.00, 42.00],
        ['OFERTA: Box Hierbas Frescas Kit x6', 18.00, 28.00],
        ['OFERTA: Pack Ensaladas Ready-to-Eat 5pcs', 24.00, 38.00],
        ['OFERTA: Cesta Tropical Frutas 2kg', 16.00, 25.00],
        ['OFERTA: Pack Pasta Artesanal + Salsas', 22.00, 35.00],
        ['OFERTA: Box Anti-Inflamatorio 10 items', 38.00, 58.00],
    ],
];

// ============================================================
// FUNCIÓN PRINCIPAL DE IMPORTACIÓN
// ============================================================

/**
 * Obtiene o crea una categoría de producto
 */
function get_or_create_category( $slug, $name ) {
    $term = get_term_by( 'slug', $slug, 'product_cat' );
    if ( $term ) {
        return $term->term_id;
    }
    $result = wp_insert_term( $name, 'product_cat', [ 'slug' => $slug ] );
    if ( is_wp_error( $result ) ) {
        WP_CLI::warning( "No se pudo crear categoría: {$name} — " . $result->get_error_message() );
        return null;
    }
    return $result['term_id'];
}

/**
 * Crea un producto WooCommerce
 */
function create_product( $title, $regular_price, $sale_price, $category_id, $category_slug ) {

    // Verificar si ya existe
    $existing = get_page_by_title( $title, OBJECT, 'product' );
    if ( $existing ) {
        return null; // Skip duplicados
    }

    $product = new WC_Product_Simple();
    $product->set_name( $title );
    $product->set_status( 'publish' );
    $product->set_catalog_visibility( 'visible' );
    $product->set_regular_price( number_format( $regular_price, 2, '.', '' ) );
    $product->set_sale_price( number_format( $sale_price, 2, '.', '' ) );
    $product->set_manage_stock( true );
    $product->set_stock_quantity( rand( 10, 200 ) );
    $product->set_stock_status( 'instock' );
    $product->set_category_ids( [ $category_id ] );

    // Descripción generada
    $descriptions = get_product_descriptions( $category_slug, $title );
    $product->set_description( $descriptions['long'] );
    $product->set_short_description( $descriptions['short'] );

    // Tags
    $tags = get_product_tags( $category_slug );
    $product->set_tag_ids( $tags );

    // Rating simulado
    $product->set_average_rating( round( rand( 38, 50 ) / 10, 1 ) );
    $product->set_review_count( rand( 5, 150 ) );

    $product_id = $product->save();

    // Meta adicional
    update_post_meta( $product_id, '_sold_individually', 'no' );
    update_post_meta( $product_id, 'total_sales', rand( 10, 500 ) );

    return $product_id;
}

/**
 * Genera descripciones por categoría
 */
function get_product_descriptions( $category_slug, $title ) {
    $descriptions = [
        'frutas-frescas' => [
            'short' => 'Fruta fresca seleccionada en su punto óptimo de madurez. Directamente de productores locales certificados.',
            'long'  => '<p>Nuestras frutas frescas son cuidadosamente seleccionadas en su punto óptimo de madurez para garantizar el mejor sabor y valor nutricional. Trabajamos directamente con agricultores locales y regionales que practican agricultura sostenible y responsable.</p><p><strong>Beneficios:</strong></p><ul><li>✓ Seleccionada manualmente por nuestros expertos</li><li>✓ Sin pesticidas dañinos</li><li>✓ Entregada en menos de 24 horas después de la cosecha</li><li>✓ Rica en vitaminas, minerales y antioxidantes</li><li>✓ Apoya a productores locales</li></ul><p>Almacene en un lugar fresco o en refrigeración según la variedad. Consuma preferentemente dentro de los primeros 3-5 días para disfrutar de su máxima frescura.</p>',
        ],
        'verduras' => [
            'short' => 'Verdura fresca de temporada, cultivada con prácticas agrícolas sostenibles. Cosechada a diario.',
            'long'  => '<p>Seleccionamos únicamente las mejores verduras de temporada, cultivadas con prácticas agrícolas sostenibles y respetuosas con el medio ambiente. Nuestros productores aplican técnicas de agricultura regenerativa para garantizar productos de máxima calidad.</p><p><strong>Características:</strong></p><ul><li>✓ Cosechada diariamente</li><li>✓ Sin aditivos ni conservantes</li><li>✓ Trazabilidad completa del campo a tu mesa</li><li>✓ Alta densidad nutricional</li><li>✓ Sabor auténtico de temporada</li></ul><p>Recomendamos refrigerar las verduras de hoja y consumirlas en 2-4 días. Las verduras de raíz se conservan mejor en lugar fresco y oscuro.</p>',
        ],
        'lacteos-huevos' => [
            'short' => 'Producto lácteo o huevo fresco de ganadería responsable. Sin hormonas artificiales ni antibióticos.',
            'long'  => '<p>Nuestros productos lácteos y huevos provienen de granjas que practican la ganadería responsable y el bienestar animal. Las vacas y gallinas se alimentan de forma natural y tienen acceso a pastoreo al aire libre.</p><p><strong>Garantías:</strong></p><ul><li>✓ Sin hormonas artificiales de crecimiento</li><li>✓ Sin antibióticos preventivos</li><li>✓ Animales con acceso a pastos naturales</li><li>✓ Procesado artesanalmente o en pequeños lotes</li><li>✓ Máxima frescura garantizada</li></ul><p>Mantenga refrigerado entre 2°C y 4°C. Consume antes de la fecha indicada en el empaque.</p>',
        ],
        'panaderia' => [
            'short' => 'Pan y producto de panadería artesanal, elaborado con ingredientes naturales. Horneado fresco cada día.',
            'long'  => '<p>Nuestros panes y productos de panadería son elaborados artesanalmente por panaderos con décadas de experiencia. Utilizamos harinas de alta calidad, preferiblemente orgánicas, fermentaciones lentas y métodos tradicionales que realzan el sabor y mejoran la digestibilidad.</p><p><strong>Nuestro proceso:</strong></p><ul><li>✓ Ingredientes 100% naturales, sin aditivos</li><li>✓ Fermentación lenta de 12-24 horas</li><li>✓ Horneado fresco cada mañana</li><li>✓ Sin conservantes artificiales</li><li>✓ Opciones sin gluten y orgánicas disponibles</li></ul><p>Consuma dentro de las primeras 48 horas para mejor frescura. Se puede congelar hasta por 3 meses.</p>',
        ],
        'carnes-aves' => [
            'short' => 'Carne y ave premium de ganadería responsable. Sin hormonas, criados en libertad.',
            'long'  => '<p>Nuestras carnes y aves provienen exclusivamente de ganaderos responsables que priorizan el bienestar animal y las prácticas sostenibles. Ofrecemos cortes premium seleccionados por nuestros carniceros especializados.</p><p><strong>Estándares de calidad:</strong></p><ul><li>✓ Animales criados sin confinamiento</li><li>✓ Dieta natural libre de subproductos animales</li><li>✓ Sin antibióticos ni hormonas de crecimiento</li><li>✓ Maduración controlada para máxima terneza</li><li>✓ Cadena de frío ininterrumpida</li></ul><p>Mantenga refrigerado entre 0°C y 4°C. Para mejor resultado, saque del refrigerador 30 minutos antes de cocinar.</p>',
        ],
        'mariscos' => [
            'short' => 'Mariscos frescos y sostenibles. Capturados o cultivados responsablemente. Entrega en menos de 24h.',
            'long'  => '<p>Ofrecemos mariscos de la más alta calidad, ya sean de pesca responsable certificada o de acuicultura sostenible. Trabajamos con pescadores y acuicultores que respetan las tallas mínimas, las temporadas y los ecosistemas marinos.</p><p><strong>Compromiso FreshBite:</strong></p><ul><li>✓ Pesca sostenible certificada</li><li>✓ Trazabilidad completa hasta el origen</li><li>✓ Sin aditivos ni sulfitos en productos frescos</li><li>✓ Temperatura controlada en toda la cadena</li><li>✓ Entrega máxima a 24h de la captura</li></ul><p>Mantenga sobre hielo o a 0-2°C. Consuma el mismo día de la entrega para óptima frescura y seguridad alimentaria.</p>',
        ],
        'bebidas' => [
            'short' => 'Bebida artesanal o prensada en frío. Sin azúcares añadidos. Ingredientes naturales 100%.',
            'long'  => '<p>Nuestra selección de bebidas está curada para ofrecer opciones verdaderamente saludables y deliciosas. Desde jugos prensados en frío que preservan todos los nutrientes, hasta kombuchas probióticas fermentadas artesanalmente.</p><p><strong>Diferenciadores:</strong></p><ul><li>✓ Prensado en frío o High Pressure Processing (HPP)</li><li>✓ Sin azúcares añadidos</li><li>✓ Sin colorantes ni saborizantes artificiales</li><li>✓ Ingredientes orgánicos donde es posible</li><li>✓ Envases sostenibles o reutilizables</li></ul><p>Mantenga refrigerado. Agite bien antes de consumir. Consume dentro de los 3-5 días de apertura.</p>',
        ],
        'organicos' => [
            'short' => 'Producto certificado 100% orgánico. Sin pesticidas, sin OGM. Certificación vigente.',
            'long'  => '<p>Todos nuestros productos orgánicos cuentan con certificación vigente de organismos reconocidos internacionalmente. El cultivo orgánico no solo beneficia tu salud, sino también el suelo, el agua y la biodiversidad.</p><p><strong>¿Por qué orgánico?</strong></p><ul><li>✓ Sin pesticidas sintéticos ni herbicidas</li><li>✓ Sin organismos genéticamente modificados (OGM)</li><li>✓ Suelo más fértil y biodiverso</li><li>✓ Mayor concentración de nutrientes y antioxidantes</li><li>✓ Certificación verificable con código de lote</li></ul><p>Al elegir orgánico, no solo cuidas tu salud, sino que apoyas un sistema alimentario más justo y sostenible para las generaciones futuras.</p>',
        ],
        'snacks-naturales' => [
            'short' => 'Snack saludable y natural. Sin conservantes artificiales. Perfecto para cualquier momento del día.',
            'long'  => '<p>Nuestros snacks están elaborados con ingredientes reales y naturales, perfectos para saciar el hambre entre comidas sin comprometer tu salud. Cada opción es seleccionada por nuestros nutricionistas para garantizar que aporte valor nutricional real.</p><p><strong>Características:</strong></p><ul><li>✓ Ingredientes reales, sin ingredientes artificiales</li><li>✓ Sin conservantes ni colorantes añadidos</li><li>✓ Bajo en azúcar o sin azúcar añadida</li><li>✓ Fuente de fibra, proteína o grasas saludables</li><li>✓ Porciones equilibradas</li></ul><p>Ideal para llevar al trabajo, al gym o para los niños en la escuela. Almacene en lugar fresco y seco.</p>',
        ],
        'hierbas-especias' => [
            'short' => 'Hierba fresca o especia premium de origen selecto. Intenso aroma y sabor garantizados.',
            'long'  => '<p>Nuestras hierbas frescas son cosechadas diariamente y entregadas en perfecto estado. Las especias son seleccionadas de los mejores orígenes del mundo, asegurando la máxima potencia aromática y sabor.</p><p><strong>Origen y calidad:</strong></p><ul><li>✓ Hierbas frescas cosechadas el mismo día</li><li>✓ Especias de origen único (single-origin)</li><li>✓ Sin conservantes ni anti-apelmazantes</li><li>✓ Molienda fresca para mayor intensidad</li><li>✓ Trazabilidad de origen garantizada</li></ul><p>Conserve las hierbas frescas en refrigeración envueltas en papel húmedo. Las especias en seco en recipiente hermético alejado de la luz y el calor.</p>',
        ],
        'congelados' => [
            'short' => 'Producto congelado IQF de alta calidad. Congelado en su punto óptimo para preservar nutrientes.',
            'long'  => '<p>Nuestros productos congelados utilizan tecnología IQF (Individually Quick Frozen) que congela cada pieza individualmente en segundos, preservando la textura, el sabor y el 95% de los nutrientes originales.</p><p><strong>Ventajas IQF:</strong></p><ul><li>✓ Congelado en su punto óptimo de madurez</li><li>✓ Sin azúcares, sal ni conservantes añadidos</li><li>✓ Toma solo lo que necesitas, re-congela el resto</li><li>✓ Igual o mayor valor nutricional que fresco fuera de temporada</li><li>✓ Mínimo desperdicio alimentario</li></ul><p>Mantenga a -18°C o menos. No descongele y vuelva a congelar. Consuma antes de la fecha indicada.</p>',
        ],
        'despensa' => [
            'short' => 'Producto de despensa premium. Ingredientes de alta calidad para elevar cada receta.',
            'long'  => '<p>Nuestra despensa FreshBite reúne los mejores productos no perecederos: aceites premium, condimentos artesanales, granos orgánicos y conservas elaboradas con los más altos estándares de calidad.</p><p><strong>Selección curada:</strong></p><ul><li>✓ Ingredientes de la más alta calidad</li><li>✓ Productores artesanales y pequeños productores</li><li>✓ Sin aditivos innecesarios</li><li>✓ Opciones orgánicas certificadas</li><li>✓ Ideal para cocina gourmet en casa</li></ul><p>Almacene en lugar fresco y seco, lejos de la luz directa. Una vez abierto, siga las indicaciones del empaque.</p>',
        ],
        'ensaladas' => [
            'short' => 'Ensalada fresca preparada hoy. Ingredientes de temporada, aderezos artesanales. Lista para consumir.',
            'long'  => '<p>Nuestras ensaladas frescas son preparadas diariamente por nuestro equipo culinario con los vegetales más frescos del mercado. Cada ensalada es un equilibrio perfecto de sabores, texturas y nutrientes.</p><p><strong>Preparación FreshBite:</strong></p><ul><li>✓ Preparada el mismo día de la entrega</li><li>✓ Ingredientes frescos y de temporada</li><li>✓ Aderezos artesanales sin conservantes</li><li>✓ Opciones veganas, vegetarianas y con proteína</li><li>✓ Porciones balanceadas</li></ul><p>Mantenga refrigerada entre 2-4°C. Consuma dentro de las 24-48 horas. Agite el aderezo antes de usar.</p>',
        ],
        'miel-apicultura' => [
            'short' => 'Miel pura y natural de apicultores responsables. Sin procesar, sin adulteraciones. Cristalización natural.',
            'long'  => '<p>Nuestra selección de mieles proviene de apicultores responsables que cuidan sus colmenas con amor y respeto por las abejas y el entorno natural. Cada varietal refleja las flores y el territorio de su origen.</p><p><strong>Pureza garantizada:</strong></p><ul><li>✓ Miel 100% pura, sin adulteración</li><li>✓ Sin calentamiento excesivo (miel cruda)</li><li>✓ Sin azúcares añadidos ni adulterantes</li><li>✓ La cristalización es señal de pureza natural</li><li>✓ Trazabilidad hasta la colmena de origen</li></ul><p>Almacene a temperatura ambiente en recipiente hermético. La cristalización es natural y no afecta la calidad. Para volver al estado líquido, caliente suavemente al baño María.</p>',
        ],
        'en-oferta' => [
            'short' => '¡Oferta especial por tiempo limitado! Ahorra en nuestros mejores productos frescos y artesanales.',
            'long'  => '<p>¡Aprovecha nuestras ofertas especiales de temporada! Seleccionamos los mejores productos de FreshBite con descuentos exclusivos para que puedas disfrutar de calidad premium a precios increíbles.</p><p><strong>¿Por qué estas ofertas?</strong></p><ul><li>✓ Excedentes de producción de temporada</li><li>✓ Combos especiales armados por nuestros expertos</li><li>✓ Descuentos directos de productores aliados</li><li>✓ Promociones por volumen</li><li>✓ Disponibilidad limitada</li></ul><p>Las ofertas están sujetas a disponibilidad de stock. Precios válidos hasta agotar existencias o hasta la fecha indicada.</p>',
        ],
    ];

    $cat_desc = $descriptions[ $category_slug ] ?? [
        'short' => 'Producto fresco y de alta calidad de FreshBite Marketplace.',
        'long'  => '<p>Producto seleccionado con los más altos estándares de calidad de FreshBite Marketplace. Nos comprometemos con la frescura, la sostenibilidad y el sabor en cada producto que ofrecemos.</p>',
    ];

    return $cat_desc;
}

/**
 * Obtiene o crea tags por categoría
 */
function get_product_tags( $category_slug ) {
    $tag_map = [
        'frutas-frescas'   => ['fresco', 'natural', 'vitaminas', 'temporada', 'local'],
        'verduras'         => ['fresco', 'orgánico', 'saludable', 'temporada', 'vegano'],
        'lacteos-huevos'   => ['proteína', 'calcio', 'fresco', 'granja', 'artesanal'],
        'panaderia'        => ['artesanal', 'horneado', 'natural', 'masa madre', 'sin conservantes'],
        'carnes-aves'      => ['premium', 'grass-fed', 'sin hormonas', 'proteína', 'fresco'],
        'mariscos'         => ['fresco', 'sostenible', 'océano', 'proteína', 'omega-3'],
        'bebidas'          => ['natural', 'sin azúcar', 'prensado en frío', 'hidratación', 'probiótico'],
        'organicos'        => ['orgánico', 'certificado', 'sin OGM', 'sin pesticidas', 'sostenible'],
        'snacks-naturales' => ['snack', 'saludable', 'natural', 'sin conservantes', 'energía'],
        'hierbas-especias' => ['aromático', 'fresco', 'gourmet', 'cocina', 'natural'],
        'congelados'       => ['IQF', 'práctico', 'sin conservantes', 'congelado', 'conveniente'],
        'despensa'         => ['premium', 'artesanal', 'gourmet', 'natural', 'cocina'],
        'ensaladas'        => ['fresco', 'listo para comer', 'saludable', 'vegetal', 'ligero'],
        'miel-apicultura'  => ['miel', 'natural', 'puro', 'apicultura', 'sin procesar'],
        'en-oferta'        => ['oferta', 'descuento', 'ahorro', 'pack', 'especial'],
    ];

    $tags      = $tag_map[ $category_slug ] ?? ['fresco', 'natural', 'premium'];
    $tag_ids   = [];

    foreach ( $tags as $tag_name ) {
        $term = get_term_by( 'name', $tag_name, 'product_tag' );
        if ( $term ) {
            $tag_ids[] = $term->term_id;
        } else {
            $result = wp_insert_term( $tag_name, 'product_tag' );
            if ( ! is_wp_error( $result ) ) {
                $tag_ids[] = $result['term_id'];
            }
        }
    }

    return $tag_ids;
}

// ============================================================
// EJECUCIÓN PRINCIPAL
// ============================================================

WP_CLI::log( '🥬 FreshBite — Iniciando importación masiva de productos...' );
WP_CLI::log( '━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━' );

$total_created  = 0;
$total_skipped  = 0;
$total_products = 0;

// Contar total
foreach ( $product_bank as $cat_slug => $products ) {
    $total_products += count( $products );
}

WP_CLI::log( "📦 Total de productos a importar: {$total_products}" );
WP_CLI::log( "📁 Categorías: " . count( $product_bank ) );
WP_CLI::log( '' );

foreach ( $product_bank as $cat_slug => $products ) {

    $cat_config  = $categories[ $cat_slug ];
    $cat_name    = $cat_config['name'];
    $cat_emoji   = $cat_config['emoji'];
    $category_id = get_or_create_category( $cat_slug, $cat_name );

    if ( ! $category_id ) {
        WP_CLI::warning( "  ⚠ No se pudo crear/obtener categoría: {$cat_name}" );
        continue;
    }

    WP_CLI::log( "{$cat_emoji} Procesando: {$cat_name} (" . count( $products ) . " productos)" );

    $cat_created = 0;
    $cat_skipped = 0;

    foreach ( $products as $product_data ) {
        [ $name, $sale_price, $regular_price ] = $product_data;

        $product_id = create_product(
            $name,
            $regular_price,
            $sale_price,
            $category_id,
            $cat_slug
        );

        if ( $product_id ) {
            $cat_created++;
            $total_created++;
        } else {
            $cat_skipped++;
            $total_skipped++;
        }
    }

    WP_CLI::log( "   ✅ Creados: {$cat_created} | ⏭ Omitidos (ya existían): {$cat_skipped}" );

    
}

WP_CLI::log( '' );
WP_CLI::log( '━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━' );
WP_CLI::success( "🎉 Importación completada!" );
WP_CLI::log( "   ✅ Productos creados:  {$total_created}" );
WP_CLI::log( "   ⏭ Productos omitidos: {$total_skipped}" );
WP_CLI::log( "   📦 Total procesados:  " . ( $total_created + $total_skipped ) );
WP_CLI::log( '━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━' );

