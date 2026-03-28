<?php
/**
 * Template: single-state_landing.php
 * MedPractice USA — Individual State Landing Page
 */

$state_code = get_post_meta( get_the_ID(), '_mp_state_code',      true ) ?: 'XX';
$count      = get_post_meta( get_the_ID(), '_mp_practices_count', true ) ?: '0';
$state_name = get_the_title();
$avg_price  = '$' . number_format( 350000 + ( intval($count) * 1800 ) );
$cities     = max( 8, intval( $count / 6 ) );

$specialties   = ['Family Medicine','Internal Medicine','Pediatrics','Cardiology','Dermatology','Orthopedics','OB/GYN','Psychiatry'];
$listing_types = ['Primary Care','Multi-Specialty','Solo Practice','Group Practice'];
$emojis        = ['🏥','🩺','💊','🫀','🧬','🩻'];
$cities_list   = ['Atlanta','Boston','Chicago','Dallas','Denver','Houston',
                  'Los Angeles','Miami','Nashville','New York','Philadelphia',
                  'Phoenix','Portland','San Diego','San Francisco','Seattle'];

$state_svgs = [
'AL' => '<svg viewBox="0 0 200 280" xmlns="http://www.w3.org/2000/svg"><path d="M 60 20 L 140 20 L 148 80 L 152 160 L 145 220 L 120 260 L 100 270 L 85 255 L 80 230 L 75 180 L 65 120 L 55 80 Z" fill="rgba(255,255,255,0.15)" stroke="rgba(255,255,255,0.8)" stroke-width="3" stroke-linejoin="round"/></svg>',

'AZ' => '<svg viewBox="0 0 240 240" xmlns="http://www.w3.org/2000/svg"><path d="M 30 30 L 210 30 L 210 160 L 160 210 L 30 180 Z" fill="rgba(255,255,255,0.15)" stroke="rgba(255,255,255,0.8)" stroke-width="3" stroke-linejoin="round"/></svg>',

'CA' => '<svg viewBox="0 0 200 340" xmlns="http://www.w3.org/2000/svg"><path d="M 130 15 L 155 30 L 165 60 L 160 100 L 170 140 L 165 180 L 145 220 L 120 260 L 90 300 L 60 320 L 45 310 L 50 280 L 70 250 L 80 200 L 75 160 L 55 120 L 45 80 L 55 50 L 80 30 L 105 20 Z" fill="rgba(255,255,255,0.15)" stroke="rgba(255,255,255,0.8)" stroke-width="3" stroke-linejoin="round"/></svg>',

'CO' => '<svg viewBox="0 0 260 200" xmlns="http://www.w3.org/2000/svg"><path d="M 20 40 L 240 20 L 245 170 L 20 180 Z" fill="rgba(255,255,255,0.15)" stroke="rgba(255,255,255,0.8)" stroke-width="3" stroke-linejoin="round"/></svg>',

'CT' => '<svg viewBox="0 0 180 160" xmlns="http://www.w3.org/2000/svg"><path d="M 30 25 L 155 20 L 160 110 L 80 130 L 40 120 L 25 80 Z" fill="rgba(255,255,255,0.15)" stroke="rgba(255,255,255,0.8)" stroke-width="3" stroke-linejoin="round"/></svg>',

'FL' => '<svg viewBox="0 0 300 260" xmlns="http://www.w3.org/2000/svg"><path d="M 20 20 L 220 25 L 240 50 L 250 80 L 230 100 L 200 110 L 180 130 L 160 160 L 140 200 L 110 240 L 80 250 L 60 230 L 70 200 L 60 170 L 30 120 L 15 80 Z" fill="rgba(255,255,255,0.15)" stroke="rgba(255,255,255,0.8)" stroke-width="3" stroke-linejoin="round"/></svg>',

'GA' => '<svg viewBox="0 0 220 260" xmlns="http://www.w3.org/2000/svg"><path d="M 30 25 L 185 20 L 195 80 L 190 140 L 170 180 L 140 210 L 100 225 L 70 215 L 40 190 L 20 150 L 15 100 L 20 60 Z" fill="rgba(255,255,255,0.15)" stroke="rgba(255,255,255,0.8)" stroke-width="3" stroke-linejoin="round"/></svg>',

'IL' => '<svg viewBox="0 0 180 320" xmlns="http://www.w3.org/2000/svg"><path d="M 50 20 L 140 15 L 155 50 L 160 90 L 150 130 L 155 170 L 145 220 L 120 270 L 90 300 L 60 295 L 40 260 L 35 220 L 25 180 L 30 130 L 20 90 L 25 50 Z" fill="rgba(255,255,255,0.15)" stroke="rgba(255,255,255,0.8)" stroke-width="3" stroke-linejoin="round"/></svg>',

'IN' => '<svg viewBox="0 0 180 280" xmlns="http://www.w3.org/2000/svg"><path d="M 30 20 L 155 15 L 160 80 L 155 160 L 145 200 L 120 240 L 90 260 L 65 250 L 40 220 L 25 170 L 20 110 L 25 60 Z" fill="rgba(255,255,255,0.15)" stroke="rgba(255,255,255,0.8)" stroke-width="3" stroke-linejoin="round"/></svg>',

'KY' => '<svg viewBox="0 0 300 180" xmlns="http://www.w3.org/2000/svg"><path d="M 15 50 L 285 30 L 290 100 L 260 140 L 200 155 L 130 160 L 70 155 L 30 140 L 10 110 Z" fill="rgba(255,255,255,0.15)" stroke="rgba(255,255,255,0.8)" stroke-width="3" stroke-linejoin="round"/></svg>',

'LA' => '<svg viewBox="0 0 280 240" xmlns="http://www.w3.org/2000/svg"><path d="M 20 20 L 220 15 L 240 50 L 245 100 L 235 130 L 200 140 L 180 160 L 160 185 L 130 200 L 100 210 L 70 200 L 40 180 L 20 150 L 10 110 L 15 60 Z" fill="rgba(255,255,255,0.15)" stroke="rgba(255,255,255,0.8)" stroke-width="3" stroke-linejoin="round"/></svg>',

'MD' => '<svg viewBox="0 0 300 160" xmlns="http://www.w3.org/2000/svg"><path d="M 10 50 L 200 20 L 280 40 L 290 70 L 270 95 L 220 110 L 160 120 L 100 115 L 50 120 L 20 100 L 5 75 Z" fill="rgba(255,255,255,0.15)" stroke="rgba(255,255,255,0.8)" stroke-width="3" stroke-linejoin="round"/></svg>',

'MA' => '<svg viewBox="0 0 300 160" xmlns="http://www.w3.org/2000/svg"><path d="M 15 50 L 250 20 L 280 40 L 285 80 L 250 110 L 200 125 L 130 130 L 60 125 L 20 100 L 10 70 Z" fill="rgba(255,255,255,0.15)" stroke="rgba(255,255,255,0.8)" stroke-width="3" stroke-linejoin="round"/></svg>',

'MI' => '<svg viewBox="0 0 260 300" xmlns="http://www.w3.org/2000/svg"><path d="M 80 120 L 130 100 L 170 80 L 200 60 L 220 30 L 210 15 L 185 20 L 160 40 L 140 70 L 120 90 L 100 110 Z" fill="rgba(255,255,255,0.15)" stroke="rgba(255,255,255,0.8)" stroke-width="3" stroke-linejoin="round"/><path d="M 55 130 L 80 120 L 100 140 L 110 170 L 115 210 L 100 250 L 70 275 L 40 270 L 20 240 L 15 200 L 20 160 L 35 140 Z" fill="rgba(255,255,255,0.15)" stroke="rgba(255,255,255,0.8)" stroke-width="3" stroke-linejoin="round"/></svg>',

'MN' => '<svg viewBox="0 0 220 300" xmlns="http://www.w3.org/2000/svg"><path d="M 30 20 L 180 15 L 195 30 L 200 60 L 185 80 L 190 100 L 180 130 L 170 160 L 160 200 L 140 250 L 110 280 L 80 275 L 50 250 L 30 210 L 20 160 L 15 110 L 20 60 Z" fill="rgba(255,255,255,0.15)" stroke="rgba(255,255,255,0.8)" stroke-width="3" stroke-linejoin="round"/></svg>',

'MO' => '<svg viewBox="0 0 240 260" xmlns="http://www.w3.org/2000/svg"><path d="M 20 30 L 200 20 L 220 50 L 225 90 L 215 140 L 200 180 L 175 210 L 140 235 L 100 245 L 60 235 L 30 210 L 10 170 L 5 120 L 10 70 Z" fill="rgba(255,255,255,0.15)" stroke="rgba(255,255,255,0.8)" stroke-width="3" stroke-linejoin="round"/></svg>',

'NV' => '<svg viewBox="0 0 200 300" xmlns="http://www.w3.org/2000/svg"><path d="M 60 20 L 170 15 L 180 80 L 175 150 L 155 220 L 100 280 L 50 250 L 25 180 L 20 100 L 35 40 Z" fill="rgba(255,255,255,0.15)" stroke="rgba(255,255,255,0.8)" stroke-width="3" stroke-linejoin="round"/></svg>',

'NJ' => '<svg viewBox="0 0 160 260" xmlns="http://www.w3.org/2000/svg"><path d="M 55 20 L 120 15 L 140 50 L 145 100 L 135 150 L 110 200 L 80 240 L 50 245 L 30 220 L 25 170 L 30 120 L 20 70 L 35 40 Z" fill="rgba(255,255,255,0.15)" stroke="rgba(255,255,255,0.8)" stroke-width="3" stroke-linejoin="round"/></svg>',

'NY' => '<svg viewBox="0 0 320 240" xmlns="http://www.w3.org/2000/svg"><path d="M 20 60 L 80 20 L 160 15 L 240 25 L 300 50 L 310 90 L 290 130 L 240 155 L 180 165 L 120 160 L 70 155 L 30 140 L 10 110 Z" fill="rgba(255,255,255,0.15)" stroke="rgba(255,255,255,0.8)" stroke-width="3" stroke-linejoin="round"/><path d="M 70 155 L 55 180 L 45 215" fill="none" stroke="rgba(255,255,255,0.8)" stroke-width="3"/></svg>',

'NC' => '<svg viewBox="0 0 340 180" xmlns="http://www.w3.org/2000/svg"><path d="M 10 50 L 200 20 L 320 30 L 335 65 L 310 100 L 260 130 L 190 145 L 110 150 L 40 145 L 10 120 L 5 85 Z" fill="rgba(255,255,255,0.15)" stroke="rgba(255,255,255,0.8)" stroke-width="3" stroke-linejoin="round"/></svg>',

'OH' => '<svg viewBox="0 0 220 240" xmlns="http://www.w3.org/2000/svg"><path d="M 40 20 L 180 15 L 205 50 L 210 100 L 200 150 L 175 195 L 140 220 L 100 228 L 60 218 L 30 190 L 15 150 L 10 100 L 20 55 Z" fill="rgba(255,255,255,0.15)" stroke="rgba(255,255,255,0.8)" stroke-width="3" stroke-linejoin="round"/></svg>',

'OR' => '<svg viewBox="0 0 280 220" xmlns="http://www.w3.org/2000/svg"><path d="M 15 40 L 60 20 L 200 15 L 265 30 L 270 80 L 260 140 L 240 185 L 180 205 L 100 210 L 40 195 L 15 155 L 10 100 Z" fill="rgba(255,255,255,0.15)" stroke="rgba(255,255,255,0.8)" stroke-width="3" stroke-linejoin="round"/></svg>',

'PA' => '<svg viewBox="0 0 300 180" xmlns="http://www.w3.org/2000/svg"><path d="M 15 35 L 270 20 L 290 55 L 285 120 L 265 150 L 200 160 L 120 158 L 50 155 L 15 130 L 10 80 Z" fill="rgba(255,255,255,0.15)" stroke="rgba(255,255,255,0.8)" stroke-width="3" stroke-linejoin="round"/></svg>',

'SC' => '<svg viewBox="0 0 240 200" xmlns="http://www.w3.org/2000/svg"><path d="M 20 25 L 185 15 L 220 50 L 215 90 L 185 130 L 145 170 L 100 190 L 60 185 L 25 160 L 10 120 L 15 70 Z" fill="rgba(255,255,255,0.15)" stroke="rgba(255,255,255,0.8)" stroke-width="3" stroke-linejoin="round"/></svg>',

'TN' => '<svg viewBox="0 0 340 160" xmlns="http://www.w3.org/2000/svg"><path d="M 10 40 L 210 20 L 330 30 L 335 70 L 320 105 L 270 125 L 200 135 L 120 138 L 50 132 L 10 110 Z" fill="rgba(255,255,255,0.15)" stroke="rgba(255,255,255,0.8)" stroke-width="3" stroke-linejoin="round"/></svg>',

'TX' => '<svg viewBox="0 0 320 300" xmlns="http://www.w3.org/2000/svg"><path d="M 60 15 L 260 20 L 295 50 L 310 100 L 305 160 L 280 220 L 240 270 L 190 295 L 130 290 L 80 265 L 40 225 L 15 175 L 10 120 L 20 70 Z" fill="rgba(255,255,255,0.15)" stroke="rgba(255,255,255,0.8)" stroke-width="3" stroke-linejoin="round"/></svg>',

'VA' => '<svg viewBox="0 0 320 200" xmlns="http://www.w3.org/2000/svg"><path d="M 10 40 L 230 15 L 310 45 L 315 85 L 290 120 L 240 150 L 170 170 L 100 168 L 40 155 L 10 125 Z" fill="rgba(255,255,255,0.15)" stroke="rgba(255,255,255,0.8)" stroke-width="3" stroke-linejoin="round"/></svg>',

'WA' => '<svg viewBox="0 0 280 220" xmlns="http://www.w3.org/2000/svg"><path d="M 20 30 L 60 15 L 180 20 L 260 40 L 265 90 L 255 150 L 220 190 L 155 210 L 80 205 L 30 180 L 10 135 L 10 80 Z" fill="rgba(255,255,255,0.15)" stroke="rgba(255,255,255,0.8)" stroke-width="3" stroke-linejoin="round"/></svg>',

'WI' => '<svg viewBox="0 0 220 280" xmlns="http://www.w3.org/2000/svg"><path d="M 50 20 L 160 15 L 190 40 L 200 80 L 185 110 L 190 140 L 175 180 L 150 220 L 110 255 L 70 258 L 40 235 L 25 195 L 20 150 L 25 100 L 35 60 Z" fill="rgba(255,255,255,0.15)" stroke="rgba(255,255,255,0.8)" stroke-width="3" stroke-linejoin="round"/></svg>',
];

$default_svg = '<svg viewBox="0 0 220 200" xmlns="http://www.w3.org/2000/svg"><path d="M 30 30 L 190 25 L 200 100 L 185 170 L 110 195 L 35 170 L 15 95 Z" fill="rgba(255,255,255,0.15)" stroke="rgba(255,255,255,0.8)" stroke-width="3" stroke-linejoin="round"/></svg>';

$state_svg = isset( $state_svgs[$state_code] ) ? $state_svgs[$state_code] : $default_svg;

get_header();
?>
<style>
/* ASTRA OVERRIDES */
#masthead,.site-header,.ast-desktop-header{display:none !important;}
#colophon,.site-footer{display:none !important;}
#primary,#content,.entry-content{padding:0 !important;max-width:none !important;}
body{font-family:var(--mp-font) !important;margin:0 !important;}
.ast-container,.ast-grid-common-col{max-width:none !important;}

:root{
    --mp-primary:#0A6EBD;
    --mp-primary-dark:#084f8a;
    --mp-primary-light:#e8f4fd;
    --mp-accent:#00C896;
    --mp-accent-dark:#00a87e;
    --mp-white:#FFFFFF;
    --mp-off-white:#F8FAFC;
    --mp-border:#E2E8F0;
    --mp-medium-gray:#64748B;
    --mp-dark:#0F172A;
    --mp-font:'Inter',sans-serif;
    --mp-font-display:'Sora','Inter',sans-serif;
    --mp-px:clamp(1.5rem,5vw,4rem);
}
*,*::before,*::after{box-sizing:border-box;}

/* CONTAINER */
.ssl-container{
    width:100%;
    max-width:1200px;
    margin-inline:auto;
    padding-inline:var(--mp-px);
}

/* BUTTONS */
.ssl-btn{
    display:inline-flex;
    align-items:center;
    gap:.5rem;
    padding:.85rem 1.75rem;
    border-radius:50px;
    font-weight:600;
    font-size:.95rem;
    cursor:pointer;
    transition:all .25s ease;
    text-decoration:none;
    border:none;
    font-family:var(--mp-font);
}
.ssl-btn-primary{background:var(--mp-accent);color:var(--mp-dark);}
.ssl-btn-primary:hover{background:var(--mp-accent-dark);transform:translateY(-2px);}
.ssl-btn-outline{background:transparent;color:var(--mp-white);border:2px solid rgba(255,255,255,.6);}
.ssl-btn-outline:hover{background:rgba(255,255,255,.1);border-color:var(--mp-white);}
.ssl-btn-dark{background:var(--mp-dark);color:var(--mp-white);}
.ssl-btn-dark:hover{background:var(--mp-primary-dark);transform:translateY(-2px);}

/* SECTION SHARED */
.ssl-section-tag{
    display:inline-block;
    background:var(--mp-primary-light);
    color:var(--mp-primary);
    font-size:.75rem;
    font-weight:700;
    letter-spacing:.08em;
    text-transform:uppercase;
    padding:.3rem .9rem;
    border-radius:50px;
    margin-bottom:.85rem;
}
.ssl-section-header{text-align:center;margin-bottom:3rem;}
.ssl-section-title{
    font-family:var(--mp-font-display);
    font-size:clamp(1.6rem,3vw,2.25rem);
    font-weight:800;
    color:var(--mp-dark);
    margin:0 0 .75rem;
}
.ssl-section-subtitle{
    font-size:1rem;
    color:var(--mp-medium-gray);
    max-width:520px;
    margin-inline:auto;
    line-height:1.7;
}

/* HERO */
.ssl-hero{
    min-height:75vh;
    background:linear-gradient(135deg,var(--mp-dark) 0%,var(--mp-primary-dark) 45%,var(--mp-primary) 100%);
    display:flex;
    flex-direction:column;
    justify-content:center;
    position:relative;
    overflow:hidden;
    padding-block:7rem 4rem;
}
.ssl-hero::before{
    content:'';
    position:absolute;
    inset:0;
    background-image:
        linear-gradient(rgba(255,255,255,.04) 1px,transparent 1px),
        linear-gradient(90deg,rgba(255,255,255,.04) 1px,transparent 1px);
    background-size:48px 48px;
    pointer-events:none;
}
.ssl-hero-inner{
    position:relative;
    z-index:1;
    display:grid;
    grid-template-columns:1fr 1fr;
    align-items:center;
    gap:3rem;
}
.ssl-hero-badge{
    display:inline-flex;
    align-items:center;
    gap:.5rem;
    background:rgba(0,200,150,.15);
    border:1px solid rgba(0,200,150,.4);
    color:var(--mp-accent);
    font-size:.8rem;
    font-weight:600;
    letter-spacing:.06em;
    text-transform:uppercase;
    padding:.4rem 1rem;
    border-radius:50px;
    margin-bottom:1.25rem;
}
.ssl-hero-badge::before{
    content:'';
    width:7px;height:7px;
    background:var(--mp-accent);
    border-radius:50%;
    animation:pulse-dot 2s infinite;
}
.ssl-hero-title{
    font-family:var(--mp-font-display);
    font-size:clamp(2rem,4vw,3rem);
    font-weight:800;
    color:var(--mp-white);
    line-height:1.15;
    margin:0 0 1rem;
}
.ssl-hero-title span{color:var(--mp-accent);}
.ssl-hero-desc{
    font-size:1.05rem;
    color:rgba(255,255,255,.75);
    line-height:1.7;
    max-width:480px;
    margin:0 0 2rem;
}
.ssl-hero-actions{display:flex;flex-wrap:wrap;gap:1rem;margin-bottom:2.5rem;}
.ssl-hero-stats{
    display:flex;
    gap:2.5rem;
    padding-top:2rem;
    border-top:1px solid rgba(255,255,255,.12);
}
.ssl-hero-stat-num{
    font-family:var(--mp-font-display);
    font-size:2rem;
    font-weight:800;
    color:var(--mp-white);
    line-height:1;
    display:block;
}
.ssl-hero-stat-label{
    font-size:.8rem;
    color:rgba(255,255,255,.55);
    text-transform:uppercase;
    letter-spacing:.06em;
    margin-top:.25rem;
    display:block;
}

/* MAP COLUMN */
.ssl-hero-map-col{
    display:flex;
    align-items:center;
    justify-content:center;
}
.ssl-map-wrapper{
    position:relative;
    width:100%;
    max-width:420px;
    animation:float-map 5s ease-in-out infinite;
}
.ssl-map-wrapper::before{
    content:'';
    position:absolute;
    inset:-20%;
    background:radial-gradient(ellipse at center,rgba(0,200,150,.18) 0%,transparent 70%);
    pointer-events:none;
    z-index:0;
}
.ssl-map-card{
    position:relative;
    z-index:1;
    background:rgba(255,255,255,.06);
    border:1px solid rgba(255,255,255,.15);
    border-radius:24px;
    padding:2rem 2.5rem 1.5rem;
    backdrop-filter:blur(12px);
    -webkit-backdrop-filter:blur(12px);
}
.ssl-map-card-label{
    font-size:.75rem;
    font-weight:600;
    color:rgba(255,255,255,.5);
    text-transform:uppercase;
    letter-spacing:.08em;
    margin-bottom:.75rem;
    display:flex;
    align-items:center;
    gap:.4rem;
}
.ssl-state-svg-container{
    width:100%;
    filter:drop-shadow(0 8px 24px rgba(0,200,150,.25));
}
.ssl-state-svg-container svg{width:100%;height:auto;display:block;}
.ssl-map-code-badge{
    position:absolute;
    top:-12px;right:20px;
    background:var(--mp-accent);
    color:var(--mp-dark);
    font-size:.95rem;
    font-weight:800;
    padding:.35rem .9rem;
    border-radius:50px;
    letter-spacing:.05em;
}
.ssl-map-pill{
    display:inline-flex;
    align-items:center;
    gap:.4rem;
    background:rgba(255,255,255,.12);
    border:1px solid rgba(255,255,255,.2);
    color:var(--mp-white);
    font-size:.78rem;
    font-weight:600;
    padding:.35rem .85rem;
    border-radius:50px;
    margin-top:1rem;
}
.ssl-map-pill span{color:var(--mp-accent);}

/* BREADCRUMB */
.ssl-breadcrumb{
    background:var(--mp-white);
    border-bottom:1px solid var(--mp-border);
    padding-block:.9rem;
}
.ssl-breadcrumb-inner{
    display:flex;
    align-items:center;
    gap:.5rem;
    font-size:.85rem;
    color:var(--mp-medium-gray);
}
.ssl-breadcrumb-inner a{color:var(--mp-medium-gray);text-decoration:none;transition:color .2s;}
.ssl-breadcrumb-inner a:hover{color:var(--mp-primary);}
.ssl-breadcrumb-sep{opacity:.4;}
.ssl-breadcrumb-current{color:var(--mp-dark);font-weight:600;}

/* LISTINGS */
.ssl-listings{background:var(--mp-off-white);padding-block:5rem;}
.ssl-listings-grid{
    display:grid;
    grid-template-columns:repeat(3,1fr);
    gap:1.5rem;
}
.ssl-listing-card{
    background:var(--mp-white);
    border:1px solid var(--mp-border);
    border-radius:16px;
    padding:1.5rem;
    transition:transform .25s,box-shadow .25s;
    cursor:pointer;
}
.ssl-listing-card:hover{
    transform:translateY(-4px);
    box-shadow:0 12px 40px rgba(10,110,189,.1);
}
.ssl-listing-header{
    display:flex;
    align-items:flex-start;
    justify-content:space-between;
    margin-bottom:1rem;
}
.ssl-listing-icon{
    width:44px;height:44px;
    background:var(--mp-primary-light);
    border-radius:12px;
    display:flex;
    align-items:center;
    justify-content:center;
    font-size:1.25rem;
    flex-shrink:0;
}
.ssl-listing-price{
    font-weight:700;
    font-size:.9rem;
    color:var(--mp-primary);
    background:var(--mp-primary-light);
    padding:.25rem .7rem;
    border-radius:50px;
}
.ssl-listing-specialty{
    font-size:.75rem;
    font-weight:700;
    color:var(--mp-accent-dark);
    text-transform:uppercase;
    letter-spacing:.06em;
    margin-bottom:.35rem;
}
.ssl-listing-name{
    font-weight:700;
    font-size:1rem;
    color:var(--mp-dark);
    margin-bottom:.35rem;
}
.ssl-listing-city{
    font-size:.85rem;
    color:var(--mp-medium-gray);
    display:flex;
    align-items:center;
    gap:.3rem;
}
.ssl-listing-meta{
    display:flex;
    gap:1rem;
    margin-top:1rem;
    padding-top:1rem;
    border-top:1px solid var(--mp-border);
    font-size:.78rem;
    color:var(--mp-medium-gray);
}
.ssl-listing-meta-item{display:flex;align-items:center;gap:.3rem;}
.ssl-listings-footer{text-align:center;margin-top:2.5rem;}

/* ABOUT */
.ssl-about{background:var(--mp-white);padding-block:5rem;}
.ssl-about-grid{
    display:grid;
    grid-template-columns:1fr 1fr;
    gap:4rem;
    align-items:center;
}
.ssl-about-content p{color:var(--mp-medium-gray);line-height:1.8;margin-bottom:1.25rem;}
.ssl-about-stats{
    display:grid;
    grid-template-columns:1fr 1fr;
    gap:1.25rem;
}
.ssl-about-stat{
    background:var(--mp-off-white);
    border:1px solid var(--mp-border);
    border-radius:14px;
    padding:1.25rem;
}
.ssl-about-stat-num{
    font-family:var(--mp-font-display);
    font-size:1.75rem;
    font-weight:800;
    color:var(--mp-primary);
    line-height:1;
    display:block;
}
.ssl-about-stat-label{
    font-size:.8rem;
    color:var(--mp-medium-gray);
    margin-top:.35rem;
    display:block;
}

/* CONTACT */
.ssl-contact{
    background:linear-gradient(135deg,var(--mp-dark) 0%,var(--mp-primary-dark) 100%);
    padding-block:5.5rem;
}
.ssl-contact-grid{
    display:grid;
    grid-template-columns:1fr 1fr;
    gap:4rem;
    align-items:start;
}
.ssl-contact-info .ssl-section-tag{background:rgba(0,200,150,.15);color:var(--mp-accent);}
.ssl-contact-info .ssl-section-title{color:var(--mp-white);text-align:left;}
.ssl-contact-info p{color:rgba(255,255,255,.7);line-height:1.8;margin-bottom:2rem;}
.ssl-contact-feature{
    display:flex;
    align-items:flex-start;
    gap:1rem;
    margin-bottom:1.25rem;
    color:rgba(255,255,255,.85);
    font-size:.92rem;
}
.ssl-contact-feature-icon{
    width:36px;height:36px;
    background:rgba(0,200,150,.2);
    border-radius:10px;
    display:flex;
    align-items:center;
    justify-content:center;
    flex-shrink:0;
    font-size:1rem;
}

/* FORM */
.ssl-form-card{
    background:var(--mp-white);
    border-radius:20px;
    padding:2.25rem;
    box-shadow:0 24px 64px rgba(0,0,0,.3);
}
.ssl-form-title{
    font-family:var(--mp-font-display);
    font-size:1.35rem;
    font-weight:700;
    color:var(--mp-dark);
    margin:0 0 1.5rem;
}
.ssl-form-row{
    display:grid;
    grid-template-columns:1fr 1fr;
    gap:1rem;
}
.ssl-form-group{
    display:flex;
    flex-direction:column;
    gap:.4rem;
    margin-bottom:1rem;
}
.ssl-form-group.full{grid-column:1/-1;}
.ssl-form-group label{font-size:.8rem;font-weight:600;color:var(--mp-dark);}
.ssl-form-group input,
.ssl-form-group select,
.ssl-form-group textarea{
    padding:.7rem 1rem;
    border:1.5px solid var(--mp-border);
    border-radius:10px;
    font-family:var(--mp-font);
    font-size:.92rem;
    color:var(--mp-dark);
    background:var(--mp-off-white);
    transition:border-color .2s,box-shadow .2s;
    width:100%;
}
.ssl-form-group input:focus,
.ssl-form-group select:focus,
.ssl-form-group textarea:focus{
    outline:none;
    border-color:var(--mp-primary);
    box-shadow:0 0 0 3px rgba(10,110,189,.1);
}
.ssl-form-group textarea{resize:vertical;min-height:100px;}
.ssl-form-submit{
    width:100%;
    padding:1rem;
    background:var(--mp-primary);
    color:var(--mp-white);
    border:none;
    border-radius:12px;
    font-family:var(--mp-font);
    font-size:1rem;
    font-weight:700;
    cursor:pointer;
    transition:background .25s,transform .2s;
    margin-top:.5rem;
}
.ssl-form-submit:hover{background:var(--mp-primary-dark);transform:translateY(-2px);}
.ssl-form-note{
    text-align:center;
    font-size:.78rem;
    color:var(--mp-medium-gray);
    margin-top:.75rem;
}
.ssl-form-msg{
    display:none;
    padding:.9rem 1.2rem;
    border-radius:10px;
    font-size:.88rem;
    font-weight:600;
    margin-top:1rem;
}
.ssl-form-msg.success{background:#ecfdf5;color:#065f46;border:1px solid #6ee7b7;}
.ssl-form-msg.error{background:#fef2f2;color:#991b1b;border:1px solid #fca5a5;}

/* ANIMATIONS */
@keyframes pulse-dot{
    0%,100%{box-shadow:0 0 0 0 rgba(0,200,150,.6);}
    50%{box-shadow:0 0 0 6px rgba(0,200,150,0);}
}
@keyframes float-map{
    0%,100%{transform:translateY(0);}
    50%{transform:translateY(-10px);}
}
.ssl-fade-in{opacity:0;transform:translateY(24px);transition:opacity .6s ease,transform .6s ease;}
.ssl-fade-in.visible{opacity:1;transform:translateY(0);}

/* RESPONSIVE */
@media(max-width:1024px){.ssl-listings-grid{grid-template-columns:repeat(2,1fr);}}
@media(max-width:768px){
    .ssl-hero-inner{grid-template-columns:1fr;}
    .ssl-hero-map-col{order:-1;max-width:280px;margin-inline:auto;}
    .ssl-hero-stats{gap:1.5rem;flex-wrap:wrap;}
    .ssl-listings-grid{grid-template-columns:1fr;}
    .ssl-about-grid{grid-template-columns:1fr;}
    .ssl-contact-grid{grid-template-columns:1fr;}
    .ssl-form-row{grid-template-columns:1fr;}
}
@media(max-width:480px){
    :root{--mp-px:1.25rem;}
    .ssl-hero-actions{flex-direction:column;}
    .ssl-hero-stats{gap:1rem;}
}
</style>

<!-- HERO -->
<section class="ssl-hero">
<div class="ssl-container ssl-hero-inner">

    <div class="ssl-hero-content">
        <div class="ssl-hero-badge">
            <?php echo esc_html($state_code); ?> &mdash;
            <?php echo esc_html($count); ?> Practices Available
        </div>
        <h1 class="ssl-hero-title">
            Medical Practices<br>for Sale in
            <span><?php echo esc_html($state_name); ?></span>
        </h1>
        <p class="ssl-hero-desc">
            Discover <?php echo esc_html($count); ?>+ verified medical practice
            opportunities in <?php echo esc_html($state_name); ?>. From solo
            practices to multi-specialty groups — find the right fit with
            MedPractice USA.
        </p>
        <div class="ssl-hero-actions">
            <a href="#ssl-listings" class="ssl-btn ssl-btn-primary">
                Browse <?php echo esc_html($state_name); ?> Practices
            </a>
            <a href="tel:8005559899" class="ssl-btn ssl-btn-outline">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M22 16.92v3a2 2 0 01-2.18 2 19.79 19.79 0 01-8.63-3.07A19.5 19.5 0 013.07 9.81a19.79 19.79 0 01-3.07-8.68A2 2 0 012 1h3a2 2 0 012 1.72c.127.96.361 1.903.7 2.81a2 2 0 01-.45 2.11L6.09 8.91a16 16 0 006 6l1.27-1.27a2 2 0 012.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0122 16.92z"/>
                </svg>
                (800) 555-9899
            </a>
        </div>
        <div class="ssl-hero-stats">
            <div class="ssl-hero-stat-item">
                <span class="ssl-hero-stat-num"><?php echo esc_html($count); ?>+</span>
                <span class="ssl-hero-stat-label">Active Listings</span>
            </div>
            <div class="ssl-hero-stat-item">
                <span class="ssl-hero-stat-num"><?php echo esc_html($avg_price); ?></span>
                <span class="ssl-hero-stat-label">Avg. Price</span>
            </div>
            <div class="ssl-hero-stat-item">
                <span class="ssl-hero-stat-num">98%</span>
                <span class="ssl-hero-stat-label">Success Rate</span>
            </div>
        </div>
    </div>

    <div class="ssl-hero-map-col">
        <div class="ssl-map-wrapper">
            <div class="ssl-map-card">
                <span class="ssl-map-code-badge"><?php echo esc_html($state_code); ?></span>
                <div class="ssl-map-card-label">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0118 0z"/>
                        <circle cx="12" cy="10" r="3"/>
                    </svg>
                    <?php echo esc_html($state_name); ?>, United States
                </div>
                <div class="ssl-state-svg-container">
                    <?php echo $state_svg; ?>
                </div>
                <div style="display:flex;gap:.6rem;flex-wrap:wrap;margin-top:.5rem;">
                    <div class="ssl-map-pill">
                        🏥 <span><?php echo esc_html($count); ?></span> Practices
                    </div>
                    <div class="ssl-map-pill">
                        🏙️ <span><?php echo esc_html($cities); ?></span> Cities
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
</section>

<!-- BREADCRUMB -->
<nav class="ssl-breadcrumb">
<div class="ssl-container ssl-breadcrumb-inner">
    <a href="<?php echo esc_url(home_url('/')); ?>">Home</a>
    <span class="ssl-breadcrumb-sep">/</span>
    <a href="<?php echo esc_url(home_url('/#locations')); ?>">States</a>
    <span class="ssl-breadcrumb-sep">/</span>
    <span class="ssl-breadcrumb-current"><?php echo esc_html($state_name); ?></span>
</div>
</nav>

<!-- LISTINGS -->
<section class="ssl-listings ssl-fade-in" id="ssl-listings">
<div class="ssl-container">
    <div class="ssl-section-header">
        <span class="ssl-section-tag">Available Now</span>
        <h2 class="ssl-section-title">
            Medical Practices in <?php echo esc_html($state_name); ?>
        </h2>
        <p class="ssl-section-subtitle">
            Curated opportunities reviewed by our team. All practices include
            financial due diligence and buyer advisory support.
        </p>
    </div>
    <div class="ssl-listings-grid">
        <?php for($i=1;$i<=6;$i++):
            $spec  = $specialties[array_rand($specialties)];
            $type  = $listing_types[array_rand($listing_types)];
            $icon  = $emojis[($i-1) % count($emojis)];
            $base  = 280000 + ($i*45000) + rand(0,30000);
            $price = '$'.number_format($base);
            $rev   = '$'.number_format($base*1.4);
            $city  = $cities_list[array_rand($cities_list)];
            $pts   = rand(800,2400);
            $yrs   = rand(8,25);
        ?>
        <div class="ssl-listing-card">
            <div class="ssl-listing-header">
                <div class="ssl-listing-icon"><?php echo $icon; ?></div>
                <div class="ssl-listing-price"><?php echo $price; ?></div>
            </div>
            <div class="ssl-listing-specialty"><?php echo esc_html($spec); ?></div>
            <div class="ssl-listing-name">
                <?php echo esc_html($type.' — Practice #'.str_pad($i,3,'0',STR_PAD_LEFT)); ?>
            </div>
            <div class="ssl-listing-city">
                <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0118 0z"/>
                    <circle cx="12" cy="10" r="3"/>
                </svg>
                <?php echo esc_html($city.', '.$state_code); ?>
            </div>
            <div class="ssl-listing-meta">
                <div class="ssl-listing-meta-item">
                    <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2"/>
                        <circle cx="9" cy="7" r="4"/>
                    </svg>
                    <?php echo number_format($pts); ?> patients
                </div>
                <div class="ssl-listing-meta-item">
                    <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <circle cx="12" cy="12" r="10"/>
                        <path d="M12 6v6l4 2"/>
                    </svg>
                    <?php echo $yrs; ?> yrs est.
                </div>
                <div class="ssl-listing-meta-item">
                    <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <line x1="12" y1="1" x2="12" y2="23"/>
                        <path d="M17 5H9.5a3.5 3.5 0 000 7h5a3.5 3.5 0 010 7H6"/>
                    </svg>
                    <?php echo $rev; ?>/yr
                </div>
            </div>
        </div>
        <?php endfor; ?>
    </div>
    <div class="ssl-listings-footer">
        <a href="#ssl-contact" class="ssl-btn ssl-btn-dark">
            Request Full <?php echo esc_html($state_name); ?> Portfolio &rarr;
        </a>
    </div>
</div>
</section>

<!-- ABOUT -->
<section class="ssl-about ssl-fade-in">
<div class="ssl-container">
    <div class="ssl-about-grid">
        <div class="ssl-about-content">
            <span class="ssl-section-tag">Market Overview</span>
            <h2 class="ssl-section-title" style="text-align:left;">
                The <?php echo esc_html($state_name); ?> Healthcare Market
            </h2>
            <p>
                <?php echo esc_html($state_name); ?> represents one of the most dynamic
                healthcare markets in the United States, with over
                <?php echo esc_html(number_format($count * 12000)); ?> residents
                served by independent medical practices. The state's growing population
                and favorable regulatory environment make it an ideal destination for
                physician practice acquisition.
            </p>
            <p>
                With <?php echo esc_html($count); ?>+ practices currently available,
                buyers can find opportunities across primary care, specialty medicine,
                and multi-provider group practices. Average time to close in
                <?php echo esc_html($state_name); ?> is 90-120 days with our
                full-service brokerage support.
            </p>
            <a href="#ssl-contact" class="ssl-btn ssl-btn-primary" style="margin-top:.5rem;">
                Get Market Report &rarr;
            </a>
        </div>
        <div class="ssl-about-stats">
            <div class="ssl-about-stat">
                <span class="ssl-about-stat-num"><?php echo esc_html($count); ?>+</span>
                <span class="ssl-about-stat-label">Active Practices</span>
            </div>
            <div class="ssl-about-stat">
                <span class="ssl-about-stat-num"><?php echo esc_html($cities); ?></span>
                <span class="ssl-about-stat-label">Cities Covered</span>
            </div>
            <div class="ssl-about-stat">
                <span class="ssl-about-stat-num"><?php echo esc_html($avg_price); ?></span>
                <span class="ssl-about-stat-label">Avg. Valuation</span>
            </div>
            <div class="ssl-about-stat">
                <span class="ssl-about-stat-num">98%</span>
                <span class="ssl-about-stat-label">Close Rate</span>
            </div>
            <div class="ssl-about-stat">
                <span class="ssl-about-stat-num">90</span>
                <span class="ssl-about-stat-label">Avg. Days to Close</span>
            </div>
            <div class="ssl-about-stat">
                <span class="ssl-about-stat-num">8</span>
                <span class="ssl-about-stat-label">Specialty Types</span>
            </div>
        </div>
    </div>
</div>
</section>

<!-- CONTACT -->
<section class="ssl-contact ssl-fade-in" id="ssl-contact">
<div class="ssl-container">
    <div class="ssl-contact-grid">

        <div class="ssl-contact-info">
            <span class="ssl-section-tag">Get Started</span>
            <h2 class="ssl-section-title">
                Interested in a<br><?php echo esc_html($state_name); ?> Practice?
            </h2>
            <p>
                Our <?php echo esc_html($state_name); ?> specialists will connect you
                with verified listings that match your budget, specialty, and location
                preferences. No obligation, 100% confidential.
            </p>
            <div class="ssl-contact-feature">
                <div class="ssl-contact-feature-icon">✅</div>
                <div>Free initial consultation with a <?php echo esc_html($state_name); ?> broker</div>
            </div>
            <div class="ssl-contact-feature">
                <div class="ssl-contact-feature-icon">🔒</div>
                <div>Fully confidential — NDA signed before any disclosure</div>
            </div>
            <div class="ssl-contact-feature">
                <div class="ssl-contact-feature-icon">📊</div>
                <div>Full financial package delivered within 48 hours</div>
            </div>
            <div class="ssl-contact-feature">
                <div class="ssl-contact-feature-icon">🤝</div>
                <div>End-to-end support from offer to close</div>
            </div>
        </div>

        <div class="ssl-form-card">
            <h3 class="ssl-form-title">
                Request <?php echo esc_html($state_name); ?> Listings
            </h3>
            <form id="ssl-contact-form" novalidate>
                <?php wp_nonce_field('mp_contact_nonce','mp_nonce'); ?>
                <input type="hidden" name="action"     value="mp_contact_form">
                <input type="hidden" name="state_name" value="<?php echo esc_attr($state_name); ?>">
                <input type="hidden" name="state_code" value="<?php echo esc_attr($state_code); ?>">
                <div class="ssl-form-row">
                    <div class="ssl-form-group">
                        <label for="ssl_fname">First Name *</label>
                        <input type="text" id="ssl_fname" name="first_name" placeholder="John" required>
                    </div>
                    <div class="ssl-form-group">
                        <label for="ssl_lname">Last Name *</label>
                        <input type="text" id="ssl_lname" name="last_name" placeholder="Smith" required>
                    </div>
                    <div class="ssl-form-group">
                        <label for="ssl_email">Email Address *</label>
                        <input type="email" id="ssl_email" name="email" placeholder="john@example.com" required>
                    </div>
                    <div class="ssl-form-group">
                        <label for="ssl_phone">Phone Number</label>
                        <input type="tel" id="ssl_phone" name="phone" placeholder="(800) 555-0000">
                    </div>
                    <div class="ssl-form-group full">
                        <label for="ssl_specialty">Specialty Interest</label>
                        <select id="ssl_specialty" name="specialty">
                            <option value="">— Select a specialty —</option>
                            <option>Family Medicine</option>
                            <option>Internal Medicine</option>
                            <option>Pediatrics</option>
                            <option>Cardiology</option>
                            <option>Dermatology</option>
                            <option>Orthopedics</option>
                            <option>OB/GYN</option>
                            <option>Psychiatry</option>
                            <option>Other</option>
                        </select>
                    </div>
                    <div class="ssl-form-group full">
                        <label for="ssl_budget">Budget Range</label>
                        <select id="ssl_budget" name="budget">
                            <option value="">— Select budget —</option>
                            <option>Under \$300,000</option>
                            <option>\$300,000 – \$500,000</option>
                            <option>\$500,000 – \$1,000,000</option>
                            <option>\$1,000,000 – \$2,000,000</option>
                            <option>\$2,000,000+</option>
                        </select>
                    </div>
                    <div class="ssl-form-group full">
                        <label for="ssl_message">Additional Notes</label>
                        <textarea id="ssl_message" name="message"
                            placeholder="Tell us about your ideal practice..."></textarea>
                    </div>
                </div>
                <button type="submit" class="ssl-form-submit">
                    Request Free Consultation &rarr;
                </button>
                <p class="ssl-form-note">
                    🔒 100% Confidential &nbsp;&middot;&nbsp; No spam &nbsp;&middot;&nbsp; Reply within 24 hrs
                </p>
                <div class="ssl-form-msg success" id="ssl-form-success">
                    ✅ Thank you! A <?php echo esc_html($state_name); ?> specialist will contact you within 24 hours.
                </div>
                <div class="ssl-form-msg error" id="ssl-form-error">
                    ❌ Something went wrong. Please try again or call
                    <a href="tel:8005559899">(800) 555-9899</a>.
                </div>
            </form>
        </div>

    </div>
</div>
</section>

<?php get_footer(); ?>

<script>
(function(){
    'use strict';

    /* Fade-in observer */
    const fadeEls = document.querySelectorAll('.ssl-fade-in');
    if('IntersectionObserver' in window){
        const io = new IntersectionObserver((entries)=>{
            entries.forEach(e=>{
                if(e.isIntersecting){
                    e.target.classList.add('visible');
                    io.unobserve(e.target);
                }
            });
        },{threshold:0.12});
        fadeEls.forEach(el=>io.observe(el));
    } else {
        fadeEls.forEach(el=>el.classList.add('visible'));
    }

    /* Smooth scroll */
    document.querySelectorAll('a[href^="#"]').forEach(link=>{
        link.addEventListener('click',function(e){
            const target = document.querySelector(this.getAttribute('href'));
            if(!target) return;
            e.preventDefault();
            target.scrollIntoView({behavior:'smooth',block:'start'});
        });
    });

    /* AJAX form */
    const form      = document.getElementById('ssl-contact-form');
    const msgOk     = document.getElementById('ssl-form-success');
    const msgErr    = document.getElementById('ssl-form-error');
    const submitBtn = form ? form.querySelector('.ssl-form-submit') : null;

    if(form){
        form.addEventListener('submit',function(e){
            e.preventDefault();
            msgOk.style.display = 'none';
            msgErr.style.display = 'none';

            const fname = form.querySelector('[name="first_name"]').value.trim();
            const email = form.querySelector('[name="email"]').value.trim();
            if(!fname || !email){
                msgErr.textContent = 'Please fill in your name and email.';
                msgErr.style.display = 'block';
                return;
            }

            submitBtn.disabled    = true;
            submitBtn.textContent = 'Sending...';

            fetch('<?php echo esc_url(admin_url("admin-ajax.php")); ?>',{
                method:'POST',
                body: new FormData(form),
                credentials:'same-origin',
            })
            .then(r=>r.json())
            .then(res=>{
                if(res.success){
                    msgOk.style.display = 'block';
                    form.reset();
                } else {
                    msgErr.textContent = res.data || 'Something went wrong.';
                    msgErr.style.display = 'block';
                }
            })
            .catch(()=>{ msgErr.style.display = 'block'; })
            .finally(()=>{
                submitBtn.disabled    = false;
                submitBtn.textContent = 'Request Free Consultation \u2192';
            });
        });
    }
})();
</script>
