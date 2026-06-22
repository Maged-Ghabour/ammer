const fs = require('fs');
const filePath = 'c:/Users/fkrtk/Desktop/Wordpress Websites/ammer-theme/assets/js/main.js';

const newCode = `

// Booking Form AJAX Submission
const bookingForm = document.getElementById('heroBookingForm');
if (bookingForm) {
    bookingForm.addEventListener('submit', function(e) {
        e.preventDefault();
        
        const submitBtn = bookingForm.querySelector('button[type="submit"]');
        const originalBtnText = submitBtn.innerText;
        submitBtn.innerText = 'جاري الإرسال...';
        submitBtn.disabled = true;

        const formData = new FormData(bookingForm);
        formData.append('action', 'submit_booking');

        const ajaxUrl = bookingForm.getAttribute('data-ajax-url');

        fetch(ajaxUrl, {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            submitBtn.innerText = originalBtnText;
            submitBtn.disabled = false;

            if (data.success) {
                if(typeof Swal !== 'undefined') {
                    Swal.fire({
                        title: 'تم بنجاح!',
                        text: data.data.message,
                        icon: 'success',
                        confirmButtonText: 'حسناً',
                        confirmButtonColor: '#0066cc'
                    });
                } else {
                    alert(data.data.message);
                }
                bookingForm.reset();
            } else {
                if(typeof Swal !== 'undefined') {
                    Swal.fire({
                        title: 'عذراً',
                        text: data.data.message || 'حدث خطأ غير متوقع.',
                        icon: 'error',
                        confirmButtonText: 'حسناً',
                        confirmButtonColor: '#0066cc'
                    });
                } else {
                    alert(data.data.message || 'حدث خطأ غير متوقع.');
                }
            }
        })
        .catch(error => {
            submitBtn.innerText = originalBtnText;
            submitBtn.disabled = false;
            if(typeof Swal !== 'undefined') {
                Swal.fire({
                    title: 'خطأ',
                    text: 'حدث خطأ في الاتصال. يرجى المحاولة لاحقاً.',
                    icon: 'error',
                    confirmButtonText: 'حسناً',
                    confirmButtonColor: '#0066cc'
                });
            } else {
                alert('حدث خطأ في الاتصال. يرجى المحاولة لاحقاً.');
            }
            console.error('Error:', error);
        });
    });
}
`;

let content = fs.readFileSync(filePath, 'utf-8');
if (!content.includes('heroBookingForm')) {
    content += newCode;
    fs.writeFileSync(filePath, content, 'utf-8');
    console.log("Appended JS to main.js");
} else {
    console.log("JS already exists in main.js");
}
