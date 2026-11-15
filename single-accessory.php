<?php
/**
 * Single template for the "Аксессуар" (accessory) post type.
 *
 * Layout: Breadcrumbs + 2-column grid (photo | price, description, specs).
 * Matches the design of the product page.
 *
 * @package BelSKS
 */

defined( 'ABSPATH' ) || exit;

get_header();

$accessory_id = get_the_ID();

$photo_id  = get_field( 'accessory_image', $accessory_id, false );
if ( ! $photo_id ) {
	$photo_id = get_post_thumbnail_id( $accessory_id );
} elseif ( is_array( $photo_id ) ) {
	$photo_id = (int) ( $photo_id['ID'] ?? 0 );
}
$photo_url = $photo_id ? wp_get_attachment_image_url( (int) $photo_id, 'large' ) : '';
$photo_alt = $photo_id
	? ( get_post_meta( $photo_id, '_wp_attachment_image_alt', true ) ?: get_the_title() )
	: get_the_title();

$price       = get_field( 'accessory_price', $accessory_id );
$description = get_field( 'accessory_description', $accessory_id );
$specs       = get_field( 'accessory_specs', $accessory_id );
$specs       = is_array( $specs ) ? $specs : array();
?>

<main class="bg-[#f7f7fb]">

	<section class="relative overflow-hidden bg-[#f7f7fb] py-10 sm:py-14 lg:py-16">
		<div class="pointer-events-none absolute inset-0">
			<div class="absolute left-0 top-0 h-px w-full bg-white/70"></div>
			<div class="absolute -left-40 top-24 h-[2px] w-[130%] rotate-[-45deg] bg-gradient-to-r from-transparent via-slate-200/50 to-transparent"></div>
			<div class="absolute left-[38%] top-0 h-[2px] w-[70%] rotate-[-45deg] bg-gradient-to-r from-transparent via-slate-200/40 to-transparent"></div>
			<div class="absolute right-0 top-[22%] h-px w-[55%] bg-slate-200/40"></div>
		</div>

		<div class="relative mx-auto w-full max-w-[1200px] px-4 sm:px-6 lg:px-0">
			<nav class="mb-6 text-[14px] leading-none text-slate-500 sm:mb-8">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="transition-colors hover:text-slate-700">Главная</a>
				<span class="mx-1 text-slate-400">/</span>
				<span>Аксессуары</span>
				<span class="mx-1 text-slate-400">/</span>
				<span class="text-[#294F78]"><?php echo esc_html( get_the_title() ); ?></span>
			</nav>

			<h1 class="mb-8 text-[28px] font-extrabold leading-[1.2] tracking-[-0.02em] text-slate-900 sm:mb-10 sm:text-[40px] lg:text-[54px]">
				<?php the_title(); ?>
			</h1>

			<div class="grid gap-8 lg:grid-cols-2 lg:gap-10">

				<div>
					<div class="bg-white shadow-[0_2px_12px_rgba(15,23,42,0.08)]">
						<?php if ( $photo_url ) : ?>
							<div class="block aspect-[4/3] w-full overflow-hidden bg-slate-100">
								<img src="<?php echo esc_url( $photo_url ); ?>" alt="<?php echo esc_attr( $photo_alt ); ?>" class="h-full w-full object-contain">
							</div>
						<?php else : ?>
							<div class="flex aspect-[4/3] w-full items-center justify-center bg-slate-100 text-slate-400">
								Нет изображения
							</div>
						<?php endif; ?>
					</div>
				</div>

				<div class="flex flex-col">

					<?php if ( $description ) : ?>
						<p class="text-[15px] leading-relaxed text-slate-600 sm:text-[17px]">
							<?php echo nl2br( esc_html( $description ) ); ?>
						</p>
					<?php endif; ?>

					<?php if ( ! empty( $specs ) ) : ?>
						<div class="mt-8">
							<h2 class="mb-5 text-[20px] font-bold text-[#1e3a5f] sm:text-[22px]">Характеристики</h2>
							<dl class="divide-y divide-slate-200 border-y border-slate-200">
								<?php foreach ( $specs as $spec ) :
									$spec_name  = trim( (string) ( $spec['spec_name'] ?? '' ) );
									$spec_value = trim( (string) ( $spec['spec_value'] ?? '' ) );
									if ( '' === $spec_name && '' === $spec_value ) {
										continue;
									}
									?>
									<div class="grid grid-cols-2 gap-4 py-3 text-[15px]">
										<dt class="font-semibold text-slate-700"><?php echo esc_html( $spec_name ); ?></dt>
										<dd class="text-slate-600"><?php echo esc_html( $spec_value ); ?></dd>
									</div>
								<?php endforeach; ?>
							</dl>
						</div>
					<?php endif; ?>

					<?php if ( is_numeric( $price ) && (float) $price > 0 ) : ?>
						<div class="mt-8 bg-[#1e3a5f] p-5 text-white sm:p-6">
							<div class="text-[26px] font-bold leading-none sm:text-[30px]">
								<?php echo esc_html( number_format( (float) $price, 0, '.', ' ' ) ); ?> руб
							</div>
						</div>
					<?php endif; ?>

				</div>
			</div>
		</div>
	</section>

	<?php get_template_part( 'template-parts/contact-form', 'form' ); ?>
</main>

<?php
get_footer();
