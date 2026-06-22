const fs = require('fs');
let content = fs.readFileSync('c:/Users/fkrtk/Desktop/Wordpress Websites/ammer-theme/functions.php', 'utf-8');

const search = `    $wp_customize->add_setting( 'instagram_url', array(
        'default'           => 'https://www.instagram.com/dr_amer_alrimi',
        'sanitize_callback' => 'esc_url_raw',
    ) );
    $wp_customize->add_control( 'instagram_url', array(
 */
function get_whatsapp_url() {`;

const replace = `    $wp_customize->add_setting( 'instagram_url', array(
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
function get_whatsapp_url() {`;

const normContent = content.replace(/\r\n/g, '\n');
const normSearch = search.replace(/\r\n/g, '\n');

if (normContent.includes(normSearch)) {
    fs.writeFileSync('c:/Users/fkrtk/Desktop/Wordpress Websites/ammer-theme/functions.php', normContent.replace(normSearch, replace), 'utf-8');
    console.log("Fixed functions.php syntax error and added customizer settings.");
} else {
    console.log("Could not find the target string to replace.");
}
