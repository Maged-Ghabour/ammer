import sys

file_path = 'c:/Users/fkrtk/Desktop/Wordpress Websites/ammer-theme/functions.php'

with open(file_path, 'r', encoding='utf-8') as f:
    content = f.read()

correct_block = """	// Enqueue FontAwesome
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
            'key' => 'field_trust_stats_list',
            'label' => 'Stats List',
            'name' => 'trust_stats_list',
            'type' => 'repeater',
            'layout' => 'table',
            'button_label' => 'أضف إحصائية',
            'sub_fields' => array(
                array(
                    'key' => 'field_stat_label',
                    'label' => 'Label',
                    'name' => 'label',
                    'type' => 'text',
                ),
                array(
                    'key' => 'field_stat_number',
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
function ammer_login_stylesheet() {"""

start_idx = content.find("	// Enqueue FontAwesome")
end_idx = content.find("function ammer_login_stylesheet() {")

if start_idx != -1 and end_idx != -1:
    new_content = content[:start_idx] + correct_block + content[end_idx + len("function ammer_login_stylesheet() {"):]
    with open(file_path, 'w', encoding='utf-8') as f:
        f.write(new_content)
    print("Successfully replaced content.")
else:
    print("Failed to find block.", start_idx, end_idx)
