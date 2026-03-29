<?php
/**
 * Front Page Template — TechFlow Agency
 * Developer: Andres Esteban Guerrero Rios
 */
get_header(); ?>

<!-- ============================================================
     HERO SECTION
============================================================ -->
<section class="tf-hero" id="home">
  <div class="tf-hero__bg">
    <div class="tf-hero__grid"></div>
    <div class="tf-hero__glow tf-hero__glow--1"></div>
    <div class="tf-hero__glow tf-hero__glow--2"></div>
  </div>

  <div class="tf-container">
    <div class="tf-hero__inner">

      <!-- LEFT: Text -->
      <div class="tf-hero__content" data-aos="fade-right">
        <div class="tf-hero__badge">
          <span class="tf-hero__badge-dot"></span>
          Available for new projects
        </div>

        <h1 class="tf-hero__title">
          Hi, I'm <span class="tf-gradient">Andres Guerrero</span><br>
          Full Stack<br>
          <span class="tf-hero__typed-wrapper">
            <span class="tf-hero__typed" id="typedText"></span>
            <span class="tf-hero__cursor">|</span>
          </span>
        </h1>

        <p class="tf-hero__subtitle">
          Full Stack Developer with <strong>5+ years of experience</strong> building 
          modern web solutions — from WordPress sites and e-commerce platforms 
          to React SPAs, AI automation and digital marketing strategies.
          Based in <strong>Medellín, Colombia</strong> 🇨🇴
        </p>

        <div class="tf-hero__stack">
          <span>WordPress</span>
          <span>React</span>
          <span>Node.js</span>
          <span>PHP</span>
          <span>PostgreSQL</span>
          <span>Python</span>
        </div>

        <div class="tf-hero__actions">
          <a href="<?php echo get_permalink(get_page_by_path('work')); ?>" class="tf-btn tf-btn--primary">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="3" width="20" height="14" rx="2"/><path d="M8 21h8M12 17v4"/></svg>
            View My Work
          </a>
          <a href="<?php echo get_permalink(get_page_by_path('contact')); ?>" class="tf-btn tf-btn--outline">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/></svg>
            Let's Talk
          </a>
        </div>

        <div class="tf-hero__stats">
          <div class="tf-hero__stat">
            <span class="tf-hero__stat-number" data-count="5">0</span>
            <span class="tf-hero__stat-label">Years Exp.</span>
          </div>
          <div class="tf-hero__stat-divider"></div>
          <div class="tf-hero__stat">
            <span class="tf-hero__stat-number" data-count="30">0</span>
            <span class="tf-hero__stat-label">Projects Done</span>
          </div>
          <div class="tf-hero__stat-divider"></div>
          <div class="tf-hero__stat">
            <span class="tf-hero__stat-number" data-count="9">0</span>
            <span class="tf-hero__stat-label">Services</span>
          </div>
          <div class="tf-hero__stat-divider"></div>
          <div class="tf-hero__stat">
            <span class="tf-hero__stat-number" data-count="100">0</span>
            <span class="tf-hero__stat-label">% Committed</span>
          </div>
        </div>
      </div>

      <!-- RIGHT: Avatar Card -->
      <div class="tf-hero__visual" data-aos="fade-left">
        <div class="tf-hero__card">
          <div class="tf-hero__avatar">
            <div class="tf-hero__avatar-placeholder">
              <svg width="80" height="80" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
              <span>AG</span>
            </div>
            <div class="tf-hero__avatar-ring"></div>
          </div>
          <h3 class="tf-hero__card-name">Andres Guerrero</h3>
          <p class="tf-hero__card-role">Full Stack Developer</p>
          <div class="tf-hero__card-location">
            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>
            Medellín, Colombia
          </div>
          <div class="tf-hero__card-links">
            <a href="https://github.com/andresguerrero270895" target="_blank" class="tf-hero__card-link" title="GitHub">
              <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor"><path d="M12 0C5.37 0 0 5.37 0 12c0 5.31 3.435 9.795 8.205 11.385.6.105.825-.255.825-.57 0-.285-.015-1.23-.015-2.235-3.015.555-3.795-.735-4.035-1.41-.135-.345-.72-1.41-1.23-1.695-.42-.225-1.02-.78-.015-.795.945-.015 1.62.87 1.845 1.23 1.08 1.815 2.805 1.305 3.495.99.105-.78.42-1.305.765-1.605-2.67-.3-5.46-1.335-5.46-5.925 0-1.305.465-2.385 1.23-3.225-.12-.3-.54-1.53.12-3.18 0 0 1.005-.315 3.3 1.23.96-.27 1.98-.405 3-.405s2.04.135 3 .405c2.295-1.56 3.3-1.23 3.3-1.23.66 1.65.24 2.88.12 3.18.765.84 1.23 1.905 1.23 3.225 0 4.605-2.805 5.625-5.475 5.925.435.375.81 1.095.81 2.22 0 1.605-.015 2.895-.015 3.3 0 .315.225.69.825.57A12.02 12.02 0 0 0 24 12c0-6.63-5.37-12-12-12z"/></svg>
            </a>
            <a href="https://www.linkedin.com/in/andres-guerrero-00862a217/" target="_blank" class="tf-hero__card-link" title="LinkedIn">
              <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor"><path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433a2.062 2.062 0 0 1-2.063-2.065 2.064 2.064 0 1 1 2.063 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/></svg>
            </a>
            <a href="mailto:guerrero9510@hotmail.com" class="tf-hero__card-link" title="Email">
              <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
            </a>
          </div>
        </div>

        <!-- Floating Tech Badges -->
        <div class="tf-hero__float tf-hero__float--1">⚛️ React</div>
        <div class="tf-hero__float tf-hero__float--2">🤖 AI Agent</div>
        <div class="tf-hero__float tf-hero__float--3">🛒 WooCommerce</div>
        <div class="tf-hero__float tf-hero__float--4">🟦 WordPress</div>
      </div>

    </div>
  </div>
</section>

<!-- ============================================================
     SERVICES PREVIEW
============================================================ -->
<section class="tf-services-preview" id="services">
  <div class="tf-container">

    <div class="tf-section-header" data-aos="fade-up">
      <span class="tf-section-tag">What I Do</span>
      <h2 class="tf-section-title">Services I <span class="tf-gradient">Offer</span></h2>
      <p class="tf-section-subtitle">From design to deployment — I cover the full spectrum of modern web development and digital marketing.</p>
    </div>

    <div class="tf-services-grid" data-aos="fade-up" data-aos-delay="100">

      <?php
      $services = [
        [
          'icon'  => '🌐',
          'title' => 'WordPress Development',
          'desc'  => 'Custom themes, plugins, performance optimization and full site builds tailored to your brand.',
          'tags'  => ['PHP', 'ACF', 'WP CLI'],
          'color' => 'purple',
        ],
        [
          'icon'  => '🎨',
          'title' => 'Web Design & UI/UX',
          'desc'  => 'Modern, responsive interfaces with a focus on user experience, conversion and visual impact.',
          'tags'  => ['Figma', 'CSS', 'HTML'],
          'color' => 'cyan',
        ],
        [
          'icon'  => '🛒',
          'title' => 'E-commerce (WooCommerce)',
          'desc'  => 'Full online store setup, custom product pages, payment gateways and checkout optimization.',
          'tags'  => ['WooCommerce', 'PHP', 'Stripe'],
          'color' => 'green',
        ],
        [
          'icon'  => '⚛️',
          'title' => 'Frontend Development',
          'desc'  => 'Single Page Applications and interactive UIs built with React, modern JavaScript and CSS.',
          'tags'  => ['React', 'JS', 'CSS'],
          'color' => 'amber',
        ],
        [
          'icon'  => '⚙️',
          'title' => 'Backend Development',
          'desc'  => 'Scalable REST APIs, server-side logic and database architecture with Node.js, PHP and PostgreSQL.',
          'tags'  => ['Node.js', 'PHP', 'PostgreSQL'],
          'color' => 'purple',
        ],
        [
          'icon'  => '📈',
          'title' => 'SEO Optimization',
          'desc'  => 'Technical SEO audits, on-page optimization, Core Web Vitals and search ranking strategies.',
          'tags'  => ['SEO', 'Analytics', 'CWV'],
          'color' => 'cyan',
        ],
        [
          'icon'  => '🚀',
          'title' => 'Digital Marketing',
          'desc'  => 'High-converting landing pages, paid traffic management and community management strategies.',
          'tags'  => ['Landing Pages', 'Ads', 'Social'],
          'color' => 'green',
        ],
        [
          'icon'  => '🤖',
          'title' => 'AI Automation',
          'desc'  => 'Workflow automation with AI tools — chatbots, content pipelines and process optimization.',
          'tags'  => ['Python', 'OpenAI', 'n8n'],
          'color' => 'amber',
        ],
        [
          'icon'  => '🧠',
          'title' => 'AI Agents',
          'desc'  => 'Custom AI agents that reason, act and integrate with your business systems and APIs.',
          'tags'  => ['LangChain', 'Python', 'API'],
          'color' => 'purple',
        ],
      ];

      foreach ($services as $i => $s) : ?>
        <div class="tf-service-card tf-service-card--<?php echo $s['color']; ?>" data-aos="fade-up" data-aos-delay="<?php echo ($i % 3) * 80; ?>">
          <div class="tf-service-card__icon"><?php echo $s['icon']; ?></div>
          <h3 class="tf-service-card__title"><?php echo $s['title']; ?></h3>
          <p class="tf-service-card__desc"><?php echo $s['desc']; ?></p>
          <div class="tf-service-card__tags">
            <?php foreach ($s['tags'] as $tag) : ?>
              <span class="tf-service-card__tag"><?php echo $tag; ?></span>
            <?php endforeach; ?>
          </div>
        </div>
      <?php endforeach; ?>

    </div>

    <div class="tf-services-cta" data-aos="fade-up">
      <a href="<?php echo get_permalink(get_page_by_path('services')); ?>" class="tf-btn tf-btn--outline">
        See All Services & Pricing →
      </a>
    </div>

  </div>
</section>

<!-- ============================================================
     ABOUT SNAPSHOT
============================================================ -->
<section class="tf-about-snap" id="about">
  <div class="tf-container">
    <div class="tf-about-snap__inner">

      <!-- Left: Text -->
      <div class="tf-about-snap__content" data-aos="fade-right">
        <span class="tf-section-tag">About Me</span>
        <h2 class="tf-section-title">Passionate about building <span class="tf-gradient">real solutions</span></h2>
        <p class="tf-about-snap__text">
          I'm <strong>Andres Esteban Guerrero Rios</strong>, a Full Stack Developer from Medellín, Colombia 
          with over <strong>5 years of experience</strong> turning ideas into functional, beautiful digital products.
        </p>
        <p class="tf-about-snap__text">
          My background spans WordPress development, React SPAs, e-commerce, backend APIs and — 
          more recently — AI automation and intelligent agents. I bring both technical depth 
          and a strong sense of design to every project.
        </p>
        <p class="tf-about-snap__text">
          I've worked on <strong>landing pages for marketing campaigns</strong>, 
          <strong>financial software</strong>, <strong>SPAs</strong>, 
          <strong>e-commerce platforms</strong> and <strong>academic projects</strong> — 
          always with a focus on clean code, performance and results.
        </p>
        <a href="<?php echo get_permalink(get_page_by_path('about')); ?>" class="tf-btn tf-btn--primary">
          More About Me →
        </a>
      </div>

      <!-- Right: Skills -->
      <div class="tf-about-snap__skills" data-aos="fade-left">
        <?php
        $skills = [
          ['name' => 'WordPress / PHP',  'level' => 85,  'color' => '#7C3AED'],
          ['name' => 'JavaScript',        'level' => 90,  'color' => '#F59E0B'],
          ['name' => 'React',             'level' => 88,  'color' => '#06B6D4'],
          ['name' => 'Node.js',           'level' => 85,  'color' => '#10B981'],
          ['name' => 'CSS / HTML',        'level' => 92,  'color' => '#7C3AED'],
          ['name' => 'PostgreSQL',        'level' => 80,  'color' => '#06B6D4'],
          ['name' => 'Python',            'level' => 55,  'color' => '#F59E0B'],
          ['name' => 'AI / Automation',   'level' => 75,  'color' => '#10B981'],
        ];
        foreach ($skills as $sk) : ?>
          <div class="tf-skill-bar">
            <div class="tf-skill-bar__header">
              <span class="tf-skill-bar__name"><?php echo $sk['name']; ?></span>
              <span class="tf-skill-bar__level"><?php echo $sk['level']; ?>%</span>
            </div>
            <div class="tf-skill-bar__track">
              <div class="tf-skill-bar__fill" 
                   data-width="<?php echo $sk['level']; ?>" 
                   style="background: <?php echo $sk['color']; ?>; width: 0%;">
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      </div>

    </div>
  </div>
</section>

<!-- ============================================================
     PORTFOLIO PREVIEW
============================================================ -->
<section class="tf-portfolio-preview" id="work">
  <div class="tf-container">

    <div class="tf-section-header" data-aos="fade-up">
      <span class="tf-section-tag">Portfolio</span>
      <h2 class="tf-section-title">Featured <span class="tf-gradient">Projects</span></h2>
      <p class="tf-section-subtitle">A selection of real projects — from medical platforms to marketplaces and agency sites.</p>
    </div>

    <div class="tf-portfolio-grid" data-aos="fade-up" data-aos-delay="100">
      <?php
      $featured = new WP_Query([
        'post_type'      => 'tf_project',
        'posts_per_page' => 3,
        'meta_key'       => '_tf_featured',
        'meta_value'     => '1',
        'orderby'        => 'date',
        'order'          => 'DESC',
      ]);

      if ($featured->have_posts()) :
        while ($featured->have_posts()) : $featured->the_post();
          $category = get_post_meta(get_the_ID(), '_tf_category', true);
          $tech     = get_post_meta(get_the_ID(), '_tf_tech', true);
          $url      = get_post_meta(get_the_ID(), '_tf_url', true);
      ?>
        <article class="tf-project-card" data-aos="fade-up">
          <div class="tf-project-card__thumb">
            <?php if (has_post_thumbnail()) : ?>
              <?php the_post_thumbnail('large', ['class' => 'tf-project-card__img']); ?>
            <?php else : ?>
              <div class="tf-project-card__placeholder">
                <span><?php echo strtoupper(substr(get_the_title(), 0, 2)); ?></span>
              </div>
            <?php endif; ?>
            <div class="tf-project-card__overlay">
              <a href="<?php the_permalink(); ?>" class="tf-project-card__view">View Project →</a>
            </div>
          </div>
          <div class="tf-project-card__body">
            <?php if ($category) : ?>
              <span class="tf-project-card__cat"><?php echo esc_html($category); ?></span>
            <?php endif; ?>
            <h3 class="tf-project-card__title">
              <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
            </h3>
            <p class="tf-project-card__excerpt"><?php echo wp_trim_words(get_the_excerpt(), 18); ?></p>
            <?php if ($tech) : ?>
              <div class="tf-project-card__tech">
                <?php foreach (explode(',', $tech) as $t) : ?>
                  <span><?php echo trim($t); ?></span>
                <?php endforeach; ?>
              </div>
            <?php endif; ?>
          </div>
        </article>
      <?php
        endwhile;
        wp_reset_postdata();
      else : ?>
        <!-- Fallback cards while projects are being added -->
        <?php
        $fallback = [
          [
            'init'  => 'MP',
            'cat'   => 'WordPress / Healthcare',
            'title' => 'MedPractice USA',
            'desc'  => 'Medical practice platform with state landing pages, appointment system and healthcare-focused UX.',
            'tech'  => ['WordPress', 'PHP', 'CSS', 'JS'],
            'url'   => 'http://med-practice-usa.local/',
          ],
          [
            'init'  => 'TF',
            'cat'   => 'Agency / Portfolio',
            'title' => 'TechFlow Agency',
            'desc'  => 'Full-stack developer portfolio with dark UI, animated sections and service showcase.',
            'tech'  => ['WordPress', 'React', 'Node.js'],
            'url'   => 'http://techflow-agency.local/',
          ],
          [
            'init'  => 'FB',
            'cat'   => 'E-commerce / Marketplace',
            'title' => 'FreshBite Marketplace',
            'desc'  => 'WooCommerce marketplace connecting local food producers with consumers. Custom checkout and producer profiles.',
            'tech'  => ['WooCommerce', 'PHP', 'CSS'],
            'url'   => 'http://freshbite-marketplace.local/',
          ],
        ];
        foreach ($fallback as $p) : ?>
          <article class="tf-project-card" data-aos="fade-up">
            <div class="tf-project-card__thumb">
              <div class="tf-project-card__placeholder">
                <span><?php echo $p['init']; ?></span>
              </div>
              <div class="tf-project-card__overlay">
                <a href="<?php echo $p['url']; ?>" class="tf-project-card__view" target="_blank">View Project →</a>
              </div>
            </div>
            <div class="tf-project-card__body">
              <span class="tf-project-card__cat"><?php echo $p['cat']; ?></span>
              <h3 class="tf-project-card__title"><?php echo $p['title']; ?></h3>
              <p class="tf-project-card__excerpt"><?php echo $p['desc']; ?></p>
              <div class="tf-project-card__tech">
                <?php foreach ($p['tech'] as $t) : ?>
                  <span><?php echo $t; ?></span>
                <?php endforeach; ?>
              </div>
            </div>
          </article>
        <?php endforeach;
      endif; ?>
    </div>

    <div class="tf-portfolio-cta" data-aos="fade-up">
      <a href="<?php echo get_permalink(get_page_by_path('work')); ?>" class="tf-btn tf-btn--outline">
        See All Projects →
      </a>
    </div>

  </div>
</section>

<!-- ============================================================
     PRICING SECTION
============================================================ -->
<section class="tf-pricing" id="pricing">
  <div class="tf-container">

    <div class="tf-section-header" data-aos="fade-up">
      <span class="tf-section-tag">Investment</span>
      <h2 class="tf-section-title">Transparent <span class="tf-gradient">Pricing</span></h2>
      <p class="tf-section-subtitle">Starting ranges for reference — every project is unique. Let's talk about yours.</p>
    </div>

    <div class="tf-pricing-grid" data-aos="fade-up" data-aos-delay="100">

      <!-- Starter -->
      <div class="tf-pricing-card">
        <div class="tf-pricing-card__header">
          <span class="tf-pricing-card__icon">🌱</span>
          <h3 class="tf-pricing-card__name">Starter</h3>
          <p class="tf-pricing-card__tagline">For small businesses & personal brands</p>
        </div>
        <div class="tf-pricing-card__price">
          <span class="tf-pricing-card__from">From</span>
          <span class="tf-pricing-card__amount">\$300</span>
          <span class="tf-pricing-card__currency">USD</span>
        </div>
        <ul class="tf-pricing-card__features">
          <li>✅ WordPress site (up to 5 pages)</li>
          <li>✅ Responsive design</li>
          <li>✅ Basic SEO setup</li>
          <li>✅ Contact form</li>
          <li>✅ 1 revision round</li>
          <li>✅ 30-day support</li>
        </ul>
        <a href="<?php echo get_permalink(get_page_by_path('contact')); ?>" class="tf-btn tf-btn--outline tf-btn--full">
          Get a Quote
        </a>
      </div>

      <!-- Professional (Featured) -->
      <div class="tf-pricing-card tf-pricing-card--featured">
        <div class="tf-pricing-card__badge">Most Popular</div>
        <div class="tf-pricing-card__header">
          <span class="tf-pricing-card__icon">🚀</span>
          <h3 class="tf-pricing-card__name">Professional</h3>
          <p class="tf-pricing-card__tagline">For growing businesses & e-commerce</p>
        </div>
        <div class="tf-pricing-card__price">
          <span class="tf-pricing-card__from">From</span>
          <span class="tf-pricing-card__amount">\$800</span>
          <span class="tf-pricing-card__currency">USD</span>
        </div>
        <ul class="tf-pricing-card__features">
          <li>✅ Custom theme / React SPA</li>
          <li>✅ WooCommerce / E-commerce</li>
          <li>✅ Advanced SEO</li>
          <li>✅ Backend API integration</li>
          <li>✅ Performance optimization</li>
          <li>✅ 3 revision rounds</li>
          <li>✅ 60-day support</li>
        </ul>
        <a href="<?php echo get_permalink(get_page_by_path('contact')); ?>" class="tf-btn tf-btn--primary tf-btn--full">
          Get a Quote
        </a>
      </div>

      <!-- Enterprise -->
      <div class="tf-pricing-card">
        <div class="tf-pricing-card__header">
          <span class="tf-pricing-card__icon">🧠</span>
          <h3 class="tf-pricing-card__name">Enterprise</h3>
          <p class="tf-pricing-card__tagline">For complex platforms & AI projects</p>
        </div>
        <div class="tf-pricing-card__price">
          <span class="tf-pricing-card__from">From</span>
          <span class="tf-pricing-card__amount">\$2,000</span>
          <span class="tf-pricing-card__currency">USD</span>
        </div>
        <ul class="tf-pricing-card__features">
          <li>✅ Full-stack custom platform</li>
          <li>✅ AI agents & automation</li>
          <li>✅ Database architecture</li>
          <li>✅ API design & integration</li>
          <li>✅ Digital marketing strategy</li>
          <li>✅ Unlimited revisions</li>
          <li>✅ 90-day support</li>
        </ul>
        <a href="<?php echo get_permalink(get_page_by_path('contact')); ?>" class="tf-btn tf-btn--outline tf-btn--full">
          Get a Quote
        </a>
      </div>

    </div>

    <p class="tf-pricing__note" data-aos="fade-up">
      💬 All prices are starting points. Final cost depends on scope, complexity and timeline. 
      <a href="<?php echo get_permalink(get_page_by_path('contact')); ?>">Contact me for a custom quote →</a>
    </p>

  </div>
</section>

<!-- ============================================================
     CTA SECTION
============================================================ -->
<section class="tf-cta-section">
  <div class="tf-container">
    <div class="tf-cta-section__inner" data-aos="fade-up">
      <div class="tf-cta-section__glow"></div>
      <h2 class="tf-cta-section__title">
        Ready to build something <span class="tf-gradient">amazing</span>?
      </h2>
      <p class="tf-cta-section__text">
        Let's turn your idea into a real, working product. I'm available for freelance projects, 
        long-term collaborations and consulting.
      </p>
      <div class="tf-cta-section__actions">
        <a href="<?php echo get_permalink(get_page_by_path('contact')); ?>" class="tf-btn tf-btn--primary tf-btn--lg">
          Start a Project
        </a>
        <a href="mailto:guerrero9510@hotmail.com" class="tf-btn tf-btn--ghost tf-btn--lg">
          guerrero9510@hotmail.com
        </a>
      </div>
      <div class="tf-cta-section__links">
        <a href="https://github.com/andresguerrero270895" target="_blank">GitHub</a>
        <span>·</span>
        <a href="https://www.linkedin.com/in/andres-guerrero-00862a217/" target="_blank">LinkedIn</a>
        <span>·</span>
        <a href="<?php echo get_permalink(get_page_by_path('work')); ?>">Portfolio</a>
      </div>
    </div>
  </div>
</section>

<!-- ============================================================
     SCRIPTS
============================================================ -->
<script>
document.addEventListener('DOMContentLoaded', function () {

  // ── Typed text effect ──────────────────────────────────────
  const words  = ['Developer', 'WordPress Expert', 'React Developer', 'AI Builder', 'Problem Solver'];
  const el     = document.getElementById('typedText');
  let   wi = 0, ci = 0, deleting = false;

  function typeLoop() {
    if (!el) return;
    const word = words[wi];
    el.textContent = deleting ? word.substring(0, ci--) : word.substring(0, ci++);

    if (!deleting && ci > word.length)      { deleting = true; setTimeout(typeLoop, 1800); return; }
    if  (deleting && ci < 0)                { deleting = false; wi = (wi + 1) % words.length; }
    setTimeout(typeLoop, deleting ? 60 : 110);
  }
  typeLoop();

  // ── Counter animation ─────────────────────────────────────
  const counters = document.querySelectorAll('.tf-hero__stat-number');
  const counterObs = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
      if (!entry.isIntersecting) return;
      const el  = entry.target;
      const end = parseInt(el.dataset.count);
      let   cur = 0;
      const inc = Math.ceil(end / 50);
      const t   = setInterval(() => {
        cur += inc;
        if (cur >= end) { el.textContent = end; clearInterval(t); }
        else              el.textContent = cur;
      }, 30);
      counterObs.unobserve(el);
    });
  }, { threshold: 0.5 });
  counters.forEach(c => counterObs.observe(c));

  // ── Skill bar animation ───────────────────────────────────
  const bars = document.querySelectorAll('.tf-skill-bar__fill');
  const barObs = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
      if (!entry.isIntersecting) return;
      const bar = entry.target;
      bar.style.transition = 'width 1.2s cubic-bezier(0.4,0,0.2,1)';
      bar.style.width      = bar.dataset.width + '%';
      barObs.unobserve(bar);
    });
  }, { threshold: 0.3 });
  bars.forEach(b => barObs.observe(b));

  // ── AOS-style fade-up (lightweight) ──────────────────────
  const aosEls = document.querySelectorAll('[data-aos]');
  const aosObs = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        const delay = entry.target.dataset.aosDelay || 0;
        setTimeout(() => entry.target.classList.add('aos-animate'), parseInt(delay));
        aosObs.unobserve(entry.target);
      }
    });
  }, { threshold: 0.1 });
  aosEls.forEach(el => aosObs.observe(el));

});
</script>

<?php get_footer(); ?>