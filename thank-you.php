<?php

/**
 * Template Name: Thank You Page
 *
 * @package BelSKS
 */

get_header();

$ty_bg = get_field('ty_bg');
$ty_bg_url = '';
if (is_array($ty_bg) && !empty($ty_bg['url'])) {
    $ty_bg_url = $ty_bg['url'];
} elseif (is_string($ty_bg) && $ty_bg) {
    $ty_bg_url = $ty_bg;
}
if (!$ty_bg_url) {
    $ty_bg_url = get_template_directory_uri() . '/img/thank-you-bg.png';
}

$ty_bg_mobile = get_field('ty_bg_mobile');
$ty_bg_mobile_url = '';
if (is_array($ty_bg_mobile) && !empty($ty_bg_mobile['url'])) {
    $ty_bg_mobile_url = $ty_bg_mobile['url'];
} elseif (is_string($ty_bg_mobile) && $ty_bg_mobile) {
    $ty_bg_mobile_url = $ty_bg_mobile;
}
if (!$ty_bg_mobile_url) {
    $ty_bg_mobile_url = get_template_directory_uri() . '/img/thank-you-bg-mobile.png';
}

$ty_heading_raw = get_field('ty_heading');
$ty_desc = get_field('ty_desc');
$ty_btn_text = get_field('ty_button_text');
$ty_btn_url = get_field('ty_button_url');

if (!$ty_heading_raw) {
    $ty_heading_raw = "Спасибо,\nмы получили вашу заявку!";
}
if (!$ty_desc) {
    $ty_desc = 'После обработки заявки наш специалист свяжется с вами для уточнения деталей, подготовки предложения или консультации.';
}
if (!$ty_btn_text) {
    $ty_btn_text = 'Вернуться на главную';
}
if (!$ty_btn_url) {
    $ty_btn_url = '/';
}

$heading_lines = explode("\n", $ty_heading_raw, 2);
$line1 = $heading_lines[0];
$line2 = isset($heading_lines[1]) ? $heading_lines[1] : '';
?>

<main id="primary" class="site-main">

	<section class="thank-you-section relative min-h-[520px] lg:min-h-[620px] flex items-center overflow-hidden">
		<!-- Background Image -->
		<div class="absolute inset-0 dark:bg-gray-800">
			<img src="<?php echo esc_url($ty_bg_mobile_url); ?>" alt="" class="w-full h-full object-cover lg:hidden">
			<img src="<?php echo esc_url($ty_bg_url); ?>" alt="" class="hidden w-full h-full object-cover lg:block">
			<div class="absolute inset-0 gradient-overlay-light dark:hidden"></div>
			<div class="absolute inset-0 gradient-overlay-dark hidden dark:block"></div>
		</div>

		<div class="relative max-w-[1200px] mx-auto px-4 sm:px-6 lg:px-4 w-full py-20 lg:py-28">
			<div class="max-w-[625px]">
				<h1 class="mb-6 !text-[28px] font-extrabold leading-[1.2] tracking-[-0.03em] text-[#222222] lg:!text-[44px]">
					<?php echo esc_html($line1); ?>
					<?php if ($line2): ?>
						<br><?php echo esc_html($line2); ?>
					<?php endif; ?>
				</h1>

				<p class="mb-10 max-w-[520px] text-base leading-[1.2] text-slate-600">
					<?php echo esc_html($ty_desc); ?>
				</p>

				<a href="<?php echo esc_url($ty_btn_url); ?>"
				   class="inline-flex items-center gap-2 bg-[#294F78] text-white px-8 py-3 rounded-[4px] font-normal hover:bg-[#162d4a] transition-colors">
					<?php echo esc_html($ty_btn_text); ?>
				</a>
			</div>
		</div>
	</section>

</main>

<?php

get_footer();

