<?php
/**
 * Template Name: صفحة قبل وبعد
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

<!-- Before/After Section -->
<section class="before-after-section container" style="padding: 60px 0;">
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

    <div class="ba-container" id="ba-container" style="max-width: 800px; margin: 0 auto;">
        <div class="ba-img ba-after" id="ba-after-layer" style="background-image: url('<?php echo esc_url($first_before); ?>');"></div>
        <div class="ba-img ba-before" id="ba-before-layer" style="background-image: url('<?php echo esc_url($first_after); ?>'); width: 50%;"></div>
        <div class="ba-slider-handle" id="ba-handle" style="left: 50%;">
            <div class="handle-arrows">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="15 18 9 12 15 6"></polyline></svg>
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="9 18 15 12 9 6"></polyline></svg>
            </div>
        </div>
    </div>

    <div class="ba-thumbnails" style="justify-content: center; margin-top: 40px;">
        <?php echo $thumbnails_html; ?>
    </div>

    <?php else : ?>
        <p style="text-align: center; margin: 40px auto; font-size: 1.2rem; color: #64748b;">لا توجد حالات مضافة حالياً.</p>
    <?php endif; wp_reset_postdata(); ?>
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
