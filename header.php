<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package BelSKS
 */

?>
<!doctype html>
<html <?php language_attributes(); ?> class="scroll-smooth">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class( 'bg-[#f5f5f9] text-gray-900' ); ?>>
<script>
	// Apply dark class to html for Tailwind CDN custom-variant support
	if (localStorage.getItem('theme') === 'dark' || (!localStorage.getItem('theme') && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
		document.documentElement.classList.add('dark');
	}
</script>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'belsks' ); ?></a>

	<header id="masthead" class="site-header shadow-md fixed top-0 left-0 right-0 z-50">
		<div class="max-w-[1200px] mx-auto px-4">
			<div class="flex items-center gap-8">
				<!-- Logo -->
				<div class="flex-shrink-0 py-1.5">
					<?php
					the_custom_logo();
					if ( ! has_custom_logo() ) :
						?>
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" class="flex items-center gap-2">
							<svg class="w-12 h-12" viewBox="0 0 48 48" fill="none">
								<path d="M24 4L4 38h40L24 4z" fill="#1e3a5f"/>
								<path d="M24 14L14 32h20L24 14z" fill="#3b82f6"/>
								<path d="M24 24l-5 8h10l-5-8z" fill="#1e40af"/>
							</svg>
							<span class="text-xl font-bold text-gray-800 dark:text-white">БелСКС</span>
						</a>
						<?php
					endif;
					?>
				</div>

				<!-- Right side: Two rows -->
				<div class="flex-1 hidden lg:flex flex-col">
					<!-- Top row: Phones, contact, search, theme, languages -->
					<div class="flex items-center justify-between py-3">
						<!-- Left: Phones & Contact -->
						<div class="flex items-center gap-6">
							<!-- Phones -->
							<div class="flex items-center gap-4">
								<a href="tel:+375172381717" class="flex items-center gap-1 text-sm text-gray-700 dark:text-gray-300 hover:text-blue-600 dark:hover:text-blue-400 transition-colors">
									<?php
									$phone_icon = file_get_contents( get_template_directory() . '/img/phone-icon.svg' );
									$phone_icon = str_replace( '<svg', '<svg class="phone-icon"', $phone_icon );
									echo $phone_icon;
									?>
									<span>+375 17 238 17 17</span>
								</a>
								<a href="tel:+375173748682" class="flex items-center gap-1 text-sm text-gray-700 dark:text-gray-300 hover:text-blue-600 dark:hover:text-blue-400 transition-colors">
									<?php
									$phone_icon = file_get_contents( get_template_directory() . '/img/phone-icon.svg' );
									$phone_icon = str_replace( '<svg', '<svg class="phone-icon"', $phone_icon );
									echo $phone_icon;
									?>
									<span>+375 17 374 86 82</span>
								</a>
								<a href="tel:+375447797030" class="flex items-center gap-1 text-sm text-gray-700 dark:text-gray-300 hover:text-blue-600 dark:hover:text-blue-400 transition-colors">
									<?php
									$phone_icon = file_get_contents( get_template_directory() . '/img/phone-icon.svg' );
									$phone_icon = str_replace( '<svg', '<svg class="phone-icon"', $phone_icon );
									echo $phone_icon;
									?>
									<span>+375 44 779 70 30</span>
								</a>
							</div>

							<!-- Contact link -->
							<a href="#" class="text-sm font-medium text-blue-600 dark:text-blue-400 underline underline-offset-2 hover:text-blue-700 dark:hover:text-blue-300 transition-colors">
								Связаться с нами
							</a>
						</div>

						<!-- Right: Search, Theme, Languages -->
						<div class="flex items-center gap-4">
							<!-- Search -->
							<div class="relative">
								<i data-lucide="search" class="w-6 h-6 absolute left-5 top-1/2 -translate-y-1/2 text-gray-400"></i>
								<input type="text" placeholder="Поиск..." class="header-search-input pl-14 pr-4 max-w-[210px] text-base placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-100 dark:focus:ring-blue-900 transition-all">
							</div>

							<!-- Theme toggle -->
							<button id="theme-toggle" class="flex items-center gap-3" aria-label="Переключить тему">
								<i data-lucide="moon" class="theme-icon-moon w-6 h-6 text-gray-700"></i>
								<i data-lucide="sun" class="theme-icon-sun w-6 h-6 text-yellow-400"></i>
								<div class="toggle-track w-12 h-7 bg-gray-200 dark:bg-blue-500 rounded-full relative cursor-pointer">
									<div class="toggle-thumb w-6 h-6 bg-white rounded-full absolute top-0.5 left-0.5 shadow-md border border-gray-200"></div>
								</div>
							</button>

							<!-- Language switcher -->
							<div class="flex items-center gap-1 text-sm">
								<a href="#" class="text-gray-400 dark:text-gray-500 hover:text-gray-600 dark:hover:text-gray-300 transition-colors">En</a>
								<span class="text-gray-300 dark:text-gray-600">/</span>
								<a href="#" class="text-gray-400 dark:text-gray-500 hover:text-gray-600 dark:hover:text-gray-300 transition-colors">By</a>
								<span class="text-gray-300 dark:text-gray-600">/</span>
								<a href="#" class="font-semibold text-blue-600 dark:text-blue-400">Ru</a>
							</div>
						</div>
					</div>

					<!-- Bottom row: Navigation -->
					<nav id="site-navigation" class="main-navigation">
						<?php
						wp_nav_menu(
							array(
								'theme_location' => 'menu-1',
								'menu_id'        => 'primary-menu',
								'menu_class'     => 'flex items-center gap-8 py-3',
								'link_class'     => 'text-base font-medium text-gray-700 dark:text-gray-300 hover:text-blue-600 dark:hover:text-blue-400 transition-colors',
								'container'      => false,
								'items_wrap'     => '<ul id="%1$s" class="%2$s">%3$s</ul>',
							)
						);
						?>
					</nav>
				</div>

				<!-- Mobile: Search & Burger -->
				<div class="flex lg:hidden items-center gap-3 flex-1">
					<div class="relative flex-1">
						<i data-lucide="search" class="w-5 h-5 absolute left-3 top-1/2 -translate-y-1/2 text-gray-400"></i>
						<input type="text" placeholder="Поиск..." class="mobile-search-input pl-10 pr-4 w-full bg-gray-50 dark:bg-gray-700 border border-gray-200 dark:border-gray-600 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 transition-colors">
					</div>
					<button id="mobile-menu-toggle" class="p-2 text-gray-700 dark:text-gray-300 hover:text-blue-600 dark:hover:text-blue-400 transition-colors" aria-label="Меню">
						<i data-lucide="menu" class="w-7 h-7 menu-icon"></i>
						<i data-lucide="x" class="w-7 h-7 close-icon hidden"></i>
					</button>
				</div>
			</div>

			<!-- Mobile menu -->
			<div id="mobile-menu" class="hidden lg:hidden absolute left-0 right-0 top-full bg-white dark:bg-gray-900 shadow-lg z-40 max-h-[calc(100vh-78px)] overflow-y-auto">
				<div class="px-4 py-6">
					<!-- Navigation -->
					<nav class="mb-6">
						<?php
						wp_nav_menu(
							array(
								'theme_location' => 'menu-1',
								'menu_id'        => 'mobile-menu-list',
								'menu_class'     => 'flex flex-col',
								'link_class'     => 'block py-3 text-base text-[#222222] dark:text-gray-300 hover:text-blue-600 dark:hover:text-blue-400 transition-colors',
								'container'      => false,
								'items_wrap'     => '<ul id="%1$s" class="%2$s">%3$s</ul>',
							)
						);
						?>
					</nav>

					<!-- Contact button -->
					<a href="#" class="block w-full text-center py-3 border border-[#1e3a5f] text-[#1e3a5f] dark:text-blue-400 dark:border-blue-400 rounded-lg font-medium mb-6 hover:bg-[#1e3a5f] hover:text-white dark:hover:bg-blue-400 dark:hover:text-white transition-colors">
						Связаться с нами
					</a>

					<!-- Phones -->
					<div class="space-y-3 mb-6 pb-6 border-b border-gray-200 dark:border-gray-700">
						<a href="tel:+375172381717" class="flex items-center gap-2 text-[#222222] dark:text-gray-300 hover:text-blue-600 dark:hover:text-blue-400 transition-colors">
							<?php
							$phone_icon = file_get_contents( get_template_directory() . '/img/phone-icon.svg' );
							$phone_icon = str_replace( '<svg', '<svg class="w-4 h-4 flex-shrink-0"', $phone_icon );
							echo $phone_icon;
							?>
							<span>+375 17 238 17 17</span>
						</a>
						<a href="tel:+375173748682" class="flex items-center gap-2 text-[#222222] dark:text-gray-300 hover:text-blue-600 dark:hover:text-blue-400 transition-colors">
							<?php
							$phone_icon = file_get_contents( get_template_directory() . '/img/phone-icon.svg' );
							$phone_icon = str_replace( '<svg', '<svg class="w-4 h-4 flex-shrink-0"', $phone_icon );
							echo $phone_icon;
							?>
							<span>+375 17 374 86 82</span>
						</a>
						<a href="tel:+375447797030" class="flex items-center gap-2 text-[#222222] dark:text-gray-300 hover:text-blue-600 dark:hover:text-blue-400 transition-colors">
							<?php
							$phone_icon = file_get_contents( get_template_directory() . '/img/phone-icon.svg' );
							$phone_icon = str_replace( '<svg', '<svg class="w-4 h-4 flex-shrink-0"', $phone_icon );
							echo $phone_icon;
							?>
							<span>+375 44 779 70 30</span>
						</a>
					</div>

					<!-- Theme toggle & Languages -->
					<div class="flex items-center justify-between">
						<!-- Theme toggle -->
						<button id="theme-toggle-mobile" class="flex items-center gap-3" aria-label="Переключить тему">
							<i data-lucide="moon" class="theme-icon-moon w-6 h-6 text-gray-700 dark:text-gray-300"></i>
							<i data-lucide="sun" class="theme-icon-sun w-6 h-6 text-yellow-400 hidden dark:block"></i>
							<div class="toggle-track w-12 h-7 bg-gray-200 dark:bg-blue-500 rounded-full relative cursor-pointer">
								<div class="toggle-thumb w-6 h-6 bg-white rounded-full absolute top-0.5 left-0.5 shadow-md border border-gray-200"></div>
							</div>
						</button>

						<!-- Language switcher -->
						<div class="flex items-center gap-1 text-sm">
							<a href="#" class="text-gray-400 dark:text-gray-500 hover:text-gray-600 dark:hover:text-gray-300 transition-colors">En</a>
							<span class="text-gray-300 dark:text-gray-600">/</span>
							<a href="#" class="text-gray-400 dark:text-gray-500 hover:text-gray-600 dark:hover:text-gray-300 transition-colors">By</a>
							<span class="text-gray-300 dark:text-gray-600">/</span>
							<a href="#" class="font-semibold text-blue-600 dark:text-blue-400">Ru</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</header>
