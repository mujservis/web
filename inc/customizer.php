<?php
/**
 * Web Theme Customizer
 *
 * @package Web
 */

/**
 * Přidá sekce a nastavení do přizpůsobovače.
 *
 * @param WP_Customize_Manager $wp_customize Objekt přizpůsobovače.
 */
function web_customize_register( $wp_customize ) {
	// Přidá sekci pro nastavení barev
	$wp_customize->add_section(
		'web_colors_section',
		array(
			'title'       => __( 'Barvy tématu', 'web' ),
			'description' => __( 'Přizpůsobte barvy vašeho webu.', 'web' ),
			'priority'    => 30,
		)
	);

	// Přidá nastavení pro primární barvu
	$wp_customize->add_setting(
		'web_primary_color',
		array(
			'default'           => '#0073aa',
			'sanitize_callback' => 'sanitize_hex_color',
			'transport'         => 'refresh',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'web_primary_color',
			array(
				'label'    => __( 'Primární barva', 'web' ),
				'section'  => 'web_colors_section',
				'settings' => 'web_primary_color',
			)
		)
	);

	// Přidá nastavení pro sekundární barvu
	$wp_customize->add_setting(
		'web_secondary_color',
		array(
			'default'           => '#00a0d2',
			'sanitize_callback' => 'sanitize_hex_color',
			'transport'         => 'refresh',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'web_secondary_color',
			array(
				'label'    => __( 'Sekundární barva', 'web' ),
				'section'  => 'web_colors_section',
				'settings' => 'web_secondary_color',
			)
		)
	);

	// Přidá nastavení pro barvu textu
	$wp_customize->add_setting(
		'web_text_color',
		array(
			'default'           => '#333333',
			'sanitize_callback' => 'sanitize_hex_color',
			'transport'         => 'refresh',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'web_text_color',
			array(
				'label'    => __( 'Barva textu', 'web' ),
				'section'  => 'web_colors_section',
				'settings' => 'web_text_color',
			)
		)
	);

	// Přidá sekci pro nastavení hlavičky
	$wp_customize->add_section(
		'web_header_section',
		array(
			'title'       => __( 'Nastavení hlavičky', 'web' ),
			'description' => __( 'Přizpůsobte vzhled hlavičky vašeho webu.', 'web' ),
			'priority'    => 40,
		)
	);

	// Přidá nastavení pro pevnou hlavičku
	$wp_customize->add_setting(
		'web_sticky_header',
		array(
			'default'           => false,
			'sanitize_callback' => 'web_sanitize_checkbox',
			'transport'         => 'refresh',
		)
	);

	$wp_customize->add_control(
		'web_sticky_header',
		array(
			'label'    => __( 'Pevná hlavička', 'web' ),
			'description' => __( 'Hlavička zůstane viditelná při rolování stránky.', 'web' ),
			'section'  => 'web_header_section',
			'settings' => 'web_sticky_header',
			'type'     => 'checkbox',
		)
	);

	// Přidá nastavení pro průhlednou hlavičku
	$wp_customize->add_setting(
		'web_transparent_header',
		array(
			'default'           => false,
			'sanitize_callback' => 'web_sanitize_checkbox',
			'transport'         => 'refresh',
		)
	);

	$wp_customize->add_control(
		'web_transparent_header',
		array(
			'label'    => __( 'Průhledná hlavička na domovské stránce', 'web' ),
			'description' => __( 'Hlavička bude průhledná na domovské stránce.', 'web' ),
			'section'  => 'web_header_section',
			'settings' => 'web_transparent_header',
			'type'     => 'checkbox',
		)
	);

	// Přidá sekci pro nastavení patičky
	$wp_customize->add_section(
		'web_footer_section',
		array(
			'title'       => __( 'Nastavení patičky', 'web' ),
			'description' => __( 'Přizpůsobte vzhled patičky vašeho webu.', 'web' ),
			'priority'    => 50,
		)
	);

	// Přidá nastavení pro text autorských práv
	$wp_customize->add_setting(
		'web_copyright_text',
		array(
			'default'           => sprintf( __( '© %s %s. Všechna práva vyhrazena.', 'web' ), date( 'Y' ), get_bloginfo( 'name' ) ),
			'sanitize_callback' => 'wp_kses_post',
			'transport'         => 'refresh',
		)
	);

	$wp_customize->add_control(
		'web_copyright_text',
		array(
			'label'    => __( 'Text autorských práv', 'web' ),
			'section'  => 'web_footer_section',
			'settings' => 'web_copyright_text',
			'type'     => 'textarea',
		)
	);

	// Přidá sekci pro sociální sítě
	$wp_customize->add_section(
		'web_social_section',
		array(
			'title'       => __( 'Sociální sítě', 'web' ),
			'description' => __( 'Přidejte odkazy na vaše profily na sociálních sítích.', 'web' ),
			'priority'    => 60,
		)
	);

	// Přidá nastavení pro Facebook
	$wp_customize->add_setting(
		'web_facebook_url',
		array(
			'default'           => '',
			'sanitize_callback' => 'esc_url_raw',
			'transport'         => 'refresh',
		)
	);

	$wp_customize->add_control(
		'web_facebook_url',
		array(
			'label'    => __( 'Facebook URL', 'web' ),
			'section'  => 'web_social_section',
			'settings' => 'web_facebook_url',
			'type'     => 'url',
		)
	);

	// Přidá nastavení pro Twitter
	$wp_customize->add_setting(
		'web_twitter_url',
		array(
			'default'           => '',
			'sanitize_callback' => 'esc_url_raw',
			'transport'         => 'refresh',
		)
	);

	$wp_customize->add_control(
		'web_twitter_url',
		array(
			'label'    => __( 'Twitter URL', 'web' ),
			'section'  => 'web_social_section',
			'settings' => 'web_twitter_url',
			'type'     => 'url',
		)
	);

	// Přidá nastavení pro Instagram
	$wp_customize->add_setting(
		'web_instagram_url',
		array(
			'default'           => '',
			'sanitize_callback' => 'esc_url_raw',
			'transport'         => 'refresh',
		)
	);

	$wp_customize->add_control(
		'web_instagram_url',
		array(
			'label'    => __( 'Instagram URL', 'web' ),
			'section'  => 'web_social_section',
			'settings' => 'web_instagram_url',
			'type'     => 'url',
		)
	);

	// Přidá nastavení pro LinkedIn
	$wp_customize->add_setting(
		'web_linkedin_url',
		array(
			'default'           => '',
			'sanitize_callback' => 'esc_url_raw',
			'transport'         => 'refresh',
		)
	);

	$wp_customize->add_control(
		'web_linkedin_url',
		array(
			'label'    => __( 'LinkedIn URL', 'web' ),
			'section'  => 'web_social_section',
			'settings' => 'web_linkedin_url',
			'type'     => 'url',
		)
	);

	// Přidá nastavení pro YouTube
	$wp_customize->add_setting(
		'web_youtube_url',
		array(
			'default'           => '',
			'sanitize_callback' => 'esc_url_raw',
			'transport'         => 'refresh',
		)
	);

	$wp_customize->add_control(
		'web_youtube_url',
		array(
			'label'    => __( 'YouTube URL', 'web' ),
			'section'  => 'web_social_section',
			'settings' => 'web_youtube_url',
			'type'     => 'url',
		)
	);

	// Přidá sekci pro nastavení blogu
	$wp_customize->add_section(
		'web_blog_section',
		array(
			'title'       => __( 'Nastavení blogu', 'web' ),
			'description' => __( 'Přizpůsobte vzhled a chování blogu.', 'web' ),
			'priority'    => 70,
		)
	);

	// Přidá nastavení pro zobrazení autora
	$wp_customize->add_setting(
		'web_show_author',
		array(
			'default'           => true,
			'sanitize_callback' => 'web_sanitize_checkbox',
			'transport'         => 'refresh',
		)
	);

	$wp_customize->add_control(
		'web_show_author',
		array(
			'label'    => __( 'Zobrazit autora příspěvku', 'web' ),
			'section'  => 'web_blog_section',
			'settings' => 'web_show_author',
			'type'     => 'checkbox',
		)
	);

	// Přidá nastavení pro zobrazení data
	$wp_customize->add_setting(
		'web_show_date',
		array(
			'default'           => true,
			'sanitize_callback' => 'web_sanitize_checkbox',
			'transport'         => 'refresh',
		)
	);

	$wp_customize->add_control(
		'web_show_date',
		array(
			'label'    => __( 'Zobrazit datum publikování', 'web' ),
			'section'  => 'web_blog_section',
			'settings' => 'web_show_date',
			'type'     => 'checkbox',
		)
	);

	// Přidá nastavení pro zobrazení kategorií
	$wp_customize->add_setting(
		'web_show_categories',
		array(
			'default'           => true,
			'sanitize_callback' => 'web_sanitize_checkbox',
			'transport'         => 'refresh',
		)
	);

	$wp_customize->add_control(
		'web_show_categories',
		array(
			'label'    => __( 'Zobrazit kategorie', 'web' ),
			'section'  => 'web_blog_section',
			'settings' => 'web_show_categories',
			'type'     => 'checkbox',
		)
	);

	// Přidá nastavení pro zobrazení štítků
	$wp_customize->add_setting(
		'web_show_tags',
		array(
			'default'           => true,
			'sanitize_callback' => 'web_sanitize_checkbox',
			'transport'         => 'refresh',
		)
	);

	$wp_customize->add_control(
		'web_show_tags',
		array(
			'label'    => __( 'Zobrazit štítky', 'web' ),
			'section'  => 'web_blog_section',
			'settings' => 'web_show_tags',
			'type'     => 'checkbox',
		)
	);

	// Přidá nastavení pro zobrazení souvisejících příspěvků
	$wp_customize->add_setting(
		'web_show_related_posts',
		array(
			'default'           => true,
			'sanitize_callback' => 'web_sanitize_checkbox',
			'transport'         => 'refresh',
		)
	);

	$wp_customize->add_control(
		'web_show_related_posts',
		array(
			'label'    => __( 'Zobrazit související příspěvky', 'web' ),
			'section'  => 'web_blog_section',
			'settings' => 'web_show_related_posts',
			'type'     => 'checkbox',
		)
	);

	// Přidá nastavení pro počet souvisejících příspěvků
	$wp_customize->add_setting(
		'web_related_posts_count',
		array(
			'default'           => 3,
			'sanitize_callback' => 'absint',
			'transport'         => 'refresh',
		)
	);

	$wp_customize->add_control(
		'web_related_posts_count',
		array(
			'label'    => __( 'Počet souvisejících příspěvků', 'web' ),
			'section'  => 'web_blog_section',
			'settings' => 'web_related_posts_count',
			'type'     => 'number',
			'input_attrs' => array(
				'min'  => 1,
				'max'  => 10,
				'step' => 1,
			),
		)
	);

		// Přidá sekci pro výkon
	$wp_customize->add_section(
		'web_performance_section',
		array(
			'title'       => __( 'Výkon', 'web' ),
			'description' => __( 'Nastavení pro optimalizaci výkonu webu.', 'web' ),
			'priority'    => 80,
		)
	);

	// Přidá nastavení pro lazy loading obrázků
	$wp_customize->add_setting(
		'web_lazy_load_images',
		array(
			'default'           => true,
			'sanitize_callback' => 'web_sanitize_checkbox',
			'transport'         => 'refresh',
		)
	);

	$wp_customize->add_control(
		'web_lazy_load_images',
		array(
			'label'    => __( 'Povolit lazy loading obrázků', 'web' ),
			'description' => __( 'Obrázky se načtou až když jsou viditelné na obrazovce.', 'web' ),
			'section'  => 'web_performance_section',
			'settings' => 'web_lazy_load_images',
			'type'     => 'checkbox',
		)
	);

	// Přidá nastavení pro minifikaci CSS a JS
	$wp_customize->add_setting(
		'web_minify_assets',
		array(
			'default'           => false,
			'sanitize_callback' => 'web_sanitize_checkbox',
			'transport'         => 'refresh',
		)
	);

	$wp_customize->add_control(
		'web_minify_assets',
		array(
			'label'    => __( 'Minifikovat CSS a JavaScript', 'web' ),
			'description' => __( 'Zmenší velikost CSS a JavaScript souborů.', 'web' ),
			'section'  => 'web_performance_section',
			'settings' => 'web_minify_assets',
			'type'     => 'checkbox',
		)
	);

	// Přidá nastavení pro odložené načítání JS
	$wp_customize->add_setting(
		'web_defer_js',
		array(
			'default'           => false,
			'sanitize_callback' => 'web_sanitize_checkbox',
			'transport'         => 'refresh',
		)
	);

	$wp_customize->add_control(
		'web_defer_js',
		array(
			'label'    => __( 'Odložit načítání JavaScriptu', 'web' ),
			'description' => __( 'JavaScript se načte až po načtení stránky.', 'web' ),
			'section'  => 'web_performance_section',
			'settings' => 'web_defer_js',
			'type'     => 'checkbox',
		)
	);

	// Přidá sekci pro typografii
	$wp_customize->add_section(
		'web_typography_section',
		array(
			'title'       => __( 'Typografie', 'web' ),
			'description' => __( 'Nastavení písma a typografie.', 'web' ),
			'priority'    => 90,
		)
	);

	// Přidá nastavení pro rodinu písma
	$wp_customize->add_setting(
		'web_font_family',
		array(
			'default'           => 'system',
			'sanitize_callback' => 'web_sanitize_select',
			'transport'         => 'refresh',
		)
	);

	$wp_customize->add_control(
		'web_font_family',
		array(
			'label'    => __( 'Rodina písma', 'web' ),
			'section'  => 'web_typography_section',
			'settings' => 'web_font_family',
			'type'     => 'select',
			'choices'  => array(
				'system'    => __( 'Systémové písmo', 'web' ),
				'helvetica' => __( 'Helvetica / Arial', 'web' ),
				'georgia'   => __( 'Georgia / Times', 'web' ),
				'monospace' => __( 'Monospace', 'web' ),
			),
		)
	);

	// Přidá nastavení pro velikost základního písma
	$wp_customize->add_setting(
		'web_base_font_size',
		array(
			'default'           => 16,
			'sanitize_callback' => 'absint',
			'transport'         => 'refresh',
		)
	);

	$wp_customize->add_control(
		'web_base_font_size',
		array(
			'label'    => __( 'Velikost základního písma (px)', 'web' ),
			'section'  => 'web_typography_section',
			'settings' => 'web_base_font_size',
			'type'     => 'number',
			'input_attrs' => array(
				'min'  => 12,
				'max'  => 24,
				'step' => 1,
			),
		)
	);

	// Přidá nastavení pro výšku řádku
	$wp_customize->add_setting(
		'web_line_height',
		array(
			'default'           => 1.6,
			'sanitize_callback' => 'web_sanitize_float',
			'transport'         => 'refresh',
		)
	);

	$wp_customize->add_control(
		'web_line_height',
		array(
			'label'    => __( 'Výška řádku', 'web' ),
			'section'  => 'web_typography_section',
			'settings' => 'web_line_height',
			'type'     => 'number',
			'input_attrs' => array(
				'min'  => 1,
				'max'  => 2,
				'step' => 0.1,
			),
		)
	);

	// Přidá sekci pro rozložení
	$wp_customize->add_section(
		'web_layout_section',
		array(
			'title'       => __( 'Rozložení', 'web' ),
			'description' => __( 'Nastavení rozložení stránky.', 'web' ),
			'priority'    => 100,
		)
	);

	// Přidá nastavení pro šířku kontejneru
	$wp_customize->add_setting(
		'web_container_width',
		array(
			'default'           => 1200,
			'sanitize_callback' => 'absint',
			'transport'         => 'refresh',
		)
	);

	$wp_customize->add_control(
		'web_container_width',
		array(
			'label'    => __( 'Šířka kontejneru (px)', 'web' ),
			'section'  => 'web_layout_section',
			'settings' => 'web_container_width',
			'type'     => 'number',
			'input_attrs' => array(
				'min'  => 800,
				'max'  => 1600,
				'step' => 10,
			),
		)
	);

	// Přidá nastavení pro výchozí rozložení stránky
	$wp_customize->add_setting(
		'web_default_layout',
		array(
			'default'           => 'right-sidebar',
			'sanitize_callback' => 'web_sanitize_select',
			'transport'         => 'refresh',
		)
	);

	$wp_customize->add_control(
		'web_default_layout',
		array(
			'label'    => __( 'Výchozí rozložení stránky', 'web' ),
			'section'  => 'web_layout_section',
			'settings' => 'web_default_layout',
			'type'     => 'select',
			'choices'  => array(
				'right-sidebar' => __( 'Postranní panel vpravo', 'web' ),
				'left-sidebar'  => __( 'Postranní panel vlevo', 'web' ),
				'no-sidebar'    => __( 'Bez postranního panelu', 'web' ),
			),
		)
	);

	// Přidá nastavení pro výchozí rozložení archivu
	$wp_customize->add_setting(
		'web_archive_layout',
		array(
			'default'           => 'grid',
			'sanitize_callback' => 'web_sanitize_select',
			'transport'         => 'refresh',
		)
	);

	$wp_customize->add_control(
		'web_archive_layout',
		array(
			'label'    => __( 'Rozložení archivu', 'web' ),
			'section'  => 'web_layout_section',
			'settings' => 'web_archive_layout',
			'type'     => 'select',
			'choices'  => array(
				'grid'   => __( 'Mřížka', 'web' ),
				'list'   => __( 'Seznam', 'web' ),
				'masonry' => __( 'Masonry', 'web' ),
			),
		)
	);

	// Přidá nastavení pro počet sloupců v mřížce
	$wp_customize->add_setting(
		'web_grid_columns',
		array(
			'default'           => 3,
			'sanitize_callback' => 'absint',
			'transport'         => 'refresh',
		)
	);

	$wp_customize->add_control(
		'web_grid_columns',
		array(
			'label'    => __( 'Počet sloupců v mřížce', 'web' ),
			'section'  => 'web_layout_section',
			'settings' => 'web_grid_columns',
			'type'     => 'number',
			'input_attrs' => array(
				'min'  => 1,
				'max'  => 4,
				'step' => 1,
			),
		)
	);
}
add_action( 'customize_register', 'web_customize_register' );

/**
 * Sanitizace pro checkbox.
 *
 * @param bool $checked Hodnota checkboxu.
 * @return bool Sanitizovaná hodnota.
 */
function web_sanitize_checkbox( $checked ) {
	return ( ( isset( $checked ) && true == $checked ) ? true : false );
}

/**
 * Sanitizace pro select.
 *
 * @param string $input Hodnota selectu.
 * @param WP_Customize_Setting $setting Objekt nastavení.
 * @return string Sanitizovaná hodnota.
 */
function web_sanitize_select( $input, $setting ) {
	// Získání seznamu možností
	$choices = $setting->manager->get_control( $setting->id )->choices;
	
	// Vrácení výchozí hodnoty, pokud není platná
	return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
}

/**
 * Sanitizace pro float.
 *
 * @param float $number Číslo s desetinnou čárkou.
 * @param WP_Customize_Setting $setting Objekt nastavení.
 * @return float Sanitizovaná hodnota.
 */
function web_sanitize_float( $number, $setting ) {
	// Získání minimální a maximální hodnoty
	$attrs = $setting->manager->get_control( $setting->id )->input_attrs;
	$min = ( isset( $attrs['min'] ) ? $attrs['min'] : $number );
	$max = ( isset( $attrs['max'] ) ? $attrs['max'] : $number );
	$step = ( isset( $attrs['step'] ) ? $attrs['step'] : 0.1 );
	
	// Sanitizace na float a omezení na rozsah
	$number = floatval( $number );
	$number = max( $min, min( $max, $number ) );
	
	// Zaokrouhlení na nejbližší krok
	$steps = round( $number / $step );
	$number = $steps * $step;
	
	return $number;
}

/**
 * Vygeneruje CSS na základě nastavení přizpůsobovače.
 *
 * @return string CSS kód.
 */
function web_customizer_css() {
	$css = '';
	
	// Primární barva
	$primary_color = get_theme_mod( 'web_primary_color', '#0073aa' );
	if ( '#0073aa' !== $primary_color ) {
		$css .= '
			a, 
			.site-title a:hover,
			.main-navigation a:hover,
			.entry-title a:hover,
			.entry-meta a:hover,
			.entry-footer a:hover,
			.widget a:hover,
			.site-footer a:hover {
				color: ' . esc_attr( $primary_color ) . ';
			}
			
			button,
			input[type="button"],
			input[type="reset"],
			input[type="submit"],
			.button-primary,
			.pagination .current,
			.page-links .current {
				background-color: ' . esc_attr( $primary_color ) . ';
			}
			
			blockquote {
				border-color: ' . esc_attr( $primary_color ) . ';
			}
		';
	}
	
	// Sekundární barva
	$secondary_color = get_theme_mod( 'web_secondary_color', '#00a0d2' );
	if ( '#00a0d2' !== $secondary_color ) {
		$css .= '
			a:hover,
			a:focus,
			a:active {
				color: ' . esc_attr( $secondary_color ) . ';
			}
			
			button:hover,
			input[type="button"]:hover,
			input[type="reset"]:hover,
			input[type="submit"]:hover,
			.button-primary:hover {
				background-color: ' . esc_attr( $secondary_color ) . ';
			}
		';
	}
	
	// Barva textu
	$text_color = get_theme_mod( 'web_text_color', '#333333' );
	if ( '#333333' !== $text_color ) {
		$css .= '
			body,
			button,
			input,
			select,
			optgroup,
			textarea {
				color: ' . esc_attr( $text_color ) . ';
			}
		';
	}
	
		// Pevná hlavička
	$sticky_header = get_theme_mod( 'web_sticky_header', false );
	if ( $sticky_header ) {
		$css .= '
			.site-header {
				position: sticky;
				top: 0;
				z-index: 999;
				background-color: #fff;
				box-shadow: 0 1px 5px rgba(0, 0, 0, 0.1);
			}
			
			.admin-bar .site-header {
				top: 32px;
			}
			
			@media screen and (max-width: 782px) {
				.admin-bar .site-header {
					top: 46px;
				}
			}
		';
	}
	
	// Průhledná hlavička
	$transparent_header = get_theme_mod( 'web_transparent_header', false );
	if ( $transparent_header ) {
		$css .= '
			.home .site-header {
				background-color: transparent;
				box-shadow: none;
				position: absolute;
				width: 100%;
				z-index: 999;
			}
			
			.home .site-header .site-title a,
			.home .site-header .site-description,
			.home .main-navigation a {
				color: #fff;
				text-shadow: 0 1px 2px rgba(0, 0, 0, 0.5);
			}
			
			.home .menu-toggle-icon,
			.home .menu-toggle-icon:before,
			.home .menu-toggle-icon:after {
				background-color: #fff;
			}
		';
	}
	
	// Rodina písma
	$font_family = get_theme_mod( 'web_font_family', 'system' );
	$font_stack = '';
	
	switch ( $font_family ) {
		case 'system':
			$font_stack = '-apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Oxygen-Sans, Ubuntu, Cantarell, "Helvetica Neue", sans-serif';
			break;
		case 'helvetica':
			$font_stack = '"Helvetica Neue", Helvetica, Arial, sans-serif';
			break;
		case 'georgia':
			$font_stack = 'Georgia, Times, "Times New Roman", serif';
			break;
		case 'monospace':
			$font_stack = 'Consolas, Monaco, "Andale Mono", "Ubuntu Mono", monospace';
			break;
	}
	
	if ( ! empty( $font_stack ) ) {
		$css .= '
			body,
			button,
			input,
			select,
			optgroup,
			textarea {
				font-family: ' . $font_stack . ';
			}
		';
	}
	
	// Velikost základního písma
	$base_font_size = get_theme_mod( 'web_base_font_size', 16 );
	if ( 16 !== $base_font_size ) {
		$css .= '
			html {
				font-size: ' . esc_attr( $base_font_size ) . 'px;
			}
		';
	}
	
	// Výška řádku
	$line_height = get_theme_mod( 'web_line_height', 1.6 );
	if ( 1.6 !== $line_height ) {
		$css .= '
			body {
				line-height: ' . esc_attr( $line_height ) . ';
			}
		';
	}
	
	// Šířka kontejneru
	$container_width = get_theme_mod( 'web_container_width', 1200 );
	if ( 1200 !== $container_width ) {
		$css .= '
			.container {
				max-width: ' . esc_attr( $container_width ) . 'px;
			}
		';
	}
	
	// Výchozí rozložení stránky
	$default_layout = get_theme_mod( 'web_default_layout', 'right-sidebar' );
	if ( 'left-sidebar' === $default_layout ) {
		$css .= '
			@media screen and (min-width: 992px) {
				.content-area {
					float: right;
					margin: 0 0 0 -30%;
					width: 70%;
				}
				
				.site-main {
					margin: 0 0 0 30%;
				}
				
				.site-content .widget-area {
					float: left;
					overflow: hidden;
					width: 25%;
				}
			}
		';
	} elseif ( 'no-sidebar' === $default_layout ) {
		$css .= '
			.content-area {
				float: none;
				margin: 0 auto;
				width: 100%;
			}
			
			.site-main {
				margin: 0;
			}
			
			.site-content .widget-area {
				display: none;
			}
		';
	}
	
	// Rozložení archivu
	$archive_layout = get_theme_mod( 'web_archive_layout', 'grid' );
	$grid_columns = get_theme_mod( 'web_grid_columns', 3 );
	
	if ( 'grid' === $archive_layout ) {
		$css .= '
			.archive-posts {
				display: grid;
				grid-template-columns: repeat(' . esc_attr( $grid_columns ) . ', 1fr);
				grid-gap: 30px;
			}
			
			@media screen and (max-width: 768px) {
				.archive-posts {
					grid-template-columns: repeat(2, 1fr);
				}
			}
			
			@media screen and (max-width: 480px) {
				.archive-posts {
					grid-template-columns: 1fr;
				}
			}
		';
	} elseif ( 'list' === $archive_layout ) {
		$css .= '
			.archive-post {
				margin-bottom: 30px;
				padding-bottom: 30px;
				border-bottom: 1px solid #eee;
			}
			
			.archive-post:last-child {
				border-bottom: none;
			}
			
			.archive-post-inner {
				display: flex;
				flex-wrap: wrap;
			}
			
			.post-thumbnail {
				flex: 0 0 30%;
				margin-right: 30px;
			}
			
			.post-content {
				flex: 1;
			}
			
			@media screen and (max-width: 480px) {
				.archive-post-inner {
					display: block;
				}
				
				.post-thumbnail {
					margin-right: 0;
					margin-bottom: 20px;
				}
			}
		';
	} elseif ( 'masonry' === $archive_layout ) {
		$css .= '
			.archive-posts {
				column-count: ' . esc_attr( $grid_columns ) . ';
				column-gap: 30px;
			}
			
			.archive-post {
				break-inside: avoid;
				margin-bottom: 30px;
			}
			
			@media screen and (max-width: 768px) {
				.archive-posts {
					column-count: 2;
				}
			}
			
			@media screen and (max-width: 480px) {
				.archive-posts {
					column-count: 1;
				}
			}
		';
	}
	
	return $css;
}

/**
 * Vypíše vlastní CSS do hlavičky.
 */
function web_customizer_head_styles() {
	$css = web_customizer_css();
	
	if ( ! empty( $css ) ) {
		echo '<style type="text/css">' . $css . '</style>';
	}
}
add_action( 'wp_head', 'web_customizer_head_styles' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function web_customize_preview_js() {
	wp_enqueue_script( 'web-customizer', get_template_directory_uri() . '/assets/js/customizer.js', array( 'customize-preview' ), WEB_VERSION, true );
}
add_action( 'customize_preview_init', 'web_customize_preview_js' );