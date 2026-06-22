const fs = require('fs');
const filePath = 'c:/Users/fkrtk/Desktop/Wordpress Websites/ammer-theme/functions.php';

const newCode = `

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
`;

let content = fs.readFileSync(filePath, 'utf-8');
if (!content.includes('ammer_register_service_bg_icon_acf')) {
    content += newCode;
    fs.writeFileSync(filePath, content, 'utf-8');
    console.log("Appended ACF logic to functions.php");
} else {
    console.log("ACF logic already exists in functions.php");
}
