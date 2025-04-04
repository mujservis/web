<?php
/**
 * Vlastní šablonové značky pro toto téma
 *
 * Nakonec budou tyto funkce přesunuty do souboru template-tags.php
 *
 * @package Web
 */

if ( ! function_exists( 'web_posted_on' ) ) :
	/**
	 * Vytiskne HTML s meta informacemi pro aktuální příspěvek - datum/čas a autor.
	 */
	function web_posted_on() {
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
		}

		$time_string = sprintf(
			$time_string,
			esc_attr( get_the_date( DATE_W3C ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_modified_date( DATE_W3C ) ),
			esc_html( get_the_modified_date() )
		);

		$posted_on = sprintf(
			/* translators: %s: datum publikování příspěvku */
			esc_html_x( 'Publikováno %s', 'datum publikování příspěvku', 'web' ),
			'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
		);

		$byline = sprintf(
			/* translators: %s: jméno autora příspěvku */
			esc_html_x( 'Autor %s', 'jméno autora příspěvku', 'web' ),
			'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
		);

		echo '<span class="posted-on">' . $posted_on . '</span><span class="byline"> ' . $byline . '</span>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped

	}
endif;

if ( ! function_exists( 'web_entry_footer' ) ) :
	/**
	 * Vytiskne HTML s meta informacemi pro kategorie, štítky a komentáře.
	 */
	function web_entry_footer() {
		// Skrýt kategorii a štítky pro stránky.
		if ( 'post' === get_post_type() ) {
			/* translators: používá se mezi seznamem kategorií */
			$categories_list = get_the_category_list( esc_html__( ', ', 'web' ) );
			if ( $categories_list ) {
				/* translators: 1: seznam kategorií */
				printf( '<span class="cat-links">' . esc_html__( 'Kategorie: %1$s', 'web' ) . '</span>', $categories_list ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			}

			/* translators: používá se mezi seznamem štítků */
			$tags_list = get_the_tag_list( '', esc_html_x( ', ', 'seznam štítků', 'web' ) );
			if ( $tags_list ) {
				/* translators: 1: seznam štítků */
				printf( '<span class="tags-links">' . esc_html__( 'Štítky: %1$s', 'web' ) . '</span>', $tags_list ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			}
		}

		if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
			echo '<span class="comments-link">';
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
					wp_kses_post( get_the_title() )
				)
			);
			echo '</span>';
		}

		edit_post_link(
			sprintf(
				wp_kses(
					/* translators: %s: název příspěvku */
					__( 'Upravit <span class="screen-reader-text">%s</span>', 'web' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				wp_kses_post( get_the_title() )
			),
			'<span class="edit-link">',
			'</span>'
		);
	}
endif;

if ( ! function_exists( 'web_post_thumbnail' ) ) :
	/**
	 * Zobrazí náhledový obrázek příspěvku.
	 */
	function web_post_thumbnail() {
		if ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) {
			return;
		}

		if ( is_singular() ) :
			?>

			<div class="post-thumbnail">
				<?php the_post_thumbnail(); ?>
			</div><!-- .post-thumbnail -->

		<?php else : ?>

			<a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
				<?php
					the_post_thumbnail(
						'post-thumbnail',
						array(
							'alt' => the_title_attribute(
								array(
									'echo' => false,
								)
							),
						)
					);
				?>
			</a>

			<?php
		endif; // End is_singular().
	}
endif;

if ( ! function_exists( 'wp_body_open' ) ) :
	/**
	 * Shim pro weby starší než 5.2.
	 *
	 * @link https://core.trac.wordpress.org/ticket/12563
	 */
	function wp_body_open() {
		do_action( 'wp_body_open' );
	}
endif;

/**
 * Zobrazí navigaci k předchozímu/dalšímu příspěvku, pokud je k dispozici.
 */
function web_the_post_navigation() {
	the_post_navigation(
		array(
			'prev_text' => '<span class="nav-subtitle">' . esc_html__( 'Předchozí:', 'web' ) . '</span> <span class="nav-title">%title</span>',
			'next_text' => '<span class="nav-subtitle">' . esc_html__( 'Následující:', 'web' ) . '</span> <span class="nav-title">%title</span>',
		)
	);
}

/**
 * Zobrazí navigaci mezi stránkami příspěvků, pokud je k dispozici.
 */
function web_the_posts_navigation() {
	the_posts_pagination(
		array(
			'prev_text'          => '<span class="screen-reader-text">' . esc_html__( 'Předchozí stránka', 'web' ) . '</span><span aria-hidden="true">&laquo;</span>',
			'next_text'          => '<span class="screen-reader-text">' . esc_html__( 'Následující stránka', 'web' ) . '</span><span aria-hidden="true">&raquo;</span>',
			'before_page_number' => '<span class="meta-nav screen-reader-text">' . esc_html__( 'Stránka', 'web' ) . ' </span>',
			'mid_size'           => 2,
		)
	);
}

/**
 * Zobrazí breadcrumbs (drobečkovou navigaci).
 */
function web_breadcrumbs() {
	// Pokud není plugin Yoast SEO aktivní, použijeme vlastní implementaci
	if ( ! function_exists( 'yoast_breadcrumb' ) ) {
		echo '<div class="breadcrumbs">';
		echo '<span class="breadcrumb-item"><a href="' . esc_url( home_url( '/' ) ) . '">' . esc_html__( 'Domů', 'web' ) . '</a></span>';
		
		if ( is_category() || is_single() ) {
			echo '<span class="breadcrumb-separator"> / </span>';
			
			if ( is_single() ) {
				$categories = get_the_category();
				if ( ! empty( $categories ) ) {
					echo '<span class="breadcrumb-item"><a href="' . esc_url( get_category_link( $categories[0]->term_id ) ) . '">' . esc_html( $categories[0]->name ) . '</a></span>';
					echo '<span class="breadcrumb-separator"> / </span>';
				}
				echo '<span class="breadcrumb-item current">' . get_the_title() . '</span>';
			} else {
				echo '<span class="breadcrumb-item current">' . single_cat_title( '', false ) . '</span>';
			}
		} elseif ( is_page() ) {
			echo '<span class="breadcrumb-separator"> / </span>';
			echo '<span class="breadcrumb-item current">' . get_the_title() . '</span>';
		} elseif ( is_search() ) {
			echo '<span class="breadcrumb-separator"> / </span>';
			echo '<span class="breadcrumb-item current">' . esc_html__( 'Výsledky vyhledávání pro:', 'web' ) . ' ' . get_search_query() . '</span>';
		} elseif ( is_tag() ) {
			echo '<span class="breadcrumb-separator"> / </span>';
			echo '<span class="breadcrumb-item current">' . single_tag_title( '', false ) . '</span>';
		} elseif ( is_author() ) {
			echo '<span class="breadcrumb-separator"> / </span>';
			echo '<span class="breadcrumb-item current">' . get_the_author() . '</span>';
		} elseif ( is_archive() ) {
			echo '<span class="breadcrumb-separator"> / </span>';
			echo '<span class="breadcrumb-item current">' . get_the_archive_title() . '</span>';
		}
		
		echo '</div>';
	} else {
		// Pokud je Yoast SEO aktivní, použijeme jeho breadcrumbs
		yoast_breadcrumb( '<div class="breadcrumbs">', '</div>' );
	}
}

/**
 * Zobrazí sociální ikony, pokud jsou nastaveny v přizpůsobovači.
 */
function web_social_icons() {
	$facebook_url = get_theme_mod( 'web_facebook_url' );
	$twitter_url = get_theme_mod( 'web_twitter_url' );
	$instagram_url = get_theme_mod( 'web_instagram_url' );
	$linkedin_url = get_theme_mod( 'web_linkedin_url' );
	$youtube_url = get_theme_mod( 'web_youtube_url' );
	
	if ( $facebook_url || $twitter_url || $instagram_url || $linkedin_url || $youtube_url ) {
		echo '<div class="social-icons">';
		
		if ( $facebook_url ) {
			echo '<a href="' . esc_url( $facebook_url ) . '" target="_blank" rel="noopener noreferrer" class="social-icon facebook"><span class="screen-reader-text">' . esc_html__( 'Facebook', 'web' ) . '</span></a>';
		}
		
		if ( $twitter_url ) {
			echo '<a href="' . esc_url( $twitter_url ) . '" target="_blank" rel="noopener noreferrer" class="social-icon twitter"><span class="screen-reader-text">' . esc_html__( 'Twitter', 'web' ) . '</span></a>';
		}
		
		if ( $instagram_url ) {
			echo '<a href="' . esc_url( $instagram_url ) . '" target="_blank" rel="noopener noreferrer" class="social-icon instagram"><span class="screen-reader-text">' . esc_html__( 'Instagram', 'web' ) . '</span></a>';
		}
		
		if ( $linkedin_url ) {
			echo '<a href="' . esc_url( $linkedin_url ) . '" target="_blank" rel="noopener noreferrer" class="social-icon linkedin"><span class="screen-reader-text">' . esc_html__( 'LinkedIn', 'web' ) . '</span></a>';
		}
		
		if ( $youtube_url ) {
			echo '<a href="' . esc_url( $youtube_url ) . '" target="_blank" rel="noopener noreferrer" class="social-icon youtube"><span class="screen-reader-text">' . esc_html__( 'YouTube', 'web' ) . '</span></a>';
		}
		
		echo '</div>';
	}
}

/**
 * Zobrazí informace o autorovi příspěvku.
 */
function web_author_bio() {
	if ( is_single() && get_the_author_meta( 'description' ) ) {
		?>
		<div class="author-bio">
			<div class="author-avatar">
				<?php echo get_avatar( get_the_author_meta( 'ID' ), 80 ); ?>
			</div>
			<div class="author-info">
				<h3 class="author-title">
					<?php
					printf(
						/* translators: %s: jméno autora */
						esc_html__( 'O autorovi: %s', 'web' ),
						'<span class="author-name">' . get_the_author() . '</span>'
					);
					?>
				</h3>
				<div class="author-description">
					<?php echo wp_kses_post( wpautop( get_the_author_meta( 'description' ) ) ); ?>
				</div>
				<a class="author-link" href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>">
					<?php
					printf(
						/* translators: %s: jméno autora */
						esc_html__( 'Zobrazit všechny příspěvky od %s', 'web' ),
						get_the_author()
					);
					?>
				</a>
			</div>
		</div><!-- .author-bio -->
		<?php
	}
}

/**
 * Zobrazí související příspěvky.
 */
function web_related_posts() {
	if ( is_single() ) {
		$current_post_id = get_the_ID();
		$categories = get_the_category();
		
		if ( $categories ) {
			$category_ids = array();
			foreach ( $categories as $category ) {
				$category_ids[] = $category->term_id;
			}
			
			$args = array(
				'category__in'        => $category_ids,
				'post__not_in'        => array( $current_post_id ),
				'posts_per_page'      => 3,
				'ignore_sticky_posts' => 1,
			);
			
			$related_posts = new WP_Query( $args );
			
			if ( $related_posts->have_posts() ) {
				?>
				<div class="related-posts">
					<h3 class="related-posts-title"><?php esc_html_e( 'Související příspěvky', 'web' ); ?></h3>
					<div class="related-posts-grid">
						<?php
						while ( $related_posts->have_posts() ) {
							$related_posts->the_post();
							?>
							<article class="related-post">
								<?php if ( has_post_thumbnail() ) : ?>
									<a href="<?php the_permalink(); ?>" class="related-post-thumbnail">
										<?php the_post_thumbnail( 'medium' ); ?>
									</a>
								<?php endif; ?>
								<h4 class="related-post-title">
									<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
								</h4>
								<div class="related-post-date">
									<?php echo esc_html( get_the_date() ); ?>
								</div>
							</article>
							<?php
						}
						?>
					</div>
				</div><!-- .related-posts -->
				<?php
			}
			
			wp_reset_postdata();
		}
	}
}

/**
 * Zobrazí sdílení příspěvku na sociálních sítích.
 */
function web_social_sharing() {
	if ( is_single() ) {
		$post_url = urlencode( get_permalink() );
		$post_title = urlencode( get_the_title() );
		$post_thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' );
		$post_thumbnail_url = $post_thumbnail ? urlencode( $post_thumbnail[0] ) : '';
		
		$facebook_url = 'https://www.facebook.com/sharer/sharer.php?u=' . $post_url;
		$twitter_url = 'https://twitter.com/intent/tweet?url=' . $post_url . '&text=' . $post_title;
		$linkedin_url = 'https://www.linkedin.com/shareArticle?mini=true&url=' . $post_url . '&title=' . $post_title;
		$pinterest_url = 'https://pinterest.com/pin/create/button/?url=' . $post_url . '&media=' . $post_thumbnail_url . '&description=' . $post_title;
		$email_url = 'mailto:?subject=' . $post_title . '&body=' . $post_url;
		
		?>
		<div class="social-sharing">
			<h3 class="social-sharing-title"><?php esc_html_e( 'Sdílet příspěvek', 'web' ); ?></h3>
			<div class="social-sharing-buttons">
				<a href="<?php echo esc_url( $facebook_url ); ?>" target="_blank" rel="noopener noreferrer" class="social-sharing-button facebook">
					<span class="screen-reader-text"><?php esc_html_e( 'Sdílet na Facebooku', 'web' ); ?></span>
				</a>
				<a href="<?php echo esc_url( $twitter_url ); ?>" target="_blank" rel="noopener noreferrer" class="social-sharing-button twitter">
					<span class="screen-reader-text"><?php esc_html_e( 'Sdílet na Twitteru', 'web' ); ?></span>
				</a>
				<a href="<?php echo esc_url( $linkedin_url ); ?>" target="_blank" rel="noopener noreferrer" class="social-sharing-button linkedin">
					<span class="screen-reader-text"><?php esc_html_e( 'Sdílet na LinkedIn', 'web' ); ?></span>
				</a>
				<a href="<?php echo esc_url( $pinterest_url ); ?>" target="_blank" rel="noopener noreferrer" class="social-sharing-button pinterest">
					<span class="screen-reader-text"><?php esc_html_e( 'Sdílet na Pinterest', 'web' ); ?></span>
				</a>
				<a href="<?php echo esc_url( $email_url ); ?>" class="social-sharing-button email">
					<span class="screen-reader-text"><?php esc_html_e( 'Sdílet e-mailem', 'web' ); ?></span>
				</a>
			</div>
		</div><!-- .social-sharing -->
		<?php
	}
}

/**
 * Zobrazí datum poslední aktualizace příspěvku.
 */
function web_last_updated() {
	if ( get_the_modified_time() !== get_the_time() ) {
		echo '<div class="last-updated">';
		printf(
			/* translators: %s: datum aktualizace */
			esc_html__( 'Poslední aktualizace: %s', 'web' ),
			'<time datetime="' . esc_attr( get_the_modified_date( 'c' ) ) . '">' . esc_html( get_the_modified_date() ) . '</time>'
		);
		echo '</div>';
	}
}

/**
 * Zobrazí odhadovaný čas čtení příspěvku.
 */
function web_reading_time() {
	$content = get_post_field( 'post_content', get_the_ID() );
	$word_count = str_word_count( strip_tags( $content ) );
	$reading_time = ceil( $word_count / 200 ); // Průměrná rychlost čtení: 200 slov za minutu
	
	if ( $reading_time < 1 ) {
		$reading_time = 1;
	}
	
	echo '<div class="reading-time">';
	printf(
		/* translators: %d: počet minut */
		esc_html( _n( 'Doba čtení: %d minuta', 'Doba čtení: %d minut', $reading_time, 'web' ) ),
		$reading_time
	);
	echo '</div>';
}

/**
 * Zobrazí počet zobrazení příspěvku (vyžaduje plugin pro sledování zobrazení nebo vlastní implementaci).
 */
function web_post_views() {
	// Tato funkce předpokládá, že používáte nějaký způsob sledování zobrazení příspěvků
	// Například pomocí vlastního pole 'post_views_count'
	$views = get_post_meta( get_the_ID(), 'post_views_count', true );
	
	if ( ! $views ) {
		$views = 0;
	}
	
	echo '<div class="post-views">';
	printf(
		/* translators: %d: počet zobrazení */
		esc_html( _n( '%d zobrazení', '%d zobrazení', $views, 'web' ) ),
		$views
	);
	echo '</div>';
}

/**
 * Inkrementuje počítadlo zobrazení příspěvku.
 */
function web_set_post_views() {
	if ( is_single() && ! is_bot() ) {
		$post_id = get_the_ID();
		$count = get_post_meta( $post_id, 'post_views_count', true );
		
		if ( $count === '' ) {
			delete_post_meta( $post_id, 'post_views_count' );
			add_post_meta( $post_id, 'post_views_count', 1 );
		} else {
			update_post_meta( $post_id, 'post_views_count', $count + 1 );
		}
	}
}

/**
 * Kontroluje, zda je aktuální návštěvník bot.
 *
 * @return bool True, pokud je návštěvník bot, jinak false.
 */
function is_bot() {
	if ( ! isset( $_SERVER['HTTP_USER_AGENT'] ) ) {
		return false;
	}
	
	$bot_agents = array(
		'bot', 'slurp', 'crawler', 'spider', 'googlebot', 'bingbot', 'yahoo', 'yandex', 'baidu'
	);
	
	$user_agent = strtolower( $_SERVER['HTTP_USER_AGENT'] );
	
	foreach ( $bot_agents as $bot_agent ) {
		if ( strpos( $user_agent, $bot_agent ) !== false ) {
			return true;
		}
	}
	
	return false;
}