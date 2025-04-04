<?php
/**
 * Šablona pro zobrazení jednotlivých příspěvků
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Web
 */

get_header();
?>

<main id="primary" class="site-main">
    <div class="container">
        <?php
        while ( have_posts() ) :
            the_post();

            get_template_part( 'template-parts/content', 'single' );

            // Pokud jsou komentáře povoleny nebo existují komentáře, načti šablonu komentářů.
            if ( comments_open() || get_comments_number() ) :
                comments_template();
            endif;

            // Navigace mezi příspěvky.
            the_post_navigation(
                array(
                    'prev_text' => '<span class="nav-subtitle">' . esc_html__( 'Předchozí:', 'web' ) . '</span> <span class="nav-title">%title</span>',
                    'next_text' => '<span class="nav-subtitle">' . esc_html__( 'Následující:', 'web' ) . '</span> <span class="nav-title">%title</span>',
                )
            );

            // Pokud je povoleno, zobraz související příspěvky.
            if ( function_exists( 'web_related_posts' ) ) :
                web_related_posts();
            endif;

        endwhile; // Konec smyčky.
        ?>
    </div><!-- .container -->
</main><!-- #primary -->

<?php
get_sidebar();
get_footer();