<?php
/**
 * WooCommerce Template Override: Product Category
 *
 * Overrides WooCommerce's default taxonomy-product-cat.php
 * (which simply loads archive-product.php) with a custom
 * layout matching the BelSKS catalog page.
 *
 * @package BelSKS
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();

$current_term = get_queried_object();

$child_categories = get_terms( array(
	'taxonomy'   => 'product_cat',
	'hide_empty' => false,
	'parent'     => $current_term->term_id,
	'orderby'    => 'name',
	'order'      => 'ASC',
) );

$has_child_categories = ! is_wp_error( $child_categories ) && ! empty( $child_categories );

$ancestors = array_reverse( get_ancestors( $current_term->term_id, 'product_cat' ) );

$catalog_page = get_page_by_path( 'katalog' );
if ( ! $catalog_page ) {
	$catalog_query = new WP_Query( array(
		'post_type'      => 'page',
		'title'          => 'Каталог',
		'posts_per_page' => 1,
		'fields'         => 'ids',
	) );
	$catalog_page = ! empty( $catalog_query->posts ) ? $catalog_query->posts[0] : 0;
}
$catalog_url = $catalog_page ? get_permalink( $catalog_page ) : home_url( '/' );
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
				<?php foreach ( $ancestors as $ancestor_id ) : ?>
					<?php $ancestor = get_term( $ancestor_id, 'product_cat' ); ?>
					<?php if ( $ancestor && ! is_wp_error( $ancestor ) ) : ?>
						<span class="mx-2 text-slate-400">/</span>
						<a href="<?php echo esc_url( get_term_link( $ancestor ) ); ?>" class="transition-colors hover:text-slate-700"><?php echo esc_html( $ancestor->name ); ?></a>
					<?php endif; ?>
				<?php endforeach; ?>
				<span class="mx-2 text-slate-400">/</span>
				<span class="text-slate-600"><?php echo esc_html( $current_term->name ); ?></span>
			</nav>

			<h1 class="mb-4 text-[38px] font-extrabold leading-none tracking-[-0.03em] text-slate-900 sm:mb-6 sm:text-[56px]">
				<?php echo esc_html( $current_term->name ); ?>
			</h1>

			<?php if ( ! empty( $current_term->description ) ) : ?>
				<p class="mb-8 max-w-3xl text-[16px] leading-relaxed text-slate-600 sm:mb-10">
					<?php echo esc_html( $current_term->description ); ?>
				</p>
			<?php endif; ?>

			<div class="grid gap-6 lg:grid-cols-[380px_minmax(0,1fr)] lg:items-start">
				<aside class="rounded-sm border border-slate-200 bg-white p-4 shadow-[0_2px_12px_rgba(15,23,42,0.08)] sm:p-6">
					<div class="mb-4 inline-flex rounded-md bg-[#3d5f86] px-5 py-2 text-[18px] font-semibold leading-none text-white">
						Каталог
					</div>

					<ul class="space-y-4">
						<?php
						$uncategorized_id = (int) get_option( 'default_product_cat' );

						$parent_categories = get_terms( array(
							'taxonomy'   => 'product_cat',
							'hide_empty' => false,
							'parent'     => 0,
							'exclude'    => $uncategorized_id ? array( $uncategorized_id ) : array(),
							'number'     => 999,
							'orderby'    => 'name',
							'order'      => 'ASC',
						) );

						if ( ! is_wp_error( $parent_categories ) && ! empty( $parent_categories ) ) {
							foreach ( $parent_categories as $parent_cat ) {
								$sub_children = get_terms( array(
									'taxonomy'   => 'product_cat',
									'hide_empty' => false,
									'parent'     => $parent_cat->term_id,
									'orderby'    => 'name',
									'order'      => 'ASC',
								) );

								$has_sub_children     = ! is_wp_error( $sub_children ) && ! empty( $sub_children );
								$parent_link          = get_term_link( $parent_cat );
								$is_current_term      = ( $current_term->term_id === $parent_cat->term_id );
								$is_parent_of_current = in_array( $parent_cat->term_id, $ancestors, true );
								$is_current_or_parent = $is_current_term || $is_parent_of_current;
								$should_be_open       = $is_current_or_parent;
								?>
								<li class="catalog-category">
									<div class="flex items-center justify-between gap-2">
										<a href="<?php echo esc_url( $parent_link ); ?>" class="flex-1 text-[18px] font-semibold leading-snug <?php echo $is_current_or_parent ? 'text-slate-900' : 'text-[#3f5d7e]'; ?> transition-colors hover:text-slate-900">
											<?php echo esc_html( $parent_cat->name ); ?>
										</a>
										<?php if ( $has_sub_children ) : ?>
											<button type="button" class="catalog-toggle shrink-0 p-1 text-[#3f5d7e] transition-colors hover:text-slate-900" aria-expanded="<?php echo $should_be_open ? 'true' : 'false'; ?>" aria-label="<?php esc_attr_e( 'Раскрыть подкатегории', 'belsks' ); ?>">
												<svg class="catalog-chevron h-5 w-5 transition-transform duration-200 <?php echo $should_be_open ? 'rotate-180' : ''; ?>" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
													<polyline points="6 9 12 15 18 9"></polyline>
												</svg>
											</button>
										<?php endif; ?>
									</div>
									<?php if ( $has_sub_children ) : ?>
										<ul class="catalog-subcategories <?php echo $should_be_open ? '' : 'hidden'; ?> mt-3 ml-2 space-y-2 border-l border-slate-200 pl-4">
											<?php foreach ( $sub_children as $sub_child ) : ?>
												<?php
												$sub_child_link       = get_term_link( $sub_child );
												$is_current_sub_child = ( $current_term->term_id === $sub_child->term_id );
												?>
												<li>
													<a href="<?php echo esc_url( $sub_child_link ); ?>" class="block text-[15px] leading-snug <?php echo $is_current_sub_child ? 'font-semibold text-[#3f5d7e]' : 'text-slate-600'; ?> transition-colors hover:text-[#3f5d7e]">
														<?php echo esc_html( $sub_child->name ); ?>
													</a>
												</li>
											<?php endforeach; ?>
										</ul>
									<?php endif; ?>
								</li>
								<?php
							}
						}
						?>
					</ul>
				</aside>

				<div class="grid gap-6 sm:grid-cols-2 xl:grid-cols-3">
					<?php if ( $has_child_categories ) : ?>
						<?php
						foreach ( $child_categories as $child_cat ) {
							$thumbnail_id = get_term_meta( $child_cat->term_id, 'thumbnail_id', true );
							$image_url    = $thumbnail_id ? wp_get_attachment_image_url( $thumbnail_id, 'medium' ) : '';
							if ( ! $image_url ) {
								$image_url = 'https://placehold.co/400x300/e2e8f0/94a3b8?text=' . urlencode( $child_cat->name );
							}

							$child_link  = get_term_link( $child_cat );
							$description = ! empty( $child_cat->description ) ? $child_cat->description : 'Категория товаров для вашего склада.';
							?>
							<article class="overflow-hidden bg-white shadow-[0_2px_12px_rgba(15,23,42,0.08)]">
								<div class="h-[160px] bg-slate-100 flex items-center justify-center overflow-hidden">
									<img src="<?php echo esc_url( $image_url ); ?>" alt="<?php echo esc_attr( $child_cat->name ); ?>" class="w-full h-full object-cover">
								</div>
								<div class="p-5">
									<h2 class="mb-3 text-[18px] font-bold leading-snug text-slate-900">
										<a href="<?php echo esc_url( $child_link ); ?>" class="hover:text-[#3d5f86]"><?php echo esc_html( $child_cat->name ); ?></a>
									</h2>
									<p class="text-[16px] leading-snug text-slate-600">
										<?php echo esc_html( wp_trim_words( $description, 15, '...' ) ); ?>
									</p>
								</div>
							</article>
							<?php
						}
						?>
					<?php else : ?>
						<?php
						$products = new WP_Query( array(
							'post_type'      => 'product',
							'posts_per_page' => 12,
							'tax_query'      => array(
								array(
									'taxonomy' => 'product_cat',
									'field'    => 'term_id',
									'terms'    => $current_term->term_id,
								),
							),
						) );

						if ( $products->have_posts() ) :
							while ( $products->have_posts() ) : $products->the_post();
								$product_image = get_the_post_thumbnail_url( get_the_ID(), 'medium' );
								if ( ! $product_image ) {
									$product_image = 'https://placehold.co/400x300/e2e8f0/94a3b8?text=' . urlencode( get_the_title() );
								}
								$product_excerpt = wp_strip_all_tags( get_the_excerpt() );
								if ( empty( $product_excerpt ) ) {
									$product_excerpt = 'Товар из каталога.';
								}
								?>
								<article class="overflow-hidden bg-white shadow-[0_2px_12px_rgba(15,23,42,0.08)]">
									<div class="h-[160px] bg-slate-100 flex items-center justify-center overflow-hidden">
										<img src="<?php echo esc_url( $product_image ); ?>" alt="<?php echo esc_attr( get_the_title() ); ?>" class="w-full h-full object-cover">
									</div>
									<div class="p-5">
										<h2 class="mb-3 text-[18px] font-bold leading-snug text-slate-900">
											<a href="<?php the_permalink(); ?>" class="hover:text-[#3d5f86]"><?php the_title(); ?></a>
										</h2>
										<p class="text-[16px] leading-snug text-slate-600">
											<?php echo esc_html( wp_trim_words( $product_excerpt, 15, '...' ) ); ?>
										</p>
									</div>
								</article>
								<?php
							endwhile;
							wp_reset_postdata();
						else :
							?>
							<p class="col-span-3 text-center text-slate-600">В этой категории пока ничего нет.</p>
							<?php
						endif;
						?>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</section>
	<?php get_template_part( 'template-parts/contact-form', 'form' ); ?>
</main>

<script>
(function() {
	function initCatalogSidebar() {
		var toggles = document.querySelectorAll('.catalog-toggle');
		toggles.forEach(function(btn) {
			btn.addEventListener('click', function(e) {
				e.preventDefault();
				e.stopPropagation();
				var li = btn.closest('.catalog-category');
				if (!li) return;
				var sub = li.querySelector('.catalog-subcategories');
				var chev = btn.querySelector('.catalog-chevron');
				if (!sub || !chev) return;
				var willOpen = sub.classList.contains('hidden');
				sub.classList.toggle('hidden');
				chev.classList.toggle('rotate-180', willOpen);
				btn.setAttribute('aria-expanded', willOpen ? 'true' : 'false');
			});
		});
	}
	if (document.readyState === 'loading') {
		document.addEventListener('DOMContentLoaded', initCatalogSidebar);
	} else {
		initCatalogSidebar();
	}
})();
</script>

<?php
get_footer();
