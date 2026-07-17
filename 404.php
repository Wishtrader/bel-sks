<?php

/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package BelSKS
 */

get_header();

$error_page = get_page_by_path('404');
$error_page_id = $error_page ? (int) $error_page->ID : 0;

$e404_bg = $error_page_id ? get_field('e404_bg', $error_page_id) : '';
$e404_bg_url = '';
if (is_array($e404_bg) && !empty($e404_bg['url'])) {
    $e404_bg_url = $e404_bg['url'];
} elseif (is_string($e404_bg) && $e404_bg) {
    $e404_bg_url = $e404_bg;
}
if (!$e404_bg_url) {
    $e404_bg_url = get_template_directory_uri() . '/img/404-bg.png';
}

$e404_bg_mobile = $error_page_id ? get_field('e404_bg_mobile', $error_page_id) : '';
$e404_bg_mobile_url = '';
if (is_array($e404_bg_mobile) && !empty($e404_bg_mobile['url'])) {
    $e404_bg_mobile_url = $e404_bg_mobile['url'];
} elseif (is_string($e404_bg_mobile) && $e404_bg_mobile) {
    $e404_bg_mobile_url = $e404_bg_mobile;
}
if (!$e404_bg_mobile_url) {
    $e404_bg_mobile_url = get_template_directory_uri() . '/img/404-bg-mobile.png';
}

$e404_heading_top = $error_page_id ? get_field('e404_heading_top', $error_page_id) : '';
$e404_heading_bottom = $error_page_id ? get_field('e404_heading_bottom', $error_page_id) : '';
$e404_desc = $error_page_id ? get_field('e404_desc', $error_page_id) : '';
$e404_btn_text = $error_page_id ? get_field('e404_button_text', $error_page_id) : '';
$e404_btn_url = $error_page_id ? get_field('e404_button_url', $error_page_id) : '';

if (!$e404_heading_top) {
    $e404_heading_top = '404';
}
if (!$e404_heading_bottom) {
    $e404_heading_bottom = 'Страница не найдена';
}
if (!$e404_desc) {
    $e404_desc = 'К сожалению, запрашиваемая вами страница не существует или была перемещена.';
}
if (!$e404_btn_text) {
    $e404_btn_text = 'Вернуться на главную';
}
if (!$e404_btn_url) {
    $e404_btn_url = '/';
}
?>

<main id="primary" class="site-main">

	<section class="error-404-section relative min-h-[520px] lg:min-h-[620px] flex items-center overflow-hidden">
		<!-- Background Image -->
		<div class="absolute inset-0 dark:bg-gray-800">
			<img src="<?php echo esc_url($e404_bg_mobile_url); ?>" alt="" class="w-full h-full object-cover lg:hidden">
			<img src="<?php echo esc_url($e404_bg_url); ?>" alt="" class="hidden w-full h-full object-cover lg:block">
			<div class="absolute inset-0 gradient-overlay-light dark:hidden"></div>
			<div class="absolute inset-0 gradient-overlay-dark hidden dark:block"></div>
		</div>

		<div class="relative max-w-[1200px] mx-auto px-4 sm:px-6 lg:px-4 w-full py-20 lg:py-28">
			<div class="max-w-[625px]">
			<h1 class="mb-6 !text-[28px] font-extrabold text-[#222222] lg:!text-[44px]">
		    <img src="<?php echo get_template_directory_uri(); ?>/img/404.svg" alt="404" class="mb-5 w-[275px] lg:w-100" />
			    Страница не найдена
			</h1>

				<p class="mb-10 max-w-[520px] text-base leading-[1.2] text-slate-600">
				    Возможно, ссылка устарела, страница была перемещена или адрес введён с ошибкой.
				</p>

				<a href="<?php echo esc_url($e404_btn_url); ?>"
				   class="inline-flex items-center gap-2 bg-[#294F78] text-white px-8 py-3 rounded-[4px] font-normal hover:bg-[#162d4a] transition-colors">
					<?php echo esc_html($e404_btn_text); ?>
				</a>
			</div>
		</div>
	</section>

</main>

<?php

get_footer();
