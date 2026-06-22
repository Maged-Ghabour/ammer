const fs = require('fs');
let text = fs.readFileSync('front-page.php', 'utf8');

let startStr = '<!-- Before/After Section -->';
let endStr = '</section>';

let start = text.indexOf(startStr);
let end = text.indexOf(endStr, start);

if(start > -1 && end > -1) {
    let newContent = `<!-- Before/After Section -->
    <section class="before-after-section container">
        <div class="ba-header">
            <h2 class="section-title">شاهد الفرق الحقيقي</h2>
            <p class="section-subtitle">نتائج حقيقية تمنحك<br>ابتسامة أكثر جمالاً وثقة.</p>
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
            <p style="text-align: center;">لا توجد حالات مضافة حالياً.</p>
        <?php endif; wp_reset_postdata(); ?>

        <div class="ba-action">
            <a href="#" class="view-more-link">رؤية المزيد ....</a>
        </div>
    </section>`;

    text = text.substring(0, start) + newContent + text.substring(end + endStr.length);
    fs.writeFileSync('front-page.php', text, 'utf8');
}
