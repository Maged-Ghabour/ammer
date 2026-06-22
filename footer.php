    <footer class="main-footer container">
        <div class="footer-grid">
            <!-- Right Column -->
            <div class="footer-brand">
                <?php 
                if ( function_exists( 'the_custom_logo' ) && has_custom_logo() ) {
                    the_custom_logo();
                } else {
                    echo '<a href="' . esc_url( home_url( '/' ) ) . '"><img src="' . esc_url( get_template_directory_uri() ) . '/assets/logoFooter.png" alt="' . get_bloginfo( 'name' ) . '" class="footer-logo"></a>';
                }
                ?>
                <p>عيادة أسنان رائدة بتقديم الخدمات الطبية<br>وفق أحدث التقنيات وأعلى المستويات.</p>
                <div class="social-links">
                    <?php if ( get_theme_mod('facebook_url', 'https://www.facebook.com/dr.amer.elrimi/') ) : ?>
                    <a href="<?php echo esc_url( get_theme_mod('facebook_url', 'https://www.facebook.com/dr.amer.elrimi/') ); ?>" aria-label="فيسبوك" target="_blank">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <?php endif; ?>
                    <?php if ( get_theme_mod('tiktok_url', 'https://www.tiktok.com/@dr_amer_alrimi') ) : ?>
                    <a href="<?php echo esc_url( get_theme_mod('tiktok_url', 'https://www.tiktok.com/@dr_amer_alrimi') ); ?>" aria-label="تيك توك" target="_blank">
                        <i class="fab fa-tiktok"></i>
                    </a>
                    <?php endif; ?>
                    <?php if ( get_theme_mod('instagram_url', 'https://www.instagram.com/dr_amer_alrimi') ) : ?>
                    <a href="<?php echo esc_url( get_theme_mod('instagram_url', 'https://www.instagram.com/dr_amer_alrimi') ); ?>" aria-label="انستجرام" target="_blank">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <?php endif; ?>
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

