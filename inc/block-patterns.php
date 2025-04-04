<?php
/**
 * Block Patterns
 *
 * @package Web
 */

/**
 * Registrace kategorií blokových vzorů.
 */
function web_register_block_pattern_categories() {
	if ( function_exists( 'register_block_pattern_category' ) ) {
		// Registrace kategorie pro záhlaví
		register_block_pattern_category(
			'web-headers',
			array( 'label' => __( 'Záhlaví', 'web' ) )
		);

		// Registrace kategorie pro sekce
		register_block_pattern_category(
			'web-sections',
			array( 'label' => __( 'Sekce', 'web' ) )
		);

		// Registrace kategorie pro galerie
		register_block_pattern_category(
			'web-galleries',
			array( 'label' => __( 'Galerie', 'web' ) )
		);

		// Registrace kategorie pro výzvy k akci
		register_block_pattern_category(
			'web-cta',
			array( 'label' => __( 'Výzvy k akci', 'web' ) )
		);

		// Registrace kategorie pro kontakty
		register_block_pattern_category(
			'web-contact',
			array( 'label' => __( 'Kontakty', 'web' ) )
		);
	}
}
add_action( 'init', 'web_register_block_pattern_categories' );

/**
 * Registrace blokových vzorů.
 */
function web_register_block_patterns() {
	if ( function_exists( 'register_block_pattern' ) ) {
		
		// Vzor pro záhlaví s obrázkem na pozadí
		register_block_pattern(
			'web/header-with-background',
			array(
				'title'       => __( 'Záhlaví s obrázkem na pozadí', 'web' ),
				'description' => __( 'Záhlaví s nadpisem, podnadpisem a tlačítkem na obrázku na pozadí.', 'web' ),
				'categories'  => array( 'web-headers' ),
				'content'     => '<!-- wp:cover {"url":"' . esc_url( get_template_directory_uri() ) . '/assets/images/placeholder.jpg","id":123,"dimRatio":50,"minHeight":500,"align":"full"} -->
				<div class="wp-block-cover alignfull" style="min-height:500px"><span aria-hidden="true" class="wp-block-cover__background has-background-dim"></span><img class="wp-block-cover__image-background wp-image-123" alt="" src="' . esc_url( get_template_directory_uri() ) . '/assets/images/placeholder.jpg" data-object-fit="cover"/><div class="wp-block-cover__inner-container"><!-- wp:heading {"textAlign":"center","level":1,"style":{"typography":{"fontSize":"48px"}}} -->
				<h1 class="has-text-align-center" style="font-size:48px">' . esc_html__( 'Vítejte na našem webu', 'web' ) . '</h1>
				<!-- /wp:heading -->

				<!-- wp:paragraph {"align":"center","fontSize":"medium"} -->
				<p class="has-text-align-center has-medium-font-size">' . esc_html__( 'Jsme profesionální tým, který vám pomůže s vašimi projekty.', 'web' ) . '</p>
				<!-- /wp:paragraph -->

				<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
				<div class="wp-block-buttons"><!-- wp:button {"backgroundColor":"primary"} -->
				<div class="wp-block-button"><a class="wp-block-button__link has-primary-background-color has-background">' . esc_html__( 'Zjistit více', 'web' ) . '</a></div>
				<!-- /wp:button --></div>
				<!-- /wp:buttons --></div></div>
				<!-- /wp:cover -->',
			)
		);

		// Vzor pro sekci se třemi sloupci
		register_block_pattern(
			'web/three-columns-section',
			array(
				'title'       => __( 'Sekce se třemi sloupci', 'web' ),
				'description' => __( 'Sekce se třemi sloupci, každý s ikonou, nadpisem a textem.', 'web' ),
				'categories'  => array( 'web-sections' ),
				'content'     => '<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"80px","bottom":"80px"}}},"backgroundColor":"light"} -->
				<div class="wp-block-group alignfull has-light-background-color has-background" style="padding-top:80px;padding-bottom:80px"><!-- wp:heading {"textAlign":"center","style":{"spacing":{"margin":{"bottom":"50px"}}}} -->
				<h2 class="has-text-align-center" style="margin-bottom:50px">' . esc_html__( 'Naše služby', 'web' ) . '</h2>
				<!-- /wp:heading -->

				<!-- wp:columns {"align":"wide"} -->
				<div class="wp-block-columns alignwide"><!-- wp:column -->
				<div class="wp-block-column"><!-- wp:image {"align":"center","width":80,"height":80,"sizeSlug":"large"} -->
				<figure class="wp-block-image aligncenter size-large is-resized"><img src="' . esc_url( get_template_directory_uri() ) . '/assets/images/icon1.png" alt="' . esc_attr__( 'Ikona 1', 'web' ) . '" width="80" height="80"/></figure>
				<!-- /wp:image -->

				<!-- wp:heading {"textAlign":"center","level":3} -->
				<h3 class="has-text-align-center">' . esc_html__( 'Služba 1', 'web' ) . '</h3>
				<!-- /wp:heading -->

				<!-- wp:paragraph {"align":"center"} -->
				<p class="has-text-align-center">' . esc_html__( 'Popis první služby, kterou nabízíme našim klientům. Zde můžete popsat výhody a přínosy.', 'web' ) . '</p>
				<!-- /wp:paragraph --></div>
				<!-- /wp:column -->

				<!-- wp:column -->
				<div class="wp-block-column"><!-- wp:image {"align":"center","width":80,"height":80,"sizeSlug":"large"} -->
				<figure class="wp-block-image aligncenter size-large is-resized"><img src="' . esc_url( get_template_directory_uri() ) . '/assets/images/icon2.png" alt="' . esc_attr__( 'Ikona 2', 'web' ) . '" width="80" height="80"/></figure>
				<!-- /wp:image -->

				<!-- wp:heading {"textAlign":"center","level":3} -->
				<h3 class="has-text-align-center">' . esc_html__( 'Služba 2', 'web' ) . '</h3>
				<!-- /wp:heading -->

				<!-- wp:paragraph {"align":"center"} -->
				<p class="has-text-align-center">' . esc_html__( 'Popis druhé služby, kterou nabízíme našim klientům. Zde můžete popsat výhody a přínosy.', 'web' ) . '</p>
				<!-- /wp:paragraph --></div>
				<!-- /wp:column -->

				<!-- wp:column -->
				<div class="wp-block-column"><!-- wp:image {"align":"center","width":80,"height":80,"sizeSlug":"large"} -->
				<figure class="wp-block-image aligncenter size-large is-resized"><img src="' . esc_url( get_template_directory_uri() ) . '/assets/images/icon3.png" alt="' . esc_attr__( 'Ikona 3', 'web' ) . '" width="80" height="80"/></figure>
				<!-- /wp:image -->

				<!-- wp:heading {"textAlign":"center","level":3} -->
				<h3 class="has-text-align-center">' . esc_html__( 'Služba 3', 'web' ) . '</h3>
				<!-- /wp:heading -->

				<!-- wp:paragraph {"align":"center"} -->
				<p class="has-text-align-center">' . esc_html__( 'Popis třetí služby, kterou nabízíme našim klientům. Zde můžete popsat výhody a přínosy.', 'web' ) . '</p>
				<!-- /wp:paragraph --></div>
				<!-- /wp:column --></div>
				<!-- /wp:columns --></div>
				<!-- /wp:group -->',
			)
		);

		// Vzor pro galerii obrázků
		register_block_pattern(
			'web/image-gallery',
			array(
				'title'       => __( 'Galerie obrázků', 'web' ),
				'description' => __( 'Galerie obrázků se čtyřmi obrázky v mřížce.', 'web' ),
				'categories'  => array( 'web-galleries' ),
				'content'     => '<!-- wp:group {"align":"wide","style":{"spacing":{"padding":{"top":"60px","bottom":"60px"}}}} -->
				<div class="wp-block-group alignwide" style="padding-top:60px;padding-bottom:60px"><!-- wp:heading {"textAlign":"center","style":{"spacing":{"margin":{"bottom":"40px"}}}} -->
				<h2 class="has-text-align-center" style="margin-bottom:40px">' . esc_html__( 'Naše projekty', 'web' ) . '</h2>
				<!-- /wp:heading -->

				<!-- wp:gallery {"columns":2,"linkTo":"none","align":"wide"} -->
				<figure class="wp-block-gallery alignwide has-nested-images columns-2 is-cropped"><!-- wp:image {"sizeSlug":"large","linkDestination":"none"} -->
				<figure class="wp-block-image size-large"><img src="' . esc_url( get_template_directory_uri() ) . '/assets/images/project1.jpg" alt="' . esc_attr__( 'Projekt 1', 'web' ) . '"/><figcaption>' . esc_html__( 'Projekt 1', 'web' ) . '</figcaption></figure>
				<!-- /wp:image -->

				<!-- wp:image {"sizeSlug":"large","linkDestination":"none"} -->
				<figure class="wp-block-image size-large"><img src="' . esc_url( get_template_directory_uri() ) . '/assets/images/project2.jpg" alt="' . esc_attr__( 'Projekt 2', 'web' ) . '"/><figcaption>' . esc_html__( 'Projekt 2', 'web' ) . '</figcaption></figure>
				<!-- /wp:image -->

				<!-- wp:image {"sizeSlug":"large","linkDestination":"none"} -->
				<figure class="wp-block-image size-large"><img src="' . esc_url( get_template_directory_uri() ) . '/assets/images/project3.jpg" alt="' . esc_attr__( 'Projekt 3', 'web' ) . '"/><figcaption>' . esc_html__( 'Projekt 3', 'web' ) . '</figcaption></figure>
				<!-- /wp:image -->

				<!-- wp:image {"sizeSlug":"large","linkDestination":"none"} -->
				<figure class="wp-block-image size-large"><img src="' . esc_url( get_template_directory_uri() ) . '/assets/images/project4.jpg" alt="' . esc_attr__( 'Projekt 4', 'web' ) . '"/><figcaption>' . esc_html__( 'Projekt 4', 'web' ) . '</figcaption></figure>
				<!-- /wp:image --></figure>
				<!-- /wp:gallery --></div>
				<!-- /wp:group -->',
			)
		);

		// Vzor pro výzvu k akci
		register_block_pattern(
			'web/call-to-action',
			array(
				'title'       => __( 'Výzva k akci', 'web' ),
				'description' => __( 'Sekce s výzvou k akci, nadpisem, textem a tlačítkem.', 'web' ),
				'categories'  => array( 'web-cta' ),
				'content'     => '<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"60px","bottom":"60px"}},"color":{"background":"#f8f8f8"}}} -->
				<div class="wp-block-group alignfull has-background" style="background-color:#f8f8f8;padding-top:60px;padding-bottom:60px"><!-- wp:group {"align":"wide"} -->
				<div class="wp-block-group alignwide"><!-- wp:columns {"verticalAlignment":"center"} -->
				<div class="wp-block-columns are-vertically-aligned-center"><!-- wp:column {"verticalAlignment":"center","width":"70%"} -->
				<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:70%"><!-- wp:heading -->
				<h2>' . esc_html__( 'Připraveni začít s vaším projektem?', 'web' ) . '</h2>
				<!-- /wp:heading -->

				<!-- wp:paragraph -->
				<p>' . esc_html__( 'Kontaktujte nás ještě dnes a získejte nezávaznou konzultaci zdarma. Jsme připraveni vám pomoci s realizací vašich nápadů.', 'web' ) . '</p>
				<!-- /wp:paragraph --></div>
				<!-- /wp:column -->

				<!-- wp:column {"verticalAlignment":"center","width":"30%"} -->
				<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:30%"><!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
				<div class="wp-block-buttons"><!-- wp:button {"backgroundColor":"primary","width":100,"style":{"border":{"radius":"4px"}}} -->
								<div class="wp-block-button has-custom-width wp-block-button__width-100"><a class="wp-block-button__link has-primary-background-color has-background" style="border-radius:4px">' . esc_html__( 'Kontaktujte nás', 'web' ) . '</a></div>
				<!-- /wp:button --></div>
				<!-- /wp:buttons --></div>
				<!-- /wp:column --></div>
				<!-- /wp:columns --></div>
				<!-- /wp:group --></div>
				<!-- /wp:group -->',
			)
		);

		// Vzor pro kontaktní sekci
		register_block_pattern(
			'web/contact-section',
			array(
				'title'       => __( 'Kontaktní sekce', 'web' ),
				'description' => __( 'Sekce s kontaktními informacemi a formulářem.', 'web' ),
				'categories'  => array( 'web-contact' ),
				'content'     => '<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"80px","bottom":"80px"}}}} -->
				<div class="wp-block-group alignfull" style="padding-top:80px;padding-bottom:80px"><!-- wp:heading {"textAlign":"center","style":{"spacing":{"margin":{"bottom":"50px"}}}} -->
				<h2 class="has-text-align-center" style="margin-bottom:50px">' . esc_html__( 'Kontaktujte nás', 'web' ) . '</h2>
				<!-- /wp:heading -->

				<!-- wp:columns {"align":"wide"} -->
				<div class="wp-block-columns alignwide"><!-- wp:column {"width":"40%"} -->
				<div class="wp-block-column" style="flex-basis:40%"><!-- wp:heading {"level":3} -->
				<h3>' . esc_html__( 'Kontaktní informace', 'web' ) . '</h3>
				<!-- /wp:heading -->

				<!-- wp:paragraph -->
				<p><strong>' . esc_html__( 'Adresa:', 'web' ) . '</strong><br>' . esc_html__( 'Ukázková 123', 'web' ) . '<br>' . esc_html__( '123 45 Praha', 'web' ) . '</p>
				<!-- /wp:paragraph -->

				<!-- wp:paragraph -->
				<p><strong>' . esc_html__( 'Telefon:', 'web' ) . '</strong><br>' . esc_html__( '+420 123 456 789', 'web' ) . '</p>
				<!-- /wp:paragraph -->

				<!-- wp:paragraph -->
				<p><strong>' . esc_html__( 'E-mail:', 'web' ) . '</strong><br>info@example.com</p>
				<!-- /wp:paragraph -->

				<!-- wp:paragraph -->
				<p><strong>' . esc_html__( 'Otevírací doba:', 'web' ) . '</strong><br>' . esc_html__( 'Po-Pá: 9:00 - 17:00', 'web' ) . '</p>
				<!-- /wp:paragraph -->

				<!-- wp:social-links {"iconColor":"dark","iconColorValue":"#333333","size":"has-normal-icon-size","className":"is-style-logos-only"} -->
				<ul class="wp-block-social-links has-normal-icon-size has-icon-color is-style-logos-only"><!-- wp:social-link {"url":"https://facebook.com","service":"facebook"} /-->

				<!-- wp:social-link {"url":"https://twitter.com","service":"twitter"} /-->

				<!-- wp:social-link {"url":"https://instagram.com","service":"instagram"} /-->

				<!-- wp:social-link {"url":"https://linkedin.com","service":"linkedin"} /--></ul>
				<!-- /wp:social-links --></div>
				<!-- /wp:column -->

				<!-- wp:column {"width":"60%"} -->
				<div class="wp-block-column" style="flex-basis:60%"><!-- wp:heading {"level":3} -->
				<h3>' . esc_html__( 'Napište nám', 'web' ) . '</h3>
				<!-- /wp:heading -->

				<!-- wp:paragraph -->
				<p>' . esc_html__( 'Vyplňte formulář níže a my vás budeme kontaktovat co nejdříve.', 'web' ) . '</p>
				<!-- /wp:paragraph -->

				<!-- wp:html -->
				<form class="contact-form">
					<p><input type="text" name="name" placeholder="' . esc_attr__( 'Jméno a příjmení', 'web' ) . '" required></p>
					<p><input type="email" name="email" placeholder="' . esc_attr__( 'E-mail', 'web' ) . '" required></p>
					<p><input type="tel" name="phone" placeholder="' . esc_attr__( 'Telefon', 'web' ) . '"></p>
					<p><textarea name="message" placeholder="' . esc_attr__( 'Zpráva', 'web' ) . '" rows="5" required></textarea></p>
					<p><button type="submit" class="wp-block-button__link has-primary-background-color has-background">' . esc_html__( 'Odeslat zprávu', 'web' ) . '</button></p>
				</form>
				<!-- /wp:html --></div>
				<!-- /wp:column --></div>
				<!-- /wp:columns --></div>
				<!-- /wp:group -->',
			)
		);

		// Vzor pro sekci s referencemi
		register_block_pattern(
			'web/testimonials-section',
			array(
				'title'       => __( 'Sekce s referencemi', 'web' ),
				'description' => __( 'Sekce s referencemi od klientů.', 'web' ),
				'categories'  => array( 'web-sections' ),
				'content'     => '<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"80px","bottom":"80px"}},"color":{"background":"#f8f8f8"}}} -->
				<div class="wp-block-group alignfull has-background" style="background-color:#f8f8f8;padding-top:80px;padding-bottom:80px"><!-- wp:heading {"textAlign":"center","style":{"spacing":{"margin":{"bottom":"50px"}}}} -->
				<h2 class="has-text-align-center" style="margin-bottom:50px">' . esc_html__( 'Co o nás říkají klienti', 'web' ) . '</h2>
				<!-- /wp:heading -->

				<!-- wp:columns {"align":"wide"} -->
				<div class="wp-block-columns alignwide"><!-- wp:column -->
				<div class="wp-block-column"><!-- wp:quote {"align":"center","className":"is-style-default"} -->
				<blockquote class="wp-block-quote has-text-align-center is-style-default"><p>' . esc_html__( 'Spolupráce byla naprosto profesionální. Výsledek předčil naše očekávání a projekt byl dokončen v termínu.', 'web' ) . '</p><cite>' . esc_html__( 'Jan Novák, CEO Společnost s.r.o.', 'web' ) . '</cite></blockquote>
				<!-- /wp:quote --></div>
				<!-- /wp:column -->

				<!-- wp:column -->
				<div class="wp-block-column"><!-- wp:quote {"align":"center","className":"is-style-default"} -->
				<blockquote class="wp-block-quote has-text-align-center is-style-default"><p>' . esc_html__( 'Oceňuji především komunikaci a flexibilitu. Vždy jsme našli řešení, které vyhovovalo našim potřebám.', 'web' ) . '</p><cite>' . esc_html__( 'Marie Svobodová, Marketingová manažerka', 'web' ) . '</cite></blockquote>
				<!-- /wp:quote --></div>
				<!-- /wp:column -->

				<!-- wp:column -->
				<div class="wp-block-column"><!-- wp:quote {"align":"center","className":"is-style-default"} -->
				<blockquote class="wp-block-quote has-text-align-center is-style-default"><p>' . esc_html__( 'Díky jejich řešení jsme zvýšili naše prodeje o 30 %. Určitě budeme spolupracovat i na dalších projektech.', 'web' ) . '</p><cite>' . esc_html__( 'Petr Černý, Majitel e-shopu', 'web' ) . '</cite></blockquote>
				<!-- /wp:quote --></div>
				<!-- /wp:column --></div>
				<!-- /wp:columns --></div>
				<!-- /wp:group -->',
			)
		);

		// Vzor pro sekci s časovou osou
		register_block_pattern(
			'web/timeline-section',
			array(
				'title'       => __( 'Sekce s časovou osou', 'web' ),
				'description' => __( 'Sekce s časovou osou zobrazující historii nebo proces.', 'web' ),
				'categories'  => array( 'web-sections' ),
				'content'     => '<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"80px","bottom":"80px"}}}} -->
				<div class="wp-block-group alignfull" style="padding-top:80px;padding-bottom:80px"><!-- wp:heading {"textAlign":"center","style":{"spacing":{"margin":{"bottom":"50px"}}}} -->
				<h2 class="has-text-align-center" style="margin-bottom:50px">' . esc_html__( 'Jak probíhá spolupráce', 'web' ) . '</h2>
				<!-- /wp:heading -->

				<!-- wp:columns {"align":"wide"} -->
				<div class="wp-block-columns alignwide"><!-- wp:column -->
				<div class="wp-block-column"><!-- wp:heading {"textAlign":"center","level":3} -->
				<h3 class="has-text-align-center">1</h3>
				<!-- /wp:heading -->

				<!-- wp:heading {"textAlign":"center","level":4} -->
				<h4 class="has-text-align-center">' . esc_html__( 'Konzultace', 'web' ) . '</h4>
				<!-- /wp:heading -->

				<!-- wp:paragraph {"align":"center"} -->
				<p class="has-text-align-center">' . esc_html__( 'Nejprve se sejdeme na úvodní konzultaci, kde probereme vaše požadavky a cíle projektu.', 'web' ) . '</p>
				<!-- /wp:paragraph --></div>
				<!-- /wp:column -->

				<!-- wp:column -->
				<div class="wp-block-column"><!-- wp:heading {"textAlign":"center","level":3} -->
				<h3 class="has-text-align-center">2</h3>
				<!-- /wp:heading -->

				<!-- wp:heading {"textAlign":"center","level":4} -->
				<h4 class="has-text-align-center">' . esc_html__( 'Návrh řešení', 'web' ) . '</h4>
				<!-- /wp:heading -->

				<!-- wp:paragraph {"align":"center"} -->
				<p class="has-text-align-center">' . esc_html__( 'Na základě konzultace připravíme návrh řešení včetně časového harmonogramu a rozpočtu.', 'web' ) . '</p>
				<!-- /wp:paragraph --></div>
				<!-- /wp:column -->

				<!-- wp:column -->
				<div class="wp-block-column"><!-- wp:heading {"textAlign":"center","level":3} -->
				<h3 class="has-text-align-center">3</h3>
				<!-- /wp:heading -->

				<!-- wp:heading {"textAlign":"center","level":4} -->
				<h4 class="has-text-align-center">' . esc_html__( 'Realizace', 'web' ) . '</h4>
				<!-- /wp:heading -->

				<!-- wp:paragraph {"align":"center"} -->
				<p class="has-text-align-center">' . esc_html__( 'Po schválení návrhu začneme s realizací projektu. Průběžně vás informujeme o postupu prací.', 'web' ) . '</p>
				<!-- /wp:paragraph --></div>
				<!-- /wp:column -->

				<!-- wp:column -->
				<div class="wp-block-column"><!-- wp:heading {"textAlign":"center","level":3} -->
				<h3 class="has-text-align-center">4</h3>
				<!-- /wp:heading -->

				<!-- wp:heading {"textAlign":"center","level":4} -->
				<h4 class="has-text-align-center">' . esc_html__( 'Předání a podpora', 'web' ) . '</h4>
				<!-- /wp:heading -->

				<!-- wp:paragraph {"align":"center"} -->
				<p class="has-text-align-center">' . esc_html__( 'Po dokončení vám projekt předáme a poskytneme potřebnou podporu a zaškolení.', 'web' ) . '</p>
				<!-- /wp:paragraph --></div>
				<!-- /wp:column --></div>
				<!-- /wp:columns --></div>
				<!-- /wp:group -->',
			)
		);

				// Vzor pro sekci s cenami
		register_block_pattern(
			'web/pricing-section',
			array(
				'title'       => __( 'Sekce s cenami', 'web' ),
				'description' => __( 'Sekce s cenovými tarify.', 'web' ),
				'categories'  => array( 'web-sections' ),
				'content'     => '<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"80px","bottom":"80px"}},"color":{"background":"#f8f8f8"}}} -->
				<div class="wp-block-group alignfull has-background" style="background-color:#f8f8f8;padding-top:80px;padding-bottom:80px"><!-- wp:heading {"textAlign":"center","style":{"spacing":{"margin":{"bottom":"50px"}}}} -->
				<h2 class="has-text-align-center" style="margin-bottom:50px">' . esc_html__( 'Cenové tarify', 'web' ) . '</h2>
				<!-- /wp:heading -->

				<!-- wp:columns {"align":"wide"} -->
				<div class="wp-block-columns alignwide"><!-- wp:column -->
				<div class="wp-block-column"><!-- wp:group {"style":{"border":{"width":"1px","radius":"4px"},"spacing":{"padding":{"top":"30px","right":"30px","bottom":"30px","left":"30px"}}},"borderColor":"light","backgroundColor":"white"} -->
				<div class="wp-block-group has-border-color has-light-border-color has-white-background-color has-background" style="border-width:1px;border-radius:4px;padding-top:30px;padding-right:30px;padding-bottom:30px;padding-left:30px"><!-- wp:heading {"textAlign":"center","level":3} -->
				<h3 class="has-text-align-center">' . esc_html__( 'Základní', 'web' ) . '</h3>
				<!-- /wp:heading -->

				<!-- wp:paragraph {"align":"center","style":{"typography":{"fontSize":"40px","fontWeight":"700"}}} -->
				<p class="has-text-align-center" style="font-size:40px;font-weight:700">990 Kč</p>
				<!-- /wp:paragraph -->

				<!-- wp:paragraph {"align":"center","fontSize":"small"} -->
				<p class="has-text-align-center has-small-font-size">' . esc_html__( 'měsíčně', 'web' ) . '</p>
				<!-- /wp:paragraph -->

				<!-- wp:separator {"className":"is-style-wide"} -->
				<hr class="wp-block-separator has-alpha-channel-opacity is-style-wide"/>
				<!-- /wp:separator -->

				<!-- wp:list -->
				<ul><li>' . esc_html__( 'Funkce 1', 'web' ) . '</li><li>' . esc_html__( 'Funkce 2', 'web' ) . '</li><li>' . esc_html__( 'Funkce 3', 'web' ) . '</li><li>' . esc_html__( 'Funkce 4', 'web' ) . '</li></ul>
				<!-- /wp:list -->

				<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
				<div class="wp-block-buttons"><!-- wp:button {"backgroundColor":"primary","width":100} -->
				<div class="wp-block-button has-custom-width wp-block-button__width-100"><a class="wp-block-button__link has-primary-background-color has-background">' . esc_html__( 'Objednat', 'web' ) . '</a></div>
				<!-- /wp:button --></div>
				<!-- /wp:buttons --></div>
				<!-- /wp:group --></div>
				<!-- /wp:column -->

				<!-- wp:column -->
				<div class="wp-block-column"><!-- wp:group {"style":{"border":{"width":"1px","radius":"4px"},"spacing":{"padding":{"top":"30px","right":"30px","bottom":"30px","left":"30px"}}},"borderColor":"light","backgroundColor":"white"} -->
				<div class="wp-block-group has-border-color has-light-border-color has-white-background-color has-background" style="border-width:1px;border-radius:4px;padding-top:30px;padding-right:30px;padding-bottom:30px;padding-left:30px"><!-- wp:heading {"textAlign":"center","level":3} -->
				<h3 class="has-text-align-center">' . esc_html__( 'Standardní', 'web' ) . '</h3>
				<!-- /wp:heading -->

				<!-- wp:paragraph {"align":"center","style":{"typography":{"fontSize":"40px","fontWeight":"700"}}} -->
				<p class="has-text-align-center" style="font-size:40px;font-weight:700">1 990 Kč</p>
				<!-- /wp:paragraph -->

				<!-- wp:paragraph {"align":"center","fontSize":"small"} -->
				<p class="has-text-align-center has-small-font-size">' . esc_html__( 'měsíčně', 'web' ) . '</p>
				<!-- /wp:paragraph -->

				<!-- wp:separator {"className":"is-style-wide"} -->
				<hr class="wp-block-separator has-alpha-channel-opacity is-style-wide"/>
				<!-- /wp:separator -->

				<!-- wp:list -->
				<ul><li>' . esc_html__( 'Vše ze Základního tarifu', 'web' ) . '</li><li>' . esc_html__( 'Funkce 5', 'web' ) . '</li><li>' . esc_html__( 'Funkce 6', 'web' ) . '</li><li>' . esc_html__( 'Funkce 7', 'web' ) . '</li></ul>
				<!-- /wp:list -->

				<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
				<div class="wp-block-buttons"><!-- wp:button {"backgroundColor":"primary","width":100} -->
				<div class="wp-block-button has-custom-width wp-block-button__width-100"><a class="wp-block-button__link has-primary-background-color has-background">' . esc_html__( 'Objednat', 'web' ) . '</a></div>
				<!-- /wp:button --></div>
				<!-- /wp:buttons --></div>
				<!-- /wp:group --></div>
				<!-- /wp:column -->

				<!-- wp:column -->
				<div class="wp-block-column"><!-- wp:group {"style":{"border":{"width":"1px","radius":"4px"},"spacing":{"padding":{"top":"30px","right":"30px","bottom":"30px","left":"30px"}}},"borderColor":"light","backgroundColor":"white"} -->
				<div class="wp-block-group has-border-color has-light-border-color has-white-background-color has-background" style="border-width:1px;border-radius:4px;padding-top:30px;padding-right:30px;padding-bottom:30px;padding-left:30px"><!-- wp:heading {"textAlign":"center","level":3} -->
				<h3 class="has-text-align-center">' . esc_html__( 'Premium', 'web' ) . '</h3>
				<!-- /wp:heading -->

				<!-- wp:paragraph {"align":"center","style":{"typography":{"fontSize":"40px","fontWeight":"700"}}} -->
				<p class="has-text-align-center" style="font-size:40px;font-weight:700">3 990 Kč</p>
				<!-- /wp:paragraph -->

				<!-- wp:paragraph {"align":"center","fontSize":"small"} -->
				<p class="has-text-align-center has-small-font-size">' . esc_html__( 'měsíčně', 'web' ) . '</p>
				<!-- /wp:paragraph -->

				<!-- wp:separator {"className":"is-style-wide"} -->
				<hr class="wp-block-separator has-alpha-channel-opacity is-style-wide"/>
				<!-- /wp:separator -->

				<!-- wp:list -->
				<ul><li>' . esc_html__( 'Vše ze Standardního tarifu', 'web' ) . '</li><li>' . esc_html__( 'Funkce 8', 'web' ) . '</li><li>' . esc_html__( 'Funkce 9', 'web' ) . '</li><li>' . esc_html__( 'Funkce 10', 'web' ) . '</li></ul>
				<!-- /wp:list -->

				<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
				<div class="wp-block-buttons"><!-- wp:button {"backgroundColor":"primary","width":100} -->
				<div class="wp-block-button has-custom-width wp-block-button__width-100"><a class="wp-block-button__link has-primary-background-color has-background">' . esc_html__( 'Objednat', 'web' ) . '</a></div>
				<!-- /wp:button --></div>
				<!-- /wp:buttons --></div>
				<!-- /wp:group --></div>
				<!-- /wp:column --></div>
				<!-- /wp:columns --></div>
				<!-- /wp:group -->',
			)
		);

		// Vzor pro sekci s týmem
		register_block_pattern(
			'web/team-section',
			array(
				'title'       => __( 'Sekce s týmem', 'web' ),
				'description' => __( 'Sekce představující členy týmu.', 'web' ),
				'categories'  => array( 'web-sections' ),
				'content'     => '<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"80px","bottom":"80px"}}}} -->
				<div class="wp-block-group alignfull" style="padding-top:80px;padding-bottom:80px"><!-- wp:heading {"textAlign":"center","style":{"spacing":{"margin":{"bottom":"50px"}}}} -->
				<h2 class="has-text-align-center" style="margin-bottom:50px">' . esc_html__( 'Náš tým', 'web' ) . '</h2>
				<!-- /wp:heading -->

				<!-- wp:columns {"align":"wide"} -->
				<div class="wp-block-columns alignwide"><!-- wp:column -->
				<div class="wp-block-column"><!-- wp:image {"align":"center","width":200,"height":200,"sizeSlug":"large","linkDestination":"none","className":"is-style-rounded"} -->
				<figure class="wp-block-image aligncenter size-large is-resized is-style-rounded"><img src="' . esc_url( get_template_directory_uri() ) . '/assets/images/team1.jpg" alt="' . esc_attr__( 'Člen týmu 1', 'web' ) . '" width="200" height="200"/></figure>
				<!-- /wp:image -->

				<!-- wp:heading {"textAlign":"center","level":3} -->
				<h3 class="has-text-align-center">' . esc_html__( 'Jan Novák', 'web' ) . '</h3>
				<!-- /wp:heading -->

				<!-- wp:paragraph {"align":"center"} -->
				<p class="has-text-align-center">' . esc_html__( 'CEO & Zakladatel', 'web' ) . '</p>
				<!-- /wp:paragraph -->

				<!-- wp:social-links {"iconColor":"dark","iconColorValue":"#333333","size":"has-normal-icon-size","align":"center","className":"is-style-logos-only"} -->
				<ul class="wp-block-social-links aligncenter has-normal-icon-size has-icon-color is-style-logos-only"><!-- wp:social-link {"url":"https://linkedin.com","service":"linkedin"} /-->

				<!-- wp:social-link {"url":"https://twitter.com","service":"twitter"} /--></ul>
				<!-- /wp:social-links --></div>
				<!-- /wp:column -->

				<!-- wp:column -->
				<div class="wp-block-column"><!-- wp:image {"align":"center","width":200,"height":200,"sizeSlug":"large","linkDestination":"none","className":"is-style-rounded"} -->
				<figure class="wp-block-image aligncenter size-large is-resized is-style-rounded"><img src="' . esc_url( get_template_directory_uri() ) . '/assets/images/team2.jpg" alt="' . esc_attr__( 'Člen týmu 2', 'web' ) . '" width="200" height="200"/></figure>
				<!-- /wp:image -->

				<!-- wp:heading {"textAlign":"center","level":3} -->
				<h3 class="has-text-align-center">' . esc_html__( 'Marie Svobodová', 'web' ) . '</h3>
				<!-- /wp:heading -->

				<!-- wp:paragraph {"align":"center"} -->
				<p class="has-text-align-center">' . esc_html__( 'Marketingová manažerka', 'web' ) . '</p>
				<!-- /wp:paragraph -->

				<!-- wp:social-links {"iconColor":"dark","iconColorValue":"#333333","size":"has-normal-icon-size","align":"center","className":"is-style-logos-only"} -->
				<ul class="wp-block-social-links aligncenter has-normal-icon-size has-icon-color is-style-logos-only"><!-- wp:social-link {"url":"https://linkedin.com","service":"linkedin"} /-->

				<!-- wp:social-link {"url":"https://twitter.com","service":"twitter"} /--></ul>
				<!-- /wp:social-links --></div>
				<!-- /wp:column -->

				<!-- wp:column -->
				<div class="wp-block-column"><!-- wp:image {"align":"center","width":200,"height":200,"sizeSlug":"large","linkDestination":"none","className":"is-style-rounded"} -->
				<figure class="wp-block-image aligncenter size-large is-resized is-style-rounded"><img src="' . esc_url( get_template_directory_uri() ) . '/assets/images/team3.jpg" alt="' . esc_attr__( 'Člen týmu 3', 'web' ) . '" width="200" height="200"/></figure>
				<!-- /wp:image -->

				<!-- wp:heading {"textAlign":"center","level":3} -->
				<h3 class="has-text-align-center">' . esc_html__( 'Petr Černý', 'web' ) . '</h3>
				<!-- /wp:heading -->

				<!-- wp:paragraph {"align":"center"} -->
				<p class="has-text-align-center">' . esc_html__( 'Vedoucí vývojář', 'web' ) . '</p>
				<!-- /wp:paragraph -->

								<!-- wp:social-links {"iconColor":"dark","iconColorValue":"#333333","size":"has-normal-icon-size","align":"center","className":"is-style-logos-only"} -->
				<ul class="wp-block-social-links aligncenter has-normal-icon-size has-icon-color is-style-logos-only"><!-- wp:social-link {"url":"https://linkedin.com","service":"linkedin"} /-->

				<!-- wp:social-link {"url":"https://twitter.com","service":"twitter"} /--></ul>
				<!-- /wp:social-links --></div>
				<!-- /wp:column --></div>
				<!-- /wp:columns --></div>
				<!-- /wp:group -->',
			)
		);

		// Vzor pro sekci FAQ
		register_block_pattern(
			'web/faq-section',
			array(
				'title'       => __( 'Sekce s častými dotazy', 'web' ),
				'description' => __( 'Sekce s často kladenými dotazy a odpověďmi.', 'web' ),
				'categories'  => array( 'web-sections' ),
				'content'     => '<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"80px","bottom":"80px"}},"color":{"background":"#f8f8f8"}}} -->
				<div class="wp-block-group alignfull has-background" style="background-color:#f8f8f8;padding-top:80px;padding-bottom:80px"><!-- wp:heading {"textAlign":"center","style":{"spacing":{"margin":{"bottom":"50px"}}}} -->
				<h2 class="has-text-align-center" style="margin-bottom:50px">' . esc_html__( 'Často kladené dotazy', 'web' ) . '</h2>
				<!-- /wp:heading -->

				<!-- wp:columns {"align":"wide"} -->
				<div class="wp-block-columns alignwide"><!-- wp:column -->
				<div class="wp-block-column"><!-- wp:heading {"level":4} -->
				<h4>' . esc_html__( 'Jak dlouho trvá realizace projektu?', 'web' ) . '</h4>
				<!-- /wp:heading -->

				<!-- wp:paragraph -->
				<p>' . esc_html__( 'Doba realizace závisí na rozsahu a složitosti projektu. Běžně se pohybuje od 2 týdnů do 3 měsíců. Přesný časový harmonogram vám sdělíme po úvodní konzultaci.', 'web' ) . '</p>
				<!-- /wp:paragraph -->

				<!-- wp:heading {"level":4} -->
				<h4>' . esc_html__( 'Kolik stojí vytvoření webových stránek?', 'web' ) . '</h4>
				<!-- /wp:heading -->

				<!-- wp:paragraph -->
				<p>' . esc_html__( 'Cena se odvíjí od požadovaných funkcí, designu a rozsahu projektu. Nabízíme řešení od jednoduchých prezentačních webů až po komplexní e-shopy a webové aplikace.', 'web' ) . '</p>
				<!-- /wp:paragraph --></div>
				<!-- /wp:column -->

				<!-- wp:column -->
				<div class="wp-block-column"><!-- wp:heading {"level":4} -->
				<h4>' . esc_html__( 'Poskytujete i správu a údržbu webu?', 'web' ) . '</h4>
				<!-- /wp:heading -->

				<!-- wp:paragraph -->
				<p>' . esc_html__( 'Ano, nabízíme kompletní správu a údržbu webových stránek včetně pravidelných aktualizací, zálohování a technické podpory. Můžete si vybrat z několika servisních balíčků.', 'web' ) . '</p>
				<!-- /wp:paragraph -->

				<!-- wp:heading {"level":4} -->
				<h4>' . esc_html__( 'Pomůžete nám i s marketingem?', 'web' ) . '</h4>
				<!-- /wp:heading -->

				<!-- wp:paragraph -->
				<p>' . esc_html__( 'Samozřejmě. Kromě tvorby webů nabízíme i komplexní marketingové služby včetně SEO, PPC kampaní, správy sociálních sítí a obsahového marketingu.', 'web' ) . '</p>
				<!-- /wp:paragraph --></div>
				<!-- /wp:column --></div>
				<!-- /wp:columns -->

				<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"},"style":{"spacing":{"margin":{"top":"50px"}}}} -->
				<div class="wp-block-buttons" style="margin-top:50px"><!-- wp:button {"backgroundColor":"primary"} -->
				<div class="wp-block-button"><a class="wp-block-button__link has-primary-background-color has-background">' . esc_html__( 'Máte další otázky? Kontaktujte nás', 'web' ) . '</a></div>
				<!-- /wp:button --></div>
				<!-- /wp:buttons --></div>
				<!-- /wp:group -->',
			)
		);
	}
}
add_action( 'init', 'web_register_block_patterns' );