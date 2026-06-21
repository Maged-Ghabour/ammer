    <footer class="main-footer container">
        <div class="footer-grid">
            <!-- Right Column -->
            <div class="footer-brand">
                <?php 
                if ( function_exists( 'the_custom_logo' ) && has_custom_logo() ) {
                    the_custom_logo();
                } else {
                    echo '<h2><a href="' . esc_url( home_url( '/' ) ) . '">' . get_bloginfo( 'name' ) . '</a></h2>';
                }
                ?>
                <p>عيادة أسنان رائدة بتقديم الخدمات الطبية<br>وفق أحدث التقنيات وأعلى المستويات.</p>
                <div class="social-links">
                    <a href="#" aria-label="فيسبوك">
                        <svg viewBox="0 0 24 24"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path></svg>
                    </a>
                    <a href="#" aria-label="تويتر">
                        <svg viewBox="0 0 24 24"><path d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z"></path></svg>
                    </a>
                    <a href="#" aria-label="انستجرام">
                        <svg viewBox="0 0 24 24"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line></svg>
                    </a>
                </div>
            </div>

            <!-- Middle Columns -->
            <div class="footer-links">
                <h4>روابط سريعة</h4>
                <ul>
                    <li><a href="#">الرئيسية</a></li>
                    <li><a href="#">عن العيادة</a></li>
                    <li><a href="#">خدماتنا</a></li>
                    <li><a href="<?php echo esc_url(get_whatsapp_url()); ?>" target="_blank">احجز موعد</a></li>
                </ul>
            </div>

            <div class="footer-links">
                <h4>الخدمات</h4>
                <ul>
                    <li><a href="#">زراعة الأسنان</a></li>
                    <li><a href="#">ابتسامة هوليود</a></li>
                    <li><a href="#">تقويم الأسنان</a></li>
                    <li><a href="#">تبييض الأسنان</a></li>
                </ul>
            </div>

            <!-- Left Column -->
            <div class="footer-contact">
                <h4>تواصل معنا</h4>
                <ul class="contact-info">
                    <li>
                        <svg viewBox="0 0 24 24"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path><circle cx="12" cy="10" r="3"></circle></svg>
                        <span>الرياض، المملكة العربية السعودية</span>
                    </li>
                    <li>
                        <svg viewBox="0 0 24 24"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path></svg>
                        <span dir="ltr">+966 50 000 0000</span>
                    </li>
                    <li>
                        <svg viewBox="0 0 24 24"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>
                        <span>info@dramer.com</span>
                    </li>
                </ul>
            </div>
        </div>

        <div class="footer-bottom">
            <p>جميع الحقوق محفوظة &copy; <?php echo date('Y'); ?> عيادة د.عامر الريمي</p>
        </div>
    </footer>
</div> <!-- /page-wrapper -->

<script>
    // Mobile Menu Logic
    const mobileMenuBtn = document.querySelector('.mobile-menu-btn');
    const closeMenuBtn = document.querySelector('.close-menu-btn');
    const mainNav = document.querySelector('.main-nav');
    const mobileOverlay = document.querySelector('.mobile-menu-overlay');

    if (mobileMenuBtn && mainNav) {
        function openMenu() {
            mainNav.classList.add('open');
            if(mobileOverlay) mobileOverlay.classList.add('open');
            document.body.style.overflow = 'hidden';
        }
        function closeMenu() {
            mainNav.classList.remove('open');
            if(mobileOverlay) mobileOverlay.classList.remove('open');
            document.body.style.overflow = '';
        }
        mobileMenuBtn.addEventListener('click', openMenu);
        if(closeMenuBtn) closeMenuBtn.addEventListener('click', closeMenu);
        if(mobileOverlay) mobileOverlay.addEventListener('click', closeMenu);
    }
</script>

<?php wp_footer(); ?>
</body>
</html>
