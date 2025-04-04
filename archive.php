<?php
/**
 * Šablona pro zobrazení archivních stránek
 *
 * Používá se pro zobrazení archivních stránek, pokud není nalezena specifičtější šablona.
 * Například category.php (kategorie), author.php (autor), date.php (datum) atd.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Web
 */

get_header();
?>

<main id="primary" class="site-main">
    <div class="container">
        <?php if ( have_posts() ) : ?>

            <header class="page-header">
                <?php
                the_archive_title( '<h1 class="page-title">', '</h1>' );
                the_archive_description( '<div class="archive-description">', '</div>' );
                ?>
            </header><!-- .page-header -->

            <div class="archive-posts">
                <?php
                /* Začátek smyčky */
                while ( have_posts() ) :
                    the_post();

                    /*
                     * Načtení šablony pro obsah.
                     * Pokud chceš přizpůsobit tuto část, vytvoř soubor template-parts/content-archive.php
                     * a do něj vlož přizpůsobený kód.
                     */
                    get_template_part( 'template-parts/content', 'archive' );

                endwhile;
                ?>
            </div><!-- .archive-posts -->

            <?php
            // Navigace mezi stránkami archivu
            the_posts_pagination(
                array(
                    'prev_text'          => '<span class="screen-reader-text">' . esc_html__( 'Předchozí stránka', 'web' ) . '</span><span aria-hidden="true">&laquo;</span>',
                    'next_text'          => '<span class="screen-reader-text">' . esc_html__( 'Následující stránka', 'web' ) . '</span><span aria-hidden="true">&raquo;</span>',
                    'before_page_number' => '<span class="meta-nav screen-reader-text">' . esc_html__( 'Stránka', 'web' ) . ' </span>',
                    'mid_size'           => 2,
                )
            );

        else :

            get_template_part( 'template-parts/content', 'none' );

        endif;
        ?>
    </div><!-- .container -->
</main><!-- #primary -->

<?php
get_sidebar();
get_footer();