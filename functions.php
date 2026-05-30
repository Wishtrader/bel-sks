<?php
/**
 * BelSKS functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package BelSKS
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function belsks_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on BelSKS, use a find and replace
		* to change 'belsks' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'belsks', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support( 'title-tag' );

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-1' => esc_html__( 'Primary', 'belsks' ),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
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

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'belsks_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
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
}
add_action( 'after_setup_theme', 'belsks_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function belsks_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'belsks_content_width', 640 );
}
add_action( 'after_setup_theme', 'belsks_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function belsks_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'belsks' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'belsks' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'belsks_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function belsks_scripts() {
	wp_enqueue_style( 'google-fonts-inter', 'https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap', array(), null );

	wp_enqueue_style( 'belsks-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'belsks-style', 'rtl', 'replace' );

	wp_enqueue_script( 'tailwind-css', 'https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4', array(), '4.0.0', false );

	wp_enqueue_script( 'lucide-icons', 'https://unpkg.com/lucide@latest', array(), 'latest', true );

	wp_enqueue_script( 'belsks-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'belsks_scripts' );

function belsks_tailwind_config() {
	?>
	<script type="text/tailwindcss">
		@theme {
			--color-primary: #1e3a5f;
			--color-primary-light: #3b82f6;
			--color-primary-dark: #1e40af;
		}

		@custom-variant dark (&:where(.dark, .dark *));
	</script>
	<style>
		.site-header {
			background: #ffffff;
			color: #222222;
		}
		.dark .site-header {
			background: #1f2937;
			color: #e5e7eb;
		}
		#theme-toggle .toggle-track {
			transition: background-color 0.3s ease;
			background-color: #e5e7eb;
		}
		.dark #theme-toggle .toggle-track {
			background-color: #3b82f6;
		}
		#theme-toggle .toggle-thumb {
			transition: left 0.3s cubic-bezier(0.4, 0, 0.2, 1);
			will-change: left;
			left: 2px;
		}
		.dark #theme-toggle .toggle-thumb {
			left: 22px;
		}
		.theme-icon-moon { display: block; }
		.theme-icon-sun { display: none; }
		.dark .theme-icon-moon { display: none; }
		.dark .theme-icon-sun { display: block; }
	</style>
	<?php
 }
 add_action( 'wp_head', 'belsks_tailwind_config', 20 );

// Theme toggle script - must be in header for immediate execution
function belsks_theme_toggle_script() {
	?>
	<script>
		function toggleTheme() {
			const isDark = document.documentElement.classList.toggle('dark');
			localStorage.setItem('theme', isDark ? 'dark' : 'light');
			// Update gradient backgrounds
			document.querySelectorAll('[class*="bg-gradient"]').forEach(el => {
				if (isDark) {
					el.classList.add('dark');
				}
			});
			if (typeof lucide !== 'undefined') {
				lucide.createIcons();
			}
		}

		function initIcons() {
			if (typeof lucide !== 'undefined') {
				lucide.createIcons();
			} else {
				setTimeout(initIcons, 100);
			}
		}
		initIcons();
	</script>
	<?php
 }
 add_action( 'wp_head', 'belsks_theme_toggle_script', 30 );

function belsks_nav_menu_css_class( $classes, $item, $args, $depth ) {
	if ( in_array( 'current-menu-item', $classes ) || in_array( 'current_page_item', $classes ) ) {
		$classes[] = 'text-blue-600';
		$classes[] = 'dark:text-blue-400';
	}
	return $classes;
}
add_filter( 'nav_menu_css_class', 'belsks_nav_menu_css_class', 10, 4 );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

