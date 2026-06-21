<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 */

get_header(); ?>

<main id="primary" class="site-main container" style="padding: 100px 0;">
    <?php
    if ( have_posts() ) :

        if ( is_home() && ! is_front_page() ) :
            ?>
            <header>
                <h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
            </header>
            <?php
        endif;

        /* Start the Loop */
        while ( have_posts() ) :
            the_post();
            ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class( 'blog-card' ); ?> style="margin-bottom: 40px; background: #fff; padding: 30px; border-radius: 15px; box-shadow: 0 10px 30px rgba(0,0,0,0.05);">
                <header class="entry-header" style="margin-bottom: 20px;">
                    <?php
                    if ( is_singular() ) :
                        the_title( '<h1 class="entry-title" style="color: var(--primary-color);">', '</h1>' );
                    else :
                        the_title( '<h2 class="entry-title" style="color: var(--primary-color);"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
                    endif;
                    ?>
                </header><!-- .entry-header -->

                <div class="entry-content">
                    <?php
                    the_content();
                    ?>
                </div><!-- .entry-content -->
            </article><!-- #post-<?php the_ID(); ?> -->
            <?php
        endwhile;

        the_posts_navigation();

    else :
        ?>
        <section class="no-results not-found">
            <header class="page-header" style="margin-bottom: 20px;">
                <h1 class="page-title"><?php esc_html_e( 'عذراً، لم نتمكن من العثور على ما تبحث عنه.', 'ammer' ); ?></h1>
            </header><!-- .page-header -->

            <div class="page-content">
                <p><?php esc_html_e( 'ربما يمكنك العودة للصفحة الرئيسية أو المحاولة مرة أخرى.', 'ammer' ); ?></p>
            </div><!-- .page-content -->
        </section><!-- .no-results -->
        <?php
    endif;
    ?>
</main><!-- #main -->

<?php
get_footer();
