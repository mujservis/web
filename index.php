<?php
/**
 * Hlavní šablona
 *
 * Toto je nejobecnější šablona v tématu WordPress
 * a jeden ze dvou povinných souborů pro téma (druhým je style.css).
 * Používá se k zobrazení stránky, když není nalezena žádná specifičtější šablona.
 * Např. sestavuje domovskou stránku, když neexistuje soubor home.php.
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
        if ( have_posts() ) :

            if ( is_home() && ! is_front_page() ) :
                ?>
                <header class="page-header">
                    <h1 class="page-title"><?php single_post_title(); ?></h1>
                </header>
                <?php
            endif;

            /* Začátek smyčky */
            while ( have_posts() ) :
                the_post();

                /*
                 * Načtení šablony pro obsah podle typu příspěvku.
                 * Pokud chceš přizpůsobit tuto část v dětském tématu, vytvoř soubor
                 * content-___.php (kde ___ je název typu příspěvku) a ten bude použit místo výchozí šablony.
                 */
                get_template_part( 'template-parts/content', get_post_type() );

            endwhile;

            the_posts_navigation();

        else :

            get_template_part( 'template-parts/content', 'none' );

        endif;
        ?>
    </div>
</main><!-- #primary -->

<?php
get_sidebar();
get_footer();