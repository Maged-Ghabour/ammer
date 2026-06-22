const fs = require('fs');
const filePath = 'c:/Users/fkrtk/Desktop/Wordpress Websites/ammer-theme/functions.php';

const newCode = `

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

`;

let content = fs.readFileSync(filePath, 'utf-8');
if (!content.includes('ammer_register_appointment_cpt')) {
    content += newCode;
    fs.writeFileSync(filePath, content, 'utf-8');
    console.log("Appended booking logic to functions.php");
} else {
    console.log("Booking logic already exists in functions.php");
}
