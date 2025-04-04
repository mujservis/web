<?php
/**
 * Šablona pro zobrazení chybové stránky 404 (stránka nenalezena)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Web
 */

get_header();
?>

<main id="primary" class="site-main">
    <div class="container">
        <section class="error-404 not-found">
            <header class="page-header">
                <h1 class="page-title"><?php esc_html_e( 'Jejda! Tato stránka nebyla nalezena.', 'web' ); ?></h1>
            </header><!-- .page-header -->

            <div class="page-content">
                <p><?php esc_html_e( 'Zdá se, že na tomto místě nic není. Možná zkuste jeden z odkazů níže nebo vyhledávání?', 'web' ); ?></p>

                <?php get_search_form(); ?>

                <div class="error-404-widgets">
                    <div class="error-404-widget">
                        <h2><?php esc_html_e( 'Nejnovější příspěvky', 'web' ); ?></h2>
                        <ul>
                            <?php
                            $recent_posts = wp_get_recent_posts(
                                array(
                                    'numberposts' => 5,
                                    'post_status' => 'publish',
                                )
                            );
                            
                            foreach ( $recent_posts as $post ) {
                                printf(
                                    '<li><a href="%1$s">%2$s</a></li>',
                                    esc_url( get_permalink( $post['ID'] ) ),
                                    esc_html( $post['post_title'] )
                                );
                            }
                            wp_reset_postdata();
                            ?>
                        </ul>
                    </div>

                    <div class="error-404-widget">
                        <h2><?php esc_html_e( 'Kategorie', 'web' ); ?></h2>
                        <ul>
                            <?php
                            wp_list_categories(
                                array(
                                    'orderby'    => 'count',
                                    'order'      => 'DESC',
                                    'show_count' => 1,
                                    'title_li'   => '',
                                    'number'     => 10,
                                )
                            );
                            ?>
                        </ul>
                    </div>

                    <div class="error-404-widget">
                        <h2><?php esc_html_e( 'Archiv', 'web' ); ?></h2>
                        <ul>
                            <?php
                            wp_get_archives(
                                array(
                                    'type'  => 'monthly',
                                    'limit' => 5,
                                )
                            );
                            ?>
                        </ul>
                    </div>
                </div><!-- .error-404-widgets -->
            </div><!-- .page-content -->
        </section><!-- .error-404 -->
    </div><!-- .container -->
</main><!-- #primary -->

<?php
get_footer();