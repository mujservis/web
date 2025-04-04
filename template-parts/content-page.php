<?php
/**
 * Šablona pro zobrazení obsahu v page.php
 *
 * @package Web
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="entry-header">
        <?php 
        if ( has_post_thumbnail() ) :
            ?>
            <div class="post-thumbnail">
                <?php the_post_thumbnail( 'large', array( 'class' => 'entry-thumbnail' ) ); ?>
            </div>
            <?php
        endif;
        
        the_title( '<h1 class="entry-title">', '</h1>' ); 
        ?>
    </header><!-- .entry-header -->

    <div class="entry-content">
        <?php
        the_content();

        wp_link_pages(
            array(
                'before' => '<div class="page-links">' . esc_html__( 'Stránky:', 'web' ),
                'after'  => '</div>',
            )
        );
        ?>
    </div><!-- .entry-content -->

    <?php if ( get_edit_post_link() ) : ?>
        <footer class="entry-footer">
            <?php
            edit_post_link(
                sprintf(
                    wp_kses(
                        /* translators: %s: Název stránky */
                        __( 'Upravit <span class="screen-reader-text">%s</span>', 'web' ),
                        array(
                            'span' => array(
                                'class' => array(),
                            ),
                        )
                    ),
                    wp_kses_post( get_the_title() )
                ),
                '<div class="edit-link">',
                '</div>'
            );
            ?>
        </footer><!-- .entry-footer -->
    <?php endif; ?>
</article><!-- #post-<?php the_ID(); ?> -->