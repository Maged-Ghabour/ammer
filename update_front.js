const fs = require('fs');
const content = fs.readFileSync('front-page.php', 'utf8');

let newContent = content.replace(
    /<\?php if\( have_rows\('services_list'\) \): \?>[\s\S]*?<\?php else: \?>/m,
    `<?php 
        $has_services = false;
        for($i=1; $i<=6; $i++) {
            if(get_field('service_' . $i . '_title')) {
                $has_services = true;
                break;
            }
        }
        if( $has_services ): 
            for($i=1; $i<=6; $i++):
                $icon = get_field('service_' . $i . '_icon');
                $title = get_field('service_' . $i . '_title');
                $description = get_field('service_' . $i . '_desc');
                if(!$title) continue;
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
            <?php endfor; ?>
        <?php else: ?>`
);

newContent = newContent.replace(
    /<\?php if\( have_rows\('trust_stats'\) \): \?>[\s\S]*?<\?php endif; \?>/m,
    `<?php 
        $has_stats = false;
        for($i=1; $i<=4; $i++) {
            if(get_field('stat_' . $i . '_number')) {
                $has_stats = true;
                break;
            }
        }
        if( $has_stats ): 
            for($i=1; $i<=4; $i++):
                $label = get_field('stat_' . $i . '_label');
                $number = get_field('stat_' . $i . '_number');
                if(!$number) continue;
            ?>
            <div class="stat-item">
                <span class="stat-number"><?php echo esc_html($number); ?></span>
                <span class="stat-label"><?php echo esc_html($label); ?></span>
            </div>
            <?php endfor; ?>
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
        <?php endif; ?>`
);

newContent = newContent.replace(
    /<\?php if\( have_rows\('cases'\) \): \?>[\s\S]*?<\?php else: \?>/m,
    `<?php 
        $has_cases = false;
        for($i=1; $i<=3; $i++) {
            if(get_field('case_' . $i . '_before')) {
                $has_cases = true;
                break;
            }
        }
        if( $has_cases ): 
            for($i=1; $i<=3; $i++):
                $before = get_field('case_' . $i . '_before');
                $after = get_field('case_' . $i . '_after');
                if(!$before || !$after) continue;
            ?>
            <div class="ba-slide">
                <div class="ba-container">
                    <img loading="lazy" src="<?php echo esc_url($after); ?>" alt="After" class="ba-after">
                    <img loading="lazy" src="<?php echo esc_url($before); ?>" alt="Before" class="ba-before">
                    <div class="ba-slider">
                        <div class="ba-slider-button">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M15 18l-6-6 6-6"/>
                            </svg>
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M9 18l6-6-6-6"/>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
            <?php endfor; ?>
        <?php else: ?>`
);

fs.writeFileSync('front-page.php', newContent, 'utf8');
console.log('front-page.php updated successfully');
