<?php
/**
 * Template Name: Catalog
 *
 * @package BelSKS
 */

get_header();
?>

  <section class="relative overflow-hidden bg-[#f7f7fb] py-10 sm:py-14 lg:py-16">
  <div class="pointer-events-none absolute inset-0">
    <div class="absolute left-0 top-0 h-px w-full bg-white/70"></div>
    <div class="absolute -left-40 top-24 h-[2px] w-[130%] rotate-[-45deg] bg-gradient-to-r from-transparent via-slate-200/50 to-transparent"></div>
    <div class="absolute left-[38%] top-0 h-[2px] w-[70%] rotate-[-45deg] bg-gradient-to-r from-transparent via-slate-200/40 to-transparent"></div>
    <div class="absolute right-0 top-[22%] h-px w-[55%] bg-slate-200/50"></div>
  </div>

  <div class="relative mx-auto w-full max-w-[1200px] px-4 sm:px-6 lg:px-0">
    <nav class="mb-8 text-[15px] leading-none text-slate-500 sm:mb-10 md:mt-12">
      <a href="#" class="transition-colors hover:text-slate-700">Главная</a>
      <span class="mx-2 text-slate-400">/</span>
      <span class="text-slate-600">Каталог</span>
    </nav>

    <h1 class="mb-8 text-[38px] font-extrabold leading-none tracking-[-0.03em] text-slate-900 sm:mb-10 sm:text-[56px]">
      Каталог
    </h1>

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
				'exclude'    => $uncategorized_id ? array( $uncategorized_id ) : array(),
				'parent'     => 0,
				'number'     => 999,
				'orderby'    => 'name',
				'order'      => 'ASC',
			) );

			if ( ! is_wp_error( $parent_categories ) && ! empty( $parent_categories ) ) {
				foreach ( $parent_categories as $parent_cat ) {
					if ( strtolower( $parent_cat->name ) === 'uncategorized' || $parent_cat->slug === 'uncategorized' ) {
						continue;
					}

					$children = get_terms( array(
						'taxonomy'   => 'product_cat',
						'hide_empty' => false,
						'parent'     => $parent_cat->term_id,
						'orderby'    => 'name',
						'order'      => 'ASC',
					) );

					$has_children  = ! is_wp_error( $children ) && ! empty( $children );
					$parent_link   = get_term_link( $parent_cat );
					?>
					<li class="catalog-category">
						<div class="flex items-center justify-between gap-2">
							<a href="<?php echo esc_url( $parent_link ); ?>" class="flex-1 text-[18px] font-semibold leading-snug text-[#3f5d7e] transition-colors hover:text-slate-900">
								<?php echo esc_html( $parent_cat->name ); ?>
							</a>
							<?php if ( $has_children ) : ?>
								<button type="button" class="catalog-toggle shrink-0 p-1 text-[#3f5d7e] transition-colors hover:text-slate-900" aria-expanded="false" aria-label="<?php esc_attr_e( 'Раскрыть подкатегории', 'belsks' ); ?>">
									<svg class="catalog-chevron h-5 w-5 transition-transform duration-200" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
										<polyline points="6 9 12 15 18 9"></polyline>
									</svg>
								</button>
							<?php endif; ?>
						</div>
						<?php if ( $has_children ) : ?>
							<ul class="catalog-subcategories hidden mt-3 ml-2 space-y-2 border-l border-slate-200 pl-4">
								<?php foreach ( $children as $child_cat ) : ?>
									<?php
									if ( strtolower( $child_cat->name ) === 'uncategorized' || $child_cat->slug === 'uncategorized' ) {
										continue;
									}
									$child_link = get_term_link( $child_cat );
									?>
									<li>
										<a href="<?php echo esc_url( $child_link ); ?>" class="block text-[15px] leading-snug text-slate-600 transition-colors hover:text-[#3f5d7e]">
											<?php echo esc_html( $child_cat->name ); ?>
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
		<?php
		$categories = get_terms( array(
			'taxonomy'   => 'product_cat',
			'hide_empty' => false,
			'exclude'    => $uncategorized_id ? array( $uncategorized_id ) : array(),
			'parent'     => 0,
			'number'     => 999,
			'orderby'    => 'name',
			'order'      => 'ASC',
		) );

		if ( ! is_wp_error( $categories ) && ! empty( $categories ) ) {
			foreach ( $categories as $category ) {
				// Skip Uncategorized category
				if ( strtolower( $category->name ) === 'uncategorized' || $category->slug === 'uncategorized' ) {
					continue;
				}
				$thumbnail_id = get_term_meta( $category->term_id, 'thumbnail_id', true );
				$image_url    = $thumbnail_id ? wp_get_attachment_image_url( $thumbnail_id, 'medium' ) : '';

				if ( ! $image_url ) {
					$image_url = 'https://placehold.co/400x300/e2e8f0/94a3b8?text=' . urlencode( $category->name );
				}

				$category_link = get_term_link( $category );
				$description = ! empty( $category->description ) ? $category->description : 'Категория товаров для вашего склада.';
				?>
				<article class="overflow-hidden bg-white shadow-[0_2px_12px_rgba(15,23,42,0.08)]">
					<div class="h-[160px] bg-slate-100 flex items-center justify-center overflow-hidden">
						<img src="<?php echo esc_url( $image_url ); ?>" alt="<?php echo esc_attr( $category->name ); ?>" class="w-full h-full object-cover">
					</div>
					<div class="p-5">
						<h2 class="mb-3 text-[18px] font-bold leading-snug text-slate-900">
							<a href="<?php echo esc_url( $category_link ); ?>" class="hover:text-[#3d5f86]"><?php echo esc_html( $category->name ); ?></a>
						</h2>
						<p class="text-[16px] leading-snug text-slate-600">
							<?php echo esc_html( wp_trim_words( $description, 15, '...' ) ); ?>
						</p>
					</div>
				</article>
				<?php
			}
		} else {
			?>
			<p class="col-span-3 text-center text-slate-600">Категории не найдены.</p>
			<?php
		}
		?>
	</div>
    </div>
  </div>
</section>
<!-- Contact form section -->
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
