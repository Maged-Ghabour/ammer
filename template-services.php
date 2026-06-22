<?php
/**
 * Template Name: صفحة الخدمات
 */
get_header();
?>

<!-- Header Banner / Hero -->
<section class="page-header" style="padding: 60px 0; background: var(--bg-color); text-align: center;">
    <div class="container">
        <h1 class="page-title" style="color: var(--primary-color); font-size: 2.5rem; font-weight: 800;"><?php the_title(); ?></h1>
        <?php if(has_excerpt()) { ?>
            <p style="color: var(--text-light); margin-top: 15px; font-size: 1.1rem; max-width: 600px; margin-left: auto; margin-right: auto;"><?php echo get_the_excerpt(); ?></p>
        <?php } ?>
    </div>
</section>

<!-- Services Grid -->
<section class="services-section container" style="padding: 60px 0;">
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
                $bg_icon = get_field('service_bg_icon');
                $title = get_the_title();
                $description = get_the_content();
            ?>
            <div class="service-card">
                <div class="card-bg-icon">
                    <?php if($bg_icon): ?>
                        <img loading="lazy" src="<?php echo esc_url($bg_icon); ?>" alt="">
                    <?php else: ?>
                        <img loading="lazy" src="<?php echo get_template_directory_uri(); ?>/assets/bg1.png" alt="">
                    <?php endif; ?>
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

<!-- Call to action -->
<section class="cta-section container" style="margin-bottom: 60px;">
    <div class="cta-banner">
        <div class="cta-content">
            <h2 class="cta-title">جاهز لابتسامة أكثر ثقة؟</h2>
            <p class="cta-subtitle">احجز موعدك اليوم واستمتع بخدمة طبية متكاملة تناسب احتياجاتك.</p>
        </div>
        <div class="cta-action">
            <a href="<?php echo esc_url(get_whatsapp_url()); ?>" class="btn btn-outline" style="color: white; border-color: white;" target="_blank">احجز موعدك الآن</a>
        </div>
    </div>
</section>

<?php get_footer(); ?>
