<?php
/**
 * Šablona pro zobrazení výsledků vyhledávání
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Web
 */

get_header();
?>

<main id="primary" class="site-main">
    <div class="container">
        <?php if ( have_posts() ) : ?>

            <header class="page-header">
                <h1 class="page-title">
                    <?php
                    /* translators: %s: hledaný výraz */
                    printf( esc_html__( 'Výsledky vyhledávání pro: %s', 'web' ), '<span>' . get_search_query() . '</span>' );
                    ?>
                </h1>
            </header><!-- .page-header -->

            <div class="search-results-count">
                <?php
                /* translators: %d: počet nalezených výsledků */
                printf( 
                    esc_html( _n( 'Nalezen %d výsledek', 'Nalezeno %d výsledků', (int) $wp_query->found_posts, 'web' ) ),
                    (int) $wp_query->found_posts
                );
                ?>
            </div>

            <div class="search-posts">
                <?php
                /* Začátek smyčky */
                while ( have_posts() ) :
                    the_post();

                    /**
                     * Spustí šablonu pro zobrazení výsledků vyhledávání.
                     * Pokud chceš přizpůsobit tuto část, vytvoř soubor template-parts/content-search.php
                     * a do něj vlož přizpůsobený kód.
                     */
                    get_template_part( 'template-parts/content', 'search' );

                endwhile;
                ?>
            </div><!-- .search-posts -->

            <?php
            // Navigace mezi stránkami výsledků vyhledávání
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