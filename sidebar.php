<?php
/**
 * Šablona pro zobrazení postranního panelu
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Web
 */

if ( ! is_active_sidebar( 'Postranní panel' ) ) {
    return;
}
?>

<aside id="secondary" class="widget-area">
    <?php dynamic_sidebar( 'Postranní panel' ); ?>
</aside><!-- #secondary -->