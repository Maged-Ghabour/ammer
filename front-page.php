<?php
/**
 * Template Name: Front Page
 */
get_header(); ?>

<!-- Main Content -->
<main class="hero container" style="position: relative; overflow: visible;">
    <div class="bg-blob blob-1"></div>
    <div class="bg-blob blob-2"></div>
    <div class="hero-grid">
        <!-- Right Column (Title and Form) -->
        <div class="hero-title-wrapper">
            <h1 class="hero-title"><?php echo get_field('hero_title') ? get_field('hero_title') : 'ابتسامتك تبدأ من هنا<br>مع عامر'; ?></h1>
        </div>

        <div class="hero-content">
            <p><?php echo get_field('hero_subtitle') ? get_field('hero_subtitle') : 'نقدم لك أحدث التقنيات في عالم طب وتجميل الأسنان لنمنحك الابتسامة التي تستحقها بلمسة فنية وخبرة طبية لا تضاهى.'; ?></p>
            <div class="hero-buttons">
                <a href="#services" class="btn btn-outline">خدماتنا</a>
                <a href="<?php echo esc_url(get_whatsapp_url()); ?>" class="btn btn-primary" target="_blank">تواصل معنا</a>
            </div>
        </div>

        <!-- Booking Area -->
        <div class="hero-booking" id="booking">
            <h3 class="booking-title"><?php echo get_field('booking_title') ? get_field('booking_title') : 'احجز موعدك الآن'; ?></h3>
            <form action="#" method="POST" class="booking-form">
                <input type="text" name="name" class="form-control" placeholder="الاسم الكريم" required>
                <input type="tel" name="phone" class="form-control" placeholder="رقم الجوال" required>
                <div class="input-icon-wrapper">
                    <span class="icon">
                        <svg viewBox="0 0 24 24" width="18" height="18" stroke="currentColor" stroke-width="2" fill="none"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>
                    </span>
                    <input type="date" name="date" class="form-control" placeholder="تاريخ الموعد" required>
                </div>
                <div class="input-icon-wrapper">
                    <span class="icon">
                        <svg viewBox="0 0 24 24" width="18" height="18" stroke="currentColor" stroke-width="2" fill="none"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg>
                    </span>
                    <input type="time" name="time" class="form-control" placeholder="الوقت المفضل" required>
                </div>
                <button type="submit" class="btn btn-primary btn-block">تأكيد الحجز</button>
            </form>
        </div>

        <!-- Hero Image Area -->
        <div class="hero-image">
            <?php 
            $hero_image = get_field('hero_image');
            if($hero_image): ?>
                <img src="<?php echo esc_url($hero_image); ?>" alt="Hero Image">
            <?php else: ?>
                <img src="<?php echo get_template_directory_uri(); ?>/assets/hero.png" alt="عيادة أسنان - د. عامر الريمي">
            <?php endif; ?>
        </div>
    </div>
</main>

<!-- Services Section -->
<section class="services-section container" id="services">
    <div class="services-header">
        <div>
            <h2 class="section-title"><?php echo get_field('services_title') ? get_field('services_title') : 'خدماتنا المميزة'; ?></h2>
            <p class="section-subtitle"><?php echo get_field('services_subtitle') ? get_field('services_subtitle') : 'نقدم مجموعة شاملة من خدمات طب وتجميل الأسنان...'; ?></p>
        </div>
        <div class="services-arrows">
            <a href="#" class="view-more-link">عرض كل الخدمات</a>
        </div>
    </div>

    <div class="services-grid">
        <?php 
        $services_query = new WP_Query(array(
            'post_type' => 'service',
            'posts_per_page' => -1,
            'post_status' => 'publish'
        ));

        if( $services_query->have_posts() ): 
            while( $services_query->have_posts() ) : $services_query->the_post();
                $icon = get_the_post_thumbnail_url(get_the_ID(), 'full');
                $title = get_the_title();
                $description = get_the_content();
            ?>
            <div class="service-card">
                <div class="card-bg-icon">
                    <img loading="lazy" src="<?php echo get_template_directory_uri(); ?>/assets/bg1.png" alt="">
                </div>
                <div class="card-icon">
                    <?php if($icon): ?>
                    <img loading="lazy" src="<?php echo esc_url($icon); ?>" alt="">
                    <?php else: ?>
                    <img loading="lazy" src="<?php echo get_template_directory_uri(); ?>/assets/icon1.png" alt="">
                    <?php endif; ?>
                </div>
                <div class="card-content">
                    <h4 class="card-title"><?php echo esc_html($title); ?></h4>
                    <p class="card-desc"><?php echo wp_strip_all_tags($description); ?></p>
                </div>
            </div>
            <?php endwhile; wp_reset_postdata(); ?>
        <?php else: ?>
            <p style="text-align: center; width: 100%; grid-column: 1 / -1;">يرجى إضافة الخدمات من لوحة التحكم.</p>
        <?php endif; ?>
    </div>
</section>

<!-- Trust Section -->
<section class="trust-section">
    <div class="container trust-grid">
        <div class="trust-content">
            <h2 class="trust-title"><?php echo get_field('trust_title') ? get_field('trust_title') : 'ليش تختار د.عامر الريمي؟'; ?></h2>
            <p class="trust-desc"><?php echo get_field('trust_desc') ? get_field('trust_desc') : 'نحن نفهم أن زيارة طبيب الأسنان قد تكون مقلقة للبعض، لذلك صممنا عيادتنا لتكون بيئة مريحة...'; ?></p>
        </div>
        <div class="trust-image">
            <?php 
            $trust_image = get_field('trust_image');
            if($trust_image): ?>
                <img loading="lazy" src="<?php echo esc_url($trust_image); ?>" alt="Trust Image">
            <?php else: ?>
                <img loading="lazy" src="<?php echo get_template_directory_uri(); ?>/assets/numbers.png" alt="عيادة طب الأسنان">
            <?php endif; ?>
        </div>
        
        <div class="trust-stats-wrapper">
            <div class="trust-stats">
                <?php 
                if( have_rows('trust_stats_list') ): 
                    while( have_rows('trust_stats_list') ) : the_row();
                        $label = get_sub_field('label');
                        $number = get_sub_field('number');
                        if(!$number) continue;
                    ?>
                    <div class="stat-item">
                        <span class="stat-number"><?php echo esc_html($number); ?></span>
                        <span class="stat-label"><?php echo esc_html($label); ?></span>
                    </div>
                    <?php endwhile; ?>
                <?php else: ?>
                    <div class="stat-item">
                        <span class="stat-number">99%</span>
                        <span class="stat-label">نسبة الرضا</span>
                    </div>
                    <div class="stat-item">
                        <span class="stat-number">+15</span>
                        <span class="stat-label">سنة خبرة</span>
                    </div>
                    <div class="stat-item">
                        <span class="stat-number">+5000</span>
                        <span class="stat-label">ابتسامة جديدة</span>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>



<!-- Before/After Section -->
    <section class="before-after-section container">
        <div class="ba-header">
            <h2 class="section-title"><?php echo get_field('ba_title') ? get_field('ba_title') : 'شاهد الفرق الحقيقي'; ?></h2>
            <p class="section-subtitle"><?php echo get_field('ba_subtitle') ? nl2br(get_field('ba_subtitle')) : 'نتائج حقيقية تمنحك<br>ابتسامة أكثر جمالاً وثقة.'; ?></p>
        </div>

        <?php
        $cases_query = new WP_Query(array(
            'post_type' => 'case',
            'posts_per_page' => -1,
            'post_status' => 'publish'
        ));

        if ($cases_query->have_posts()) :
            $first_case = true;
            $first_before = '';
            $first_after = '';
            $thumbnails_html = '';

            while ($cases_query->have_posts()) : $cases_query->the_post();
                $before_img = get_field('before_image');
                $after_img = get_field('after_image');

                if (!$before_img) $before_img = get_template_directory_uri() . '/assets/before1.png';
                if (!$after_img) $after_img = get_template_directory_uri() . '/assets/after1.png';

                if ($first_case) {
                    $first_before = $before_img;
                    $first_after = $after_img;
                    $first_case = false;
                    $thumbnails_html .= '<div class="thumbnail active" data-before="'.esc_url($before_img).'" data-after="'.esc_url($after_img).'">
                        <img loading="lazy" src="'.esc_url($after_img).'" alt="'.esc_attr(get_the_title()).'">
                    </div>';
                } else {
                    $thumbnails_html .= '<div class="thumbnail" data-before="'.esc_url($before_img).'" data-after="'.esc_url($after_img).'">
                        <img loading="lazy" src="'.esc_url($after_img).'" alt="'.esc_attr(get_the_title()).'">
                    </div>';
                }
            endwhile;
        ?>

        <div class="ba-container" id="ba-container">
            <div class="ba-img ba-after" id="ba-after-layer" style="background-image: url('<?php echo esc_url($first_before); ?>');"></div>
            <div class="ba-img ba-before" id="ba-before-layer" style="background-image: url('<?php echo esc_url($first_after); ?>'); width: 50%;"></div>
            <div class="ba-slider-handle" id="ba-handle" style="left: 50%;">
                <div class="handle-arrows">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="15 18 9 12 15 6"></polyline></svg>
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="9 18 15 12 9 6"></polyline></svg>
                </div>
            </div>
        </div>

        <div class="ba-thumbnails">
            <?php echo $thumbnails_html; ?>
        </div>

        <?php else : ?>
            <p style="text-align: center; margin: 40px auto; font-size: 1.2rem; color: #64748b;">لا توجد حالات مضافة حالياً.</p>
        <?php endif; wp_reset_postdata(); ?>

        <div class="ba-action">
            <a href="#" class="view-more-link">رؤية المزيد ....</a>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section class="testimonials-section container">
        <div class="testimonials-grid">
            <!-- Right Column: Info -->
            <div class="testimonials-info">
                <div class="info-content">
                    <h2 class="section-title"><?php echo get_field('testimonials_title') ? get_field('testimonials_title') : 'ماذا يقول مرضانا؟'; ?></h2>
                    <p class="section-subtitle"><?php echo get_field('testimonials_subtitle') ? nl2br(get_field('testimonials_subtitle')) : 'قصص حقيقية من المرضى<br>الذين أعادوا اكتشاف ابتسامتهم'; ?></p>
                </div>

                <div class="testimonials-controls">
                    <button class="control-btn">
                        <svg viewBox="0 0 24 24">
                            <polyline points="6 9 12 15 18 9"></polyline>
                        </svg>
                    </button>
                    <button class="control-btn">
                        <svg viewBox="0 0 24 24">
                            <polyline points="18 15 12 9 6 15"></polyline>
                        </svg>
                    </button>
                </div>
            </div>

            <!-- Left Column: List -->
            <div class="testimonials-list">
                <?php
                $testimonials_query = new WP_Query(array(
                    'post_type'      => 'testimonial',
                    'posts_per_page' => -1,
                ));

                if ( $testimonials_query->have_posts() ) :
                    while ( $testimonials_query->have_posts() ) : $testimonials_query->the_post();
                        $rating = get_field('rating') ?: 5;
                        ?>
                        <div class="testimonial-card">
                            <div class="card-top">
                                <div class="user-meta">
                                    <?php if (has_post_thumbnail()) : ?>
                                        <div class="avatar" style="background-image: url('<?php echo esc_url(get_the_post_thumbnail_url(null, 'thumbnail')); ?>'); background-size: cover; background-position: center;"></div>
                                    <?php else : ?>
                                        <div class="avatar"></div>
                                    <?php endif; ?>
                                    <span class="name"><?php the_title(); ?></span>
                                </div>
                                <div class="rating-stars">
                                    <?php for($i=1; $i<=5; $i++): ?>
                                        <svg viewBox="0 0 24 24" fill="<?php echo ($i <= $rating) ? '#facc15' : '#e2e8f0'; ?>" stroke="none" style="width: 20px; height: 20px;">
                                            <polygon
                                                points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2">
                                            </polygon>
                                        </svg>
                                    <?php endfor; ?>
                                </div>
                            </div>
                            <p class="review-text"><?php echo esc_html(strip_tags(get_the_content())); ?></p>
                        </div>
                        <?php
                    endwhile;
                    wp_reset_postdata();
                else :
                    echo '<p style="text-align: center; margin: 40px auto; font-size: 1.2rem; color: #64748b;">لا توجد آراء مضافة حالياً.</p>';
                endif;
                ?>
            </div>
        </div>
    </section>

    <!-- Blog Section -->
    <section class="blog-section container">
        <div class="blog-header">
            <h2 class="section-title"><?php echo get_field('blog_title') ? get_field('blog_title') : 'من مكتب طبيب الأسنان'; ?></h2>
            <p class="section-subtitle"><?php echo get_field('blog_subtitle') ? nl2br(get_field('blog_subtitle')) : 'نشارككم نصائح ومعلومات تساعدكم<br>في الحفاظ على صحة أسنانكم.'; ?></p>
        </div>

        <div class="blog-grid">
            <?php 
            $blog_args = array(
                'post_type'      => 'post',
                'posts_per_page' => 3,
                'post_status'    => 'publish'
            );
            $blog_query = new WP_Query($blog_args);
            
            if ( $blog_query->have_posts() ) :
                while ( $blog_query->have_posts() ) : $blog_query->the_post(); 
                    $thumb_url = get_the_post_thumbnail_url(get_the_ID(), 'large');
                    if (!$thumb_url) {
                        $thumb_url = get_template_directory_uri() . '/assets/blog1.png';
                    }
            ?>
            <article class="blog-card">
                <a href="<?php echo esc_url(get_permalink()); ?>" style="text-decoration: none; color: inherit; display: block;">
                    <div class="blog-image">
                        <img loading="lazy" src="<?php echo esc_url($thumb_url); ?>" alt="<?php echo esc_attr(get_the_title()); ?>">
                    </div>
                    <div class="blog-content">
                        <h3 class="blog-title"><?php the_title(); ?></h3>
                        <span class="blog-date"><?php echo get_the_date(); ?></span>
                    </div>
                </a>
            </article>
            <?php 
                endwhile;
                wp_reset_postdata();
            else : 
            ?>
                <p style="text-align: center; width: 100%; grid-column: 1 / -1;">لا توجد مقالات حالياً.</p>
            <?php endif; ?>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="cta-section container">
        <div class="cta-box">
            <h2 class="cta-title"><?php echo get_field('cta_title') ? get_field('cta_title') : 'جاهز لابتسامة أكثر ثقة؟'; ?></h2>
            <p class="cta-subtitle"><?php echo get_field('cta_subtitle') ? nl2br(get_field('cta_subtitle')) : 'احجز موعدك اليوم واستمتع بخدمة طبية متكاملة تناسب احتياجاتك.'; ?></p>
            <a href="<?php echo esc_url(get_whatsapp_url()); ?>" class="btn btn-white" target="_blank">احجز موعد الآن</a>
        </div>
    </section>

    <!-- FAQ Section -->
    <section class="faq-section container">
        <div class="faq-grid">
            <!-- Right Column: Info -->
            <div class="faq-info">
                <h2 class="section-title"><?php echo get_field('faq_title') ? nl2br(get_field('faq_title')) : 'إجابات على أسئلتك<br>المتعلقة بالعناية<br>بالأسنان'; ?></h2>
                <p class="section-subtitle"><?php echo get_field('faq_subtitle') ? nl2br(get_field('faq_subtitle')) : 'تعرف على أهم المعلومات والإجابات الشائعة حول<br>خدمات الأسنان.'; ?></p>
            </div>

            <!-- Left Column: Accordion -->
            <div class="faq-accordion">
                <?php
                $faq_query = new WP_Query(array(
                    'post_type'      => 'faq',
                    'posts_per_page' => -1,
                ));

                if ( $faq_query->have_posts() ) :
                    $faq_count = 0;
                    while ( $faq_query->have_posts() ) : $faq_query->the_post();
                        $is_active = ($faq_count === 0) ? ' active' : '';
                        ?>
                        <div class="faq-item<?php echo $is_active; ?>">
                            <div class="faq-question">
                                <h3><?php the_title(); ?></h3>
                                <span class="faq-icon">
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-linecap="round"
                                        stroke-linejoin="round">
                                        <line x1="17" y1="7" x2="7" y2="17"></line>
                                        <polyline points="17 17 7 17 7 7"></polyline>
                                    </svg>
                                </span>
                            </div>
                            <div class="faq-answer">
                                <?php the_content(); ?>
                            </div>
                        </div>
                        <?php
                        $faq_count++;
                    endwhile;
                    wp_reset_postdata();
                else :
                    echo '<p style="text-align: center; margin: 40px auto; font-size: 1.2rem; color: #64748b;">لا توجد أسئلة شائعة مضافة حالياً.</p>';
                endif;
                ?>
            </div>
        </div>
    </section>

    <!-- Newsletter Section -->
    <section class="newsletter-section container">
        <div class="newsletter-grid">
            <div class="newsletter-title">
                <h2><?php echo get_field('newsletter_title') ? nl2br(get_field('newsletter_title')) : 'حافظ على ابتسامتك<br>مشرقة دائمًا'; ?></h2>
            </div>
            <div class="newsletter-content">
                <p><?php echo get_field('newsletter_content') ? nl2br(get_field('newsletter_content')) : 'اشترك ليصلك أحدث النصائح والعروض الخاصة<br>بخدمات الأسنان.'; ?></p>
                <form class="newsletter-form">
                    <input type="email" placeholder="أدخل بريدك الإلكتروني" required>
                    <button type="submit" class="btn btn-primary">اشترك</button>
                </form>
            </div>
        </div>
    </section>

    
<?php get_footer(); ?>

