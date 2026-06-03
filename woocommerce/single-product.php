<?php
/**
 * WooCommerce Single Product Template Override
 *
 * Layout: Breadcrumbs + 2-column grid (gallery | info).
 * Matches the design from the BelSKS Figma reference.
 *
 * @package BelSKS
 */

defined( 'ABSPATH' ) || exit;

get_header();

global $product;

if ( ! $product instanceof WC_Product ) {
	$product = wc_get_product( get_the_ID() );
}

if ( ! $product ) {
	get_template_part( 'template-parts/content', 'none' );
	get_footer();
	return;
}

$product_id   = $product->get_id();
$sku          = $product->get_sku();
$short_desc   = wp_strip_all_tags( $product->get_short_description() );
$price_html   = $product->get_price_html();
$regular_price = $product->get_regular_price();
$is_in_stock  = $product->is_in_stock();

$gallery_ids  = array_filter( array_map( 'absint', explode( ',', (string) $product->get_gallery_image_ids() ) ) );
$thumbnail_id = (int) $product->get_image_id();
$main_image_id = $thumbnail_id ?: ( $gallery_ids[0] ?? 0 );
if ( $main_image_id && ! in_array( $main_image_id, $gallery_ids, true ) ) {
	array_unshift( $gallery_ids, $main_image_id );
}
$gallery_ids = array_values( array_unique( array_filter( $gallery_ids ) ) );

$attributes = $product->get_attributes();
$visible_attrs = array();
foreach ( $attributes as $attr ) {
	if ( $attr->get_visible() ) {
		$visible_attrs[] = $attr;
	}
}

$catalog_page = get_page_by_path( 'katalog' );
if ( ! $catalog_page ) {
	$catalog_q = new WP_Query( array(
		'post_type'      => 'page',
		'title'          => 'Каталог',
		'posts_per_page' => 1,
		'fields'         => 'ids',
	) );
	$catalog_page = ! empty( $catalog_q->posts ) ? $catalog_q->posts[0] : 0;
}
$catalog_url = $catalog_page ? get_permalink( $catalog_page ) : home_url( '/' );

$product_cats = wp_get_post_terms( $product_id, 'product_cat', array( 'orderby' => 'parent' ) );
$ancestors    = array();
if ( ! empty( $product_cats ) ) {
	$primary_cat = $product_cats[0];
	$ancestors   = array_reverse( get_ancestors( $primary_cat->term_id, 'product_cat' ) );
	$ancestors[] = $primary_cat->term_id;
}
?>

<main class="bg-[#f7f7fb]">

	<section class="relative overflow-hidden bg-[#f7f7fb] py-10 sm:py-14 lg:py-16">
		<div class="pointer-events-none absolute inset-0">
			<div class="absolute left-0 top-0 h-px w-full bg-white/70"></div>
			<div class="absolute -left-40 top-24 h-[2px] w-[130%] rotate-[-45deg] bg-gradient-to-r from-transparent via-slate-200/50 to-transparent"></div>
			<div class="absolute left-[38%] top-0 h-[2px] w-[70%] rotate-[-45deg] bg-gradient-to-r from-transparent via-slate-200/40 to-transparent"></div>
			<div class="absolute right-0 top-[22%] h-px w-[55%] bg-slate-200/50"></div>
		</div>

		<div class="relative mx-auto w-full max-w-[1200px] px-4 sm:px-6 lg:px-0">
			<nav class="mb-8 text-[15px] leading-none text-slate-500 sm:mb-10 md:mt-12">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="transition-colors hover:text-slate-700">Главная</a>
				<span class="mx-2 text-slate-400">/</span>
				<a href="<?php echo esc_url( $catalog_url ); ?>" class="transition-colors hover:text-slate-700">Каталог</a>
				<?php foreach ( $ancestors as $i => $cat_id ) :
					$cat = get_term( $cat_id, 'product_cat' );
					if ( ! $cat || is_wp_error( $cat ) ) { continue; }
					$is_last = ( $i === count( $ancestors ) - 1 );
					?>
					<span class="mx-2 text-slate-400">/</span>
					<?php if ( $is_last ) : ?>
						<span class="text-slate-600"><?php echo esc_html( $cat->name ); ?></span>
					<?php else : ?>
						<a href="<?php echo esc_url( get_term_link( $cat ) ); ?>" class="transition-colors hover:text-slate-700"><?php echo esc_html( $cat->name ); ?></a>
					<?php endif; ?>
				<?php endforeach; ?>
				<span class="mx-2 text-slate-400">/</span>
				<span class="text-slate-600"><?php echo esc_html( get_the_title() ); ?></span>
			</nav>

			<h1 class="mb-8 text-[28px] font-extrabold leading-[1.2] tracking-[-0.02em] text-slate-900 sm:mb-10 sm:text-[40px] lg:text-[54px]">
				<?php the_title(); ?>
			</h1>

			<div class="grid gap-8 lg:grid-cols-2 lg:gap-10">

				<div>
					<div class="bg-white shadow-[0_2px_12px_rgba(15,23,42,0.08)]">
						<?php if ( $main_image_id ) :
							$main_full = wp_get_attachment_image_url( $main_image_id, 'large' );
							$main_alt  = get_post_meta( $main_image_id, '_wp_attachment_image_alt', true ) ?: get_the_title();
							?>
							<a href="<?php echo esc_url( $main_full ); ?>" data-lightbox="product-gallery" data-main-image class="block aspect-[4/3] w-full overflow-hidden bg-slate-100">
								<img src="<?php echo esc_url( $main_full ); ?>" alt="<?php echo esc_attr( $main_alt ); ?>" class="h-full w-full object-contain">
							</a>
						<?php else : ?>
							<div class="flex aspect-[4/3] w-full items-center justify-center bg-slate-100 text-slate-400">
								Нет изображения
							</div>
						<?php endif; ?>
					</div>

					<?php if ( ! empty( $gallery_ids ) ) : ?>
						<div class="mt-4 grid grid-cols-3 gap-4">
							<?php foreach ( $gallery_ids as $g_id ) :
								$g_url = wp_get_attachment_image_url( $g_id, 'medium' );
								if ( ! $g_url ) { continue; }
								$g_alt = get_post_meta( $g_id, '_wp_attachment_image_alt', true ) ?: get_the_title();
								?>
								<button type="button" data-gallery-thumb data-full="<?php echo esc_url( wp_get_attachment_image_url( $g_id, 'large' ) ); ?>" class="block aspect-[4/3] w-full overflow-hidden bg-white shadow-[0_2px_12px_rgba(15,23,42,0.08)] ring-2 ring-transparent transition hover:ring-[#3d5f86] <?php echo $g_id === $main_image_id ? 'ring-[#3d5f86]' : ''; ?>">
									<img src="<?php echo esc_url( $g_url ); ?>" alt="<?php echo esc_attr( $g_alt ); ?>" class="h-full w-full object-contain">
								</button>
							<?php endforeach; ?>
						</div>
					<?php endif; ?>
				</div>

				<div class="flex flex-col">

					<?php if ( $sku ) : ?>
						<div class="text-[15px] text-slate-500">
							Арт. <span class="text-slate-700"><?php echo esc_html( $sku ); ?></span>
						</div>
					<?php endif; ?>

					<?php if ( $short_desc ) : ?>
						<p class="mt-3 text-[15px] leading-relaxed text-slate-600">
							<?php echo esc_html( $short_desc ); ?>
						</p>
					<?php endif; ?>

					<?php if ( ! empty( $visible_attrs ) ) : ?>
						<div class="mt-8">
							<h2 class="mb-5 text-[20px] font-bold text-[#1e3a5f] sm:text-[22px]">Характеристики</h2>
							<dl class="divide-y divide-slate-200 border-y border-slate-200">
								<?php foreach ( $visible_attrs as $attr ) :
									$label = wc_attribute_label( $attr->get_name() );
									if ( $attr->is_taxonomy() ) {
										$terms = wp_list_pluck( $attr->get_terms(), 'name' );
										$value = implode( ', ', $terms );
									} else {
										$value = wp_strip_all_tags( $attr->get_options()[0] ?? '' );
										$value = implode( ', ', array_map( 'wp_strip_all_tags', $attr->get_options() ) );
									}
									if ( '' === trim( $value ) ) { continue; }
									?>
									<div class="grid grid-cols-2 gap-4 py-3 text-[15px]">
										<dt class="font-semibold text-slate-700"><?php echo esc_html( $label ); ?></dt>
										<dd class="text-slate-600"><?php echo esc_html( $value ); ?></dd>
									</div>
								<?php endforeach; ?>
							</dl>
							<a href="#all-specs" class="mt-4 inline-block text-[15px] font-semibold text-[#1e3a5f] underline-offset-2 hover:underline">
								Все характеристики
							</a>
						</div>
					<?php endif; ?>

					<div class="mt-8 flex flex-col items-start gap-4 bg-[#1e3a5f] p-5 text-white sm:flex-row sm:items-center sm:justify-between sm:gap-6 sm:p-6">
						<div>
							<div class="text-[26px] font-bold leading-none sm:text-[30px]">
								<?php
								if ( '' !== $regular_price && null !== $regular_price ) {
									echo esc_html( number_format( (float) $regular_price, 0, '.', ' ' ) ) . ' руб';
								} else {
									echo esc_html( strip_tags( $price_html ) );
								}
								?>
							</div>
							<div class="mt-2 flex items-center gap-2 text-[14px]">
								<span class="inline-block h-2 w-2 rounded-full bg-emerald-400"></span>
								<span><?php echo $is_in_stock ? 'В наличии' : 'Нет в наличии'; ?></span>
							</div>
						</div>

						<?php if ( $is_in_stock ) : ?>
							<form class="cart" method="post" enctype="multipart/form-data" action="<?php echo esc_url( apply_filters( 'woocommerce_add_to_cart_form_action', '' ) ); ?>">
								<div class="quantity hidden">
									<label class="screen-reader-text" for="quantity_<?php echo esc_attr( $product_id ); ?>">Количество</label>
									<input type="number" id="quantity_<?php echo esc_attr( $product_id ); ?>" class="input-text qty text" name="quantity" value="1" min="1" max="" step="1" inputmode="numeric" autocomplete="off">
								</div>
								<button type="submit" name="add-to-cart" value="<?php echo esc_attr( $product_id ); ?>" class="inline-flex items-center justify-center bg-white px-6 py-3 text-[15px] font-semibold text-[#1e3a5f] transition hover:bg-slate-100 sm:px-8">
									Добавить в корзину
								</button>
							</form>
						<?php else : ?>
							<button type="button" disabled class="inline-flex items-center justify-center bg-slate-300 px-6 py-3 text-[15px] font-semibold text-slate-500 sm:px-8">
								Нет в наличии
							</button>
						<?php endif; ?>
					</div>

				</div>
			</div>
		</div>
	</section>

	<!-- Accessories (static placeholder, will be wired to DB later) -->
	<section class="bg-[#f7f7fb] py-12 sm:py-16 lg:py-20">
		<div class="mx-auto w-full max-w-[1200px] px-4 sm:px-6 lg:px-0">
			<h2 class="mb-8 text-[28px] font-extrabold leading-none text-slate-900 sm:text-[32px]">
				Аксессуары
			</h2>

			<?php
			$accessory_placeholder = 'https://placehold.co/400x300/ffffff/c53030?text=%D0%9B%D0%BE%D1%82%D0%BE%D0%BA';
			$accessory_items      = array_fill( 0, 12, array(
				'image'  => $accessory_placeholder,
				'title'  => 'Лоток пластмассовый 150x150 / Комплект-01 (9 шт.)',
				'price'  => '2000 руб',
			) );
			?>

			<div class="grid grid-cols-2 gap-4 sm:grid-cols-3 sm:gap-5 lg:grid-cols-6 lg:gap-6">
				<?php foreach ( $accessory_items as $item ) : ?>
					<article class="flex flex-col bg-white shadow-[0_2px_12px_rgba(15,23,42,0.08)] transition-shadow hover:shadow-lg">
						<a href="#" class="block aspect-[4/3] w-full overflow-hidden bg-slate-50">
							<img src="<?php echo esc_url( $item['image'] ); ?>" alt="<?php echo esc_attr( $item['title'] ); ?>" class="h-full w-full object-contain">
						</a>
						<div class="flex flex-1 flex-col p-4">
							<h3 class="mb-3 text-[14px] font-bold leading-snug text-slate-900">
								<a href="#" class="hover:text-[#1e3a5f]"><?php echo esc_html( $item['title'] ); ?></a>
							</h3>
							<div class="mt-auto">
								<a href="#" class="text-[15px] font-semibold text-[#1e3a5f] hover:underline">
									<?php echo esc_html( $item['price'] ); ?>
								</a>
							</div>
						</div>
					</article>
				<?php endforeach; ?>
			</div>

			<div class="mt-10 flex justify-center sm:mt-12">
				<button type="button" class="inline-flex items-center justify-center border border-[#D0D6E8] bg-white px-8 py-3 text-[15px] font-medium text-[#1e3a5f] transition-colors hover:bg-slate-50">
					Показать больше
				</button>
			</div>
		</div>
	</section>

	<!-- Technical characteristics: tabs (description / specs / docs) -->
	<?php
	$description = $product->get_description();
	$all_attrs   = $product->get_attributes();
	?>
	<section class="bg-[#f7f7fb] py-12 sm:py-16 lg:py-20" data-product-tabs>
		<div class="mx-auto w-full max-w-[1200px] px-4 sm:px-6 lg:px-0">
			<h2 class="mb-8 text-[28px] font-extrabold leading-none text-slate-900 sm:text-[32px]">
				Технические характеристики
			</h2>

			<div role="tablist" class="-mb-px flex flex-wrap gap-2 border-b border-slate-200 sm:gap-0">
				<button type="button" role="tab" id="tab-desc" aria-controls="panel-desc" aria-selected="true" data-tab-trigger="desc" class="border-b-[3px] border-[#1e3a5f] px-4 py-3 text-[14px] font-bold uppercase tracking-wide text-[#1e3a5f] sm:px-8 sm:text-[15px]">
					Описание
				</button>
				<button type="button" role="tab" id="tab-specs" aria-controls="panel-specs" aria-selected="false" data-tab-trigger="specs" class="border-b-[3px] border-transparent px-4 py-3 text-[14px] font-bold uppercase tracking-wide text-slate-400 transition-colors hover:text-slate-700 sm:px-8 sm:text-[15px]">
					Характеристики
				</button>
				<button type="button" role="tab" id="tab-docs" aria-controls="panel-docs" aria-selected="false" data-tab-trigger="docs" class="border-b-[3px] border-transparent px-4 py-3 text-[14px] font-bold uppercase tracking-wide text-slate-400 transition-colors hover:text-slate-700 sm:px-8 sm:text-[15px]">
					Документация
				</button>
			</div>

			<div class="rounded-b-sm border border-t-0 border-slate-200 bg-white px-5 py-6 sm:px-8 sm:py-8">
				<div role="tabpanel" id="panel-desc" aria-labelledby="tab-desc" data-tab-panel="desc" class="prose prose-slate max-w-none text-[15px] leading-relaxed text-slate-700">
					<?php if ( $description ) : ?>
						<?php echo apply_filters( 'the_content', $description ); ?>
					<?php else : ?>
						<p class="text-slate-500">Описание товара пока не добавлено.</p>
					<?php endif; ?>
				</div>

				<div role="tabpanel" id="panel-specs" aria-labelledby="tab-specs" data-tab-panel="specs" class="hidden">
					<?php if ( ! empty( $all_attrs ) ) : ?>
						<dl class="divide-y divide-slate-200">
							<?php foreach ( $all_attrs as $attr ) :
								$label = wc_attribute_label( $attr->get_name() );
								if ( $attr->is_taxonomy() ) {
									$value = implode( ', ', wp_list_pluck( $attr->get_terms(), 'name' ) );
								} else {
									$value = implode( ', ', array_map( 'wp_strip_all_tags', $attr->get_options() ) );
								}
								if ( '' === trim( $value ) ) { continue; }
								?>
								<div class="grid grid-cols-1 gap-1 py-3 sm:grid-cols-2 sm:gap-4">
									<dt class="text-[15px] font-semibold text-slate-700"><?php echo esc_html( $label ); ?></dt>
									<dd class="text-[15px] text-slate-600"><?php echo esc_html( $value ); ?></dd>
								</div>
							<?php endforeach; ?>
						</dl>
					<?php else : ?>
						<p class="text-slate-500">Характеристики товара пока не добавлены.</p>
					<?php endif; ?>
				</div>

				<div role="tabpanel" id="panel-docs" aria-labelledby="tab-docs" data-tab-panel="docs" class="hidden">
					<p class="text-[15px] text-slate-500">Документация не найдена.</p>
				</div>
			</div>
		</div>
	</section>

	<?php get_template_part( 'template-parts/contact-form', 'form' ); ?>
</main>

<script>
(function() {
	function initTabs() {
		var root = document.querySelector('[data-product-tabs]');
		if (!root) return;
		var triggers = root.querySelectorAll('[data-tab-trigger]');
		var panels   = root.querySelectorAll('[data-tab-panel]');

		function activate(name) {
			triggers.forEach(function(btn) {
				var isActive = btn.getAttribute('data-tab-trigger') === name;
				btn.setAttribute('aria-selected', isActive ? 'true' : 'false');
				btn.classList.toggle('border-[#1e3a5f]', isActive);
				btn.classList.toggle('text-[#1e3a5f]', isActive);
				btn.classList.toggle('border-transparent', !isActive);
				btn.classList.toggle('text-slate-400', !isActive);
			});
			panels.forEach(function(p) {
				p.classList.toggle('hidden', p.getAttribute('data-tab-panel') !== name);
			});
		}

		triggers.forEach(function(btn) {
			btn.addEventListener('click', function() {
				activate(btn.getAttribute('data-tab-trigger'));
			});
		});
	}

	function initGallery() {
		var mainLink = document.querySelector('[data-main-image]');
		var thumbs   = document.querySelectorAll('[data-gallery-thumb]');
		if (!mainLink || !thumbs.length) return;

		thumbs.forEach(function(btn) {
			btn.addEventListener('click', function() {
				var full = btn.getAttribute('data-full');
				if (!full) return;
				mainLink.setAttribute('href', full);
				var img = mainLink.querySelector('img');
				if (img) {
					img.setAttribute('src', full);
				}
				thumbs.forEach(function(b) { b.classList.remove('ring-[#3d5f86]'); b.classList.add('ring-transparent'); });
				btn.classList.remove('ring-transparent');
				btn.classList.add('ring-[#3d5f86]');
			});
		});
	}
	if (document.readyState === 'loading') {
		document.addEventListener('DOMContentLoaded', initGallery);
		document.addEventListener('DOMContentLoaded', initTabs);
	} else {
		initGallery();
		initTabs();
	}
})();
</script>

<?php
get_footer();
