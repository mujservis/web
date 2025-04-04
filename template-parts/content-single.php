<?php
/**
 * Šablona pro zobrazení obsahu v single.php
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
        
        <div class="entry-meta">
            <?php
            // Datum publikování
            echo '<span class="posted-on">';
            echo '<span class="screen-reader-text">' . esc_html__( 'Publikováno: ', 'web' ) . '</span>';
            echo '<time class="entry-date published" datetime="' . esc_attr( get_the_date( 'c' ) ) . '">' . esc_html( get_the_date() ) . '</time>';
            echo '</span>';
            
            // Autor
            echo '<span class="byline">';
            echo '<span class="screen-reader-text">' . esc_html__( 'Autor: ', 'web' ) . '</span>';
            echo '<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>';
            echo '</span>';
            
            // Komentáře
            if ( ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
                echo '<span class="comments-link">';
                /* translators: %s: počet komentářů */
                comments_popup_link(
                    sprintf(
                        wp_kses(
                            /* translators: %s: název příspěvku */
                            __( 'Napsat komentář<span class="screen-reader-text"> k %s</span>', 'web' ),
                            array(
                                'span' => array(
                                    'class' => array(),
                                ),
                            )
                        ),
                        get_the_title()
                    )
                );
                echo '</span>';
            }
            ?>
        </div><!-- .entry-meta -->
    </header><!-- .entry-header -->

    <div class="entry-content">
        <?php
        the_content(
            sprintf(
                wp_kses(
                    /* translators: %s: Název příspěvku. */
                    __( 'Pokračovat ve čtení<span class="screen-reader-text"> "%s"</span>', 'web' ),
                    array(
                        'span' => array(
                            'class' => array(),
                        ),
                    )
                ),
                wp_kses_post( get_the_title() )
            )
        );

        wp_link_pages(
            array(
                'before' => '<div class="page-links">' . esc_html__( 'Stránky:', 'web' ),
                'after'  => '</div>',
            )
        );
        ?>
    </div><!-- .entry-content -->

    <footer class="entry-footer">
        <?php
        // Kategorie
        if ( has_category() ) :
            echo '<div class="cat-links">';
            echo '<span class="screen-reader-text">' . esc_html__( 'Kategorie:', 'web' ) . '</span>';
            the_category( ', ' );
            echo '</div>';
        endif;
        
        // Štítky
        if ( has_tag() ) :
            echo '<div class="tags-links">';
            echo '<span class="screen-reader-text">' . esc_html__( 'Štítky:', 'web' ) . '</span>';
            the_tags( '', ', ', '' );
            echo '</div>';
        endif;
        
        // Odkaz na úpravu příspěvku pro přihlášené uživatele
        edit_post_link(
            sprintf(
                wp_kses(
                    /* translators: %s: Název příspěvku */
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
</article><!-- #post-<?php the_ID(); ?> -->