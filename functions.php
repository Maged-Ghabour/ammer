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
if( function_exists('acf_add_local_field_group') ):

acf_add_local_field_group(array(
	'key' => 'group_ammer_front_page',
	'title' => 'Front Page Settings',
	'fields' => array(
		// HERO SECTION
		array(
			'key' => 'field_hero_tab',
			'label' => 'Hero Section',
			'name' => '',
			'type' => 'tab',
			'placement' => 'top',
		),
		array(
			'key' => 'field_hero_title',
			'label' => 'Hero Title',
			'name' => 'hero_title',
			'type' => 'text',
			'default_value' => 'ابتسامتك تبدأ من هنا',
		),
		array(
			'key' => 'field_hero_subtitle',
			'label' => 'Hero Subtitle',
			'name' => 'hero_subtitle',
			'type' => 'textarea',
			'default_value' => 'نقدم لك أحدث التقنيات في عالم طب وتجميل الأسنان لنمنحك الابتسامة التي تستحقها.',
		),
		array(
			'key' => 'field_hero_image',
			'label' => 'Hero Image',
			'name' => 'hero_image',
			'type' => 'image',
			'return_format' => 'url',
		),
		array(
			'key' => 'field_booking_title',
			'label' => 'Booking Title',
			'name' => 'booking_title',
			'type' => 'text',
			'default_value' => 'احجز موعدك الآن',
		),
        
        // SERVICES SECTION
        array(
			'key' => 'field_services_tab',
			'label' => 'Services Section',
			'name' => '',
			'type' => 'tab',
			'placement' => 'top',
		),
        array(
			'key' => 'field_services_title',
			'label' => 'Services Title',
			'name' => 'services_title',
			'type' => 'text',
			'default_value' => 'خدماتنا المميزة',
		),
        array(
			'key' => 'field_services_subtitle',
			'label' => 'Services Subtitle',
			'name' => 'services_subtitle',
			'type' => 'textarea',
			'default_value' => 'نقدم مجموعة شاملة من خدمات طب وتجميل الأسنان...',
		),
        array(
			'key' => 'field_services_list',
			'label' => 'Services List',
			'name' => 'services_list',
			'type' => 'repeater',
			'layout' => 'block',
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
					'name' => 'description',
					'type' => 'textarea',
				),
			),
		),
        
        // TRUST SECTION
        array(
			'key' => 'field_trust_tab',
			'label' => 'Trust Section',
			'name' => '',
			'type' => 'tab',
			'placement' => 'top',
		),
        array(
			'key' => 'field_trust_title',
			'label' => 'Trust Title',
			'name' => 'trust_title',
			'type' => 'text',
			'default_value' => 'ليش تختار د.عامر الريمي؟',
		),
        array(
			'key' => 'field_trust_desc',
			'label' => 'Trust Description',
			'name' => 'trust_desc',
			'type' => 'textarea',
		),
        array(
			'key' => 'field_trust_image',
			'label' => 'Trust Image',
			'name' => 'trust_image',
			'type' => 'image',
			'return_format' => 'url',
		),
        array(
			'key' => 'field_trust_stats',
			'label' => 'Statistics',
			'name' => 'trust_stats',
			'type' => 'repeater',
			'sub_fields' => array(
				array(
					'key' => 'field_stat_text',
					'label' => 'Label',
					'name' => 'label',
					'type' => 'text',
				),
                array(
					'key' => 'field_stat_num',
					'label' => 'Number/Value',
					'name' => 'number',
					'type' => 'text',
				),
			),
		),
        
        // BEFORE/AFTER SECTION
        array(
			'key' => 'field_ba_tab',
			'label' => 'Before/After Section',
			'name' => '',
			'type' => 'tab',
			'placement' => 'top',
		),
        array(
			'key' => 'field_ba_cases',
			'label' => 'Cases',
			'name' => 'cases',
			'type' => 'repeater',
			'sub_fields' => array(
				array(
					'key' => 'field_ba_before',
					'label' => 'Before Image URL',
					'name' => 'before_img',
					'type' => 'text',
				),
                array(
					'key' => 'field_ba_after',
					'label' => 'After Image URL',
					'name' => 'after_img',
					'type' => 'text',
				),
			),
		),
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


