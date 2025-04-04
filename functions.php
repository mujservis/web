<?php
/**
 * Funkce a definice tématu Web
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Web
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Ukončit, pokud je přístup přímý.
}

// Definice verze tématu
if ( ! defined( 'WEB_VERSION' ) ) {
    define( 'WEB_VERSION', '1.0.0' );
}

/**
 * Nastavení výchozích hodnot tématu a registrace podpory pro různé funkce WordPressu.
 */
function web_setup() {
    /*
     * Zpřístupnění tématu pro překlad.
     * Překlady mohou být uloženy v adresáři /languages/.
     */
    load_theme_textdomain( 'web', get_template_directory() . '/languages' );

    // Přidání výchozích odkazů na RSS kanály příspěvků a komentářů do hlavičky.
    add_theme_support( 'automatic-feed-links' );

    /*
     * Nechme WordPress spravovat titulek dokumentu.
     * Přidáním podpory tématu deklarujeme, že toto téma nepoužívá
     * pevně zakódovaný tag <title> v hlavičce dokumentu a očekáváme, že WordPress
     * jej poskytne za nás.
     */
    add_theme_support( 'title-tag' );

    /*
     * Povolení podpory pro náhledy příspěvků a stránek.
     *
     * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
     */
    add_theme_support( 'post-thumbnails' );

    // Toto téma používá wp_nav_menu() na dvou místech.
    register_nav_menus(
        array(
            'primary' => esc_html__( 'Hlavní menu', 'web' ),
            'footer'  => esc_html__( 'Menu v patičce', 'web' ),
        )
    );

    /*
     * Přepnutí výchozího základního značení pro vyhledávací formulář, formulář komentářů a komentáře
     * na výstup platného HTML5.
     */
    add_theme_support(
        'html5',
        array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
            'style',
            'script',
        )
    );

    // Nastavení funkce vlastního pozadí WordPress.
    add_theme_support(
        'custom-background',
        apply_filters(
            'web_custom_background_args',
            array(
                'default-color' => 'ffffff',
                'default-image' => '',
            )
        )
    );

    // Přidání podpory pro selektivní obnovení widgetů.
    add_theme_support( 'customize-selective-refresh-widgets' );

    /**
     * Přidání podpory pro základní vlastní logo.
     *
     * @link https://codex.wordpress.org/Theme_Logo
     */
    add_theme_support(
        'custom-logo',
        array(
            'height'      => 250,
            'width'       => 250,
            'flex-width'  => true,
            'flex-height' => true,
        )
    );

    // Přidání podpory pro blokové styly.
    add_theme_support( 'wp-block-styles' );

    // Přidání podpory pro obrázky s plným a širokým zarovnáním.
    add_theme_support( 'align-wide' );

    // Přidání podpory pro responzivní vložený obsah.
    add_theme_support( 'responsive-embeds' );

    // Přidání podpory pro vlastní ovládací prvky výšky řádku.
    add_theme_support( 'custom-line-height' );

    // Přidání podpory pro experimentální ovládání barvy odkazu.
    add_theme_support( 'experimental-link-color' );

    // Přidání podpory pro vlastní jednotky.
    add_theme_support( 'custom-units' );

    // Přidání podpory pro styly editoru.
    add_theme_support( 'editor-styles' );

    // Načtení stylů editoru.
    add_editor_style( 'assets/css/editor-style.css' );
}
add_action( 'after_setup_theme', 'web_setup' );

/**
 * Nastavení šířky obsahu v pixelech, na základě designu a stylopisu tématu.
 *
 * Priorita 0, aby byla dostupná pro callbacky s nižší prioritou.
 *
 * @global int $content_width
 */
function web_content_width() {
    $GLOBALS['content_width'] = apply_filters( 'web_content_width', 1200 );
}
add_action( 'after_setup_theme', 'web_content_width', 0 );

/**
 * Registrace oblasti pro widgety.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function web_widgets_init() {
    register_sidebar(
    array(
        'name'          => esc_html__( 'Patička 1', 'web' ),
        'id'            => 'footer-1',
        'description'   => esc_html__( 'Přidejte widgety do první oblasti patičky.', 'web' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    )
);

register_sidebar(
    array(
        'name'          => esc_html__( 'Patička 2', 'web' ),
        'id'            => 'footer-2',
        'description'   => esc_html__( 'Přidejte widgety do druhé oblasti patičky.', 'web' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    )
);

register_sidebar(
    array(
        'name'          => esc_html__( 'Patička 3', 'web' ),
        'id'            => 'footer-3',
        'description'   => esc_html__( 'Přidejte widgety do třetí oblasti patičky.', 'web' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    )
);
    register_sidebar(
        array(
            'name'          => esc_html__( 'Postranní panel', 'web' ),
            'id'            => 'sidebar-1',
            'description'   => esc_html__( 'Přidejte widgety sem.', 'web' ),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h2 class="widget-title">',
            'after_title'   => '</h2>',
        )
    );
}
add_action( 'widgets_init', 'web_widgets_init' );

/**
 * Načtení skriptů a stylů.
 */
function web_scripts() {
    // Načtení hlavního stylopisu
    wp_enqueue_style( 'web-style', get_stylesheet_uri(), array(), WEB_VERSION );
    
    // Načtení vlastního CSS
    wp_enqueue_style( 'web-main', get_template_directory_uri() . '/assets/css/main.css', array(), WEB_VERSION );
    
    // Načtení vlastního JavaScriptu
    wp_enqueue_script( 'web-navigation', get_template_directory_uri() . '/assets/js/navigation.js', array(), WEB_VERSION, true );

    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
}
add_action( 'wp_enqueue_scripts', 'web_scripts' );

/**
 * Vlastní šablonové značky pro toto téma.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Funkce, které vylepšují téma napojením do WordPressu.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Přídavky do přizpůsobovače.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Blokové vzory.
 */
require get_template_directory() . '/inc/block-patterns.php';

/**
 * Načtení souboru kompatibility s Jetpack.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
    require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Načtení souboru kompatibility s WooCommerce.
 */
if ( class_exists( 'WooCommerce' ) ) {
    require get_template_directory() . '/inc/woocommerce.php';
}

/**
 * Zakázání CSS knihovny bloků Gutenberg
 */
function web_disable_block_library_css() {
    wp_dequeue_style( 'wp-block-library' );
}
add_action( 'wp_enqueue_scripts', 'web_disable_block_library_css', 100 );

/**
 * Přidání vlastních tříd do body
 */
function web_body_classes( $classes ) {
    // Přidání třídy, pokud existuje vlastní hlavička.
    if ( has_header_image() ) {
        $classes[] = 'has-header-image';
    }

    // Přidání třídy, pokud existuje vlastní pozadí.
    if ( get_background_image() || get_background_color() !== 'ffffff' ) {
        $classes[] = 'has-custom-background';
    }

    return $classes;
}
add_filter( 'body_class', 'web_body_classes' );

/**
 * Přidání hlavičky pro automatické objevení pingback URL pro jednotlivé příspěvky, stránky nebo přílohy.
 */
function web_pingback_header() {
    if ( is_singular() && pings_open() ) {
        printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
    }
}
add_action( 'wp_head', 'web_pingback_header' );