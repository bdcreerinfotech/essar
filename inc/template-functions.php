<?php
/**
 * Theme enhancement functions.
 *
 * @package essar
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function essar_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Adds a class of no-sidebar when there is no sidebar present.
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}

	return $classes;
}
add_filter( 'body_class', 'essar_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 *
 * @return void
 */
function essar_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'essar_pingback_header' );

/**
 * Register footer menus.
 *
 * @return void
 */
function essar_register_menus() {
	register_nav_menus(
		array(
			'top-footer-menu' => __( 'Top Footer Menu', 'essar' ),
			'solutions-menu'  => __( 'Solutions Menu', 'essar' ),
			'markets-menu'    => __( 'Markets Menu', 'essar' ),
			'news-room-menu'  => __( 'Newsroom Menu', 'essar' ),
			'contact-us-menu' => __( 'Contact Us Menu', 'essar' ),
			'social-menu'     => __( 'Social Menu', 'essar' ),
		)
	);
}
add_action( 'init', 'essar_register_menus' );

/**
 * Add custom class to body for specific page.
 *
 * @param array $classes Existing body classes.
 * @return array Modified body classes.
 */
function add_custom_body_class_for_about_us( $classes ) {
	if ( is_page( 'about-us' ) ) {
		$classes[] = 'saf_page';
	}
	return $classes;
}
add_filter( 'body_class', 'add_custom_body_class_for_about_us' );

/**
 * Add custom class to body for specific page.
 *
 * @param array $classes Existing body classes.
 * @return array Modified body classes.
 */
function add_custom_body_class_for_contact_us( $classes ) {
	if ( is_page( 'contact-us' ) ) {
		$classes[] = 'saf_page solution_page';
	}
	return $classes;
}
add_filter( 'body_class', 'add_custom_body_class_for_contact_us' );

/**
 * Conditionally enqueue homepage animation script.
 *
 * @return void
 */
function enqueue_custom_homepage_script() {
	if ( is_front_page() ) {
		wp_enqueue_script(
			'custom-home-animation',
			get_template_directory_uri() . '/js/custom_script.js',
			array( 'jquery' ),
			'1.0',
			true
		);
	}
}
add_action( 'wp_enqueue_scripts', 'enqueue_custom_homepage_script' );

/**
 * Enqueue 'about-us' page animation script.
 *
 * @return void
 */
function enqueue_about_us_script_file() {
	if ( is_page( 'about-us' ) ) {
		wp_enqueue_script(
			'about-us-animation',
			get_template_directory_uri() . '/js/about-us.js',
			array(),
			'1.0',
			true
		);
	}
}
add_action( 'wp_enqueue_scripts', 'enqueue_about_us_script_file' );

/**
 * Register custom post type: Team.
 *
 * @return void
 */
function essar_register_team_cpt() {
	register_post_type(
		'team',
		array(
			'labels'      => array(
				'name'          => esc_html__( 'Team', 'essar' ),
				'singular_name' => esc_html__( 'Team Member', 'essar' ),
			),
			'public'      => true,
			'menu_icon'   => 'dashicons-groups',
			'supports'    => array( 'title', 'thumbnail', 'editor' ),
			'has_archive' => false,
			'show_in_rest' => true,
		)
	);
}
add_action( 'init', 'essar_register_team_cpt' );

/**
 * Remove <span class="wpcf7-form-control-wrap"> from Contact Form 7 output.
 *
 * @param string $content The form HTML.
 * @return string Modified form HTML without span wrappers.
 */
function remove_cf7_control_wrap_spans( $content ) {
	// Remove opening span tag with class wpcf7-form-control-wrap.
	$content = preg_replace( '/<span class="wpcf7-form-control-wrap[^"]*">/', '', $content );

	// Remove closing span tags.
	$content = str_replace( '</span>', '', $content );

	return $content;
}
add_filter( 'wpcf7_form_elements', 'remove_cf7_control_wrap_spans' );

add_filter( 'wpcf7_autop_or_not', '__return_false' );

/**
 * Register Custom Post Type: Our Solutions
 *
 * @return void
 */
function essar_register_our_solutions_post_type() {
	register_post_type(
		'our_solutions',
		array(
			'labels'       => array(
				'name'               => __( 'Our Solutions', 'essar' ),
				'singular_name'      => __( 'Solution', 'essar' ),
				'add_new'            => __( 'Add New', 'essar' ),
				'add_new_item'       => __( 'Add New Solution', 'essar' ),
				'edit_item'          => __( 'Edit Solution', 'essar' ),
				'new_item'           => __( 'New Solution', 'essar' ),
				'view_item'          => __( 'View Solution', 'essar' ),
				'search_items'       => __( 'Search Solutions', 'essar' ),
				'not_found'          => __( 'No Solutions found', 'essar' ),
				'not_found_in_trash' => __( 'No Solutions found in Trash', 'essar' ),
			),
			'public'       => true,
			'show_in_menu' => true,
			'menu_position' => 20,
			'menu_icon'    => 'dashicons-lightbulb',
			'supports'     => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
			'has_archive'  => true,
			'rewrite'      => array( 'slug' => 'our-solutions' ),
			'show_in_rest' => true,
		)
	);
}
add_action( 'init', 'essar_register_our_solutions_post_type' );

/**
 * Enqueue JS only on single Our Solutions posts.
 *
 * @return void
 */
function essar_enqueue_our_solutions_js() {
	if ( is_singular( 'our_solutions' ) ) {
		wp_enqueue_script(
			'our-solutions-custom-js',
			get_template_directory_uri() . '/js/our_solutions.js',
			array( 'jquery' ),
			'1.0',
			true
		);
	}
}
add_action( 'wp_enqueue_scripts', 'essar_enqueue_our_solutions_js' );

/**
 * Add custom body classes for Our Solutions post type.
 *
 * @param array $classes Existing body classes.
 * @return array Modified body classes.
 */
function essar_add_our_solutions_body_class( $classes ) {
	if ( is_singular( 'our_solutions' ) ) {
		$classes[] = 'saf_page';
	}
	return $classes;
}
add_filter( 'body_class', 'essar_add_our_solutions_body_class' );

/**
 * Add custom body class for 'industries' slug.
 */
add_filter( 'body_class', 'essar_add_custom_body_class_for_industries' );

if ( ! function_exists( 'essar_add_custom_body_class_for_industries' ) ) {
	/**
	 * Adds 'saf_page' and 'solution_page' classes to body if slug is 'industries'.
	 *
	 * @param array $classes Existing body classes.
	 * @return array Modified body classes.
	 */
	function essar_add_custom_body_class_for_industries( $classes ) {
		if ( is_singular() ) {
			global $post;
			if ( isset( $post->post_name ) && ( 'industries' === $post->post_name || 'geographies' === $post->post_name ) ) {
				$classes[] = 'saf_page';
				$classes[] = 'solution_page';
			}
		}
		return $classes;
	}
}

/**
 * Enqueue JS on specific page slug.
 *
 * @return void
 */
function enqueue_industries_js() {
	if ( is_page() ) {
		global $post;
		if ( isset( $post->post_name ) && 'industries' === $post->post_name ) {
			wp_enqueue_script(
				'industries-custom-js',
				get_template_directory_uri() . '/js/industries.js',
				array(),
				'1.0.0',
				true
			);
		}
	}
}
add_action( 'wp_enqueue_scripts', 'enqueue_industries_js' );

/**
 * Enqueue custom script for 'geographies' page.
 *
 * @return void
 */
function enqueue_geographies_script() {
	if ( is_page( 'geographies' ) ) {
		wp_enqueue_script(
			'custom-geographies-script',
			get_template_directory_uri() . '/js/geographies.js',
			array(),
			null,
			true
		);
	}
}
add_action( 'wp_enqueue_scripts', 'enqueue_geographies_script' );

/**
 * Add custom body classes based on page slug.
 *
 * @param array $classes Existing body classes.
 * @return array Modified body classes.
 */
function custom_body_classes_for_solutions_page( $classes ) {
	// Check if we're on a single page or post.
	if ( is_page() || is_single() ) {
		global $post;
		$post_slug = $post->post_name;

		// Add classes if slug matches "our-solutions".
		if ( 'our-solutions' === $post_slug || 'markets' === $post_slug || 'newsroom' === $post_slug ) {
			$classes[] = 'saf_page';
			$classes[] = 'solution_pag';
		}
	}

	return $classes;
}
add_filter( 'body_class', 'custom_body_classes_for_solutions_page' );

/**
 * Enqueue custom JS for our-solutions page.
 *
 * @return void
 */
function enqueue_custom_js_for_solutions_page() {
	// Check if we're on a single page or post.
	if ( is_page() || is_single() ) {
		global $post;
		$post_slug = $post->post_name;

		// Check if this is our solutions page.
		if ( 'our-solution' === $post_slug ) {
			// Enqueue your custom JS file.
			wp_enqueue_script(
				'custom-geographies-scripts',
				get_template_directory_uri() . '/js/our_solution.js',
				array(),
				null,
				true
			);
		}
	}
}
add_action( 'wp_enqueue_scripts', 'enqueue_custom_js_for_solutions_page' );

/**
 * Enqueue JS only for the 'markets' page.
 *
 * @return void
 */
function essar_enqueue_markets_script() {
	if ( is_page() ) {
		global $post;

		if ( isset( $post->post_name ) && 'markets' === $post->post_name ) {
			wp_enqueue_script(
				'essar-markets-script',
				get_template_directory_uri() . '/js/market.js',
				array(),
				'1.0.0',
				true
			);
		}
	}
}
add_action( 'wp_enqueue_scripts', 'essar_enqueue_markets_script' );

/**
 * Register Custom Post Types for Newsroom.
 *
 * @return void
 */
function register_newsroom_post_types() {
	// Videos Post Type.
	register_post_type(
		'video',
		array(
			'labels'      => array(
				'name'          => __( 'Videos', 'essar' ),
				'singular_name' => __( 'Video', 'essar' ),
			),
			'public'      => true,
			'has_archive' => true,
			'supports'    => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
			'menu_icon'   => 'dashicons-video-alt3',
		)
	);

	// Downloads Post Type.
	register_post_type(
		'download',
		array(
			'labels'      => array(
				'name'          => __( 'Downloads', 'essar' ),
				'singular_name' => __( 'Download', 'essar' ),
			),
			'public'      => true,
			'has_archive' => true,
			'supports'    => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
			'menu_icon'   => 'dashicons-download',
		)
	);
}
add_action( 'init', 'register_newsroom_post_types' );

// AJAX Handlers.
add_action( 'wp_ajax_load_news', 'load_news_callback' );
add_action( 'wp_ajax_nopriv_load_news', 'load_news_callback' );

add_action( 'wp_ajax_load_videos', 'load_videos_callback' );
add_action( 'wp_ajax_nopriv_load_videos', 'load_videos_callback' );

add_action( 'wp_ajax_load_downloads', 'load_downloads_callback' );
add_action( 'wp_ajax_nopriv_load_downloads', 'load_downloads_callback' );

/**
 * AJAX callback to load news posts.
 *
 * @return void
 */
function load_news_callback() {
	$page          = isset( $_POST['page'] ) ? intval( $_POST['page'] ) : 1;
	$posts_per_page = 3; // Adjust as needed.

	$args = array(
		'post_type'      => 'post',
		'post_status'    => 'publish',
		'posts_per_page' => $posts_per_page,
		'paged'          => $page,
	);

	$query = new WP_Query( $args );

	if ( $query->have_posts() ) {
		while ( $query->have_posts() ) {
			$query->the_post();
			?>
			<div class="grid">
				<div class="card">
					<a href="<?php the_permalink(); ?>">
						<?php if ( has_post_thumbnail() ) : ?>
							<img src="<?php echo esc_url( get_the_post_thumbnail_url( get_the_ID(), 'large' ) ); ?>" alt="<?php echo esc_attr( get_the_title() ); ?>" />
						<?php endif; ?>
						<div class="card-body">
							<p><?php echo esc_html( wp_trim_words( get_the_excerpt(), 20 ) ); ?></p>
						</div>
						<div class="card-footer">
							<span><?php echo esc_html( get_the_date( 'M j, Y' ) ); ?></span>
							<img src="<?php echo esc_url( get_template_directory_uri() . '/images/nr-button.png' ); ?>" alt="<?php esc_attr_e( 'Arrow icon', 'essar' ); ?>"/>
						</div>
					</a>
				</div>
			</div>
			<?php
		}
		wp_reset_postdata();
	}

	wp_die();
}

/**
 * AJAX callback to load video posts.
 *
 * @return void
 */
function load_videos_callback() {
	$page          = isset( $_POST['page'] ) ? intval( $_POST['page'] ) : 1;
	$posts_per_page = 9;

	$args = array(
		'post_type'      => 'video',
		'post_status'    => 'publish',
		'posts_per_page' => $posts_per_page,
		'paged'          => $page,
	);

	$query = new WP_Query( $args );

	if ( $query->have_posts() ) {
		while ( $query->have_posts() ) {
			$query->the_post();
			$video_url = get_post_meta( get_the_ID(), 'video_url', true );
			?>
			<div class="grid">
				<div class="card">
					<a href="#" class="video-link" data-video-url="<?php echo esc_url( $video_url ); ?>">
						<div class="video_IMG">
							<?php if ( has_post_thumbnail() ) : ?>
								<img src="<?php echo esc_url( get_the_post_thumbnail_url( get_the_ID(), 'large' ) ); ?>" alt="<?php echo esc_attr( get_the_title() ); ?>" />
							<?php endif; ?>
							<img src="<?php echo esc_url( get_template_directory_uri() . '/images/newsroom/VI.png' ); ?>" class="newsroom_video_icons" />
						</div>
						<div class="card-body">
							<p><?php echo esc_html( wp_trim_words( get_the_excerpt(), 15 ) ); ?></p>
						</div>
						<div class="card-footer">
							<span><?php echo esc_html( get_the_date( 'M j, Y' ) ); ?></span>
						</div>
					</a>
				</div>
			</div>
			<?php
		}
		wp_reset_postdata();
	}

	wp_die();
}

/**
 * Enqueue newsroom scripts only for the newsroom template.
 *
 * @return void
 */
function essar_enqueue_newsroom_script() {
	if ( is_page() ) {
		$page = get_queried_object();
		$slug = isset( $page->post_name ) ? $page->post_name : '';

		if ( 'newsroom' === $slug ) {
			// Prepare loaded post IDs for each post type.
			$loaded_ids = array(
				'post'     => array(),
				'video'    => array(),
				'download' => array(),
			);

			// News.
			$news_query = new WP_Query(
				array(
					'post_type'      => 'post',
					'posts_per_page' => 3,
					'paged'          => 1,
				)
			);
			$loaded_ids['post'] = wp_list_pluck( $news_query->posts, 'ID' );

			// Video.
			$video_query = new WP_Query(
				array(
					'post_type'      => 'video',
					'posts_per_page' => 3,
					'paged'          => 1,
				)
			);
			$loaded_ids['video'] = wp_list_pluck( $video_query->posts, 'ID' );

			// Download.
			$download_query = new WP_Query(
				array(
					'post_type'      => 'download',
					'posts_per_page' => 3,
					'paged'          => 1,
				)
			);
			$loaded_ids['download'] = wp_list_pluck( $download_query->posts, 'ID' );

			// Enqueue JS.
			wp_enqueue_script(
				'newsroom-script',
				get_template_directory_uri() . '/js/newsroom.js',
				array( 'jquery' ),
				'1.0.0',
				true
			);

			// Localize.
			wp_localize_script(
				'newsroom-script',
				'newsroom_vars',
				array(
					'ajax_url'   => admin_url( 'admin-ajax.php' ),
					'nonce'      => wp_create_nonce( 'newsroom_nonce' ),
					'loaded_ids' => $loaded_ids,
				)
			);
		}
	}
}
add_action( 'wp_enqueue_scripts', 'essar_enqueue_newsroom_script' );

add_action( 'wp_ajax_load_more_newsroom', 'essar_load_more_newsroom_ajax' );
add_action( 'wp_ajax_nopriv_load_more_newsroom', 'essar_load_more_newsroom_ajax' );

/**
 * AJAX callback to load more newsroom content.
 *
 * @return void
 */
function essar_load_more_newsroom_ajax() {
	check_ajax_referer( 'newsroom_nonce', 'nonce' );

	$page    = isset( $_POST['page'] ) ? absint( $_POST['page'] ) : 1;
	$type    = isset( $_POST['post_type'] ) ? sanitize_key( $_POST['post_type'] ) : 'post';
	$exclude = isset( $_POST['exclude_ids'] ) ? array_map( 'absint', $_POST['exclude_ids'] ) : array();

	if ( 'news' === $type ) {
		$type = 'post';
	}
	$args = array(
		'post_type'      => $type,
		'posts_per_page' => 3,
		'paged'          => $page,
	//	'post__not_in'   => $exclude
	);
	//var_dump($args); exit;

	$query   = new WP_Query( $args );
	//var_dump($query );
	$new_ids = array();
	if ( $query->have_posts() ) {
		$default_img  = esc_url( get_template_directory_uri() . '/images/default-news.png' );
		$template_uri = esc_url( get_template_directory_uri() );

		while ( $query->have_posts() ) :
			$query->the_post();
			$new_ids[] = get_the_ID();
		endwhile;
	}

	ob_start();

	if ( $query->have_posts() ) {
		$default_img  = esc_url( get_template_directory_uri() . '/images/default-news.png' );
		$template_uri = esc_url( get_template_directory_uri() );

		while ( $query->have_posts() ) :
			$query->the_post();

			$field_key = ( 'post' === $type ) ? 'news_url' : ( 'video' === $type ? 'video_url' : 'file_url' );
			$url       = get_field( $field_key );
			$icon      = ( 'video' === $type ) ? 'newsroom/VI.png' : ( 'download' === $type ? 'newsroom/download_icon.png' : 'nr-button.png' );
			?>
			<div class="grid">
				<div class="card">
					<a href="<?php echo esc_url( $url ); ?>"
						<?php echo ( 'download' === $type ) ? 'target="_blank" rel="noopener"' : ''; ?>
						<?php echo ( 'video' === $type ) ? 'class="video-link" data-video-url="' . esc_url( $url ) . '"' : ''; ?>>
						<div class="video_IMG">
							<?php if ( has_post_thumbnail() ) : ?>
								<?php the_post_thumbnail( 'custom-thumb-340x200' ); ?>
							<?php else : ?>
								<img src="<?php echo esc_url( $default_img ); ?>" alt="<?php esc_attr_e( 'Default image', 'essar' ); ?>">
							<?php endif; ?>
							<?php if ( 'post' !== $type ) : ?>
								<img src="<?php echo esc_url( $template_uri . '/images/' . $icon ); ?>" class="newsroom_video_icons" alt="icon">
							<?php endif; ?>
						</div>
						<div class="card-body">
							<p><?php echo esc_html( get_the_title() ); ?></p>
						</div>
						<div class="card-footer">
							<span><?php echo esc_html( get_the_date( 'M d, Y' ) ); ?></span>
							<?php if ( 'post' === $type ) : ?>
								<img src="<?php echo esc_url( $template_uri . '/images/' . $icon ); ?>" alt="<?php esc_attr_e( 'Arrow icon', 'essar' ); ?>">
							<?php endif; ?>
						</div>
					</a>
				</div>
			</div>
			<?php
		endwhile;
		wp_reset_postdata();
	}
	$content = ob_get_clean();

	wp_send_json_success(
		array(
			'content' => $content,
			'new_ids' => $new_ids,
		)
	);
}

/**
 * Filter the single template for our_solutions post type.
 *
 * @param string $single_template The path to the single template.
 * @return string The modified template path.
 */
function essar_custom_template_for_solutions( $single_template ) {
	if ( is_singular( 'our_solutions' ) ) {
		return get_template_directory() . '/single-our_solutions.php';
	}
	return $single_template;
}
add_filter( 'single_template', 'essar_custom_template_for_solutions' );