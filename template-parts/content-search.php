<?php
/**
 * Šablona pro zobrazení obsahu ve výsledcích vyhledávání
 *
 * @package Web
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'search-post' ); ?>>
    <div class="search-post-inner">
        <?php if ( has_post_thumbnail() ) : ?>
            <div class="post-thumbnail">
                <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                    <?php the_post_thumbnail( 'thumbnail', array( 'class' => 'search-thumbnail' ) ); ?>
                </a>
            </div>
        <?php endif; ?>

        <div class="post-content">
            <header class="entry-header">
                <?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

                <?php if ( 'post' === get_post_type() ) : ?>
                    <div class="entry-meta">
                        <?php
                        // Typ obsahu
                        echo '<span class="post-type">';
                        echo '<span class="screen-reader-text">' . esc_html__( 'Typ:', 'web' ) . ' </span>';
                        echo esc_html( get_post_type_object( get_post_type() )->labels->singular_name );
                        echo '</span>';
                        
                        // Datum publikování
                        echo '<span class="posted-on">';
                        echo '<span class="screen-reader-text">' . esc_html__( 'Publikováno:', 'web' ) . ' </span>';
                        echo '<time class="entry-date published" datetime="' . esc_attr( get_the_date( 'c' ) ) . '">' . esc_html( get_the_date() ) . '</time>';
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
    </div><!-- .search-post-inner -->
</article><!-- #post-<?php the_ID(); ?> -->