<?php
/**
 * Page Template: Services
 * Developer: Andres Esteban Guerrero Rios
 */
get_header(); ?>

<!-- ============================================================
     HERO — SERVICES
============================================================ -->
<section class="tf-page-hero">
  <div class="tf-page-hero__bg">
    <div class="tf-hero__grid"></div>
    <div class="tf-page-hero__glow"></div>
  </div>
  <div class="tf-container">
    <div class="tf-page-hero__inner" data-aos="fade-up">
      <span class="tf-section-tag">What I Offer</span>
      <h1 class="tf-page-hero__title">
        Services & <span class="tf-gradient">Expertise</span>
      </h1>
      <p class="tf-page-hero__subtitle">
        From a simple landing page to a full AI-powered platform — 
        I deliver clean, performant and scalable solutions tailored to your goals.
      </p>
      <div class="tf-page-hero__stats">
        <div class="tf-page-hero__stat">
          <span>9</span>
          <small>Services</small>
        </div>
        <div class="tf-page-hero__stat">
          <span>5+</span>
          <small>Years Exp.</small>
        </div>
        <div class="tf-page-hero__stat">
          <span>30+</span>
          <small>Projects</small>
        </div>
        <div class="tf-page-hero__stat">
          <span>100%</span>
          <small>Committed</small>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ============================================================
     SERVICES — DETAILED CARDS
============================================================ -->
<section class="tf-services-detail">
  <div class="tf-container">

    <?php
    $services = [
      [
        'id'      => 'wordpress',
        'icon'    => '🌐',
        'color'   => 'purple',
        'title'   => 'WordPress Development',
        'tagline' => 'Custom themes, plugins & full site builds',
        'desc'    => 'I build WordPress sites from scratch — custom themes without page builders, performant and fully tailored to your brand. From simple blogs to complex multi-site networks.',
        'features' => [
          'Custom theme development (no page builders)',
          'Plugin development & customization',
          'WP CLI, ACF, CPT UI integration',
          'Performance optimization (90+ PageSpeed)',
          'Security hardening & maintenance',
          'WP REST API & Headless WordPress',
          'Migration from other platforms',
        ],
        'stack'   => ['PHP', 'WordPress', 'ACF', 'WP CLI', 'MySQL'],
        'price'   => '\$300 – \$2,500',
        'time'    => '1 – 6 weeks',
      ],
      [
        'id'      => 'design',
        'icon'    => '🎨',
        'color'   => 'cyan',
        'title'   => 'Web Design & UI/UX',
        'tagline' => 'Modern, conversion-focused interfaces',
        'desc'    => 'I design and build interfaces that look great and convert. Every pixel has a purpose — from wireframe to fully responsive, accessible final product.',
        'features' => [
          'Responsive design (mobile-first)',
          'Custom CSS animations & interactions',
          'Design system & component library',
          'Accessibility (WCAG 2.1)',
          'Cross-browser compatibility',
          'Figma to code (pixel-perfect)',
          'UI/UX audit & improvement',
        ],
        'stack'   => ['Figma', 'CSS3', 'HTML5', 'JavaScript', 'SASS'],
        'price'   => '\$200 – \$1,500',
        'time'    => '1 – 4 weeks',
      ],
      [
        'id'      => 'ecommerce',
        'icon'    => '🛒',
        'color'   => 'green',
        'title'   => 'E-commerce (WooCommerce)',
        'tagline' => 'Full online store setup & optimization',
        'desc'    => 'Complete WooCommerce stores with custom product pages, payment gateways, shipping logic and checkout optimization to maximize your conversion rate.',
        'features' => [
          'WooCommerce setup & configuration',
          'Custom product pages & variations',
          'Payment gateway integration (Stripe, PayPal)',
          'Custom checkout flow',
          'Inventory & order management',
          'Multi-currency & multi-language',
          'Abandoned cart recovery',
        ],
        'stack'   => ['WooCommerce', 'PHP', 'Stripe', 'PayPal', 'MySQL'],
        'price'   => '\$500 – \$3,000',
        'time'    => '2 – 8 weeks',
      ],
      [
        'id'      => 'frontend',
        'icon'    => '⚛️',
        'color'   => 'amber',
        'title'   => 'Frontend Development',
        'tagline' => 'React SPAs & interactive interfaces',
        'desc'    => 'Single Page Applications, dashboards and interactive UIs built with React and modern JavaScript. Fast, scalable and maintainable code.',
        'features' => [
          'React SPA development',
          'Component architecture & state management',
          'REST API & GraphQL integration',
          'Performance optimization (lazy loading, code splitting)',
          'React Router & navigation',
          'Form validation & UX',
          'Unit testing (Jest)',
        ],
        'stack'   => ['React', 'JavaScript', 'CSS3', 'REST API', 'Jest'],
        'price'   => '\$400 – \$2,500',
        'time'    => '2 – 8 weeks',
      ],
      [
        'id'      => 'backend',
        'icon'    => '⚙️',
        'color'   => 'purple',
        'title'   => 'Backend Development',
        'tagline' => 'Scalable APIs & server-side architecture',
        'desc'    => 'Robust REST APIs, server-side logic and database architecture. I build backends that scale with your business using Node.js, PHP and PostgreSQL.',
        'features' => [
          'REST API design & development',
          'Node.js / Express server',
          'PostgreSQL database architecture',
          'Authentication (JWT, OAuth)',
          'File uploads & storage',
          'Email & notification systems',
          'API documentation',
        ],
        'stack'   => ['Node.js', 'Express', 'PHP', 'PostgreSQL', 'JWT'],
        'price'   => '\$500 – \$3,000',
        'time'    => '2 – 8 weeks',
      ],
      [
        'id'      => 'seo',
        'icon'    => '📈',
        'color'   => 'cyan',
        'title'   => 'SEO Optimization',
        'tagline' => 'Rank higher, get more organic traffic',
        'desc'    => 'Technical SEO audits, on-page optimization and Core Web Vitals improvements that get your site ranking higher and loading faster.',
        'features' => [
          'Technical SEO audit',
          'On-page optimization',
          'Core Web Vitals improvement',
          'Schema markup implementation',
          'Sitemap & robots.txt',
          'Google Search Console setup',
          'Monthly SEO report',
        ],
        'stack'   => ['SEO', 'Google Analytics', 'Search Console', 'Ahrefs'],
        'price'   => '\$200 – \$800 / mo',
        'time'    => 'Ongoing',
      ],
      [
        'id'      => 'marketing',
        'icon'    => '🚀',
        'color'   => 'green',
        'title'   => 'Digital Marketing',
        'tagline' => 'Landing pages, paid traffic & social media',
        'desc'    => 'High-converting landing pages, paid traffic campaigns and community management. I combine technical skills with marketing strategy to drive real results.',
        'features' => [
          'High-converting landing page design',
          'Google Ads & Meta Ads management',
          'Community management',
          'Email marketing campaigns',
          'Conversion rate optimization (CRO)',
          'A/B testing',
          'Analytics & reporting',
        ],
        'stack'   => ['Google Ads', 'Meta Ads', 'Mailchimp', 'Analytics', 'Hotjar'],
        'price'   => '\$300 – \$1,500 / mo',
        'time'    => 'Ongoing',
      ],
      [
        'id'      => 'automation',
        'icon'    => '🤖',
        'color'   => 'amber',
        'title'   => 'AI Automation',
        'tagline' => 'Automate workflows & save time',
        'desc'    => 'I design and implement AI-powered automation workflows that save your team hours every week — from content pipelines to business process automation.',
        'features' => [
          'Workflow automation with n8n / Zapier',
          'AI-powered content generation pipelines',
          'Chatbot development & integration',
          'Data scraping & processing',
          'Email automation with AI',
          'CRM & tool integrations',
          'Custom Python automation scripts',
        ],
        'stack'   => ['Python', 'n8n', 'OpenAI', 'Zapier', 'LangChain'],
        'price'   => '\$400 – \$2,000',
        'time'    => '1 – 4 weeks',
      ],
      [
        'id'      => 'agents',
        'icon'    => '🧠',
        'color'   => 'purple',
        'title'   => 'AI Agents',
        'tagline' => 'Intelligent agents that think & act',
        'desc'    => 'Custom AI agents that reason, plan and execute tasks autonomously. From customer service agents to research assistants and internal business tools.',
        'features' => [
          'Custom AI agent architecture',
          'LangChain / LangGraph agents',
          'Tool & API integration',
          'Memory & context management',
          'Multi-agent systems',
          'RAG (Retrieval Augmented Generation)',
          'Agent monitoring & logging',
        ],
        'stack'   => ['Python', 'LangChain', 'OpenAI', 'Pinecone', 'FastAPI'],
        'price'   => '\$800 – \$4,000',
        'time'    => '2 – 8 weeks',
      ],
    ];

    foreach ( $services as $i => $s ) :
      $reverse = $i % 2 !== 0 ? 'tf-service-detail--reverse' : '';
    ?>

    <div class="tf-service-detail <?php echo $reverse; ?> tf-service-detail--<?php echo $s['color']; ?>"
         id="<?php echo $s['id']; ?>"
         data-aos="fade-up">

      <!-- Left: Info -->
      <div class="tf-service-detail__content">
        <div class="tf-service-detail__icon"><?php echo $s['icon']; ?></div>
        <span class="tf-section-tag"><?php echo $s['tagline']; ?></span>
        <h2 class="tf-service-detail__title"><?php echo $s['title']; ?></h2>
        <p class="tf-service-detail__desc"><?php echo $s['desc']; ?></p>

        <ul class="tf-service-detail__features">
          <?php foreach ( $s['features'] as $f ) : ?>
            <li>
              <span class="tf-service-detail__check">✓</span>
              <?php echo $f; ?>
            </li>
          <?php endforeach; ?>
        </ul>

        <div class="tf-service-detail__stack">
          <?php foreach ( $s['stack'] as $tech ) : ?>
            <span><?php echo $tech; ?></span>
          <?php endforeach; ?>
        </div>
      </div>

      <!-- Right: Price Card -->
      <div class="tf-service-detail__card">
        <div class="tf-service-detail__card-inner">
          <div class="tf-service-detail__price-label">Starting from</div>
          <div class="tf-service-detail__price"><?php echo $s['price']; ?></div>
          <div class="tf-service-detail__meta">
            <span>
              <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/>
              </svg>
              <?php echo $s['time']; ?>
            </span>
          </div>
          <a href="<?php echo get_permalink(get_page_by_path('contact')); ?>?service=<?php echo $s['id']; ?>"
             class="tf-btn tf-btn--primary tf-btn--full">
            Get a Quote →
          </a>
          <a href="<?php echo get_permalink(get_page_by_path('contact')); ?>"
             class="tf-service-detail__talk">
            Or let's talk first
          </a>
        </div>
      </div>

    </div>

    <?php if ( $i < count($services) - 1 ) : ?>
      <div class="tf-service-divider"></div>
    <?php endif; ?>

    <?php endforeach; ?>

  </div>
</section>

<!-- ============================================================
     PROCESS SECTION
============================================================ -->
<section class="tf-process">
  <div class="tf-container">

    <div class="tf-section-header" data-aos="fade-up">
      <span class="tf-section-tag">How I Work</span>
      <h2 class="tf-section-title">My <span class="tf-gradient">Process</span></h2>
      <p class="tf-section-subtitle">A clear, collaborative process from first contact to final delivery.</p>
    </div>

    <div class="tf-process__steps">
      <?php
      $steps = [
        [
          'num'   => '01',
          'icon'  => '💬',
          'title' => 'Discovery Call',
          'desc'  => 'We talk about your project, goals, timeline and budget. No commitment needed — just a conversation.',
        ],
        [
          'num'   => '02',
          'icon'  => '📋',
          'title' => 'Proposal & Quote',
          'desc'  => 'I send a detailed proposal with scope, deliverables, timeline and fixed price. No surprises.',
        ],
        [
          'num'   => '03',
          'icon'  => '🎨',
          'title' => 'Design & Build',
          'desc'  => 'I start building with regular updates and check-ins. You see progress every step of the way.',
        ],
        [
          'num'   => '04',
          'icon'  => '🔍',
          'title' => 'Review & Revisions',
          'desc'  => 'You review the work and request changes. We iterate until everything is exactly right.',
        ],
        [
          'num'   => '05',
          'icon'  => '🚀',
          'title' => 'Launch & Support',
          'desc'  => 'We go live! I provide post-launch support and make sure everything runs smoothly.',
        ],
      ];
      foreach ( $steps as $step ) : ?>
        <div class="tf-process__step" data-aos="fade-up">
          <div class="tf-process__step-num"><?php echo $step['num']; ?></div>
          <div class="tf-process__step-icon"><?php echo $step['icon']; ?></div>
          <h3 class="tf-process__step-title"><?php echo $step['title']; ?></h3>
          <p class="tf-process__step-desc"><?php echo $step['desc']; ?></p>
        </div>
      <?php endforeach; ?>
    </div>

  </div>
</section>

<!-- ============================================================
     FAQ SECTION
============================================================ -->
<section class="tf-faq">
  <div class="tf-container">

    <div class="tf-section-header" data-aos="fade-up">
      <span class="tf-section-tag">FAQ</span>
      <h2 class="tf-section-title">Common <span class="tf-gradient">Questions</span></h2>
    </div>

    <div class="tf-faq__list" data-aos="fade-up">
      <?php
      $faqs = [
        [
          'q' => 'Do you work with clients outside Colombia?',
          'a' => 'Yes! I work with clients worldwide. All communication is in English or Spanish, and I adapt to your timezone for meetings.',
        ],
        [
          'q' => 'How do payments work?',
          'a' => 'I typically work with 50% upfront and 50% on delivery for projects under \$1,000. For larger projects, we split into milestones. I accept bank transfer, PayPal and crypto.',
        ],
        [
          'q' => 'Do you offer ongoing maintenance?',
          'a' => 'Yes. I offer monthly maintenance plans that include updates, backups, security monitoring and small content changes.',
        ],
        [
          'q' => 'Can you work with my existing WordPress site?',
          'a' => 'Absolutely. I can audit, fix, improve or completely rebuild your existing site while preserving your content and SEO.',
        ],
        [
          'q' => 'How long does a typical project take?',
          'a' => 'It depends on scope. A landing page takes 3–5 days. A full WordPress site takes 2–4 weeks. A custom platform or AI project can take 4–8 weeks.',
        ],
        [
          'q' => 'What if I need changes after launch?',
          'a' => 'Every project includes a post-launch support period (30–90 days depending on plan). After that, I offer hourly or retainer support.',
        ],
      ];
      foreach ( $faqs as $i => $faq ) : ?>
        <div class="tf-faq__item" data-index="<?php echo $i; ?>">
          <button class="tf-faq__question" aria-expanded="false">
            <span><?php echo $faq['q']; ?></span>
            <svg class="tf-faq__icon" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
              <polyline points="6 9 12 15 18 9"/>
            </svg>
          </button>
          <div class="tf-faq__answer">
            <p><?php echo $faq['a']; ?></p>
          </div>
        </div>
      <?php endforeach; ?>
    </div>

  </div>
</section>

<!-- ============================================================
     CTA
============================================================ -->
<section class="tf-cta-section">
  <div class="tf-container">
    <div class="tf-cta-section__inner" data-aos="fade-up">
      <div class="tf-cta-section__glow"></div>
      <h2 class="tf-cta-section__title">
        Let's build something <span class="tf-gradient">together</span>
      </h2>
      <p class="tf-cta-section__text">
        Tell me about your project and I'll get back to you within 24 hours with a plan.
      </p>
      <div class="tf-cta-section__actions">
        <a href="<?php echo get_permalink(get_page_by_path('contact')); ?>" class="tf-btn tf-btn--primary tf-btn--lg">
          Start a Project
        </a>
        <a href="mailto:guerrero9510@hotmail.com" class="tf-btn tf-btn--ghost tf-btn--lg">
          guerrero9510@hotmail.com
        </a>
      </div>
    </div>
  </div>
</section>

<!-- ============================================================
     FAQ SCRIPT
============================================================ -->
<script>
document.addEventListener('DOMContentLoaded', function () {

  // ── FAQ Accordion ─────────────────────────────────────────
  document.querySelectorAll('.tf-faq__question').forEach(btn => {
    btn.addEventListener('click', function () {
      const item     = this.closest('.tf-faq__item');
      const answer   = item.querySelector('.tf-faq__answer');
      const isOpen   = item.classList.contains('tf-faq--open');

      // Close all
      document.querySelectorAll('.tf-faq__item').forEach(el => {
        el.classList.remove('tf-faq--open');
        el.querySelector('.tf-faq__question').setAttribute('aria-expanded', 'false');
        el.querySelector('.tf-faq__answer').style.maxHeight = '0';
      });

      // Open clicked (if was closed)
      if (!isOpen) {
        item.classList.add('tf-faq--open');
        this.setAttribute('aria-expanded', 'true');
        answer.style.maxHeight = answer.scrollHeight + 'px';
      }
    });
  });

  // ── AOS lightweight ───────────────────────────────────────
  const aosEls = document.querySelectorAll('[data-aos]');
  const obs = new IntersectionObserver((entries) => {
    entries.forEach(e => {
      if (e.isIntersecting) {
        const delay = e.target.dataset.aosDelay || 0;
        setTimeout(() => e.target.classList.add('aos-animate'), parseInt(delay));
        obs.unobserve(e.target);
      }
    });
  }, { threshold: 0.1 });
  aosEls.forEach(el => obs.observe(el));

});
</script>

<?php get_footer(); ?>