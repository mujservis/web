<?php
/**
 * Funkce, které vylepšují téma napojením do WordPressu
 *
 * @package Web
 */

/**
 * Přidá třídy do elementu <body>.
 *
 * @param array $classes Třídy pro element body.
 * @return array
 */
function web_body_classes( $classes ) {
	// Přidá třídu 'hfeed' pro stránky, které nejsou jednotlivými příspěvky.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Přidá třídu pro stránky s postranním panelem.
	if ( is_active_sidebar( 'sidebar-1' ) && ! is_page_template( 'page-templates/full-width.php' ) ) {
		$classes[] = 'has-sidebar';
	} else {
		$classes[] = 'no-sidebar';
	}

	// Přidá třídu pro stránky s vlastní hlavičkou.
	if ( has_header_image() ) {
		$classes[] = 'has-header-image';
	}

	// Přidá třídu pro stránky s vlastním pozadím.
	if ( get_background_image() || get_background_color() !== 'ffffff' ) {
		$classes[] = 'has-custom-background';
	}

	return $classes;
}
add_filter( 'body_class', 'web_body_classes' );

/**
 * Přidá atribut rel="nofollow" do odkazů v komentářích.
 *
 * @param string $comment_text Text komentáře.
 * @return string Upravený text komentáře.
 */
function web_nofollow_links( $comment_text ) {
	return preg_replace_callback(
		'/<a[^>]+>/',
		function( $matches ) {
			if ( strpos( $matches[0], 'rel=' ) === false ) {
				return str_replace( '<a ', '<a rel="nofollow" ', $matches[0] );
			} else {
				return preg_replace(
					'/rel=([\'"])(?!.*\1)/',
					'rel=$1nofollow ',
					$matches[0]
				);
			}
		},
		$comment_text
	);
}
add_filter( 'comment_text', 'web_nofollow_links' );

/**
 * Přidá atribut loading="lazy" k obrázkům v obsahu.
 *
 * @param string $content Obsah příspěvku.
 * @return string Upravený obsah příspěvku.
 */
function web_lazy_load_images( $content ) {
	if ( is_admin() || is_feed() ) {
		return $content;
	}

	// Přidá atribut loading="lazy" k obrázkům, které ho ještě nemají.
	return preg_replace_callback(
		'/<img([^>]+)>/i',
		function( $matches ) {
			if ( strpos( $matches[1], 'loading=' ) === false ) {
				return '<img' . $matches[1] . ' loading="lazy">';
			}
			return $matches[0];
		},
		$content
	);
}
add_filter( 'the_content', 'web_lazy_load_images' );

/**
 * Přidá atribut rel="preconnect" pro Google Fonts.
 */
function web_resource_hints( $urls, $relation_type ) {
	if ( 'preconnect' === $relation_type ) {
		$urls[] = array(
			'href' => 'https://fonts.gstatic.com',
			'crossorigin',
		);
	}
	return $urls;
}
add_filter( 'wp_resource_hints', 'web_resource_hints', 10, 2 );

/**
 * Upraví výstup excerpt (úryvku).
 *
 * @param string $more Aktuální text "více".
 * @return string Upravený text "více".
 */
function web_excerpt_more( $more ) {
	if ( is_admin() ) {
		return $more;
	}
	return '&hellip;';
}
add_filter( 'excerpt_more', 'web_excerpt_more' );

/**
 * Upraví délku úryvku.
 *
 * @param int $length Aktuální délka úryvku.
 * @return int Upravená délka úryvku.
 */
function web_excerpt_length( $length ) {
	if ( is_admin() ) {
		return $length;
	}
	return 30;
}
add_filter( 'excerpt_length', 'web_excerpt_length' );

/**
 * Přidá podporu pro SVG obrázky v nahrávání médií.
 *
 * @param array $mimes Povolené typy souborů.
 * @return array Upravené povolené typy souborů.
 */
function web_mime_types( $mimes ) {
	$mimes['svg'] = 'image/svg+xml';
	return $mimes;
}
add_filter( 'upload_mimes', 'web_mime_types' );

/**
 * Přidá vlastní velikosti obrázků.
 */
function web_image_sizes() {
	// Přidá vlastní velikost obrázku pro náhledy příspěvků
	add_image_size( 'web-featured', 1200, 600, true );
	
	// Přidá vlastní velikost obrázku pro náhledy v archivu
	add_image_size( 'web-archive', 400, 300, true );
	
	// Přidá vlastní velikost obrázku pro náhledy v postranním panelu
	add_image_size( 'web-sidebar', 100, 100, true );
}
add_action( 'after_setup_theme', 'web_image_sizes' );

/**
 * Přidá vlastní velikosti obrázků do výběru v administraci.
 *
 * @param array $sizes Aktuální velikosti obrázků.
 * @return array Upravené velikosti obrázků.
 */
function web_custom_image_sizes( $sizes ) {
	return array_merge( $sizes, array(
		'web-featured' => __( 'Náhled příspěvku', 'web' ),
		'web-archive'  => __( 'Náhled v archivu', 'web' ),
		'web-sidebar'  => __( 'Náhled v postranním panelu', 'web' ),
	) );
}
add_filter( 'image_size_names_choose', 'web_custom_image_sizes' );

/**
 * Přidá vlastní třídy do odkazů v menu.
 *
 * @param array $atts Atributy odkazu.
 * @param object $item Položka menu.
 * @param object $args Argumenty menu.
 * @return array Upravené atributy odkazu.
 */
function web_menu_link_classes( $atts, $item, $args ) {
	if ( 'primary' === $args->theme_location ) {
		$atts['class'] = 'nav-link';
	}
	
	if ( 'footer' === $args->theme_location ) {
		$atts['class'] = 'footer-link';
	}
	
	return $atts;
}
add_filter( 'nav_menu_link_attributes', 'web_menu_link_classes', 10, 3 );

/**
 * Přidá vlastní třídy do položek menu.
 *
 * @param array $classes Třídy položky menu.
 * @param object $item Položka menu.
 * @param object $args Argumenty menu.
 * @return array Upravené třídy položky menu.
 */
function web_menu_item_classes( $classes, $item, $args ) {
	if ( 'primary' === $args->theme_location ) {
		$classes[] = 'nav-item';
	}
	
	if ( 'footer' === $args->theme_location ) {
		$classes[] = 'footer-item';
	}
	
	return $classes;
}
add_filter( 'nav_menu_css_class', 'web_menu_item_classes', 10, 3 );

/**
 * Přidá vlastní třídy do aktivních položek menu.
 *
 * @param array $classes Třídy položky menu.
 * @param object $item Položka menu.
 * @return array Upravené třídy položky menu.
 */
function web_menu_active_classes( $classes, $item ) {
	if ( in_array( 'current-menu-item', $classes ) ) {
		$classes[] = 'active';
	}
	
	return $classes;
}
add_filter( 'nav_menu_css_class', 'web_menu_active_classes', 10, 2 );

/**
 * Přidá vlastní třídy do submenu.
 *
 * @param array $classes Třídy submenu.
 * @param array $args Argumenty menu.
 * @return array Upravené třídy submenu.
 */
function web_submenu_classes( $classes, $args ) {
	if ( 'primary' === $args->theme_location ) {
		$classes[] = 'sub-menu';
	}
	
	return $classes;
}
add_filter( 'nav_menu_submenu_css_class', 'web_submenu_classes', 10, 2 );

/**
 * Přidá vlastní třídy do widgetů.
 *
 * @param array $params Parametry widgetu.
 * @return array Upravené parametry widgetu.
 */
function web_widget_classes( $params ) {
	$params[0]['before_widget'] = str_replace( 'class="', 'class="widget-container ', $params[0]['before_widget'] );
	
	return $params;
}
add_filter( 'dynamic_sidebar_params', 'web_widget_classes' );

/**
 * Přidá vlastní třídy do formuláře pro vyhledávání.
 *
 * @param string $form Formulář pro vyhledávání.
 * @return string Upravený formulář pro vyhledávání.
 */
function web_search_form_classes( $form ) {
	$form = str_replace( 'class="search-form"', 'class="search-form search-form-custom"', $form );
	$form = str_replace( 'class="search-submit"', 'class="search-submit button-primary"', $form );
	
	return $form;
}
add_filter( 'get_search_form', 'web_search_form_classes' );

/**
 * Přidá vlastní třídy do tlačítka pro komentáře.
 *
 * @param string $submit_button Tlačítko pro odeslání komentáře.
 * @return string Upravené tlačítko pro odeslání komentáře.
 */
function web_comment_submit_classes( $submit_button ) {
	$submit_button = str_replace( 'class="submit"', 'class="submit button-primary"', $submit_button );
	
	return $submit_button;
}
add_filter( 'comment_form_submit_button', 'web_comment_submit_classes' );

/**
 * Přidá vlastní třídy do polí formuláře pro komentáře.
 *
 * @param array $fields Pole formuláře pro komentáře.
 * @return array Upravená pole formuláře pro komentáře.
 */
function web_comment_form_fields( $fields ) {
	foreach ( $fields as $key => $field ) {
		$fields[ $key ] = str_replace( 'class="', 'class="form-field ', $field );
	}
	
	return $fields;
}
add_filter( 'comment_form_default_fields', 'web_comment_form_fields' );

/**
 * Přidá vlastní třídy do pole pro komentář.
 *
 * @param array $defaults Výchozí nastavení formuláře pro komentáře.
 * @return array Upravené výchozí nastavení formuláře pro komentáře.
 */
function web_comment_form_defaults( $defaults ) {
	$defaults['comment_field'] = str_replace( 'class="comment-form-comment"', 'class="comment-form-comment form-field"', $defaults['comment_field'] );
	
	return $defaults;
}
add_filter( 'comment_form_defaults', 'web_comment_form_defaults' );

/**
 * Přidá vlastní třídy do navigace mezi příspěvky.
 *
 * @param string $template Šablona pro navigaci mezi příspěvky.
 * @return string Upravená šablona pro navigaci mezi příspěvky.
 */
function web_posts_navigation_classes( $template ) {
	$template = str_replace( 'class="nav-links"', 'class="nav-links posts-navigation-links"', $template );
	
	return $template;
}
add_filter( 'navigation_markup_template', 'web_posts_navigation_classes' );

/**
 * Přidá vlastní třídy do stránkování.
 *
 * @param string $output HTML výstup stránkování.
 * @return string Upravený HTML výstup stránkování.
 */
function web_pagination_classes( $output ) {
	$output = str_replace( 'class="page-numbers', 'class="page-numbers pagination-link', $output );
	
	return $output;
}
add_filter( 'paginate_links', 'web_pagination_classes' );

/**
 * Přidá vlastní třídy do galerie.
 *
 * @param string $gallery HTML výstup galerie.
 * @param array $attr Atributy galerie.
 * @return string Upravený HTML výstup galerie.
 */
function web_gallery_classes( $gallery, $attr ) {
	$gallery = str_replace( 'class="gallery', 'class="gallery custom-gallery', $gallery );
	
	return $gallery;
}
add_filter( 'post_gallery', 'web_gallery_classes', 10, 2 );