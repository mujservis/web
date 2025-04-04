<?php
/**
 * Šablona pro zobrazení patičky
 *
 * Obsahuje uzavírací tag </body> a </html>
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Web
 */

?>

    <footer id="colophon" class="site-footer">
        <div class="container">
            <div class="footer-widgets">
                <div class="footer-widget-area">
                    <?php if ( is_active_sidebar( 'footer-1' ) ) : ?>
                        <div class="footer-widget footer-widget-1">
                            <?php dynamic_sidebar( 'footer-1' ); ?>
                        </div>
                    <?php endif; ?>
                    
                    <?php if ( is_active_sidebar( 'footer-2' ) ) : ?>
                        <div class="footer-widget footer-widget-2">
                            <?php dynamic_sidebar( 'footer-2' ); ?>
                        </div>
                    <?php endif; ?>
                    
                    <?php if ( is_active_sidebar( 'footer-3' ) ) : ?>
                        <div class="footer-widget footer-widget-3">
                            <?php dynamic_sidebar( 'footer-3' ); ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div><!-- .footer-widgets -->
            
            <nav class="footer-navigation">
                <?php
                wp_nav_menu(
                    array(
                        'theme_location' => 'footer',
                        'menu_id'        => 'footer-menu',
                        'container'      => false,
                        'depth'          => 1,
                        'fallback_cb'    => false,
                    )
                );
                ?>
            </nav><!-- .footer-navigation -->
            
            <div class="site-info">
                <?php
                $current_year = date( 'Y' );
                $site_name    = get_bloginfo( 'name' );
                
                /* translators: %1$s: aktuální rok, %2$s: název webu */
                printf( esc_html__( '© %1$s %2$s. Všechna práva vyhrazena.', 'web' ), esc_html( $current_year ), esc_html( $site_name ) );
                ?>
                
                <span class="sep"> | </span>
                
                <?php
                /* translators: %1$s: odkaz na WordPress.org */
                printf( esc_html__( 'Vytvořeno na %1$s', 'web' ), '<a href="' . esc_url( __( 'https://wordpress.org/', 'web' ) ) . '">WordPress</a>' );
                ?>
                
                <?php if ( function_exists( 'the_privacy_policy_link' ) ) : ?>
                    <span class="sep"> | </span>
                    <?php the_privacy_policy_link(); ?>
                <?php endif; ?>
            </div><!-- .site-info -->
        </div><!-- .container -->
    </footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>