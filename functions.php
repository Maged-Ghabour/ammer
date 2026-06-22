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
	wp_enqueue_style( 'ammer-fonts', 'https://fonts.googleapis.com/css2?family=Alexandria:wght@300;400;500;600;700;800;900&display=swap', array(), null );

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
			'key' => 'field_btn1_text',
			'label' => 'Primary Button Text (تواصل معنا)',
			'name' => 'btn1_text',
			'type' => 'text',
			'default_value' => 'تواصل معنا',
		),
		array(
			'key' => 'field_btn1_url',
			'label' => 'Primary Button URL',
			'name' => 'btn1_url',
			'type' => 'text',
			'default_value' => 'https://wa.me/966531443836',
		),
		array(
			'key' => 'field_btn2_text',
			'label' => 'Secondary Button Text (خدماتنا)',
			'name' => 'btn2_text',
			'type' => 'text',
			'default_value' => 'خدماتنا',
		),
		array(
			'key' => 'field_btn2_url',
			'label' => 'Secondary Button URL',
			'name' => 'btn2_url',
			'type' => 'text',
			'default_value' => '#services',
		),
		array(
			'key' => 'field_booking_title',
			'label' => 'Booking Title',
			'name' => 'booking_title',
			'type' => 'text',
			'default_value' => 'احجز موعد موعدك الآن',
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
            'key' => 'field_stat_1_label',
            'label' => 'Stat 1 Label',
            'name' => 'stat_1_label',
            'type' => 'text',
            'default_value' => 'تقييم المرضى',
        ),
        array(
            'key' => 'field_stat_1_number',
            'label' => 'Stat 1 Number',
            'name' => 'stat_1_number',
            'type' => 'text',
            'default_value' => '4.9<small>/5</small>',
        ),
        array(
            'key' => 'field_stat_2_label',
            'label' => 'Stat 2 Label',
            'name' => 'stat_2_label',
            'type' => 'text',
            'default_value' => 'حالة تم علاجها',
        ),
        array(
            'key' => 'field_stat_2_number',
            'label' => 'Stat 2 Number',
            'name' => 'stat_2_number',
            'type' => 'text',
            'default_value' => '10K+',
        ),
        array(
            'key' => 'field_stat_3_label',
            'label' => 'Stat 3 Label',
            'name' => 'stat_3_label',
            'type' => 'text',
            'default_value' => 'سنوات من الخبرة',
        ),
        array(
            'key' => 'field_stat_3_number',
            'label' => 'Stat 3 Number',
            'name' => 'stat_3_number',
            'type' => 'text',
            'default_value' => '5+',
        ),
        array(
            'key' => 'field_stat_4_label',
            'label' => 'Stat 4 Label',
            'name' => 'stat_4_label',
            'type' => 'text',
            'default_value' => 'ابتسامة بثقة أكبر',
        ),
        array(
            'key' => 'field_stat_4_number',
            'label' => 'Stat 4 Number',
            'name' => 'stat_4_number',
            'type' => 'text',
            'default_value' => '5K+',
        ),

        // BEFORE/AFTER SECTION
        array(
            'key' => 'field_ba_tab',
            'label' => 'Before/After Section',
            'name' => '',
            'type' => 'tab',
        ),
        array(
            'key' => 'field_ba_title',
            'label' => 'Section Title',
            'name' => 'ba_title',
            'type' => 'text',
            'default_value' => 'شاهد الفرق الحقيقي',
        ),
        array(
            'key' => 'field_ba_subtitle',
            'label' => 'Section Subtitle',
            'name' => 'ba_subtitle',
            'type' => 'textarea',
            'default_value' => 'نتائج حقيقية تمنحك ابتسامة أكثر جمالاً وثقة.',
        ),

        // TESTIMONIALS SECTION
        array(
            'key' => 'field_testimonials_tab',
            'label' => 'Testimonials Section',
            'name' => '',
            'type' => 'tab',
        ),
        array(
            'key' => 'field_testimonials_title',
            'label' => 'Section Title',
            'name' => 'testimonials_title',
            'type' => 'text',
            'default_value' => 'ماذا يقول مرضانا؟',
        ),
        array(
            'key' => 'field_testimonials_subtitle',
            'label' => 'Section Subtitle',
            'name' => 'testimonials_subtitle',
            'type' => 'textarea',
            'default_value' => 'قصص حقيقية من المرضى الذين أعادوا اكتشاف ابتسامتهم',
        ),

        // BLOG SECTION
        array(
            'key' => 'field_blog_tab',
            'label' => 'Blog Section',
            'name' => '',
            'type' => 'tab',
        ),
        array(
            'key' => 'field_blog_title',
            'label' => 'Section Title',
            'name' => 'blog_title',
            'type' => 'text',
            'default_value' => 'من مكتب طبيب الأسنان',
        ),
        array(
            'key' => 'field_blog_subtitle',
            'label' => 'Section Subtitle',
            'name' => 'blog_subtitle',
            'type' => 'textarea',
            'default_value' => 'نشارككم نصائح ومعلومات تساعدكم في الحفاظ على صحة أسنانكم.',
        ),

        // CTA SECTION
        array(
            'key' => 'field_cta_tab',
            'label' => 'CTA Section',
            'name' => '',
            'type' => 'tab',
        ),
        array(
            'key' => 'field_cta_title',
            'label' => 'CTA Title',
            'name' => 'cta_title',
            'type' => 'text',
            'default_value' => 'جاهز لابتسامة أكثر ثقة؟',
        ),
        array(
            'key' => 'field_cta_subtitle',
            'label' => 'CTA Subtitle',
            'name' => 'cta_subtitle',
            'type' => 'textarea',
            'default_value' => 'احجز موعدك اليوم واستمتع بخدمة طبية متكاملة تناسب احتياجاتك.',
        ),

        // FAQ SECTION
        array(
            'key' => 'field_faq_tab',
            'label' => 'FAQ Section',
            'name' => '',
            'type' => 'tab',
        ),
        array(
            'key' => 'field_faq_title',
            'label' => 'Section Title',
            'name' => 'faq_title',
            'type' => 'textarea',
            'default_value' => 'إجابات على أسئلتك المتعلقة بالعناية بالأسنان',
        ),
        array(
            'key' => 'field_faq_subtitle',
            'label' => 'Section Subtitle',
            'name' => 'faq_subtitle',
            'type' => 'textarea',
            'default_value' => 'تعرف على أهم المعلومات والإجابات الشائعة حول خدمات الأسنان.',
        ),

        // NEWSLETTER SECTION
        array(
            'key' => 'field_newsletter_tab',
            'label' => 'Newsletter Section',
            'name' => '',
            'type' => 'tab',
        ),
        array(
            'key' => 'field_newsletter_title',
            'label' => 'Title',
            'name' => 'newsletter_title',
            'type' => 'textarea',
            'default_value' => 'حافظ على ابتسامتك مشرقة دائمًا',
        ),
        array(
            'key' => 'field_newsletter_content',
            'label' => 'Content',
            'name' => 'newsletter_content',
            'type' => 'textarea',
            'default_value' => 'اشترك ليصلك أحدث النصائح والعروض الخاصة بخدمات الأسنان.',
        ),
	),
	'location' => array(
		array(
			array(
				'param' => 'page_template',
				'operator' => '==',
				'value' => 'front-page.php',
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
    wp_enqueue_style( 'ammer-fonts', 'https://fonts.googleapis.com/css2?family=Alexandria:wght@300;400;500;600;700;800;900&display=swap', array(), null );
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
    wp_enqueue_style( 'ammer-fonts', 'https://fonts.googleapis.com/css2?family=Alexandria:wght@300;400;500;600;700;800;900&display=swap', array(), null );
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

    $wp_customize->add_setting( 'contact_address', array(
        'default'           => 'الرياض، المملكة العربية السعودية',
        'sanitize_callback' => 'sanitize_text_field',
    ) );
    $wp_customize->add_control( 'contact_address', array(
        'label'       => __( 'عنوان العيادة', 'ammer' ),
        'section'     => 'ammer_contact_settings',
        'type'        => 'text',
    ) );

    $wp_customize->add_setting( 'contact_phone', array(
        'default'           => '+966 50 000 0000',
        'sanitize_callback' => 'sanitize_text_field',
    ) );
    $wp_customize->add_control( 'contact_phone', array(
        'label'       => __( 'رقم الجوال للاتصال', 'ammer' ),
        'section'     => 'ammer_contact_settings',
        'type'        => 'text',
    ) );

    $wp_customize->add_setting( 'contact_email', array(
        'default'           => 'info@dramer.com',
        'sanitize_callback' => 'sanitize_email',
    ) );
    $wp_customize->add_control( 'contact_email', array(
        'label'       => __( 'البريد الإلكتروني', 'ammer' ),
        'section'     => 'ammer_contact_settings',
        'type'        => 'email',
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


/**
 * Add SweetAlert2 to enqueue scripts
 */
function ammer_enqueue_sweetalert() {
    wp_enqueue_script( 'sweetalert2', 'https://cdn.jsdelivr.net/npm/sweetalert2@11', array(), null, true );
}
add_action( 'wp_enqueue_scripts', 'ammer_enqueue_sweetalert' );

/**
 * Register Appointment Custom Post Type
 */
function ammer_register_appointment_cpt() {
    $labels = array(
        'name'               => 'مواعيدنا',
        'singular_name'      => 'موعد',
        'menu_name'          => 'مواعيدنا',
        'add_new'            => 'إضافة موعد (يدوي)',
        'add_new_item'       => 'إضافة موعد جديد',
        'edit_item'          => 'تفاصيل الموعد',
        'new_item'           => 'موعد جديد',
        'view_item'          => 'عرض الموعد',
        'search_items'       => 'البحث في المواعيد',
        'not_found'          => 'لا توجد مواعيد',
        'not_found_in_trash' => 'لا توجد مواعيد في سلة المهملات',
    );

    $args = array(
        'labels'              => $labels,
        'public'              => false, // Only visible in dashboard
        'show_ui'             => true,
        'show_in_menu'        => true,
        'capability_type'     => 'post',
        'hierarchical'        => false,
        'menu_position'       => 21,
        'menu_icon'           => 'dashicons-calendar-alt',
        'supports'            => array( 'title' ),
    );

    register_post_type( 'appointment', $args );
}
add_action( 'init', 'ammer_register_appointment_cpt', 0 );

/**
 * Add Meta Box for Appointment Details
 */
function ammer_add_appointment_meta_box() {
    add_meta_box(
        'appointment_details',
        'تفاصيل الموعد',
        'ammer_appointment_meta_box_callback',
        'appointment',
        'normal',
        'high'
    );
}
add_action( 'add_meta_boxes', 'ammer_add_appointment_meta_box' );

function ammer_appointment_meta_box_callback( $post ) {
    $phone = get_post_meta( $post->ID, '_patient_phone', true );
    $date = get_post_meta( $post->ID, '_appointment_date', true );
    $time = get_post_meta( $post->ID, '_appointment_time', true );
    
    // Format phone for WhatsApp
    $whatsapp_phone = preg_replace('/[^0-9]/', '', $phone);
    if(strpos($whatsapp_phone, '0') === 0) {
        $whatsapp_phone = '966' . substr($whatsapp_phone, 1);
    }
    
    echo '<table class="form-table">';
    echo '<tr><th><label>رقم الجوال</label></th><td><input type="text" readonly value="' . esc_attr($phone) . '" class="regular-text"> ';
    if($whatsapp_phone) {
        echo '<a href="https://wa.me/' . esc_attr($whatsapp_phone) . '" target="_blank" class="button button-primary" style="background-color: #25D366; border-color: #25D366; text-shadow: none;">تواصل عبر الواتساب</a>';
    }
    echo '</td></tr>';
    
    echo '<tr><th><label>تاريخ الموعد</label></th><td><input type="text" readonly value="' . esc_attr($date) . '" class="regular-text"></td></tr>';
    echo '<tr><th><label>الوقت المفضل</label></th><td><input type="text" readonly value="' . esc_attr($time) . '" class="regular-text"></td></tr>';
    echo '</table>';
}

/**
 * Handle AJAX Booking Submission
 */
function ammer_handle_booking_submission() {
    // Check nonce
    if ( ! isset( $_POST['booking_nonce'] ) || ! wp_verify_nonce( $_POST['booking_nonce'], 'submit_booking_nonce' ) ) {
        wp_send_json_error( array( 'message' => 'عذراً، هنالك خطأ أمني. يرجى تحديث الصفحة والمحاولة مرة أخرى.' ) );
    }

    // Sanitize inputs
    $name  = isset($_POST['name']) ? sanitize_text_field($_POST['name']) : '';
    $phone = isset($_POST['phone']) ? sanitize_text_field($_POST['phone']) : '';
    $date  = isset($_POST['date']) ? sanitize_text_field($_POST['date']) : '';
    $time  = isset($_POST['time']) ? sanitize_text_field($_POST['time']) : '';

    if ( empty($name) || empty($phone) || empty($date) ) {
        wp_send_json_error( array( 'message' => 'يرجى تعبئة جميع الحقول المطلوبة.' ) );
    }

    // Create post title
    $post_title = 'موعد - ' . $name . ' - ' . $date;

    // Insert post
    $post_data = array(
        'post_title'    => $post_title,
        'post_status'   => 'publish',
        'post_type'     => 'appointment',
    );

    $post_id = wp_insert_post( $post_data );

    if ( is_wp_error( $post_id ) ) {
        wp_send_json_error( array( 'message' => 'عذراً، حدث خطأ أثناء تسجيل الموعد. يرجى المحاولة لاحقاً.' ) );
    }

    // Save meta fields
    update_post_meta( $post_id, '_patient_phone', $phone );
    update_post_meta( $post_id, '_appointment_date', $date );
    update_post_meta( $post_id, '_appointment_time', $time );

    wp_send_json_success( array( 'message' => 'تم تسجيل الموعد بنجاح! سنتواصل معك قريباً لتأكيد الموعد.' ) );
}
add_action( 'wp_ajax_submit_booking', 'ammer_handle_booking_submission' );
add_action( 'wp_ajax_nopriv_submit_booking', 'ammer_handle_booking_submission' );



/**
 * ACF Field Group for Service Post Type (Background Icon)
 */
function ammer_register_service_bg_icon_acf() {
    if( function_exists('acf_add_local_field_group') ):

    acf_add_local_field_group(array(
        'key' => 'group_ammer_service',
        'title' => 'إعدادات الخدمة',
        'fields' => array(
            array(
                'key' => 'field_service_bg_icon',
                'label' => 'صورة الخلفية (Background Icon)',
                'name' => 'service_bg_icon',
                'type' => 'image',
                'return_format' => 'url',
                'instructions' => 'الصورة الخلفية المزخرفة التي تظهر خلف الأيقونة الرئيسية في كارت الخدمة.',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'service',
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
add_action('acf/init', 'ammer_register_service_bg_icon_acf');
