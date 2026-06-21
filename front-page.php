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
            <h1 class="hero-title"><?php echo get_field('hero_title') ? get_field('hero_title') : '???????? ???? ?? ???<br>?? ????'; ?></h1>
        </div>

        <div class="hero-content">
            <p><?php echo get_field('hero_subtitle') ? get_field('hero_subtitle') : '???? ?? ???? ???????? ?? ???? ?? ?????? ??????? ?????? ????????? ???? ??????? ????? ???? ????? ???? ?? ?????.'; ?></p>
            <div class="hero-buttons">
                <a href="#services" class="btn btn-outline">???????</a>
                <a href="<?php echo esc_url(get_whatsapp_url()); ?>" class="btn btn-primary" target="_blank">????? ????</a>
            </div>
        </div>

        <!-- Booking Area -->
        <div class="hero-booking" id="booking">
            <h3 class="booking-title"><?php echo get_field('booking_title') ? get_field('booking_title') : '???? ????? ????'; ?></h3>
            <form action="#" method="POST" class="booking-form">
                <input type="text" name="name" class="form-control" placeholder="????? ??????" required>
                <input type="tel" name="phone" class="form-control" placeholder="??? ??????" required>
                <div class="input-icon-wrapper">
                    <span class="icon">
                        <svg viewBox="0 0 24 24" width="18" height="18" stroke="currentColor" stroke-width="2" fill="none"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>
                    </span>
                    <input type="date" name="date" class="form-control" placeholder="????? ??????" required>
                </div>
                <div class="input-icon-wrapper">
                    <span class="icon">
                        <svg viewBox="0 0 24 24" width="18" height="18" stroke="currentColor" stroke-width="2" fill="none"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg>
                    </span>
                    <input type="time" name="time" class="form-control" placeholder="????? ??????" required>
                </div>
                <button type="submit" class="btn btn-primary btn-block">????? ?????</button>
            </form>
        </div>

        <!-- Hero Image Area -->
        <div class="hero-image">
            <?php 
            $hero_image = get_field('hero_image');
            if($hero_image): ?>
                <img src="<?php echo esc_url($hero_image); ?>" alt="Hero Image">
            <?php else: ?>
                <img src="<?php echo get_template_directory_uri(); ?>/assets/hero.png" alt="????? ????? - ?. ???? ??????">
            <?php endif; ?>
        </div>
    </div>
</main>

<!-- Services Section -->
<section class="services-section container" id="services">
    <div class="services-header">
        <div>
            <h2 class="section-title"><?php echo get_field('services_title') ? get_field('services_title') : '??????? ???????'; ?></h2>
            <p class="section-subtitle"><?php echo get_field('services_subtitle') ? get_field('services_subtitle') : '???? ?????? ????? ?? ????? ?? ?????? ???????...'; ?></p>
        </div>
        <div class="services-arrows">
            <a href="#" class="view-more-link">??? ?? ???????</a>
        </div>
    </div>

    <div class="services-grid">
        <?php if( have_rows('services_list') ): ?>
            <?php while( have_rows('services_list') ): the_row(); 
                $icon = get_sub_field('icon');
                $title = get_sub_field('title');
                $description = get_sub_field('description');
            ?>
            <div class="service-card">
                <div class="card-bg-icon">
                    <img loading="lazy" src="<?php echo get_template_directory_uri(); ?>/assets/bg1.png" alt="">
                </div>
                <div class="card-icon">
                    <img loading="lazy" src="<?php echo esc_url($icon); ?>" alt="">
                </div>
                <div class="card-content">
                    <h4 class="card-title"><?php echo esc_html($title); ?></h4>
                    <p class="card-desc"><?php echo esc_html($description); ?></p>
                </div>
            </div>
            <?php endwhile; ?>
        <?php else: ?>
            <!-- Fallback Static Content -->

            <!-- Card 1 -->
            <div class="service-card">
                <div class="card-bg-icon">
                    <img loading="lazy" src="<?php echo get_template_directory_uri(); ?>/assets/bg1.png" alt="">
                </div>
                <div class="card-icon">
                    <img loading="lazy" src="<?php echo get_template_directory_uri(); ?>/assets/icon1.png" alt="">
                </div>
                <div class="card-content">
                    <h4 class="card-title">???? ????? ?????????</h4>
                    <p class="card-desc">???? ???? ?????? ?????.</p>
                </div>
            </div>

            <!-- Card 2 -->
            <div class="service-card">
                <div class="card-bg-icon">
                    <img loading="lazy" src="<?php echo get_template_directory_uri(); ?>/assets/bg2.png" alt="">
                </div>
                <div class="card-icon">
                    <img loading="lazy" src="<?php echo get_template_directory_uri(); ?>/assets/icon2.png" alt="">
                </div>
                <div class="card-content">
                    <h4 class="card-title">??????? ????????</h4>
                    <p class="card-desc">??? ????? ????? ???????.</p>
                </div>
            </div>

            <!-- Card 3 -->
            <div class="service-card">
                <div class="card-bg-icon">
                    <img loading="lazy" src="<?php echo get_template_directory_uri(); ?>/assets/bg3.png" alt="">
                </div>
                <div class="card-icon">
                    <img loading="lazy" src="<?php echo get_template_directory_uri(); ?>/assets/icon3.png" alt="">
                </div>
                <div class="card-content">
                    <h4 class="card-title">????? ???????</h4>
                    <p class="card-desc">??????? ????? ?????? ??????.</p>
                </div>
            </div>

            <!-- Card 4 -->
            <div class="service-card">
                <div class="card-bg-icon">
                    <img loading="lazy" src="<?php echo get_template_directory_uri(); ?>/assets/bg4.png" alt="">
                </div>
                <div class="card-icon">
                    <img loading="lazy" src="<?php echo get_template_directory_uri(); ?>/assets/icon4.png" alt="">
                </div>
                <div class="card-content">
                    <h4 class="card-title">??????? ?????????</h4>
                    <p class="card-desc">????? ????? ???????.</p>
                </div>
            </div>

            <!-- Card 5 -->
            <div class="service-card">
                <div class="card-bg-icon">
                    <img loading="lazy" src="<?php echo get_template_directory_uri(); ?>/assets/bg5.png" alt="">
                </div>
                <div class="card-icon">
                    <img loading="lazy" src="<?php echo get_template_directory_uri(); ?>/assets/icon5.png" alt="">
                </div>
                <div class="card-content">
                    <h4 class="card-title">??? ??????? ?????? ????????</h4>
                    <p class="card-desc">????? ??? ????? ??????.</p>
                </div>
            </div>

            <!-- Card 6 -->
            <div class="service-card">
                <div class="card-bg-icon">
                    <img loading="lazy" src="<?php echo get_template_directory_uri(); ?>/assets/bg6.png" alt="">
                </div>
                <div class="card-icon">
                    <img loading="lazy" src="<?php echo get_template_directory_uri(); ?>/assets/icon6.png" alt="">
                </div>
                <div class="card-content">
                    <h4 class="card-title">???????? ?????</h4>
                    <p class="card-desc">????? ???? ???? ???????.</p>
                </div>
            </div>
        
        <?php endif; ?>
    </div>
</section>

<!-- Trust Section -->
<section class="trust-section">
    <div class="container trust-grid">
        <div class="trust-content">
            <h2 class="trust-title"><?php echo get_field('trust_title') ? get_field('trust_title') : '??? ????? ?.???? ???????'; ?></h2>
            <p class="trust-desc"><?php echo get_field('trust_desc') ? get_field('trust_desc') : '??? ???? ?? ????? ???? ??????? ?? ???? ????? ?????? ???? ????? ??????? ????? ???? ?????...'; ?></p>
        </div>
        <div class="trust-image">
            <?php 
            $trust_image = get_field('trust_image');
            if($trust_image): ?>
                <img loading="lazy" src="<?php echo esc_url($trust_image); ?>" alt="Trust Image">
            <?php else: ?>
                <img loading="lazy" src="<?php echo get_template_directory_uri(); ?>/assets/numbers.png" alt="????? ?? ???????">
            <?php endif; ?>
        </div>
        
        <div class="trust-stats-wrapper">
            <div class="trust-stats">
                <?php if( have_rows('trust_stats') ): ?>
                    <?php while( have_rows('trust_stats') ): the_row(); ?>
                    <div class="stat-item">
                        <span class="stat-text"><?php the_sub_field('label'); ?></span>
                        <span class="stat-number" dir="ltr"><?php the_sub_field('number'); ?></span>
                    </div>
                    <?php endwhile; ?>
                <?php else: ?>
                    <div class="stat-item">
                        <span class="stat-text">????? ???????</span>
                        <span class="stat-number" dir="ltr" data-val="4.9/5">4.9<small>/5</small></span>
                    </div>
                    <div class="stat-item">
                        <span class="stat-text">??????? ?? ???????</span>
                        <span class="stat-number" dir="ltr" data-val="10K+">10K+</span>
                    </div>
                    <div class="stat-item">
                        <span class="stat-text">????? ?? ??????</span>
                        <span class="stat-number" dir="ltr" data-val="5+">5+</span>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>



<!-- Before/After Section -->
    <section class="before-after-section container">
        <div class="ba-header">
            <h2 class="section-title">???? ????? ???????</h2>
            <p class="section-subtitle">????? ?????? ?????<br>??????? ???? ?????? ????.</p>
        </div>

        <div class="ba-container" id="ba-container">
            <!-- After Image (Background) -->
            <div class="ba-img ba-after" id="ba-after-layer" style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/before1.png');"></div>
            <!-- Before Image (Clipped layer) -->
            <!-- Before Image (Clipped layer) -->
            <div class="ba-img ba-before" id="ba-before-layer"
                style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/after1.png'); width: 50%;"></div>

            <!-- Handle -->
            <div class="ba-slider-handle" id="ba-handle" style="left: 50%;">
                <div class="handle-arrows">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"
                        stroke-linejoin="round">
                        <polyline points="15 18 9 12 15 6"></polyline>
                    </svg>
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"
                        stroke-linejoin="round">
                        <polyline points="9 18 15 12 9 6"></polyline>
                    </svg>
                </div>
            </div>
        </div>

        <div class="ba-thumbnails">
            <!-- ???? 1 -->
            <div class="thumbnail active" data-before="<?php echo get_template_directory_uri(); ?>/assets/before1.png" data-after="<?php echo get_template_directory_uri(); ?>/assets/after1.png">
                <img loading="lazy" src="<?php echo get_template_directory_uri(); ?>/assets/after1.png" alt="???? 1 - ???">
            </div>
            <!-- ???? 2 -->
            <div class="thumbnail" data-before="<?php echo get_template_directory_uri(); ?>/assets/before2.png" data-after="<?php echo get_template_directory_uri(); ?>/assets/after2.png">
                <img loading="lazy" src="<?php echo get_template_directory_uri(); ?>/assets/after2.png" alt="???? 2 - ???">
            </div>
            <!-- ???? 3 -->
            <div class="thumbnail" data-before="<?php echo get_template_directory_uri(); ?>/assets/before3.png" data-after="<?php echo get_template_directory_uri(); ?>/assets/after3.png">
                <img loading="lazy" src="<?php echo get_template_directory_uri(); ?>/assets/after3.png" alt="???? 3 - ???">
            </div>
        </div>

        <div class="ba-action">
            <a href="#" class="view-more-link">???? ?????? ....</a>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section class="testimonials-section container">
        <div class="testimonials-grid">
            <!-- Right Column: Info -->
            <div class="testimonials-info">
                <div class="info-content">
                    <h2 class="section-title">???? ???? ???????</h2>
                    <p class="section-subtitle">??? ?????? ?? ??????<br>????? ?????? ?????? ?????????</p>
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
                <!-- Card 1 -->
                <div class="testimonial-card">
                    <div class="card-top">
                        <div class="user-meta">
                            <div class="avatar"></div>
                            <span class="name">???? ????</span>
                        </div>
                        <div class="rating-stars">
                            <svg viewBox="0 0 24 24" fill="#facc15" stroke="none">
                                <polygon
                                    points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2">
                                </polygon>
                            </svg>
                            <svg viewBox="0 0 24 24" fill="#facc15" stroke="none">
                                <polygon
                                    points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2">
                                </polygon>
                            </svg>
                            <svg viewBox="0 0 24 24" fill="#facc15" stroke="none">
                                <polygon
                                    points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2">
                                </polygon>
                            </svg>
                            <svg viewBox="0 0 24 24" fill="#facc15" stroke="none">
                                <polygon
                                    points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2">
                                </polygon>
                            </svg>
                            <svg viewBox="0 0 24 24" fill="#facc15" stroke="none">
                                <polygon
                                    points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2">
                                </polygon>
                            </svg>
                        </div>
                    </div>
                    <p class="review-text">??????? ????? ???? ???????? ??? ?? ?? ????? ?????? ??? ????.</p>
                </div>

                <!-- Card 2 -->
                <div class="testimonial-card">
                    <div class="card-top">
                        <div class="user-meta">
                            <div class="avatar"></div>
                            <span class="name">???? ????</span>
                        </div>
                        <div class="rating-stars">
                            <svg viewBox="0 0 24 24" fill="#facc15" stroke="none">
                                <polygon
                                    points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2">
                                </polygon>
                            </svg>
                            <svg viewBox="0 0 24 24" fill="#facc15" stroke="none">
                                <polygon
                                    points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2">
                                </polygon>
                            </svg>
                            <svg viewBox="0 0 24 24" fill="#facc15" stroke="none">
                                <polygon
                                    points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2">
                                </polygon>
                            </svg>
                            <svg viewBox="0 0 24 24" fill="#facc15" stroke="none">
                                <polygon
                                    points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2">
                                </polygon>
                            </svg>
                            <svg viewBox="0 0 24 24" fill="#facc15" stroke="none">
                                <polygon
                                    points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2">
                                </polygon>
                            </svg>
                        </div>
                    </div>
                    <p class="review-text">??????? ????? ???? ???????? ??? ?? ?? ????? ?????? ??? ????.</p>
                </div>

                <!-- Card 3 -->
                <div class="testimonial-card">
                    <div class="card-top">
                        <div class="user-meta">
                            <div class="avatar"></div>
                            <span class="name">???? ????</span>
                        </div>
                        <div class="rating-stars">
                            <svg viewBox="0 0 24 24" fill="#facc15" stroke="none">
                                <polygon
                                    points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2">
                                </polygon>
                            </svg>
                            <svg viewBox="0 0 24 24" fill="#facc15" stroke="none">
                                <polygon
                                    points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2">
                                </polygon>
                            </svg>
                            <svg viewBox="0 0 24 24" fill="#facc15" stroke="none">
                                <polygon
                                    points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2">
                                </polygon>
                            </svg>
                            <svg viewBox="0 0 24 24" fill="#facc15" stroke="none">
                                <polygon
                                    points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2">
                                </polygon>
                            </svg>
                            <svg viewBox="0 0 24 24" fill="#facc15" stroke="none">
                                <polygon
                                    points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2">
                                </polygon>
                            </svg>
                        </div>
                    </div>
                    <p class="review-text">??????? ????? ???? ???????? ??? ?? ?? ????? ?????? ??? ????.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Blog Section -->
    <section class="blog-section container">
        <div class="blog-header">
            <h2 class="section-title">?? ???? ???? ???????</h2>
            <p class="section-subtitle">??????? ????? ???????? ???????<br>?? ?????? ??? ??? ???????.</p>
        </div>

        <div class="blog-grid">
            <!-- Post 1 -->
            <article class="blog-card">
                <div class="blog-image">
                    <img loading="lazy" src="<?php echo get_template_directory_uri(); ?>/assets/blog1.png" alt="??? ????? ??? ??? ?????? ???????">
                </div>
                <div class="blog-content">
                    <h3 class="blog-title">??? ????? ??? ??? ?????? ???????</h3>
                    <span class="blog-date">March 2, 2035</span>
                </div>
            </article>

            <!-- Post 2 -->
            <article class="blog-card">
                <div class="blog-image">
                    <img loading="lazy" src="<?php echo get_template_directory_uri(); ?>/assets/blog2.png" alt="??? ????? ?????? ????????">
                </div>
                <div class="blog-content">
                    <h3 class="blog-title">??? ????? ?????? ????????</h3>
                    <span class="blog-date">March 2, 2035</span>
                </div>
            </article>

            <!-- Post 3 -->
            <article class="blog-card">
                <div class="blog-image">
                    <img loading="lazy" src="<?php echo get_template_directory_uri(); ?>/assets/blog3.png" alt="??? ????? ???? ????? ??????">
                </div>
                <div class="blog-content">
                    <h3 class="blog-title">??? ????? ???? ????? ??????</h3>
                    <span class="blog-date">March 2, 2035</span>
                </div>
            </article>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="cta-section container">
        <div class="cta-box">
            <h2 class="cta-title">???? ???????? ???? ????</h2>
            <p class="cta-subtitle">???? ????? ????? ??????? ????? ???? ??????? ????? ?????????.</p>
            <a href="<?php echo esc_url(get_whatsapp_url()); ?>" class="btn btn-white" target="_blank">???? ???? ????</a>
        </div>
    </section>

    <!-- FAQ Section -->
    <section class="faq-section container">
        <div class="faq-grid">
            <!-- Right Column: Info -->
            <div class="faq-info">
                <h2 class="section-title">?????? ??? ??????<br>???????? ????????<br>????????</h2>
                <p class="section-subtitle">???? ??? ??? ????????? ????????? ??????? ???<br>????? ???????.</p>
            </div>

            <!-- Left Column: Accordion -->
            <div class="faq-accordion">
                <div class="faq-item active">
                    <div class="faq-question">
                        <h3>?? ????????? ?????? ??????</h3>
                        <span class="faq-icon">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-linecap="round"
                                stroke-linejoin="round">
                                <line x1="17" y1="7" x2="7" y2="17"></line>
                                <polyline points="17 17 7 17 7 7"></polyline>
                            </svg>
                        </span>
                    </div>
                    <div class="faq-answer">
                        <p>???? ????? ??? ??????? ?????? ??? ????? ??????? ?????? ????????.</p>
                    </div>
                </div>

                <div class="faq-item">
                    <div class="faq-question">
                        <h3>?? ?????? ???? ????? ????????</h3>
                        <span class="faq-icon">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-linecap="round"
                                stroke-linejoin="round">
                                <line x1="17" y1="7" x2="7" y2="17"></line>
                                <polyline points="17 17 7 17 7 7"></polyline>
                            </svg>
                        </span>
                    </div>
                    <div class="faq-answer">
                        <p>?????? ?????? ???? ?? ??? 45 ????? ??? ????? ?????? ??? ???? ??????? ????????.</p>
                    </div>
                </div>

                <div class="faq-item">
                    <div class="faq-question">
                        <h3>?? ????? ??????? ??????</h3>
                        <span class="faq-icon">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-linecap="round"
                                stroke-linejoin="round">
                                <line x1="17" y1="7" x2="7" y2="17"></line>
                                <polyline points="17 17 7 17 7 7"></polyline>
                            </svg>
                        </span>
                    </div>
                    <div class="faq-answer">
                        <p>??? ??????? ??? ??????? ???????? ???? ?? ???? ??? ??? ????? ???????. ????? ??????? ???????
                            ??????.</p>
                    </div>
                </div>

                <div class="faq-item">
                    <div class="faq-question">
                        <h3>?? ????? ??? ??? ?????</h3>
                        <span class="faq-icon">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-linecap="round"
                                stroke-linejoin="round">
                                <line x1="17" y1="7" x2="7" y2="17"></line>
                                <polyline points="17 17 7 17 7 7"></polyline>
                            </svg>
                        </span>
                    </div>
                    <div class="faq-answer">
                        <p>???? ???? ?????? ??? ?????? ?????? ?????? ?? ???????? ????? ????? ??? ??????? ???????.</p>
                    </div>
                </div>

                <div class="faq-item">
                    <div class="faq-question">
                        <h3>?? ????? ??????? ??????</h3>
                        <span class="faq-icon">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-linecap="round"
                                stroke-linejoin="round">
                                <line x1="17" y1="7" x2="7" y2="17"></line>
                                <polyline points="17 17 7 17 7 7"></polyline>
                            </svg>
                        </span>
                    </div>
                    <div class="faq-answer">
                        <p>??? ??????? ??? ??????? ???????? ???? ?? ???? ??? ??? ????? ???????.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Newsletter Section -->
    <section class="newsletter-section container">
        <div class="newsletter-grid">
            <div class="newsletter-title">
                <h2>???? ??? ????????<br>????? ??????</h2>
            </div>
            <div class="newsletter-content">
                <p>????? ????? ???? ??????? ??????? ??????<br>?????? ???????.</p>
                <form class="newsletter-form">
                    <input type="email" placeholder="???? ????? ??????????" required>
                    <button type="submit" class="btn btn-primary">?????</button>
                </form>
            </div>
        </div>
    </section>

    
<?php get_footer(); ?>


