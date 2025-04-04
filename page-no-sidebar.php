<?php
/**
 * Template Name: Stránka bez postranního panelu
 * Template Post Type: page
 *
 * Šablona pro zobrazení stránky bez postranního panelu.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Web
 */

get_header();
?>

<main id="primary" class="site-main full-width">
    <div class="container">
        <?php
        while ( have_posts() ) :
            the_post();

            get_template_part( 'template-parts/content', 'page' );

            // Pokud jsou komentáře povoleny nebo existují komentáře, načti šablonu komentářů.
            if ( comments_open() || get_comments_number() ) :
                comments_template();
            endif;

        endwhile; // Konec smyčky.
        ?>
    </div><!-- .container -->
</main><!-- #primary -->

<?php
get_footer();