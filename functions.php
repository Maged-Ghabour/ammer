<?php
/**
 * Ammer Theme functions and definitions
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Theme Setup
 */
function ammer_setup() {
	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	// Let WordPress manage the document title.
	add_theme_support( 'title-tag' );

	// Enable support for Post Thumbnails on posts and pages.
	add_theme_support( 'post-thumbnails' );

	// Register Navigation Menus
	register_nav_menus(
		array(
			'menu-1' => esc_html__( 'Primary', 'ammer' ),
			'footer' => esc_html__( 'Footer Menu', 'ammer' ),
		)
	);

	// Add theme support for HTML5 markup.
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Add theme support for core custom logo.
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 120,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'ammer_setup' );

/**
 * Enqueue scripts and styles.
 */
function ammer_scripts() {
	wp_enqueue_style( 'ammer-style', get_stylesheet_uri(), array(), wp_get_theme()->get( 'Version' ) );

	// Enqueue Google Fonts
	wp_enqueue_style( 'ammer-fonts', 'https://fonts.googleapis.com/css2?family=Tajawal:wght@400;500;700;800&display=swap', array(), null );

	// Enqueue FontAwesome
	wp_enqueue_style( 'font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css', array(), '6.4.0' );

	// Enqueue GSAP
	wp_enqueue_script( 'gsap-core', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js', array(), null, true );
	wp_enqueue_script( 'gsap-scrolltrigger', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js', array('gsap-core'), null, true );
    wp_enqueue_script( 'ammer-main-js', get_template_directory_uri() . '/assets/js/main.js', array('gsap-scrolltrigger'), null, true );
}
add_action( 'wp_enqueue_scripts', 'ammer_scripts' );

/**
 * ACF Auto-register Field Group for Front Page
 */
function ammer_register_acf_fields() {
        
        
	),
	'location' => array(
		array(
			array(
				'param' => 'page_template',
				'operator' => '==',
				'value' => 'front-page.php', // Will show on front-page template
			),
		),
	),
	'menu_order' => 0,
	'position' => 'normal',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'active' => true,
));

endif;
}
add_action('acf/init', 'ammer_register_acf_fields');

/**
 * Custom Login Page Styles
 */
function ammer_login_stylesheet() {
    wp_enqueue_style( 'custom-login', get_template_directory_uri() . '/assets/css/login-style.css' );
    wp_enqueue_style( 'ammer-fonts', 'https://fonts.googleapis.com/css2?family=Tajawal:wght@400;500;700;800&display=swap', array(), null );
}
add_action( 'login_enqueue_scripts', 'ammer_login_stylesheet' );

// Change Login Logo URL
function ammer_login_logo_url() {
    return home_url();
}
add_filter( 'login_headerurl', 'ammer_login_logo_url' );

// Change Login Logo Title
function ammer_login_logo_url_title() {
    return get_bloginfo('name');
}
add_filter( 'login_headertext', 'ammer_login_logo_url_title' );

/**
 * Custom Admin Dashboard Styles
 */
function ammer_admin_stylesheet() {
    wp_enqueue_style( 'custom-admin', get_template_directory_uri() . '/assets/css/admin-style.css' );
    wp_enqueue_style( 'ammer-fonts', 'https://fonts.googleapis.com/css2?family=Tajawal:wght@400;500;700;800&display=swap', array(), null );
}
add_action( 'admin_enqueue_scripts', 'ammer_admin_stylesheet' );

/**
 * Add WhatsApp setting to Customizer
 */
function ammer_customize_register( $wp_customize ) {
    $wp_customize->add_section( 'ammer_contact_settings', array(
        'title'      => __( 'Contact & WhatsApp', 'ammer' ),
        'priority'   => 30,
    ) );

    $wp_customize->add_setting( 'whatsapp_number', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_text_field',
    ) );

    $wp_customize->add_control( 'whatsapp_number', array(
        'label'       => __( 'WhatsApp Number', 'ammer' ),
        'description' => __( 'أدخل رقم الواتساب مع رمز الدولة (مثال: 966500000000)', 'ammer' ),
        'section'     => 'ammer_contact_settings',
        'type'        => 'text',
    ) );

    $wp_customize->add_setting( 'facebook_url', array(
        'default'           => 'https://www.facebook.com/dr.amer.elrimi/',
        'sanitize_callback' => 'esc_url_raw',
    ) );
    $wp_customize->add_control( 'facebook_url', array(
        'label'       => __( 'Facebook URL', 'ammer' ),
        'section'     => 'ammer_contact_settings',
        'type'        => 'url',
    ) );

    $wp_customize->add_setting( 'instagram_url', array(
        'default'           => 'https://www.instagram.com/dr_amer_alrimi',
        'sanitize_callback' => 'esc_url_raw',
    ) );
    $wp_customize->add_control( 'instagram_url', array(
        'label'       => __( 'Instagram URL', 'ammer' ),
        'section'     => 'ammer_contact_settings',
        'type'        => 'url',
    ) );

    $wp_customize->add_setting( 'tiktok_url', array(
        'default'           => 'https://www.tiktok.com/@dr_amer_alrimi',
        'sanitize_callback' => 'esc_url_raw',
    ) );
    $wp_customize->add_control( 'tiktok_url', array(
        'label'       => __( 'TikTok URL', 'ammer' ),
        'section'     => 'ammer_contact_settings',
        'type'        => 'url',
    ) );
}
add_action( 'customize_register', 'ammer_customize_register' );

/**
 * Helper function to get WhatsApp URL
 */
function get_whatsapp_url() {
    $number = get_theme_mod('whatsapp_number', '');
    if (empty($number)) {
        return '#';
    }
    // Clean number (remove spaces, +, etc)
    $number = preg_replace('/[^0-9]/', '', $number);
    return 'https://wa.me/' . $number;
}




// Register 'case' Custom Post Type
function ammer_register_case_cpt() {
    $labels = array(
        'name'               => 'الحالات (قبل وبعد)',
        'singular_name'      => 'حالة',
        'menu_name'          => 'حالات قبل وبعد',
        'add_new'            => 'أضف حالة جديدة',
        'add_new_item'       => 'أضف حالة جديدة',
        'edit_item'          => 'تعديل الحالة',
        'new_item'           => 'حالة جديدة',
        'view_item'          => 'عرض الحالة',
        'search_items'       => 'ابحث في الحالات',
        'not_found'          => 'لم يتم العثور على أي حالات',
        'not_found_in_trash' => 'لا توجد حالات في سلة المهملات'
    );

    $args = array(
        'labels'              => $labels,
        'public'              => true,
        'has_archive'         => false,
        'publicly_queryable'  => false,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'menu_position'       => 20,
        'menu_icon'           => 'dashicons-images-alt2',
        'supports'            => array( 'title' ),
        'rewrite'             => false,
    );

    register_post_type( 'case', $args );
}
add_action( 'init', 'ammer_register_case_cpt' );

// Add ACF Fields for 'case' CPT
if( function_exists('acf_add_local_field_group') ):

acf_add_local_field_group(array(
    'key' => 'group_case_fields',
    'title' => 'Case Images (Before & After)',
    'fields' => array(
        array(
            'key' => 'field_case_before_img',
            'label' => 'صورة قبل',
            'name' => 'before_image',
            'type' => 'image',
            'return_format' => 'url',
            'preview_size' => 'medium',
            'library' => 'all',
        ),
        array(
            'key' => 'field_case_after_img',
            'label' => 'صورة بعد',
            'name' => 'after_image',
            'type' => 'image',
            'return_format' => 'url',
            'preview_size' => 'medium',
            'library' => 'all',
        ),
    ),
    'location' => array(
        array(
            array(
                'param' => 'post_type',
                'operator' => '==',
                'value' => 'case',
            ),
        ),
    ),
    'menu_order' => 0,
    'position' => 'normal',
    'style' => 'default',
    'label_placement' => 'top',
    'instruction_placement' => 'label',
    'hide_on_screen' => '',
    'active' => true,
    'description' => '',
));

endif;

// Register 'testimonial' Custom Post Type
function ammer_register_testimonial_cpt() {
    $labels = array(
        'name'               => 'آراء المرضى',
        'singular_name'      => 'رأي مريض',
        'menu_name'          => 'آراء المرضى',
        'add_new'            => 'أضف رأي جديد',
        'add_new_item'       => 'أضف رأي جديد',
        'edit_item'          => 'تعديل الرأي',
        'new_item'           => 'رأي جديد',
        'view_item'          => 'عرض الرأي',
        'search_items'       => 'ابحث في الآراء',
        'not_found'          => 'لم يتم العثور على أي آراء',
        'not_found_in_trash' => 'لا توجد آراء في سلة المهملات'
    );

    $args = array(
        'labels'              => $labels,
        'public'              => true,
        'has_archive'         => false,
        'publicly_queryable'  => false,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'menu_position'       => 21,
        'menu_icon'           => 'dashicons-testimonial',
        'supports'            => array( 'title', 'editor', 'thumbnail' ),
        'rewrite'             => false,
    );

    register_post_type( 'testimonial', $args );
}
add_action( 'init', 'ammer_register_testimonial_cpt' );

// Add ACF Fields for 'testimonial' CPT
if( function_exists('acf_add_local_field_group') ):

acf_add_local_field_group(array(
    'key' => 'group_testimonial_fields',
    'title' => 'Testimonial Details',
    'fields' => array(
        array(
            'key' => 'field_testimonial_rating',
            'label' => 'التقييم',
            'name' => 'rating',
            'type' => 'number',
            'instructions' => 'اختر التقييم من 1 إلى 5',
            'required' => 1,
            'default_value' => 5,
            'min' => 1,
            'max' => 5,
        ),
    ),
    'location' => array(
        array(
            array(
                'param' => 'post_type',
                'operator' => '==',
                'value' => 'testimonial',
            ),
        ),
    ),
    'menu_order' => 0,
    'position' => 'normal',
    'style' => 'default',
    'label_placement' => 'top',
    'instruction_placement' => 'label',
    'hide_on_screen' => '',
    'active' => true,
    'description' => '',
));

endif;

// Register 'faq' Custom Post Type
function ammer_register_faq_cpt() {
    $labels = array(
        'name'               => 'الأسئلة الشائعة',
        'singular_name'      => 'سؤال',
        'menu_name'          => 'الأسئلة الشائعة',
        'add_new'            => 'أضف سؤال جديد',
        'add_new_item'       => 'أضف سؤال جديد',
        'edit_item'          => 'تعديل السؤال',
        'new_item'           => 'سؤال جديد',
        'view_item'          => 'عرض السؤال',
        'search_items'       => 'ابحث في الأسئلة',
        'not_found'          => 'لم يتم العثور على أي أسئلة',
        'not_found_in_trash' => 'لا توجد أسئلة في سلة المهملات'
    );

    $args = array(
        'labels'              => $labels,
        'public'              => true,
        'has_archive'         => false,
        'publicly_queryable'  => false,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'menu_position'       => 22,
        'menu_icon'           => 'dashicons-editor-help',
        'supports'            => array( 'title', 'editor' ),
        'rewrite'             => false,
    );

    register_post_type( 'faq', $args );
}
add_action( 'init', 'ammer_register_faq_cpt' );
