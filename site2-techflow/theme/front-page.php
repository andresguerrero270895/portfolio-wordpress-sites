<?php
/**
 * front-page.php — TechFlow Agency
 * Main landing page — 8 premium sections
 */

get_header();
?>

<main id="tf-main">

<!-- ============================================================
     1. HERO SECTION
============================================================ -->
<section class="tf-hero" id="home">
    <div class="tf-grid-bg"></div>
    <div class="tf-orb tf-orb-purple" style="width:600px;height:600px;top:-200px;right:-100px;"></div>
    <div class="tf-orb tf-orb-cyan"   style="width:400px;height:400px;bottom:0;left:-100px;"></div>

    <div class="tf-container tf-hero-inner">

        <!-- Left: Content -->
        <div class="tf-hero-content">
            <div class="tf-hero-badge tf-reveal">
                <span class="tf-badge tf-badge-green tf-badge-dot">
                    Available for Projects 2025
                </span>
            </div>

            <h1 class="tf-display tf-hero-title tf-reveal tf-reveal-delay-1">
                We Engineer<br>
                <span class="tf-gradient-text">Digital Products</span><br>
                That Scale
            </h1>

            <p class="tf-body-lg tf-hero-desc tf-reveal tf-reveal-delay-2">
                From custom WordPress solutions to full-stack web applications —
                we craft high-performance digital experiences for ambitious brands
                worldwide.
            </p>

            <div class="tf-hero-stats tf-reveal tf-reveal-delay-2">
                <div class="tf-hero-stat">
                    <span class="tf-hero-stat-num" data-count="150">0</span>
                    <span class="tf-hero-stat-label">Projects Delivered</span>
                </div>
                <div class="tf-hero-stat-divider"></div>
                <div class="tf-hero-stat">
                    <span class="tf-hero-stat-num" data-count="98">0</span>
                    <span class="tf-hero-stat-label">% Client Satisfaction</span>
                </div>
                <div class="tf-hero-stat-divider"></div>
                <div class="tf-hero-stat">
                    <span class="tf-hero-stat-num" data-count="12">0</span>
                    <span class="tf-hero-stat-label">Years Experience</span>
                </div>
            </div>

            <div class="tf-hero-actions tf-reveal tf-reveal-delay-3">
                <a href="<?php echo esc_url(home_url('/contact/')); ?>"
                   class="tf-btn tf-btn-primary tf-btn-lg">
                    <span>Start a Project</span>
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                        <path d="M5 12h14M12 5l7 7-7 7"/>
                    </svg>
                </a>
                <a href="<?php echo esc_url(home_url('/work/')); ?>"
                   class="tf-btn tf-btn-ghost tf-btn-lg">
                    View Our Work
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M5 12h14M12 5l7 7-7 7"/>
                    </svg>
                </a>
            </div>

            <!-- Trusted by -->
            <div class="tf-hero-trusted tf-reveal tf-reveal-delay-4">
                <span class="tf-hero-trusted-label">Trusted by teams at</span>
                <div class="tf-hero-trusted-logos">
                    <span>Stripe</span>
                    <span>Vercel</span>
                    <span>Shopify</span>
                    <span>Linear</span>
                    <span>Notion</span>
                </div>
            </div>
        </div>

        <!-- Right: Terminal -->
        <div class="tf-hero-terminal-col tf-reveal tf-reveal-delay-2">
            <div class="tf-terminal">
                <div class="tf-terminal-header">
                    <div class="tf-terminal-dots">
                        <span class="tf-dot tf-dot-red"></span>
                        <span class="tf-dot tf-dot-yellow"></span>
                        <span class="tf-dot tf-dot-green"></span>
                    </div>
                    <span class="tf-terminal-title">techflow ~ project-init</span>
                </div>
                <div class="tf-terminal-body">
                    <div class="tf-terminal-line">
                        <span class="tf-term-prompt">$</span>
                        <span class="tf-term-cmd" id="tf-typewriter">npx create-techflow-app</span>
                        <span class="tf-term-cursor">█</span>
                    </div>
                    <div class="tf-terminal-output">
                        <div class="tf-term-out tf-term-success">✓ Initializing project structure...</div>
                        <div class="tf-term-out tf-term-success">✓ Installing dependencies...</div>
                        <div class="tf-term-out tf-term-success">✓ Configuring WordPress theme...</div>
                        <div class="tf-term-out tf-term-success">✓ Setting up build pipeline...</div>
                        <div class="tf-term-out tf-term-info">→ Optimizing performance... 98/100</div>
                        <div class="tf-term-out tf-term-info">→ Running Lighthouse audit...</div>
                        <div class="tf-term-out" style="margin-top:.5rem;">
                            <span style="color:var(--tf-green);font-weight:700;">
                                🚀 Project ready! Happy coding.
                            </span>
                        </div>
                    </div>
                    <div class="tf-terminal-metrics">
                        <div class="tf-term-metric">
                            <span class="tf-term-metric-label">Performance</span>
                            <div class="tf-term-metric-bar">
                                <div class="tf-term-metric-fill" style="width:98%;background:var(--tf-green);"></div>
                            </div>
                            <span class="tf-term-metric-val" style="color:var(--tf-green);">98</span>
                        </div>
                        <div class="tf-term-metric">
                            <span class="tf-term-metric-label">SEO</span>
                            <div class="tf-term-metric-bar">
                                <div class="tf-term-metric-fill" style="width:100%;background:var(--tf-green);"></div>
                            </div>
                            <span class="tf-term-metric-val" style="color:var(--tf-green);">100</span>
                        </div>
                        <div class="tf-term-metric">
                            <span class="tf-term-metric-label">Accessibility</span>
                            <div class="tf-term-metric-bar">
                                <div class="tf-term-metric-fill" style="width:95%;background:var(--tf-accent);"></div>
                            </div>
                            <span class="tf-term-metric-val" style="color:var(--tf-accent);">95</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Floating cards -->
            <div class="tf-hero-float-card tf-hero-float-1">
                <span>⚡</span>
                <div>
                    <div class="tf-float-card-title">Fast Delivery</div>
                    <div class="tf-float-card-sub">2–6 week sprints</div>
                </div>
            </div>
            <div class="tf-hero-float-card tf-hero-float-2">
                <span>🔒</span>
                <div>
                    <div class="tf-float-card-title">Secure by Default</div>
                    <div class="tf-float-card-sub">SOC2 compliant</div>
                </div>
            </div>
        </div>

    </div>

    <!-- Scroll indicator -->
    <div class="tf-scroll-indicator">
        <div class="tf-scroll-mouse">
            <div class="tf-scroll-wheel"></div>
        </div>
        <span>Scroll to explore</span>
    </div>
</section>

<!-- ============================================================
     2. METRICS STRIP
============================================================ -->
<section class="tf-metrics">
    <div class="tf-container">
        <div class="tf-metrics-grid">
            <?php
            $metrics = [
                ['num'=>'150+',  'label'=>'Projects Delivered',    'icon'=>'🚀', 'color'=>'var(--tf-primary-light)'],
                ['num'=>'98%',   'label'=>'Client Satisfaction',   'icon'=>'⭐', 'color'=>'var(--tf-accent-2)'],
                ['num'=>'\$50M+', 'label'=>'Revenue Generated',     'icon'=>'💰', 'color'=>'var(--tf-green)'],
                ['num'=>'12+',   'label'=>'Years of Experience',   'icon'=>'🏆', 'color'=>'var(--tf-accent)'],
                ['num'=>'40+',   'label'=>'Technologies Mastered', 'icon'=>'⚡', 'color'=>'var(--tf-primary-light)'],
            ];
            foreach($metrics as $i => $m): ?>
            <div class="tf-metric-item tf-reveal" style="transition-delay:<?php echo $i * 0.1; ?>s">
                <div class="tf-metric-icon" style="color:<?php echo $m['color']; ?>">
                    <?php echo $m['icon']; ?>
                </div>
                <div class="tf-metric-num" style="color:<?php echo $m['color']; ?>">
                    <?php echo esc_html($m['num']); ?>
                </div>
                <div class="tf-metric-label"><?php echo esc_html($m['label']); ?></div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- ============================================================
     3. SERVICES SECTION
============================================================ -->
<section class="tf-services tf-section" id="services">
    <div class="tf-container">

        <div class="tf-section-header center tf-reveal">
            <span class="tf-badge tf-badge-primary">What We Do</span>
            <h2 class="tf-h2">
                Full-Spectrum<br>
                <span class="tf-gradient-text">Digital Engineering</span>
            </h2>
            <p class="tf-body-lg">
                From pixel-perfect interfaces to robust backend systems —
                we cover every layer of the modern digital stack.
            </p>
        </div>

        <div class="tf-services-grid">
            <?php
            $services = [
                [
                    'icon'  => '<svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"/></svg>',
                    'title' => 'WordPress Development',
                    'desc'  => 'Custom themes, plugins, headless WordPress and full site editing. Enterprise-grade solutions built on the world\'s most popular CMS.',
                    'tags'  => ['PHP','ACF','Gutenberg','REST API'],
                    'color' => '#7C3AED',
                    'result'=> '3x faster load times',
                ],
                [
                    'icon'  => '<svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><rect x="2" y="3" width="20" height="14" rx="2"/><path d="M8 21h8M12 17v4"/></svg>',
                    'title' => 'Web Applications',
                    'desc'  => 'Scalable, maintainable web apps with modern frameworks. From MVPs to enterprise platforms — we architect for growth.',
                    'tags'  => ['React','Next.js','Node.js','TypeScript'],
                    'color' => '#06B6D4',
                    'result'=> 'Deployed in 4 weeks',
                ],
                [
                    'icon'  => '<svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M6 2L3 6v14a2 2 0 002 2h14a2 2 0 002-2V6l-3-4z"/><line x1="3" y1="6" x2="21" y2="6"/><path d="M16 10a4 4 0 01-8 0"/></svg>',
                    'title' => 'E-Commerce Solutions',
                    'desc'  => 'High-converting online stores with WooCommerce, custom checkout flows, payment integrations and inventory management.',
                    'tags'  => ['WooCommerce','Stripe','PayPal','Inventory'],
                    'color' => '#10B981',
                    'result'=> '+340% conversion rate',
                ],
                [
                    'icon'  => '<svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M18 20V10M12 20V4M6 20v-6"/></svg>',
                    'title' => 'API & Backend',
                    'desc'  => 'RESTful and GraphQL APIs, third-party integrations, microservices architecture and database design for complex applications.',
                    'tags'  => ['REST','GraphQL','MySQL','Redis'],
                    'color' => '#F59E0B',
                    'result'=> '99.9% uptime SLA',
                ],
                [
                    'icon'  => '<svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><circle cx="12" cy="12" r="10"/><path d="M8 14s1.5 2 4 2 4-2 4-2M9 9h.01M15 9h.01"/></svg>',
                    'title' => 'UI/UX Design Systems',
                    'desc'  => 'Research-driven design with Figma, component libraries, accessibility-first interfaces and interactive prototypes.',
                    'tags'  => ['Figma','Storybook','WCAG','Tokens'],
                    'color' => '#EC4899',
                    'result'=> '92 NPS score average',
                ],
                [
                    'icon'  => '<svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"/></svg>',
                    'title' => 'Performance & SEO',
                    'desc'  => 'Core Web Vitals optimization, technical SEO audits, Lighthouse 95+ scores and CDN configuration for maximum speed.',
                    'tags'  => ['Lighthouse','Core Web Vitals','CDN','Schema'],
                    'color' => '#06B6D4',
                    'result'=> '95+ Lighthouse score',
                ],
            ];

            foreach($services as $i => $s):
                $delay = ($i % 3) * 0.1;
            ?>
            <div class="tf-service-card tf-card tf-reveal"
                 style="transition-delay:<?php echo $delay; ?>s;--service-color:<?php echo $s['color']; ?>">

                <div class="tf-service-card-glow"></div>

                <div class="tf-service-icon" style="color:<?php echo $s['color']; ?>">
                    <?php echo $s['icon']; ?>
                </div>

                <h3 class="tf-service-title"><?php echo esc_html($s['title']); ?></h3>

                <p class="tf-service-desc"><?php echo esc_html($s['desc']); ?></p>

                <div class="tf-service-tags">
                    <?php foreach($s['tags'] as $tag): ?>
                    <span class="tf-stack-pill"><?php echo esc_html($tag); ?></span>
                    <?php endforeach; ?>
                </div>

                <div class="tf-service-result">
                    <span class="tf-service-result-dot" style="background:<?php echo $s['color']; ?>"></span>
                    <?php echo esc_html($s['result']); ?>
                </div>

                <a href="<?php echo esc_url(home_url('/services/')); ?>"
                   class="tf-service-link">
                    Learn more
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M5 12h14M12 5l7 7-7 7"/>
                    </svg>
                </a>

            </div>
            <?php endforeach; ?>
        </div>

        <!-- Services CTA -->
        <div class="tf-services-footer tf-reveal">
            <p>Not sure what you need? Let's figure it out together.</p>
            <a href="<?php echo esc_url(home_url('/contact/')); ?>"
               class="tf-btn tf-btn-ghost">
                Book a Free Consultation →
            </a>
        </div>

    </div>
</section>

<!-- ============================================================
     6. PROCESS SECTION
============================================================ -->
<section class="tf-process tf-section" id="process">
    <div class="tf-container">

        <div class="tf-section-header center tf-reveal">
            <span class="tf-badge tf-badge-primary">How We Work</span>
            <h2 class="tf-h2">
                A Process Built for<br>
                <span class="tf-gradient-text">Predictable Results</span>
            </h2>
            <p class="tf-body-lg">
                No surprises. No delays. Just a clear, collaborative
                process from discovery to launch and beyond.
            </p>
        </div>

        <div class="tf-process-timeline">
            <?php
            $steps = [
                [
                    'num'   => '01',
                    'title' => 'Discovery & Strategy',
                    'desc'  => 'We deep-dive into your business goals, audience, and technical requirements. We audit competitors, map user journeys, and define a clear roadmap before a single line of code is written.',
                    'icon'  => '🔍',
                    'color' => '#7C3AED',
                    'tags'  => ['Goals Workshop','User Research','Tech Audit','Roadmap'],
                    'time'  => 'Week 1',
                ],
                [
                    'num'   => '02',
                    'title' => 'Design & Prototyping',
                    'desc'  => 'High-fidelity Figma designs with your brand system. Interactive prototypes for validation before development. Every decision is intentional and user-tested.',
                    'icon'  => '🎨',
                    'color' => '#06B6D4',
                    'tags'  => ['Wireframes','UI Design','Prototype','Design System'],
                    'time'  => 'Week 2–3',
                ],
                [
                    'num'   => '03',
                    'title' => 'Development & Testing',
                    'desc'  => 'Clean, documented code in iterative sprints. Continuous integration, automated testing, and weekly demos keep you informed and in control throughout.',
                    'icon'  => '⚡',
                    'color' => '#10B981',
                    'tags'  => ['Sprint Dev','Code Review','QA Testing','CI/CD'],
                    'time'  => 'Week 3–8',
                ],
                [
                    'num'   => '04',
                    'title' => 'Launch & Growth',
                    'desc'  => 'Smooth deployment with zero downtime. Post-launch monitoring, performance tracking, and ongoing support to ensure your product keeps scaling.',
                    'icon'  => '🚀',
                    'color' => '#F59E0B',
                    'tags'  => ['Deployment','Monitoring','Analytics','Support'],
                    'time'  => 'Week 8+',
                ],
            ];
            foreach($steps as $i => $step): ?>
            <div class="tf-process-step tf-reveal" style="transition-delay:<?php echo $i * 0.15; ?>s">

                <div class="tf-process-step-left">
                    <div class="tf-process-num" style="color:<?php echo $step['color']; ?>;border-color:<?php echo $step['color']; ?>22">
                        <?php echo $step['num']; ?>
                    </div>
                    <?php if($i < count($steps) - 1): ?>
                    <div class="tf-process-connector" style="--connector-color:<?php echo $step['color']; ?>"></div>
                    <?php endif; ?>
                </div>

                <div class="tf-process-step-card tf-card" style="--step-color:<?php echo $step['color']; ?>">
                    <div class="tf-process-step-header">
                        <div class="tf-process-icon" style="background:<?php echo $step['color']; ?>22;color:<?php echo $step['color']; ?>">
                            <?php echo $step['icon']; ?>
                        </div>
                        <div>
                            <div class="tf-process-time" style="color:<?php echo $step['color']; ?>">
                                <?php echo esc_html($step['time']); ?>
                            </div>
                            <h3 class="tf-process-title"><?php echo esc_html($step['title']); ?></h3>
                        </div>
                    </div>
                    <p class="tf-process-desc"><?php echo esc_html($step['desc']); ?></p>
                    <div class="tf-process-tags">
                        <?php foreach($step['tags'] as $tag): ?>
                        <span class="tf-process-tag" style="border-color:<?php echo $step['color']; ?>33;color:<?php echo $step['color']; ?>">
                            <?php echo esc_html($tag); ?>
                        </span>
                        <?php endforeach; ?>
                    </div>
                </div>

            </div>
            <?php endforeach; ?>
        </div>

    </div>
</section>

<!-- ============================================================
     7. TESTIMONIALS
============================================================ -->
<section class="tf-testimonials tf-section" id="testimonials">
    <div class="tf-orb tf-orb-purple" style="width:500px;height:500px;top:0;left:50%;transform:translateX(-50%);opacity:.5;"></div>
    <div class="tf-container" style="position:relative;z-index:1;">

        <div class="tf-section-header center tf-reveal">
            <span class="tf-badge tf-badge-accent">Client Love</span>
            <h2 class="tf-h2">
                Don't Take<br>
                <span class="tf-gradient-text">Our Word For It</span>
            </h2>
            <p class="tf-body-lg">
                We measure success by the growth of our clients.
                Here's what they say about working with TechFlow.
            </p>
        </div>

        <div class="tf-testimonials-grid">
            <?php
            $testimonials = techflow_get_testimonials(6);

            $placeholders = [
                [
                    'name'    => 'Sarah Mitchell',
                    'role'    => 'CTO at HealthTrack',
                    'quote'   => 'TechFlow transformed our legacy system into a modern platform in just 6 weeks. The code quality is exceptional and the team communication was outstanding throughout the entire project.',
                    'rating'  => 5,
                    'project' => 'Patient Portal App',
                    'avatar'  => 'SM',
                    'color'   => '#7C3AED',
                ],
                [
                    'name'    => 'James Rodriguez',
                    'role'    => 'Founder at FlowCommerce',
                    'quote'   => 'Our conversion rate jumped 340% after TechFlow rebuilt our e-commerce platform. They didn\'t just build what we asked for — they challenged our assumptions and delivered something better.',
                    'rating'  => 5,
                    'project' => 'E-Commerce Platform',
                    'avatar'  => 'JR',
                    'color'   => '#06B6D4',
                ],
                [
                    'name'    => 'Emily Chen',
                    'role'    => 'VP Product at DataViz',
                    'quote'   => 'Working with TechFlow feels like having a senior engineering team in-house. They understand business goals, not just technical requirements. Highly recommend for any complex project.',
                    'rating'  => 5,
                    'project' => 'Analytics Dashboard',
                    'avatar'  => 'EC',
                    'color'   => '#10B981',
                ],
                [
                    'name'    => 'Marcus Thompson',
                    'role'    => 'CEO at BrandForge',
                    'quote'   => 'The WordPress theme they built for us is blazing fast — 98 on Lighthouse — and our SEO rankings jumped significantly within 3 months. Best investment we\'ve made in our digital presence.',
                    'rating'  => 5,
                    'project' => 'Brand Website',
                    'avatar'  => 'MT',
                    'color'   => '#F59E0B',
                ],
                [
                    'name'    => 'Lisa Park',
                    'role'    => 'Director at EduPlatform',
                    'quote'   => 'TechFlow delivered a complex LMS platform on time and under budget. Their attention to accessibility and UX details really set them apart from other agencies we\'ve worked with.',
                    'rating'  => 5,
                    'project' => 'Learning Platform',
                    'avatar'  => 'LP',
                    'color'   => '#EC4899',
                ],
                [
                    'name'    => 'David Kim',
                    'role'    => 'CTO at LogiChain',
                    'quote'   => 'Their API architecture handles 500K requests/day without breaking a sweat. The documentation is clean, the code is maintainable, and the team was a pleasure to work with.',
                    'rating'  => 5,
                    'project' => 'Logistics API',
                    'avatar'  => 'DK',
                    'color'   => '#7C3AED',
                ],
            ];

            if($testimonials->have_posts()):
                while($testimonials->have_posts()): $testimonials->the_post();
                    $name    = get_post_meta(get_the_ID(),'_tf_testimonial_name',   true);
                    $role    = get_post_meta(get_the_ID(),'_tf_testimonial_role',   true);
                    $rating  = get_post_meta(get_the_ID(),'_tf_testimonial_rating', true) ?: 5;
                    $project = get_post_meta(get_the_ID(),'_tf_testimonial_project',true);
                    $quote   = get_the_content();
            ?>
            <div class="tf-testimonial-card tf-card-glass tf-reveal">
                <div class="tf-testimonial-header">
                    <div class="tf-testimonial-avatar">
                        <?php if(has_post_thumbnail()): ?>
                            <?php the_post_thumbnail('tf-team-avatar',['class'=>'tf-avatar-img']); ?>
                        <?php else: ?>
                            <div class="tf-avatar-initials">
                                <?php echo esc_html(strtoupper(substr($name,0,2))); ?>
                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="tf-testimonial-meta">
                        <div class="tf-testimonial-name"><?php echo esc_html($name); ?></div>
                        <div class="tf-testimonial-role"><?php echo esc_html($role); ?></div>
                    </div>
                    <div class="tf-testimonial-quote-icon">"</div>
                </div>
                <?php echo techflow_stars($rating); ?>
                <p class="tf-testimonial-text"><?php echo esc_html($quote); ?></p>
                <?php if($project): ?>
                <div class="tf-testimonial-project">
                    <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M21 16V8a2 2 0 00-1-1.73l-7-4a2 2 0 00-2 0l-7 4A2 2 0 003 8v8a2 2 0 001 1.73l7 4a2 2 0 002 0l7-4A2 2 0 0021 16z"/>
                    </svg>
                    <?php echo esc_html($project); ?>
                </div>
                <?php endif; ?>
            </div>
            <?php endwhile; wp_reset_postdata();
            else:
                foreach($placeholders as $i => $t): ?>
            <div class="tf-testimonial-card tf-card-glass tf-reveal" style="transition-delay:<?php echo ($i % 3) * 0.1; ?>s">
                <div class="tf-testimonial-header">
                    <div class="tf-testimonial-avatar">
                        <div class="tf-avatar-initials" style="background:linear-gradient(135deg,<?php echo $t['color']; ?>,<?php echo $t['color']; ?>88)">
                            <?php echo $t['avatar']; ?>
                        </div>
                    </div>
                    <div class="tf-testimonial-meta">
                        <div class="tf-testimonial-name"><?php echo esc_html($t['name']); ?></div>
                        <div class="tf-testimonial-role"><?php echo esc_html($t['role']); ?></div>
                    </div>
                    <div class="tf-testimonial-quote-icon">"</div>
                </div>
                <?php echo techflow_stars($t['rating']); ?>
                <p class="tf-testimonial-text"><?php echo esc_html($t['quote']); ?></p>
                <div class="tf-testimonial-project">
                    <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M21 16V8a2 2 0 00-1-1.73l-7-4a2 2 0 00-2 0l-7 4A2 2 0 003 8v8a2 2 0 001 1.73l7 4a2 2 0 002 0l7-4A2 2 0 0021 16z"/>
                    </svg>
                    <?php echo esc_html($t['project']); ?>
                </div>
            </div>
            <?php endforeach; endif; ?>
        </div>

        <!-- Trust badges -->
        <div class="tf-trust-badges tf-reveal">
            <div class="tf-trust-badge">
                <span class="tf-trust-icon">⭐</span>
                <div>
                    <div class="tf-trust-num">4.9/5</div>
                    <div class="tf-trust-label">Average Rating</div>
                </div>
            </div>
            <div class="tf-trust-divider"></div>
            <div class="tf-trust-badge">
                <span class="tf-trust-icon">✅</span>
                <div>
                    <div class="tf-trust-num">150+</div>
                    <div class="tf-trust-label">Happy Clients</div>
                </div>
            </div>
            <div class="tf-trust-divider"></div>
            <div class="tf-trust-badge">
                <span class="tf-trust-icon">🔄</span>
                <div>
                    <div class="tf-trust-num">94%</div>
                    <div class="tf-trust-label">Client Retention</div>
                </div>
            </div>
            <div class="tf-trust-divider"></div>
            <div class="tf-trust-badge">
                <span class="tf-trust-icon">🏆</span>
                <div>
                    <div class="tf-trust-num">12+</div>
                    <div class="tf-trust-label">Industry Awards</div>
                </div>
            </div>
        </div>

    </div>
</section>

<!-- ============================================================
     8. CTA FINAL
============================================================ -->
<section class="tf-cta-final tf-section" id="contact">
    <div class="tf-grid-bg"></div>
    <div class="tf-orb tf-orb-purple" style="width:700px;height:700px;top:50%;left:50%;transform:translate(-50%,-50%);"></div>

    <div class="tf-container" style="position:relative;z-index:1;">
        <div class="tf-cta-final-inner tf-reveal">

            <div class="tf-cta-final-content">
                <span class="tf-badge tf-badge-green tf-badge-dot" style="margin-bottom:1.5rem;">
                    Open for Business
                </span>
                <h2 class="tf-display tf-cta-final-title">
                    Ready to Build<br>
                    <span class="tf-gradient-text">Something Great?</span>
                </h2>
                <p class="tf-body-lg tf-cta-final-desc">
                    Tell us about your project and we'll get back to you
                    within 24 hours with a free consultation and rough estimate.
                    No commitment required.
                </p>

                <!-- Inline form -->
                <form class="tf-cta-inline-form" id="tf-cta-form">
                    <?php wp_nonce_field('tf_nonce','tf_nonce_field'); ?>
                    <input type="hidden" name="action" value="tf_contact">
                    <div class="tf-cta-form-row">
                        <input type="text"
                               name="name"
                               class="tf-input"
                               placeholder="Your name"
                               required>
                        <input type="email"
                               name="email"
                               class="tf-input"
                               placeholder="your@email.com"
                               required>
                        <select name="service" class="tf-input">
                            <option value="">What do you need?</option>
                            <option>WordPress Development</option>
                            <option>Web Application</option>
                            <option>E-Commerce</option>
                            <option>API & Backend</option>
                            <option>UI/UX Design</option>
                            <option>Performance & SEO</option>
                            <option>Other</option>
                        </select>
                        <button type="submit" class="tf-btn tf-btn-primary tf-btn-lg">
                            <span>Get Free Consultation</span>
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                                <path d="M5 12h14M12 5l7 7-7 7"/>
                            </svg>
                        </button>
                    </div>
                    <div class="tf-cta-form-msg success" id="tf-cta-success">
                        ✅ Message sent! We'll be in touch within 24 hours.
                    </div>
                    <div class="tf-cta-form-msg error" id="tf-cta-error">
                        ❌ Something went wrong. Please try again.
                    </div>
                </form>

                <p class="tf-cta-final-note">
                    🔒 No spam &nbsp;·&nbsp; 100% Confidential &nbsp;·&nbsp;
                    Reply within 24hrs
                </p>
            </div>

            <!-- Right: info cards -->
            <div class="tf-cta-final-cards">
                <div class="tf-cta-info-card">
                    <div class="tf-cta-info-icon">💬</div>
                    <div class="tf-cta-info-title">Free Consultation</div>
                    <div class="tf-cta-info-desc">
                        30-minute call to discuss your project scope,
                        timeline, and budget — no strings attached.
                    </div>
                </div>
                <div class="tf-cta-info-card">
                    <div class="tf-cta-info-icon">📋</div>
                    <div class="tf-cta-info-title">Detailed Proposal</div>
                    <div class="tf-cta-info-desc">
                        We send a full project proposal with milestones,
                        deliverables, and transparent pricing within 48hrs.
                    </div>
                </div>
                <div class="tf-cta-info-card">
                    <div class="tf-cta-info-icon">🚀</div>
                    <div class="tf-cta-info-title">Kickoff in Days</div>
                    <div class="tf-cta-info-desc">
                        Once approved, we kick off within 3–5 business
                        days with a dedicated team assigned to your project.
                    </div>
                </div>
                <div class="tf-cta-contact-direct">
                    <span>Prefer to talk directly?</span>
                    <a href="mailto:hello@techflow.dev">hello@techflow.dev</a>
                    <a href="tel:+18005551234">+1 (800) 555-1234</a>
                </div>
            </div>

        </div>
    </div>
</section>

</main><!-- /#tf-main -->

<style>
/* ============================================================
   HERO
============================================================ */
.tf-hero {
    min-height: 100vh;
    display: flex;
    flex-direction: column;
    justify-content: center;
    position: relative;
    overflow: hidden;
    padding-block: 8rem 4rem;
}
.tf-hero-inner {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 4rem;
    align-items: center;
    position: relative;
    z-index: 1;
}
.tf-hero-badge    { margin-bottom: 1.5rem; }
.tf-hero-title    { margin-bottom: 1.25rem; }
.tf-hero-desc     { margin-bottom: 2rem; max-width: 480px; }

/* Hero stats */
.tf-hero-stats {
    display: flex;
    align-items: center;
    gap: 2rem;
    margin-bottom: 2.5rem;
    padding: 1.25rem 1.5rem;
    background: rgba(255,255,255,0.03);
    border: 1px solid var(--tf-border-subtle);
    border-radius: var(--tf-radius);
    width: fit-content;
}
.tf-hero-stat { text-align: center; }
.tf-hero-stat-num {
    font-family: var(--tf-font-display);
    font-size: 1.75rem;
    font-weight: 800;
    color: var(--tf-white);
    line-height: 1;
    display: block;
}
.tf-hero-stat-label {
    font-size: .75rem;
    color: var(--tf-gray-500);
    text-transform: uppercase;
    letter-spacing: .06em;
    margin-top: .25rem;
    display: block;
    white-space: nowrap;
}
.tf-hero-stat-divider {
    width: 1px;
    height: 36px;
    background: var(--tf-border-subtle);
}

/* Hero actions */
.tf-hero-actions {
    display: flex;
    gap: 1rem;
    flex-wrap: wrap;
    margin-bottom: 2.5rem;
}

/* Trusted by */
.tf-hero-trusted {
    display: flex;
    align-items: center;
    gap: 1.25rem;
    flex-wrap: wrap;
}
.tf-hero-trusted-label {
    font-size: .8rem;
    color: var(--tf-gray-500);
    white-space: nowrap;
}
.tf-hero-trusted-logos {
    display: flex;
    gap: 1.25rem;
    flex-wrap: wrap;
}
.tf-hero-trusted-logos span {
    font-size: .85rem;
    font-weight: 700;
    color: var(--tf-gray-600);
    letter-spacing: .04em;
    transition: color .2s;
}
.tf-hero-trusted-logos span:hover { color: var(--tf-gray-400); }

/* Terminal */
.tf-hero-terminal-col { position: relative; }
.tf-terminal {
    background: #0D1117;
    border: 1px solid rgba(255,255,255,0.08);
    border-radius: var(--tf-radius-lg);
    overflow: hidden;
    box-shadow: 0 32px 80px rgba(0,0,0,0.5),
                0 0 0 1px rgba(124,58,237,0.1),
                inset 0 1px 0 rgba(255,255,255,0.05);
}
.tf-terminal-header {
    display: flex;
    align-items: center;
    gap: 1rem;
    padding: .875rem 1.25rem;
    background: rgba(255,255,255,0.03);
    border-bottom: 1px solid rgba(255,255,255,0.06);
}
.tf-terminal-dots { display: flex; gap: .4rem; }
.tf-dot {
    width: 12px; height: 12px;
    border-radius: 50%;
}
.tf-dot-red    { background: #FF5F57; }
.tf-dot-yellow { background: #FEBC2E; }
.tf-dot-green  { background: #28C840; }
.tf-terminal-title {
    font-family: var(--tf-font-mono);
    font-size: .78rem;
    color: var(--tf-gray-500);
}
.tf-terminal-body { padding: 1.5rem; }
.tf-terminal-line {
    display: flex;
    align-items: center;
    gap: .5rem;
    margin-bottom: 1rem;
}
.tf-term-prompt {
    color: var(--tf-green);
    font-family: var(--tf-font-mono);
    font-weight: 700;
}
.tf-term-cmd {
    font-family: var(--tf-font-mono);
    font-size: .9rem;
    color: var(--tf-white);
}
.tf-term-cursor {
    color: var(--tf-accent);
    animation: tf-typing-cursor 1s infinite;
    font-family: var(--tf-font-mono);
}
.tf-terminal-output {
    display: flex;
    flex-direction: column;
    gap: .4rem;
    margin-bottom: 1.5rem;
}
.tf-term-out {
    font-family: var(--tf-font-mono);
    font-size: .82rem;
    color: var(--tf-gray-500);
    line-height: 1.5;
}
.tf-term-success { color: var(--tf-green);  }
.tf-term-info    { color: var(--tf-accent); }

/* Terminal metrics */
.tf-terminal-metrics {
    display: flex;
    flex-direction: column;
    gap: .6rem;
    padding-top: 1rem;
    border-top: 1px solid rgba(255,255,255,0.06);
}
.tf-term-metric {
    display: flex;
    align-items: center;
    gap: .75rem;
}
.tf-term-metric-label {
    font-family: var(--tf-font-mono);
    font-size: .75rem;
    color: var(--tf-gray-500);
    width: 90px;
    flex-shrink: 0;
}
.tf-term-metric-bar {
    flex: 1;
    height: 4px;
    background: rgba(255,255,255,0.06);
    border-radius: 2px;
    overflow: hidden;
}
.tf-term-metric-fill {
    height: 100%;
    border-radius: 2px;
    transition: width 1.5s var(--tf-ease);
}
.tf-term-metric-val {
    font-family: var(--tf-font-mono);
    font-size: .78rem;
    font-weight: 700;
    width: 28px;
    text-align: right;
}

/* Floating cards */
.tf-hero-float-card {
    position: absolute;
    display: flex;
    align-items: center;
    gap: .75rem;
    padding: .75rem 1.1rem;
    background: rgba(15,22,41,0.9);
    border: 1px solid var(--tf-border-subtle);
    border-radius: var(--tf-radius);
    backdrop-filter: blur(16px);
    font-size: .82rem;
    white-space: nowrap;
    z-index: 2;
}
.tf-hero-float-card span { font-size: 1.25rem; }
.tf-float-card-title {
    font-weight: 700;
    color: var(--tf-white);
    font-size: .82rem;
}
.tf-float-card-sub {
    color: var(--tf-gray-500);
    font-size: .75rem;
}
.tf-hero-float-1 {
    top: 10%;
    right: -20px;
    animation: tf-float 4s ease-in-out infinite;
}
.tf-hero-float-2 {
    bottom: 15%;
    left: -20px;
    animation: tf-float 5s ease-in-out infinite reverse;
}

/* Scroll indicator */
.tf-scroll-indicator {
    position: absolute;
    bottom: 2rem;
    left: 50%;
    transform: translateX(-50%);
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: .5rem;
    color: var(--tf-gray-500);
    font-size: .75rem;
    z-index: 1;
}
.tf-scroll-mouse {
    width: 22px; height: 34px;
    border: 2px solid var(--tf-border-subtle);
    border-radius: 11px;
    display: flex;
    justify-content: center;
    padding-top: 5px;
}
.tf-scroll-wheel {
    width: 3px; height: 6px;
    background: var(--tf-gray-500);
    border-radius: 2px;
    animation: tf-scroll-wheel 2s ease-in-out infinite;
}
@keyframes tf-scroll-wheel {
    0%   { opacity: 1; transform: translateY(0); }
    100% { opacity: 0; transform: translateY(8px); }
}

/* ============================================================
   METRICS STRIP
============================================================ */
.tf-metrics {
    background: var(--tf-bg-2);
    border-block: 1px solid var(--tf-border-subtle);
    padding-block: 3rem;
}
.tf-metrics-grid {
    display: grid;
    grid-template-columns: repeat(5,1fr);
    gap: 1rem;
}
.tf-metric-item {
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: .4rem;
    text-align: center;
    padding: 1.5rem 1rem;
    border-radius: var(--tf-radius);
    border: 1px solid transparent;
    transition: all .3s var(--tf-ease);
}
.tf-metric-item:hover {
    background: var(--tf-bg-card);
    border-color: var(--tf-border-subtle);
}
.tf-metric-icon { font-size: 1.5rem; }
.tf-metric-num {
    font-family: var(--tf-font-display);
    font-size: 2rem;
    font-weight: 800;
    line-height: 1;
}
.tf-metric-label {
    font-size: .8rem;
    color: var(--tf-gray-500);
    text-transform: uppercase;
    letter-spacing: .05em;
}

/* ============================================================
   SERVICES
============================================================ */
.tf-services { background: var(--tf-bg); }
.tf-services-grid {
    display: grid;
    grid-template-columns: repeat(3,1fr);
    gap: 1.5rem;
}
.tf-service-card {
    padding: 2rem;
    position: relative;
    overflow: hidden;
}
.tf-service-card-glow {
    position: absolute;
    top: 0; left: 0;
    right: 0; height: 1px;
    background: linear-gradient(90deg,
        transparent,
        var(--service-color),
        transparent
    );
    opacity: 0;
    transition: opacity .3s;
}
.tf-service-card:hover .tf-service-card-glow { opacity: 1; }
.tf-service-card:hover {
    border-color: color-mix(in srgb, var(--service-color) 40%, transparent);
}
.tf-service-icon {
    width: 52px; height: 52px;
    background: rgba(255,255,255,0.04);
    border: 1px solid var(--tf-border-subtle);
    border-radius: var(--tf-radius-sm);
    display: flex;
    align-items: center;
    justify-content: center;
    margin-bottom: 1.25rem;
    transition: all .3s;
}
.tf-service-card:hover .tf-service-icon {
    background: color-mix(in srgb, var(--service-color) 15%, transparent);
    border-color: color-mix(in srgb, var(--service-color) 40%, transparent);
}
.tf-service-title {
    font-family: var(--tf-font-display);
    font-size: 1.1rem;
    font-weight: 700;
    color: var(--tf-white);
    margin-bottom: .6rem;
}
.tf-service-desc {
    font-size: .875rem;
    color: var(--tf-gray-500);
    line-height: 1.7;
    margin-bottom: 1.25rem;
}
.tf-service-tags { margin-bottom: 1rem; }
.tf-service-result {
    display: flex;
    align-items: center;
    gap: .5rem;
    font-size: .78rem;
    font-weight: 600;
    color: var(--tf-gray-400);
    margin-bottom: 1.25rem;
}
.tf-service-result-dot {
    width: 6px; height: 6px;
    border-radius: 50%;
    flex-shrink: 0;
}
.tf-service-link {
    display: inline-flex;
    align-items: center;
    gap: .4rem;
    font-size: .85rem;
    font-weight: 600;
    color: var(--tf-gray-500);
    text-decoration: none;
    transition: all .2s;
}
.tf-service-card:hover .tf-service-link {
    color: var(--tf-white);
    gap: .6rem;
}
.tf-services-footer {
    text-align: center;
    margin-top: 3rem;
    padding-top: 2.5rem;
    border-top: 1px solid var(--tf-border-subtle);
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 1.5rem;
}
.tf-services-footer p { color: var(--tf-gray-500); }

/* ============================================================
   FEATURED WORK
============================================================ */
.tf-work { background: var(--tf-bg-2); }
.tf-work-grid {
    display: grid;
    grid-template-columns: repeat(3,1fr);
    gap: 1.5rem;
}
.tf-work-card {
    background: var(--tf-bg-card);
    border: 1px solid var(--tf-border-subtle);
    border-radius: var(--tf-radius-lg);
    overflow: hidden;
    transition: all .3s var(--tf-ease);
}
.tf-work-card:hover {
    transform: translateY(-6px);
    border-color: color-mix(in srgb, var(--work-color,#7C3AED) 40%, transparent);
    box-shadow: 0 24px 60px rgba(0,0,0,0.4);
}
.tf-work-card-image {
    position: relative;
    height: 220px;
    overflow: hidden;
}
.tf-work-thumb {
    width: 100%; height: 100%;
    object-fit: cover;
    transition: transform .4s var(--tf-ease);
}
.tf-work-card:hover .tf-work-thumb { transform: scale(1.05); }
.tf-work-thumb-placeholder {
    width: 100%; height: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
}
.tf-work-card-overlay {
    position: absolute;
    inset: 0;
    background: rgba(5,7,15,0.85);
    display: flex;
    align-items: center;
    justify-content: center;
    opacity: 0;
    transition: opacity .3s var(--tf-ease);
}
.tf-work-card:hover .tf-work-card-overlay { opacity: 1; }
.tf-work-card-category {
    position: absolute;
    top: 1rem; left: 1rem;
    background: rgba(5,7,15,0.8);
    backdrop-filter: blur(8px);
    color: var(--tf-gray-400);
    font-size: .72rem;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: .07em;
    padding: .3rem .75rem;
    border-radius: 50px;
    border: 1px solid var(--tf-border-subtle);
}
.tf-work-card-body { padding: 1.5rem; }
.tf-work-card-meta {
    display: flex;
    justify-content: space-between;
    margin-bottom: .5rem;
}
.tf-work-client {
    font-size: .78rem;
    font-weight: 600;
    color: var(--tf-gray-500);
    text-transform: uppercase;
    letter-spacing: .05em;
}
.tf-work-year {
    font-size: .78rem;
    color: var(--tf-gray-600);
}
.tf-work-title {
    font-family: var(--tf-font-display);
    font-size: 1.1rem;
    font-weight: 700;
    color: var(--tf-white);
    margin-bottom: .75rem;
}
.tf-work-title a {
    color: inherit;
    text-decoration: none;
    transition: color .2s;
}
.tf-work-title a:hover { color: var(--tf-primary-light); }
.tf-work-result {
    display: flex;
    align-items: center;
    gap: .4rem;
    font-size: .82rem;
    font-weight: 700;
    margin-bottom: .75rem;
}
.tf-work-footer {
    text-align: center;
    margin-top: 3rem;
}

/* ============================================================
   TECH STACK
============================================================ */
.tf-techstack { background: var(--tf-bg); }
.tf-stack-categories {
    display: grid;
    grid-template-columns: repeat(4,1fr);
    gap: 1.5rem;
}
.tf-stack-category {
    background: var(--tf-bg-card);
    border: 1px solid var(--tf-border-subtle);
    border-radius: var(--tf-radius-lg);
    padding: 1.5rem;
    transition: all .3s;
}
.tf-stack-category:hover {
    border-color: var(--tf-border);
    transform: translateY(-3px);
}
.tf-stack-cat-header {
    display: flex;
    align-items: center;
    gap: .6rem;
    margin-bottom: 1.25rem;
    padding-bottom: 1rem;
    border-bottom: 1px solid var(--tf-border-subtle);
}
.tf-stack-cat-dot {
    width: 8px; height: 8px;
    border-radius: 50%;
    flex-shrink: 0;
}
.tf-stack-cat-label {
    font-size: .78rem;
    font-weight: 700;
    color: var(--tf-gray-400);
    text-transform: uppercase;
    letter-spacing: .08em;
}
.tf-stack-tech-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: .5rem;
}
.tf-tech-item {
    display: flex;
    align-items: center;
    gap: .5rem;
    padding: .5rem .6rem;
    border-radius: var(--tf-radius-sm);
    transition: background .2s;
    cursor: default;
}
.tf-tech-item:hover {
    background: rgba(255,255,255,0.04);
}
.tf-tech-emoji { font-size: 1rem; flex-shrink: 0; }
.tf-tech-name {
    font-size: .8rem;
    font-weight: 500;
    color: var(--tf-gray-400);
    transition: color .2s;
}
.tf-tech-item:hover .tf-tech-name { color: var(--tf-white); }

/* ============================================================
   PROCESS
============================================================ */
.tf-process { background: var(--tf-bg-2); }
.tf-process-timeline {
    display: flex;
    flex-direction: column;
    gap: 0;
    max-width: 860px;
    margin-inline: auto;
}
.tf-process-step {
    display: grid;
    grid-template-columns: 80px 1fr;
    gap: 2rem;
    position: relative;
}
.tf-process-step-left {
    display: flex;
    flex-direction: column;
    align-items: center;
}
.tf-process-num {
    width: 56px; height: 56px;
    border: 2px solid;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-family: var(--tf-font-mono);
    font-size: .9rem;
    font-weight: 700;
    background: var(--tf-bg-2);
    flex-shrink: 0;
    z-index: 1;
}
.tf-process-connector {
    width: 2px;
    flex: 1;
    min-height: 2rem;
    background: linear-gradient(to bottom,
        var(--connector-color),
        transparent
    );
    opacity: .3;
    margin-block: .5rem;
}
.tf-process-step-card {
    margin-bottom: 2rem;
    padding: 1.75rem;
}
.tf-process-step-card:hover {
    border-color: color-mix(in srgb, var(--step-color) 40%, transparent);
}
.tf-process-step-header {
    display: flex;
    align-items: flex-start;
    gap: 1rem;
    margin-bottom: 1rem;
}
.tf-process-icon {
    width: 44px; height: 44px;
    border-radius: var(--tf-radius-sm);
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.25rem;
    flex-shrink: 0;
}
.tf-process-time {
    font-size: .75rem;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: .08em;
    margin-bottom: .25rem;
}
.tf-process-title {
    font-family: var(--tf-font-display);
    font-size: 1.15rem;
    font-weight: 700;
    color: var(--tf-white);
}
.tf-process-desc {
    color: var(--tf-gray-500);
    font-size: .9rem;
    line-height: 1.75;
    margin-bottom: 1rem;
}
.tf-process-tags {
    display: flex;
    flex-wrap: wrap;
    gap: .4rem;
}
.tf-process-tag {
    font-size: .73rem;
    font-weight: 600;
    padding: .2rem .65rem;
    border-radius: 50px;
    border: 1px solid;
    letter-spacing: .04em;
}

/* ============================================================
   TESTIMONIALS
============================================================ */
.tf-testimonials {
    background: var(--tf-bg);
    position: relative;
    overflow: hidden;
}
.tf-testimonials-grid {
    display: grid;
    grid-template-columns: repeat(3,1fr);
    gap: 1.5rem;
    margin-bottom: 3rem;
}
.tf-testimonial-card {
    padding: 1.75rem;
    border-radius: var(--tf-radius-lg);
    transition: all .3s var(--tf-ease);
}
.tf-testimonial-card:hover {
    transform: translateY(-4px);
    border-color: var(--tf-border);
}
.tf-testimonial-header {
    display: flex;
    align-items: center;
    gap: 1rem;
    margin-bottom: 1rem;
}
.tf-testimonial-avatar {
    width: 44px; height: 44px;
    border-radius: 50%;
    overflow: hidden;
    flex-shrink: 0;
}
.tf-avatar-img {
    width: 100%; height: 100%;
    object-fit: cover;
}
.tf-avatar-initials {
    width: 100%; height: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
    background: linear-gradient(135deg, var(--tf-primary), var(--tf-accent));
    color: var(--tf-white);
    font-size: .85rem;
    font-weight: 700;
}
.tf-testimonial-meta { flex: 1; }
.tf-testimonial-name {
    font-weight: 700;
    color: var(--tf-white);
    font-size: .9rem;
}
.tf-testimonial-role {
    font-size: .78rem;
    color: var(--tf-gray-500);
    margin-top: .15rem;
}
.tf-testimonial-quote-icon {
    font-family: Georgia, serif;
    font-size: 2.5rem;
    color: var(--tf-primary);
    line-height: 1;
    opacity: .4;
}
.tf-stars { margin-bottom: .85rem; }
.tf-testimonial-text {
    font-size: .9rem;
    color: var(--tf-gray-400);
    line-height: 1.75;
    margin-bottom: 1rem;
}
.tf-testimonial-project {
    display: flex;
    align-items: center;
    gap: .4rem;
    font-size: .75rem;
    font-weight: 600;
    color: var(--tf-gray-600);
    text-transform: uppercase;
    letter-spacing: .05em;
}

/* Trust badges */
.tf-trust-badges {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 3rem;
    padding: 2rem 3rem;
    background: var(--tf-bg-card);
    border: 1px solid var(--tf-border-subtle);
    border-radius: var(--tf-radius-xl);
    flex-wrap: wrap;
}
.tf-trust-badge {
    display: flex;
    align-items: center;
    gap: .75rem;
}
.tf-trust-icon { font-size: 1.5rem; }
.tf-trust-num {
    font-family: var(--tf-font-display);
    font-size: 1.5rem;
    font-weight: 800;
    color: var(--tf-white);
    line-height: 1;
}
.tf-trust-label {
    font-size: .75rem;
    color: var(--tf-gray-500);
    text-transform: uppercase;
    letter-spacing: .05em;
    margin-top: .2rem;
}
.tf-trust-divider {
    width: 1px;
    height: 40px;
    background: var(--tf-border-subtle);
}

/* ============================================================
   CTA FINAL
============================================================ */
.tf-cta-final {
    background: var(--tf-bg-2);
    position: relative;
    overflow: hidden;
}
.tf-cta-final-inner {
    display: grid;
    grid-template-columns: 1.2fr 1fr;
    gap: 5rem;
    align-items: start;
}
.tf-cta-final-title {
    margin-bottom: 1.25rem;
    font-size: clamp(2.5rem,5vw,4rem);
}
.tf-cta-final-desc {
    margin-bottom: 2rem;
    max-width: 520px;
}
.tf-cta-inline-form { margin-bottom: 1rem; }
.tf-cta-form-row {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: .75rem;
}
.tf-cta-form-row .tf-btn {
    grid-column: 1 / -1;
    justify-content: center;
}
.tf-cta-form-msg {
    display: none;
    padding: .85rem 1.1rem;
    border-radius: var(--tf-radius-sm);
    font-size: .875rem;
    font-weight: 600;
    margin-top: .75rem;
}
.tf-cta-form-msg.success {
    background: rgba(16,185,129,0.1);
    border: 1px solid rgba(16,185,129,0.3);
    color: var(--tf-green);
}
.tf-cta-form-msg.error {
    background: rgba(239,68,68,0.1);
    border: 1px solid rgba(239,68,68,0.3);
    color: var(--tf-red);
}
.tf-cta-final-note {
    font-size: .8rem;
    color: var(--tf-gray-600);
}
.tf-cta-final-cards {
    display: flex;
    flex-direction: column;
    gap: 1rem;
}
.tf-cta-info-card {
    background: var(--tf-bg-card);
    border: 1px solid var(--tf-border-subtle);
    border-radius: var(--tf-radius);
    padding: 1.25rem 1.5rem;
    transition: all .3s;
}
.tf-cta-info-card:hover {
    border-color: var(--tf-border);
    transform: translateX(4px);
}
.tf-cta-info-icon {
    font-size: 1.5rem;
    margin-bottom: .5rem;
}
.tf-cta-info-title {
    font-weight: 700;
    color: var(--tf-white);
    font-size: .95rem;
    margin-bottom: .35rem;
}
.tf-cta-info-desc {
    font-size: .85rem;
    color: var(--tf-gray-500);
    line-height: 1.6;
}
.tf-cta-contact-direct {
    display: flex;
    flex-direction: column;
    gap: .4rem;
    padding: 1rem 1.5rem;
    background: rgba(124,58,237,0.06);
    border: 1px solid var(--tf-border);
    border-radius: var(--tf-radius);
    font-size: .85rem;
}
.tf-cta-contact-direct span {
    color: var(--tf-gray-500);
    font-size: .78rem;
    text-transform: uppercase;
    letter-spacing: .06em;
    font-weight: 600;
}
.tf-cta-contact-direct a {
    color: var(--tf-primary-light);
    text-decoration: none;
    font-weight: 600;
    transition: color .2s;
}
.tf-cta-contact-direct a:hover { color: var(--tf-accent); }

/* ============================================================
   RESPONSIVE
============================================================ */
@media (max-width: 1200px) {
    .tf-metrics-grid    { grid-template-columns: repeat(3,1fr); }
    .tf-stack-categories{ grid-template-columns: repeat(2,1fr); }
}
@media (max-width: 1024px) {
    .tf-hero-inner      { grid-template-columns: 1fr; }
    .tf-hero-terminal-col { display: none; }
    .tf-services-grid   { grid-template-columns: repeat(2,1fr); }
    .tf-work-grid       { grid-template-columns: repeat(2,1fr); }
    .tf-testimonials-grid{ grid-template-columns: repeat(2,1fr); }
    .tf-cta-final-inner { grid-template-columns: 1fr; gap: 3rem; }
}
@media (max-width: 768px) {
    .tf-metrics-grid    { grid-template-columns: repeat(2,1fr); }
    .tf-services-grid   { grid-template-columns: 1fr; }
    .tf-work-grid       { grid-template-columns: 1fr; }
    .tf-stack-categories{ grid-template-columns: 1fr; }
    .tf-testimonials-grid{ grid-template-columns: 1fr; }
    .tf-process-step    { grid-template-columns: 50px 1fr; gap: 1rem; }
    .tf-trust-badges    { gap: 1.5rem; padding: 1.5rem; }
    .tf-cta-form-row    { grid-template-columns: 1fr; }
    .tf-hero-stats      { gap: 1rem; padding: 1rem; }
}
@media (max-width: 480px) {
    .tf-metrics-grid    { grid-template-columns: 1fr 1fr; }
    .tf-hero-actions    { flex-direction: column; }
    .tf-trust-badges    { flex-direction: column; gap: 1.25rem; }
    .tf-trust-divider   { width: 40px; height: 1px; }
}
</style>

<script>
(function(){
'use strict';

/* ── Counter animation ─────────────────────────────────── */
function animateCounter(el, target, duration){
    let start = 0;
    const step = timestamp => {
        if(!start) start = timestamp;
        const progress = Math.min((timestamp - start) / duration, 1);
        el.textContent = Math.floor(progress * target);
        if(progress < 1) requestAnimationFrame(step);
        else el.textContent = target;
    };
    requestAnimationFrame(step);
}

const counterEls = document.querySelectorAll('[data-count]');
if('IntersectionObserver' in window && counterEls.length){
    const io = new IntersectionObserver(entries => {
        entries.forEach(e => {
            if(e.isIntersecting){
                animateCounter(e.target, parseInt(e.target.dataset.count), 1800);
                io.unobserve(e.target);
            }
        });
    },{ threshold: 0.5 });
    counterEls.forEach(el => io.observe(el));
}

/* ── Terminal metrics animate on load ──────────────────── */
setTimeout(()=>{
    document.querySelectorAll('.tf-term-metric-fill').forEach(bar => {
        const w = bar.style.width;
        bar.style.width = '0%';
        setTimeout(() => { bar.style.width = w; }, 100);
    });
}, 1500);

/* ── CTA Form AJAX ─────────────────────────────────────── */
const ctaForm   = document.getElementById('tf-cta-form');
const ctaOk     = document.getElementById('tf-cta-success');
const ctaErr    = document.getElementById('tf-cta-error');

if(ctaForm){
    ctaForm.addEventListener('submit', function(e){
        e.preventDefault();
        ctaOk.style.display = 'none';
        ctaErr.style.display = 'none';

        const btn = ctaForm.querySelector('button[type="submit"]');
        const name  = ctaForm.querySelector('[name="name"]').value.trim();
        const email = ctaForm.querySelector('[name="email"]').value.trim();

        if(!name || !email){
            ctaErr.textContent = '⚠️ Please fill in your name and email.';
            ctaErr.style.display = 'block';
            return;
        }

        btn.disabled = true;
        btn.querySelector('span').textContent = 'Sending...';

        fetch('<?php echo esc_url(admin_url("admin-ajax.php")); ?>', {
            method: 'POST',
            body: new FormData(ctaForm),
            credentials: 'same-origin',
        })
        .then(r => r.json())
        .then(res => {
            if(res.success){
                ctaOk.style.display = 'block';
                ctaForm.reset();
            } else {
                ctaErr.textContent = res.data || 'Something went wrong.';
                ctaErr.style.display = 'block';
            }
        })
        .catch(()=>{ ctaErr.style.display = 'block'; })
        .finally(()=>{
            btn.disabled = false;
            btn.querySelector('span').textContent = 'Get Free Consultation';
        });
    });
}

})();
</script>

<?php get_footer(); ?>
