<?php
/**
 * Šablona pro zobrazení jednotlivých stránek
 *
 * Toto je šablona, která zobrazuje všechny stránky ve výchozím nastavení.
 * Další šablony stránek lze vytvořit pojmenováním jako page-*.php
 * (kde * je ID stránky nebo vlastní šablona přiřazená v administraci).
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
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
get_sidebar();
get_footer();