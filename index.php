<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 */

get_header(); ?>

<main id="primary" class="site-main container" style="padding: 100px 20px;">
    <?php
    if ( have_posts() ) :

        if ( is_singular() ) :
            /* Start the Loop for Single Post */
            while ( have_posts() ) :
                the_post();
                ?>
                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?> style="background: #fff; padding: 40px; border-radius: 20px; box-shadow: 0 10px 30px rgba(0,0,0,0.05); margin-bottom: 40px;">
                    <header class="entry-header" style="margin-bottom: 30px; text-align: center;">
                        <?php the_title( '<h1 class="entry-title" style="color: var(--primary-color); font-size: 2.5rem; margin-bottom: 10px;">', '</h1>' ); ?>
                        <div class="entry-meta" style="color: var(--text-light); font-size: 1rem;">
                            <?php echo get_the_date(); ?>
                        </div>
                    </header>

                    <div class="entry-content" style="font-size: 1.1rem; line-height: 1.8; color: var(--text-color);">
                        <?php
                        if (has_post_thumbnail()) {
                            echo '<div style="margin-bottom: 30px; border-radius: 15px; overflow: hidden;">';
                            the_post_thumbnail('full', array('style' => 'width: 100%; height: auto; display: block;'));
                            echo '</div>';
                        }
                        the_content();
                        ?>
                    </div>
                </article>
                <?php
            endwhile;

        else :
            // Blog list / archive view
            ?>
            <div class="blog-section" style="padding: 0;">
                <div class="blog-header" style="justify-content: center; text-align: center; margin-bottom: 50px;">
                    <?php if ( is_home() && ! is_front_page() ) : ?>
                        <h1 class="section-title"><?php single_post_title(); ?></h1>
                    <?php elseif ( is_archive() ) : ?>
                        <h1 class="section-title"><?php the_archive_title(); ?></h1>
                    <?php elseif ( is_search() ) : ?>
                        <h1 class="section-title"><?php printf( esc_html__( 'نتائج البحث عن: %s', 'ammer' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
                    <?php else: ?>
                        <h1 class="section-title"><?php esc_html_e( 'المدونة', 'ammer' ); ?></h1>
                    <?php endif; ?>
                </div>

                <div class="blog-grid">
                    <?php
                    /* Start the Loop */
                    while ( have_posts() ) :
                        the_post();
                        
                        $thumb_url = get_the_post_thumbnail_url(get_the_ID(), 'large');
                        if (!$thumb_url) {
                            $thumb_url = get_template_directory_uri() . '/assets/blog1.png';
                        }
                        ?>
                        <article id="post-<?php the_ID(); ?>" <?php post_class( 'blog-card' ); ?>>
                            <a href="<?php echo esc_url(get_permalink()); ?>" style="text-decoration: none; color: inherit; display: block;">
                                <div class="blog-image">
                                    <img loading="lazy" src="<?php echo esc_url($thumb_url); ?>" alt="<?php echo esc_attr(get_the_title()); ?>">
                                </div>
                                <div class="blog-content" style="padding-top: 15px;">
                                    <h3 class="blog-title" style="margin: 0 0 10px 0;"><?php the_title(); ?></h3>
                                    <span class="blog-date" style="color: var(--primary-color); font-weight: 700; font-size: 0.9rem;"><?php echo get_the_date(); ?></span>
                                    <div class="blog-excerpt" style="margin-top: 10px; color: var(--text-light); font-size: 0.95rem; line-height: 1.6;">
                                        <?php echo wp_trim_words(get_the_excerpt(), 15, '...'); ?>
                                    </div>
                                </div>
                            </a>
                        </article>
                        <?php
                    endwhile;
                    ?>
                </div>
                
                <div class="pagination" style="margin-top: 50px; text-align: center;">
                    <?php
                    the_posts_pagination( array(
                        'mid_size'  => 2,
                        'prev_text' => __( 'السابق', 'ammer' ),
                        'next_text' => __( 'التالي', 'ammer' ),
                    ) );
                    ?>
                </div>
            </div>
            <style>
                .pagination .nav-links { display: flex; justify-content: center; gap: 10px; flex-wrap: wrap; }
                .pagination .nav-links a, .pagination .nav-links span { padding: 10px 20px; border-radius: 50px; background: #fff; color: var(--text-color); text-decoration: none; font-weight: bold; border: 1px solid #e2e8f0; transition: all 0.3s ease; }
                .pagination .nav-links span.current { background: var(--primary-color); color: #fff; border-color: var(--primary-color); }
                .pagination .nav-links a:hover { background: var(--primary-color); color: #fff; border-color: var(--primary-color); }
            </style>
            <?php
        endif;

    else :
        ?>
        <section class="no-results not-found">
            <header class="page-header" style="margin-bottom: 20px; text-align: center;">
                <h1 class="page-title" style="color: var(--primary-color);"><?php esc_html_e( 'عذراً، لم نتمكن من العثور على ما تبحث عنه.', 'ammer' ); ?></h1>
            </header><!-- .page-header -->

            <div class="page-content" style="text-align: center; color: var(--text-light);">
                <p><?php esc_html_e( 'ربما يمكنك العودة للصفحة الرئيسية أو المحاولة مرة أخرى.', 'ammer' ); ?></p>
            </div><!-- .page-content -->
        </section><!-- .no-results -->
        <?php
    endif;
    ?>
</main><!-- #main -->

<?php
get_footer();
