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
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path></svg>
                    </a>
                    <?php endif; ?>
                    <?php if ( get_theme_mod('tiktok_url', 'https://www.tiktok.com/@dr_amer_alrimi') ) : ?>
                    <a href="<?php echo esc_url( get_theme_mod('tiktok_url', 'https://www.tiktok.com/@dr_amer_alrimi') ); ?>" aria-label="تيك توك" target="_blank">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path d="M12.525.02c1.31-.02 2.61-.01 3.91-.01.08 1.53.63 3.09 1.75 4.17 1.12 1.11 2.7 1.62 4.24 1.79v4.03c-1.44-.05-2.89-.35-4.2-.97-.57-.26-1.1-.59-1.62-.93-.01 2.92.01 5.84-.02 8.75-.08 1.4-.54 2.79-1.35 3.94-1.31 1.92-3.58 3.17-5.91 3.21-1.43.08-2.86-.31-4.08-1.03-2.02-1.19-3.44-3.37-3.65-5.71-.02-.5-.03-1-.01-1.49.18-1.9 1.12-3.72 2.58-4.96 1.66-1.44 3.98-2.13 6.15-1.72.02 1.48-.04 2.96-.04 4.44-.99-.32-2.15-.23-3.02.37-.63.41-1.11 1.04-1.36 1.75-.21.51-.15 1.07-.14 1.61.24 1.64 1.82 3.02 3.5 2.87 1.12-.01 2.19-.66 2.77-1.61.19-.33.4-.67.41-1.06.1-1.79.06-3.57.07-5.36.01-4.03-.01-8.05.02-12.07z"/></svg>
                    </a>
                    <?php endif; ?>
                    <?php if ( get_theme_mod('instagram_url', 'https://www.instagram.com/dr_amer_alrimi') ) : ?>
                    <a href="<?php echo esc_url( get_theme_mod('instagram_url', 'https://www.instagram.com/dr_amer_alrimi') ); ?>" aria-label="انستجرام" target="_blank">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line></svg>
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

