<?php
/**
 * Šablona pro zobrazení obsahu v archive.php
 *
 * @package Web
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'archive-post' ); ?>>
    <div class="archive-post-inner">
        <?php if ( has_post_thumbnail() ) : ?>
            <div class="post-thumbnail">
                <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                    <?php the_post_thumbnail( 'medium', array( 'class' => 'archive-thumbnail' ) ); ?>
                </a>
            </div>
        <?php endif; ?>

        <div class="post-content">
            <header class="entry-header">
                <?php
                the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );

                if ( 'post' === get_post_type() ) :
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
                        ?>
                    </div><!-- .entry-meta -->
                <?php endif; ?>
            </header><!-- .entry-header -->

            <div class="entry-summary">
                <?php the_excerpt(); ?>
            </div><!-- .entry-summary -->

            <footer class="entry-footer">
                <a href="<?php the_permalink(); ?>" class="read-more-link">
                    <?php esc_html_e( 'Číst více', 'web' ); ?>
                    <span class="screen-reader-text"><?php echo esc_html( get_the_title() ); ?></span>
                </a>
            </footer><!-- .entry-footer -->
        </div><!-- .post-content -->
    </div><!-- .archive-post-inner -->
</article><!-- #post-<?php the_ID(); ?> -->