const fs = require('fs');

const functionsFile = 'c:/Users/fkrtk/Desktop/Wordpress Websites/ammer-theme/functions.php';
const frontPageFile = 'c:/Users/fkrtk/Desktop/Wordpress Websites/ammer-theme/front-page.php';

// --- Modify functions.php ---
let functionsContent = fs.readFileSync(functionsFile, 'utf-8');

const cptCode = `
// Register Service Post Type
function ammer_register_service_cpt() {
    $labels = array(
        'name'               => 'الخدمات',
        'singular_name'      => 'خدمة',
        'menu_name'          => 'الخدمات',
        'add_new'            => 'أضف خدمة جديدة',
        'add_new_item'       => 'أضف خدمة جديدة',
        'edit_item'          => 'تعديل الخدمة',
        'new_item'           => 'خدمة جديدة',
        'view_item'          => 'عرض الخدمة',
        'search_items'       => 'البحث في الخدمات',
        'not_found'          => 'لا توجد خدمات',
        'not_found_in_trash' => 'لا توجد خدمات في سلة المهملات',
    );

    $args = array(
        'labels'              => $labels,
        'public'              => true,
        'has_archive'         => false,
        'publicly_queryable'  => true,
        'query_var'           => true,
        'rewrite'             => array( 'slug' => 'service' ),
        'capability_type'     => 'post',
        'hierarchical'        => false,
        'menu_position'       => 20,
        'menu_icon'           => 'dashicons-hammer',
        'supports'            => array( 'title', 'editor', 'thumbnail' ),
        'show_in_rest'        => true,
    );

    register_post_type( 'service', $args );
}
add_action( 'init', 'ammer_register_service_cpt', 0 );
`;

if (!functionsContent.includes('ammer_register_service_cpt')) {
    functionsContent += "\n" + cptCode;
}

const acfFieldToRemove = `        array(
            'key' => 'field_services_list',
            'label' => 'Services List (قابلة لإعادة الترتيب)',
            'name' => 'services_list',
            'type' => 'repeater',
            'layout' => 'block',
            'button_label' => 'أضف خدمة',
            'sub_fields' => array(
                array(
                    'key' => 'field_service_icon',
                    'label' => 'Icon (Image URL)',
                    'name' => 'icon',
                    'type' => 'text',
                ),
                array(
                    'key' => 'field_service_title',
                    'label' => 'Title',
                    'name' => 'title',
                    'type' => 'text',
                ),
                array(
                    'key' => 'field_service_desc',
                    'label' => 'Description',
                    'name' => 'desc',
                    'type' => 'textarea',
                ),
            ),
        ),`;

if (functionsContent.includes(acfFieldToRemove)) {
    functionsContent = functionsContent.replace(acfFieldToRemove, "");
} else {
    // try removing carriage returns for robust matching
    const normalizedContent = functionsContent.replace(/\r\n/g, '\n');
    const normalizedTarget = acfFieldToRemove.replace(/\r\n/g, '\n');
    if (normalizedContent.includes(normalizedTarget)) {
        functionsContent = normalizedContent.replace(normalizedTarget, "");
    } else {
        console.log("Could not find ACF field to remove.");
    }
}

fs.writeFileSync(functionsFile, functionsContent, 'utf-8');

// --- Modify front-page.php ---
let frontPageContent = fs.readFileSync(frontPageFile, 'utf-8');

const oldLoop = `        <?php 
        if( have_rows('services_list') ): 
            while( have_rows('services_list') ) : the_row();
                $icon = get_sub_field('icon');
                $title = get_sub_field('title');
                $description = get_sub_field('desc');
                if(!$title) continue;
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
                    <p class="card-desc"><?php echo esc_html($description); ?></p>
                </div>
            </div>
            <?php endwhile; ?>
        <?php else: ?>
            <p style="text-align: center; width: 100%; grid-column: 1 / -1;">يرجى إضافة الخدمات من لوحة التحكم.</p>
        <?php endif; ?>`;

const newLoop = `        <?php 
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
        <?php endif; ?>`;

const normalizedFP = frontPageContent.replace(/\r\n/g, '\n');
const normalizedOldLoop = oldLoop.replace(/\r\n/g, '\n');

if (normalizedFP.includes(normalizedOldLoop)) {
    frontPageContent = normalizedFP.replace(normalizedOldLoop, newLoop);
} else {
    console.log("Could not find front-page old loop to replace.");
}

fs.writeFileSync(frontPageFile, frontPageContent, 'utf-8');

console.log("Updates completed.");
