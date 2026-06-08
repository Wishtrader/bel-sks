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
 * Enqueue Google Fonts (Inter)
 */
function belsks_enqueue_fonts() {
	wp_enqueue_style(
		'inter-font',
		'https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap',
		array(),
		null
	);
}
add_action( 'wp_enqueue_scripts', 'belsks_enqueue_fonts' );

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

	add_theme_support( 'woocommerce' );
	add_theme_support( 'wc-product-gallery-zoom' );
	add_theme_support( 'wc-product-gallery-lightbox' );
	add_theme_support( 'wc-product-gallery-slider' );
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

/**
 * Register Custom Post Type: Services
 */
function belsks_register_services_cpt() {
	$labels = array(
		'name'                  => _x( 'Услуги', 'Post type general name', 'belsks' ),
		'singular_name'         => _x( 'Услуга', 'Post type singular name', 'belsks' ),
		'menu_name'             => _x( 'Услуги', 'Admin Menu text', 'belsks' ),
		'name_admin_bar'        => _x( 'Услуга', 'Add New on Toolbar', 'belsks' ),
		'add_new'               => __( 'Добавить новую', 'belsks' ),
		'add_new_item'          => __( 'Добавить новую услугу', 'belsks' ),
		'new_item'              => __( 'Новая услуга', 'belsks' ),
		'edit_item'             => __( 'Редактировать услугу', 'belsks' ),
		'view_item'             => __( 'Просмотр услуги', 'belsks' ),
		'all_items'             => __( 'Все услуги', 'belsks' ),
		'search_items'          => __( 'Поиск услуг', 'belsks' ),
		'parent_item_colon'     => __( 'Родительская услуга:', 'belsks' ),
		'not_found'             => __( 'Услуги не найдены.', 'belsks' ),
		'not_found_in_trash'    => __( 'В корзине услуг нет.', 'belsks' ),
		'featured_image'        => _x( 'Изображение услуги', 'Overrides the "Featured Image" phrase for this post type', 'belsks' ),
		'set_featured_image'    => _x( 'Установить изображение услуги', 'Overrides the "Set featured image" phrase for this post type', 'belsks' ),
		'remove_featured_image' => _x( 'Удалить изображение услуги', 'Overrides the "Remove featured image" phrase for this post type', 'belsks' ),
		'use_featured_image'    => _x( 'Использовать как изображение услуги', 'Overrides the "Use as featured image" phrase for this post type', 'belsks' ),
		'archives'              => _x( 'Архив услуг', 'The post type archive label', 'belsks' ),
		'insert_into_item'      => _x( 'Добавить в услугу', 'Overrides the "Insert into post" phrase for this post type', 'belsks' ),
		'uploaded_to_this_item' => _x( 'Загружено для услуги', 'Overrides the "Uploaded to this post" phrase for this post type', 'belsks' ),
		'filter_items_list'     => _x( 'Фильтр списка услуг', 'Overrides the "Filter items list" phrase for this post type', 'belsks' ),
		'items_list_navigation' => _x( 'Навигация по списку услуг', 'Overrides the "Items list navigation" phrase for this post type', 'belsks' ),
		'items_list'            => _x( 'Список услуг', 'Overrides the "Items list" phrase for this post type', 'belsks' ),
	);

	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'services' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => 20,
		'supports'           => array( 'title', 'editor', 'thumbnail', 'excerpt', 'page-attributes' ),
		'show_in_rest'       => true,
		'menu_icon'          => 'dashicons-services',
		'sort_column'        => 'menu_order, post_date',
	);

	register_post_type( 'services', $args );
}
add_action( 'init', 'belsks_register_services_cpt' );

/**
 * Register ACF Fields for Services
 */
function belsks_register_services_acf_fields() {
	if ( function_exists( 'acf_add_local_field_group' ) ) {
		acf_add_local_field_group( array(
			'key'      => 'group_services_fields',
			'title'    => 'Детали услуги',
			'fields'   => array(
				array(
					'key'               => 'field_services_icon',
					'label'             => 'Иконка',
					'name'              => 'service_icon',
					'type'              => 'image',
					'instructions'      => 'Загрузите иконку для услуги (SVG или PNG)',
					'required'          => 0,
					'conditional_logic' => 0,
					'wrapper'           => array(
						'width' => '',
						'class' => '',
						'id'    => '',
					),
					'return_format'     => 'array',
					'preview_size'      => 'medium',
					'library'           => 'all',
					'min_width'         => '',
					'min_height'        => '',
					'min_size'          => '',
					'max_width'         => '',
					'max_height'        => '',
					'max_size'          => '',
					'mime_types'        => 'svg,png,jpg,jpeg',
				),
				array(
					'key'               => 'field_services_description',
					'label'             => 'Краткое описание',
					'name'              => 'service_description',
					'type'              => 'textarea',
					'instructions'      => 'Краткое описание услуги (появится на карточке)',
					'required'          => 0,
					'conditional_logic' => 0,
					'wrapper'           => array(
						'width' => '',
						'class' => '',
						'id'    => '',
					),
					'rows'              => 4,
					'placeholder'       => '',
					'maxlength'         => '',
					'new_lines'         => 'wpautop',
				),
			),
			'location' => array(
				array(
					array(
						'param'    => 'post_type',
						'operator' => '==',
						'value'    => 'services',
					),
				),
			),
			'menu_order'            => 0,
			'position'              => 'normal',
			'style'                 => 'default',
			'label_placement'       => 'top',
			'instruction_placement' => 'label',
			'hide_on_screen'        => '',
			'active'                => true,
			'description'           => '',
			'show_in_rest'          => false,
		) );
	}
}
add_action( 'acf/init', 'belsks_register_services_acf_fields' );

/**
 * Register Custom Post Type: Projects
 */
function belsks_register_projects_cpt() {
	$labels = array(
		'name'                  => _x( 'Проекты', 'Post type general name', 'belsks' ),
		'singular_name'         => _x( 'Проект', 'Post type singular name', 'belsks' ),
		'menu_name'             => _x( 'Проекты', 'Admin Menu text', 'belsks' ),
		'name_admin_bar'        => _x( 'Проект', 'Add New on Toolbar', 'belsks' ),
		'add_new'               => __( 'Добавить новый', 'belsks' ),
		'add_new_item'          => __( 'Добавить новый проект', 'belsks' ),
		'new_item'              => __( 'Новый проект', 'belsks' ),
		'edit_item'             => __( 'Редактировать проект', 'belsks' ),
		'view_item'             => __( 'Просмотр проекта', 'belsks' ),
		'all_items'             => __( 'Все проекты', 'belsks' ),
		'search_items'          => __( 'Поиск проектов', 'belsks' ),
		'parent_item_colon'     => __( 'Родительский проект:', 'belsks' ),
		'not_found'             => __( 'Проекты не найдены.', 'belsks' ),
		'not_found_in_trash'    => __( 'В корзине проектов нет.', 'belsks' ),
		'featured_image'        => _x( 'Изображение проекта', 'Overrides the "Featured Image" phrase for this post type', 'belsks' ),
		'set_featured_image'    => _x( 'Установить изображение проекта', 'Overrides the "Set featured image" phrase for this post type', 'belsks' ),
		'remove_featured_image' => _x( 'Удалить изображение проекта', 'Overrides the "Remove featured image" phrase for this post type', 'belsks' ),
		'use_featured_image'    => _x( 'Использовать как изображение проекта', 'Overrides the "Use as featured image" phrase for this post type', 'belsks' ),
		'archives'              => _x( 'Архив проектов', 'The post type archive label', 'belsks' ),
		'insert_into_item'      => _x( 'Добавить в проект', 'Overrides the "Insert into post" phrase for this post type', 'belsks' ),
		'uploaded_to_this_item' => _x( 'Загружено для проекта', 'Overrides the "Uploaded to this post" phrase for this post type', 'belsks' ),
		'filter_items_list'     => _x( 'Фильтр списка проектов', 'Overrides the "Filter items list" phrase for this post type', 'belsks' ),
		'items_list_navigation' => _x( 'Навигация по списку проектов', 'Overrides the "Items list navigation" phrase for this post type', 'belsks' ),
		'items_list'            => _x( 'Список проектов', 'Overrides the "Items list" phrase for this post type', 'belsks' ),
	);

	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'projects' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => 21,
		'supports'           => array( 'title', 'thumbnail', 'page-attributes' ),
		'show_in_rest'       => true,
		'menu_icon'          => 'dashicons-portfolio',
		'sort_column'        => 'menu_order, post_date',
	);

	register_post_type( 'projects', $args );
}
add_action( 'init', 'belsks_register_projects_cpt' );

/**
 * Register ACF Fields for Projects
 */
function belsks_register_projects_acf_fields() {
	if ( function_exists( 'acf_add_local_field_group' ) ) {
		acf_add_local_field_group( array(
			'key'      => 'group_projects_fields',
			'title'    => 'Детали проекта',
			'fields'   => array(
				array(
					'key'               => 'field_projects_image',
					'label'             => 'Изображение проекта',
					'name'              => 'project_image',
					'type'              => 'image',
					'instructions'      => 'Загрузите изображение проекта',
					'required'          => 1,
					'conditional_logic' => 0,
					'wrapper'           => array(
						'width' => '',
						'class' => '',
						'id'    => '',
					),
					'return_format'     => 'array',
					'preview_size'      => 'medium',
					'library'           => 'all',
					'min_width'         => '',
					'min_height'        => '',
					'min_size'          => '',
					'max_width'         => '',
					'max_height'        => '',
					'max_size'          => '',
					'mime_types'        => 'jpg,jpeg,png,webp',
				),
			),
			'location' => array(
				array(
					array(
						'param'    => 'post_type',
						'operator' => '==',
						'value'    => 'projects',
					),
				),
			),
			'menu_order'            => 0,
			'position'              => 'normal',
			'style'                 => 'default',
			'label_placement'       => 'top',
			'instruction_placement' => 'label',
			'hide_on_screen'        => '',
			'active'                => true,
			'description'           => '',
			'show_in_rest'          => false,
		) );
	}
}
add_action( 'acf/init', 'belsks_register_projects_acf_fields' );

/**
 * Add "Duplicate" link to post list actions
 */
function belsks_add_duplicate_action( $actions, $post ) {
	if ( $post->post_type === 'post' ) {
		$actions['duplicate'] = '<a href="' . esc_url( wp_nonce_url( admin_url( 'admin.php?action=duplicate_post&amp;post=' . $post->ID ), 'duplicate_post_' . $post->ID ) ) . '" title="' . esc_attr__( 'Дублировать', 'belsks' ) . '" rel="nofollow">' . esc_html__( 'Дублировать', 'belsks' ) . '</a>';
	}
	return $actions;
}
add_filter( 'page_row_actions', 'belsks_add_duplicate_action', 10, 2 );
add_filter( 'post_row_actions', 'belsks_add_duplicate_action', 10, 2 );

/**
 * Handle post duplication
 */
function belsks_handle_post_duplicate() {
	if ( ! isset( $_GET['post'], $_GET['action'], $_GET['_wpnonce'] ) ) {
		return;
	}
	
	if ( ! wp_verify_nonce( $_GET['_wpnonce'], 'duplicate_post_' . $_GET['post'] ) ) {
		return;
	}
	
	if ( $_GET['action'] !== 'duplicate_post' ) {
		return;
	}
	
	$post_id = intval( $_GET['post'] );
	$post = get_post( $post_id );
	
	if ( ! $post || $post->post_type !== 'post' ) {
		return;
	}
	
	if ( ! current_user_can( 'publish_posts' ) ) {
		return;
	}
	
	$new_post = array(
		'post_title'   => $post->post_title . ' (копия)',
		'post_content' => $post->post_content,
		'post_excerpt' => $post->post_excerpt,
		'post_status'  => 'draft',
		'post_type'    => 'post',
		'post_author'  => get_current_user_id(),
	);
	
	$new_post_id = wp_insert_post( $new_post );
	
	if ( $new_post_id && ! is_wp_error( $new_post_id ) ) {
		$thumbnail_id = get_post_thumbnail_id( $post_id );
		if ( $thumbnail_id ) {
			set_post_thumbnail( $new_post_id, $thumbnail_id );
		}
		
		wp_redirect( admin_url( 'post.php?post=' . $new_post_id . '&action=edit' ) );
		exit;
	}
}
add_action( 'admin_init', 'belsks_handle_post_duplicate' );

/**
 * Register ACF Fields for Partners (Secure Custom Fields)
 */
function belsks_register_partners_acf_fields() {
    if ( function_exists( 'acf_add_local_field_group' ) ) {
        acf_add_local_field_group( array(
            'key'      => 'group_partners_fields',
            'title'    => 'Логотипы партнёров',
            'fields'   => array(
                array(
                    'key'               => 'field_partners_list',
                    'label'             => 'Партнёры',
                    'name'              => 'partners',
                    'type'              => 'repeater',
                    'instructions'      => 'Добавьте логотипы партнеров. Если их больше 6, появится слайдер.',
                    'required'          => 0,
                    'conditional_logic' => 0,
                    'wrapper'           => array(
                        'width' => '',
                        'class' => '',
                        'id'    => '',
                    ),
                    'collapsed'         => '',
                    'min'               => 0,
                    'max'               => 0,
                    'layout'            => 'table',
                    'button_label'      => 'Добавить партнёра',
                    'sub_fields'        => array(
                        array(
                            'key'               => 'field_partner_logo',
                            'label'             => 'Логотип',
                            'name'              => 'logo',
                            'type'              => 'image',
                            'instructions'      => '',
                            'required'          => 0,
                            'conditional_logic' => 0,
                            'wrapper'           => array(
                                'width' => '',
                                'class' => '',
                                'id'    => '',
                            ),
                            'return_format'     => 'id',
                            'preview_size'      => 'medium',
                            'library'           => 'all',
                            'min_width'         => '',
                            'min_height'        => '',
                            'min_size'          => '',
                            'max_width'         => '',
                            'max_height'        => '',
                            'max_size'          => '',
                            'mime_types'        => '',
                        ),
                        array(
                            'key'               => 'field_partner_name',
                            'label'             => 'Название',
                            'name'              => 'name',
                            'type'              => 'text',
                            'instructions'      => '',
                            'required'          => 0,
                            'conditional_logic' => 0,
                            'wrapper'           => array(
                                'width' => '',
                                'class' => '',
                                'id'    => '',
                            ),
                            'default_value'     => '',
                            'placeholder'       => '',
                            'prepend'           => '',
                            'append'            => '',
                            'maxlength'         => '',
                        ),
                    ),
                ),
            ),
            'location' => array(
                array(
                    array(
                        'param'    => 'page_template',
                        'operator' => '==',
                        'value'    => 'about.php',
                    ),
                ),
            ),
            'menu_order'            => 0,
            'position'              => 'normal',
            'style'                 => 'default',
            'label_placement'       => 'top',
            'instruction_placement' => 'label',
            'hide_on_screen'        => '',
            'active'                => true,
            'description'           => '',
        ) );
    }
}
add_action( 'acf/init', 'belsks_register_partners_acf_fields' );

/**
 * Load contact form handler
 */
require get_template_directory() . '/inc/contact-form-handler.php';

/**
 * Enqueue contact form script
 */
function belsks_enqueue_contact_form_script() {
	wp_enqueue_script(
		'belsks-contact-form',
		get_template_directory_uri() . '/js/contact-form.js',
		array(),
		wp_get_theme()->get( 'Version' ),
		true
	);

	if ( class_exists( 'WooCommerce' ) ) {
		wp_enqueue_script(
			'belsks-cart-fragments',
			get_template_directory_uri() . '/js/cart-fragments.js',
			array( 'jquery' ),
			wp_get_theme()->get( 'Version' ),
			true
		);
	}
}
add_action( 'wp_enqueue_scripts', 'belsks_enqueue_contact_form_script' );

/**
 * Register cart count fragment so WC refreshes the badge on AJAX add-to-cart
 */
function belsks_cart_count_fragments( $fragments ) {
	if ( ! class_exists( 'WooCommerce' ) ) {
		return $fragments;
	}
	$count = ( WC()->cart ) ? (int) WC()->cart->get_cart_contents_count() : 0;
	$cls   = $count > 0 ? '' : 'hidden';
	$fragments['belsks_cart_count'] = sprintf(
		'<span data-cart-count class="%s absolute -top-2 -right-3 min-w-[20px] h-[20px] px-1 inline-flex items-center justify-center rounded-full bg-blue-600 text-white text-[11px] font-bold leading-none">%d</span>',
		esc_attr( $cls ),
		$count
	);
	return $fragments;
}
add_filter( 'woocommerce_add_to_cart_fragments', 'belsks_cart_count_fragments' );

/**
 * Suppress the default page title on the cart/checkout pages so it
 * doesn't duplicate the H1 rendered by our custom templates.
 */
function belsks_suppress_page_title( $title, $id = null ) {
	if ( ! is_admin() && in_the_loop() ) {
		$cart_page_id    = function_exists( 'wc_get_page_id' ) ? wc_get_page_id( 'cart' ) : 0;
		$checkout_page_id = function_exists( 'wc_get_page_id' ) ? wc_get_page_id( 'checkout' ) : 0;
		$thank_you_page   = get_page_by_path( 'zakaz-oformlen' );
		$thank_you_id     = $thank_you_page ? (int) $thank_you_page->ID : 0;
		$ids              = array_filter( array_map( 'absint', array( $cart_page_id, $checkout_page_id, $thank_you_id ) ) );
		if ( $id && in_array( (int) $id, $ids, true ) ) {
			return '';
		}
	}
	return $title;
}
add_filter( 'the_title', 'belsks_suppress_page_title', 10, 2 );

/**
 * [belsks_order_thank_you] — render the custom order confirmation page.
 */
function belsks_order_thank_you_shortcode() {
	ob_start();
	$phone_icon = get_template_directory() . '/img/phone-icon.svg';
	set_query_var( 'belsks_thank_you_phone_icon_exists', file_exists( $phone_icon ) );
	include get_template_directory() . '/template-parts/order-thank-you.php';
	return ob_get_clean();
}
add_shortcode( 'belsks_order_thank_you', 'belsks_order_thank_you_shortcode' );

/**
 * AJAX: create a WC order from the custom cart checkout form.
 *
 * Receives serialized form data, walks both possible forms (legal / individual),
 * creates an order with the current cart items, attaches billing/shipping data,
 * empties the cart, and returns the redirect URL to the thank-you page.
 */
function belsks_create_order_ajax() {
	check_ajax_referer( 'belsks_create_order', 'nonce' );

	if ( ! class_exists( 'WooCommerce' ) || ! WC()->cart || WC()->cart->is_empty() ) {
		wp_send_json_error( array( 'message' => 'Корзина пуста.' ), 400 );
	}

	$is_individual = ! empty( $_POST['customer_type'] ) && 'individual' === $_POST['customer_type'];

	$name     = sanitize_text_field( $is_individual ? ( $_POST['billing_full_name_i'] ?? '' ) : ( $_POST['billing_first_name'] ?? '' ) );
	$phone    = sanitize_text_field( $is_individual ? ( $_POST['billing_phone_i'] ?? '' ) : ( $_POST['billing_phone'] ?? '' ) );
	$email    = sanitize_email( $is_individual ? ( $_POST['billing_email_i'] ?? '' ) : ( $_POST['billing_email'] ?? '' ) );
	$company  = $is_individual ? '' : sanitize_text_field( $_POST['billing_company'] ?? '' );
	$company_id = $is_individual ? '' : sanitize_text_field( $_POST['billing_company_id'] ?? '' );
	$address  = sanitize_text_field( $is_individual ? ( $_POST['shipping_address_i'] ?? '' ) : ( $_POST['shipping_address'] ?? '' ) );
	$shipping_method = sanitize_text_field( $is_individual ? ( $_POST['shipping_method_i'] ?? '' ) : ( $_POST['shipping_method'] ?? '' ) );
	$payment_method  = sanitize_text_field( $is_individual ? ( $_POST['payment_method_i'] ?? '' ) : ( $_POST['payment_method'] ?? '' ) );
	$comments        = sanitize_textarea_field( $is_individual ? ( $_POST['order_comments_i'] ?? '' ) : ( $_POST['order_comments'] ?? '' ) );

	if ( '' === $name || '' === $phone || '' === $email ) {
		wp_send_json_error( array( 'message' => 'Заполните обязательные поля (имя, телефон, e-mail).' ), 400 );
	}

	$order = wc_create_order();
	if ( is_wp_error( $order ) ) {
		wp_send_json_error( array( 'message' => 'Не удалось создать заказ.' ), 500 );
	}

	if ( 'shop_order_placehold' === $order->get_type() ) {
		wp_update_post( array(
			'ID'        => $order->get_id(),
			'post_type' => 'shop_order',
		) );
		wp_cache_delete( $order->get_id(), 'posts' );
		$order = wc_get_order( $order->get_id() );
	}

	foreach ( WC()->cart->get_cart() as $cart_key => $item ) {
		$product = apply_filters( 'woocommerce_cart_item_product', $item['data'], $item, $cart_key );
		if ( ! $product ) {
			continue;
		}
		$order->add_product( $product, (int) $item['quantity'] );
	}

	$billing = array(
		'first_name' => $name,
		'last_name'  => '',
		'company'    => $company,
		'email'      => $email,
		'phone'      => $phone,
		'address_1'  => $address,
		'address_2'  => $company_id,
		'city'       => '',
		'postcode'   => '',
		'country'    => '',
		'state'      => '',
	);

	$order->set_address( $billing, 'billing' );
	$order->set_address( $billing, 'shipping' );

	$payment_titles = array(
		'invoice'         => 'Оплата по счёту',
		'manager'         => 'Уточнить с менеджером',
		'internet_banking' => 'Оплата через интернет-банкинг',
	);
	if ( isset( $payment_titles[ $payment_method ] ) ) {
		$order->set_payment_method( $payment_method );
		update_post_meta( $order->get_id(), '_payment_method_title', $payment_titles[ $payment_method ] );
	}

	if ( 'pickup' === $shipping_method ) {
		$order->set_shipping_total( 0 );
		update_post_meta( $order->get_id(), '_shipping_method_title', 'Самовывоз' );
	} else {
		update_post_meta( $order->get_id(), '_shipping_method_title', 'Доставка' );
	}

	if ( $comments ) {
		$order->set_customer_note( $comments );
	}

	$order->calculate_totals();
	$order->set_status( 'pending', 'Заказ создан с сайта' );
	$order->save();

	$note_lines = array();
	if ( $company )    { $note_lines[] = 'Компания: ' . $company; }
	if ( $company_id ) { $note_lines[] = 'УНП: ' . $company_id; }
	if ( $is_individual ) { $note_lines[] = 'Тип клиента: физическое лицо'; } else { $note_lines[] = 'Тип клиента: юридическое лицо'; }
	if ( $note_lines ) {
		$order->add_order_note( implode( "\n", $note_lines ), false, true );
	}

	WC()->cart->empty_cart();

	$redirect = add_query_arg( 'order', $order->get_id(), home_url( '/zakaz-oformlen/' ) );

	wp_send_json_success( array(
		'redirect' => $redirect,
		'order_id' => $order->get_id(),
	) );
}
add_action( 'wp_ajax_belsks_create_order', 'belsks_create_order_ajax' );
add_action( 'wp_ajax_nopriv_belsks_create_order', 'belsks_create_order_ajax' );

/**
 * Pass the AJAX URL/nonce to the front-end scripts.
 */
function belsks_localize_cart_ajax() {
	if ( ! class_exists( 'WooCommerce' ) ) {
		return;
	}
	wp_localize_script( 'belsks-cart-fragments', 'belsksCart', array(
		'ajaxUrl'    => admin_url( 'admin-ajax.php' ),
		'createNonce' => wp_create_nonce( 'belsks_create_order' ),
		'checkoutUrl' => wc_get_checkout_url(),
	) );
}
add_action( 'wp_enqueue_scripts', 'belsks_localize_cart_ajax', 20 );

