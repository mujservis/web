<?php
/**
 * Šablona pro zobrazení vyhledávacího formuláře
 *
 * @package Web
 */

?>

<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label class="screen-reader-text" for="search-field"><?php esc_html_e( 'Hledat:', 'web' ); ?></label>
	<div class="search-form-container">
		<input type="search" id="search-field" class="search-field" placeholder="<?php echo esc_attr_x( 'Hledat...', 'placeholder', 'web' ); ?>" value="<?php echo get_search_query(); ?>" name="s" />
		<button type="submit" class="search-submit">
			<span class="screen-reader-text"><?php esc_html_e( 'Hledat', 'web' ); ?></span>
			<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="search-icon">
				<circle cx="11" cy="11" r="8"></circle>
				<line x1="21" y1="21" x2="16.65" y2="16.65"></line>
			</svg>
		</button>
	</div>
</form>