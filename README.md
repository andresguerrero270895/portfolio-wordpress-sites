# 🌐 Professional WordPress Portfolio

**Developer: Andres Esteban Guerrero Rios**

![WordPress](https://img.shields.io/badge/WordPress-21759B?style=for-the-badge&logo=wordpress&logoColor=white)
![PHP](https://img.shields.io/badge/PHP-777BB4?style=for-the-badge&logo=php&logoColor=white)
![CSS3](https://img.shields.io/badge/CSS3-1572B6?style=for-the-badge&logo=css3&logoColor=white)
![JavaScript](https://img.shields.io/badge/JavaScript-F7DF1E?style=for-the-badge&logo=javascript&logoColor=black)
![WooCommerce](https://img.shields.io/badge/WooCommerce-96588A?style=for-the-badge&logo=woocommerce&logoColor=white)

> 3 production-ready WordPress sites showcasing custom theme development,
> WooCommerce integration, and modern UI/UX patterns.

---

## 📁 Projects

---

### 1. 🏥 MedPractice USA

> Medical practice sales platform with 30+ state-specific landing pages.

![MedPractice Homepage](https://raw.githubusercontent.com/andresguerrero270895/portfolio-wordpress-sites/main/documentation/screenshots/site1-medpractice/MedPractice_Home.png)

![MedPractice Demo](https://raw.githubusercontent.com/andresguerrero270895/portfolio-wordpress-sites/main/documentation/gifs/site1-medpractice/MedPractices.gif)

<details>
<summary>📸 More Screenshots — click to expand</summary>

**Landing Page**

![Landing](https://raw.githubusercontent.com/andresguerrero270895/portfolio-wordpress-sites/main/documentation/screenshots/site1-medpractice/MedPractice_Landing.png)

**Services**

![Services](https://raw.githubusercontent.com/andresguerrero270895/portfolio-wordpress-sites/main/documentation/screenshots/site1-medpractice/MedPractice_Services.png)

**Location**

![Location](https://raw.githubusercontent.com/andresguerrero270895/portfolio-wordpress-sites/main/documentation/screenshots/site1-medpractice/MedPractice_Location.png)

![Location 2](https://raw.githubusercontent.com/andresguerrero270895/portfolio-wordpress-sites/main/documentation/screenshots/site1-medpractice/MedPractice_Location_2.png)

**Card Component**

![Card](https://raw.githubusercontent.com/andresguerrero270895/portfolio-wordpress-sites/main/documentation/screenshots/site1-medpractice/MedPractice_Card.png)

**Contact Form**

![Form](https://raw.githubusercontent.com/andresguerrero270895/portfolio-wordpress-sites/main/documentation/screenshots/site1-medpractice/MedPractice_Form%20.png)

</details>

**Features:**
- ✅ 30+ dynamic state landing pages via Custom Post Type
- ✅ SEO-optimized with unique meta per state
- ✅ Responsive CSS Grid/Flexbox layout
- ✅ Custom AJAX contact form
- ✅ Reusable PHP components

**Tech:**
`WordPress Custom Theme` · `PHP 8` · `CSS Grid` · `JavaScript ES6+`

**Path:** `/site1-medpractice/theme/`

<details>
<summary>📂 Theme Files</summary>
site1-medpractice/theme/
├── style.css
├── functions.php
├── header.php
├── footer.php
├── front-page.php
├── archive-state_landing.php
├── single-state_landing.php
├── page-contact.php
├── page.php
├── 404.php
├── assets/css/components.css
├── assets/css/landing-page.css
└── assets/js/

text

</details>

---

### 2. 🚀 TechFlow Agency

> Software development agency with animated dark UI and filterable portfolio.

![TechFlow Homepage](https://raw.githubusercontent.com/andresguerrero270895/portfolio-wordpress-sites/main/documentation/screenshots/site2-techflow/Tech_Flow_Home.png)

![TechFlow Demo](https://raw.githubusercontent.com/andresguerrero270895/portfolio-wordpress-sites/main/documentation/gifs/site2-techflow/techflow.gif)

<details>
<summary>📸 More Screenshots — click to expand</summary>

**Services Page**

![Services](https://raw.githubusercontent.com/andresguerrero270895/portfolio-wordpress-sites/main/documentation/screenshots/site2-techflow/Tech_Flow_Services.png)

**About Page**

![About](https://raw.githubusercontent.com/andresguerrero270895/portfolio-wordpress-sites/main/documentation/screenshots/site2-techflow/Tech_Flow_About.png)

**Blog**

![Blog](https://raw.githubusercontent.com/andresguerrero270895/portfolio-wordpress-sites/main/documentation/screenshots/site2-techflow/Tech_Flow_Blog.png)

**404 Page**

![404 Screenshot](https://raw.githubusercontent.com/andresguerrero270895/portfolio-wordpress-sites/main/documentation/screenshots/site2-techflow/Tech_Flow_404.png)

</details>

**Animated 404 Terminal**

![404 Animation](https://raw.githubusercontent.com/andresguerrero270895/portfolio-wordpress-sites/main/documentation/gifs/site2-techflow/404.gif)

**Features:**
- ✅ Dark design system with CSS Custom Properties
- ✅ Filterable portfolio grid by category & technology
- ✅ Animated terminal-style 404 page
- ✅ Full case study pages via tf_project CPT
- ✅ AJAX contact form with validation
- ✅ Blog with custom single post layout
- ✅ Service pages with pricing tables & FAQ accordion
- ✅ 5-column footer with newsletter CTA

**Design System:**

| Variable | Value | Use |
|----------|-------|-----|
| `--tf-bg` | `#05070F` | Deep dark background |
| `--tf-primary` | `#7C3AED` | Purple accent |
| `--tf-accent` | `#06B6D4` | Cyan accent |
| `--tf-green` | `#10B981` | Success green |

**Custom Post Types:**

| CPT | Slug | Description |
|-----|------|-------------|
| `tf_project` | `/projects/` | Portfolio case studies |
| `tf_service` | `/our-services/` | Agency services |
| `tf_testimonial` | — | Client testimonials |
| `tf_team` | — | Team members |

**Tech:**
`WordPress Custom Theme` · `PHP 8` · `CSS Custom Properties` · `JavaScript ES6+` · `Inter` · `Sora` · `JetBrains Mono`

**Path:** `/site2-techflow/theme/`

<details>
<summary>📂 Theme Files</summary>
site2-techflow/theme/
├── style.css
├── functions.php
├── index.php
├── header.php
├── footer.php
├── front-page.php
├── page-services.php
├── page-work.php
├── page-about.php
├── page-contact.php
├── home.php
├── 404.php
├── single-tf_project.php
└── single.php

text

</details>

---

### 3. �� FreshBite Marketplace

> Artisanal food e-commerce marketplace with WooCommerce.

![FreshBite Homepage](https://raw.githubusercontent.com/andresguerrero270895/portfolio-wordpress-sites/main/documentation/screenshots/site3-freshbite/Fresh_Bite_Home.png)

![FreshBite Demo](https://raw.githubusercontent.com/andresguerrero270895/portfolio-wordpress-sites/main/documentation/gifs/site3-freshbite/FreshBite.gif)

<details>
<summary>📸 More Screenshots — click to expand</summary>

**Market / Shop**

![Market](https://raw.githubusercontent.com/andresguerrero270895/portfolio-wordpress-sites/main/documentation/screenshots/site3-freshbite/Fresh_Bite_Market.png)

**Vendors**

![Vendors](https://raw.githubusercontent.com/andresguerrero270895/portfolio-wordpress-sites/main/documentation/screenshots/site3-freshbite/Fresh_Bite_Vendors.png)

**About / Nosotros**

![Nosotros](https://raw.githubusercontent.com/andresguerrero270895/portfolio-wordpress-sites/main/documentation/screenshots/site3-freshbite/Fresh_Bite_Nosotros.png)

**Contact**

![Contact](https://raw.githubusercontent.com/andresguerrero270895/portfolio-wordpress-sites/main/documentation/screenshots/site3-freshbite/Fresh_Bite_Contact.png)

</details>

**Features:**
- ✅ WooCommerce product catalog with custom cards
- ✅ Vendor/producer profiles via custom CPT
- ✅ Advanced filtering by category, diet type, origin
- ✅ Custom WooCommerce template overrides
- ✅ AJAX add-to-cart
- ✅ Custom homepage with featured products
- ✅ Mobile-first responsive design

**Design System:**

| Variable | Value | Use |
|----------|-------|-----|
| `--fb-green` | `#2D6A4F` | Primary green |
| `--fb-green-light` | `#52B788` | Light green |
| `--fb-orange` | `#F4845F` | Warm accent |
| `--fb-cream` | `#FEFAE0` | Background |

**Tech:**
`WordPress` · `Astra Child Theme` · `WooCommerce` · `PHP 8` · `CSS3` · `JavaScript ES6+`

**Path:** `/site3-marketplace/theme/`

<details>
<summary>📂 Theme Files</summary>
site3-marketplace/theme/
├── style.css
├── functions.php
├── header.php
├── footer.php
├── front-page.php
├── page-producers.php
├── woocommerce/
│ ├── archive-product.php
│ ├── single-product.php
│ ├── cart/cart.php
│ └── checkout/form-checkout.php
└── assets/
├── css/
└── js/

text

</details>

---

## 📊 Skills Matrix

| Skill | MedPractice | TechFlow | FreshBite |
|-------|:-----------:|:--------:|:---------:|
| Custom WordPress Theme | ✅ | ✅ | ✅ |
| Custom Post Types | ✅ | ✅ | ✅ |
| WooCommerce | — | — | ✅ |
| Astra Child Theme | — | — | ✅ |
| AJAX Forms | ✅ | ✅ | ✅ |
| CSS Design System | ✅ | ✅ | ✅ |
| Responsive Design | ✅ | ✅ | ✅ |
| SEO Architecture | ✅ | ✅ | ✅ |
| JavaScript Animations | — | ✅ | ✅ |
| E-commerce | — | — | ✅ |
| Blog System | — | ✅ | — |
| Dark Mode Theme | — | ✅ | — |

---

## 🛠 Setup

### Prerequisites
- [Local by Flywheel](https://localwp.com/)
- Node.js 18+ & npm
- Git

### Clone
git clone https://github.com/andresguerrero270895/portfolio-wordpress-sites.git
cd portfolio-wordpress-sites
npm install

---

## 🏗 Repo Structure
portfolio-wordpress-sites/
├── site1-medpractice/theme/
├── site2-techflow/theme/
├── site3-marketplace/theme/
├── documentation/
│ ├── screenshots/
│ │ ├── site1-medpractice/ # 7 screenshots
│ │ ├── site2-techflow/ # 5 screenshots
│ │ └── site3-freshbite/ # 5 screenshots
│ └── gifs/
│ ├── site1-medpractice/ # 1 GIF
│ ├── site2-techflow/ # 2 GIFs
│ └── site3-freshbite/ # 1 GIF
├── .gitignore
├── CHANGELOG.md
├── LICENSE
├── package.json
└── README.md

text

---

## 📄 License

MIT © 2024 Andres Esteban Guerrero Rios
