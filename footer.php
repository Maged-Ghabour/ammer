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

            <!-- Left Column -->
            <div class="footer-contact">
                <h4>تواصل معنا</h4>
                <ul class="contact-info">
                    <li class="contact-item">
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

