const fs = require('fs');
const path = require('path');

const themeDir = 'c:/Users/fkrtk/Desktop/Wordpress Websites/ammer-theme';

// 1. Update functions.php Customizer
const funcFile = path.join(themeDir, 'functions.php');
let funcContent = fs.readFileSync(funcFile, 'utf-8');

const targetFunc = `    $wp_customize->add_setting( 'tiktok_url', array(
        'default'           => 'https://www.tiktok.com/@dr_amer_alrimi',
        'sanitize_callback' => 'esc_url_raw',
    ) );
    $wp_customize->add_control( 'tiktok_url', array(
        'label'       => __( 'TikTok URL', 'ammer' ),
        'section'     => 'ammer_contact_settings',
        'type'        => 'url',
    ) );
}`;

const replaceFunc = `    $wp_customize->add_setting( 'tiktok_url', array(
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
}`;

if (funcContent.includes('contact_address')) {
    console.log("Customizer settings already added.");
} else {
    // Normalize newlines and try to replace
    const normFuncContent = funcContent.replace(/\\r\\n/g, '\\n');
    const normTarget = targetFunc.replace(/\\r\\n/g, '\\n');
    if (normFuncContent.includes(normTarget)) {
        funcContent = normFuncContent.replace(normTarget, replaceFunc);
        fs.writeFileSync(funcFile, funcContent, 'utf-8');
        console.log("Updated functions.php customizer settings");
    } else {
        console.log("Could not find target block in functions.php");
    }
}

// 2. Update footer.php
const footerFile = path.join(themeDir, 'footer.php');
let footerContent = fs.readFileSync(footerFile, 'utf-8');

const targetFooter = `                    <li class="contact-item">
                        <i class="fas fa-map-marker-alt" style="font-size: 18px; color: #94a3b8; width: 20px; text-align: center; flex-shrink: 0;"></i>
                        <span>الرياض، المملكة العربية السعودية</span>
                    </li>
                    <li class="contact-item">
                        <i class="fas fa-phone-alt" style="font-size: 18px; color: #94a3b8; width: 20px; text-align: center; flex-shrink: 0;"></i>
                        <span dir="ltr">+966 50 000 0000</span>
                    </li>
                    <li class="contact-item">
                        <i class="fas fa-envelope" style="font-size: 18px; color: #94a3b8; width: 20px; text-align: center; flex-shrink: 0;"></i>
                        <span>info@dramer.com</span>
                    </li>`;

const replaceFooter = `                    <li class="contact-item">
                        <i class="fas fa-map-marker-alt" style="font-size: 18px; color: #94a3b8; width: 20px; text-align: center; flex-shrink: 0;"></i>
                        <span><?php echo esc_html(get_theme_mod('contact_address', 'الرياض، المملكة العربية السعودية')); ?></span>
                    </li>
                    <li class="contact-item">
                        <i class="fas fa-phone-alt" style="font-size: 18px; color: #94a3b8; width: 20px; text-align: center; flex-shrink: 0;"></i>
                        <span dir="ltr"><?php echo esc_html(get_theme_mod('contact_phone', '+966 50 000 0000')); ?></span>
                    </li>
                    <li class="contact-item">
                        <i class="fas fa-envelope" style="font-size: 18px; color: #94a3b8; width: 20px; text-align: center; flex-shrink: 0;"></i>
                        <span><?php echo esc_html(get_theme_mod('contact_email', 'info@dramer.com')); ?></span>
                    </li>`;

if (footerContent.includes('contact_address')) {
    console.log("Footer already updated.");
} else {
    const normFooterContent = footerContent.replace(/\\r\\n/g, '\\n');
    const normFooterTarget = targetFooter.replace(/\\r\\n/g, '\\n');
    if (normFooterContent.includes(normFooterTarget)) {
        footerContent = normFooterContent.replace(normFooterTarget, replaceFooter);
        fs.writeFileSync(footerFile, footerContent, 'utf-8');
        console.log("Updated footer.php");
    } else {
        console.log("Could not find target block in footer.php");
    }
}

// 3. Update style.css
const styleFile = path.join(themeDir, 'style.css');
let styleContent = fs.readFileSync(styleFile, 'utf-8');

const targetContactItem = `
.contact-item {
    display: flex;
    align-items: center;
    justify-content: flex-start;
    gap: 12px;
}`;

const replaceContactItem = `
.contact-info {
    padding-right: 0;
    margin: 0;
    list-style: none;
    display: flex;
    flex-direction: column;
    gap: 25px; /* Added more space between items */
}

.contact-item {
    display: flex;
    align-items: center;
    justify-content: flex-start;
    gap: 15px; /* Slight increase in gap between icon and text */
}`;

if (!styleContent.includes('.contact-info {')) {
    const normStyleContent = styleContent.replace(/\\r\\n/g, '\\n');
    const normTargetStyle = targetContactItem.replace(/\\r\\n/g, '\\n');
    if (normStyleContent.includes(normTargetStyle)) {
        styleContent = normStyleContent.replace(normTargetStyle, replaceContactItem);
    } else {
        console.log("Could not find contact-item in style.css");
    }
}

// Center footer bottom
if (!styleContent.includes('.footer-bottom {')) {
    styleContent += `\n\n/* Footer Bottom */\n.footer-bottom {\n    text-align: center;\n    display: flex;\n    justify-content: center;\n    align-items: center;\n    padding: 20px 0;\n    border-top: 1px solid rgba(255, 255, 255, 0.1);\n}\n`;
} else {
    // If it exists, let's just make sure it's centered by appending a rule that overrides it.
    styleContent += `\n\n.footer-bottom {\n    text-align: center !important;\n    display: flex !important;\n    justify-content: center !important;\n}\n`;
}

fs.writeFileSync(styleFile, styleContent, 'utf-8');
console.log("Updated style.css");
