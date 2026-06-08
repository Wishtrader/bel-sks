<?php
/**
 * Template Name: Services Page
 *
 * @package BelSKS
 */

get_header();
?>

  <section class="bg-[#f5f5f9] dark:bg-[#111827] services-section py-12 relative overflow-hidden py-10 sm:py-14 lg:py-16">
    <!-- Diagonal background lines -->
    <div class="absolute inset-0 pointer-events-none overflow-hidden">
      <div class="absolute top-0 left-[40%] w-px h-full bg-gradient-to-b from-transparent via-gray-200 to-transparent opacity-40 -skew-x-12"></div>
      <div class="absolute top-0 left-[60%] w-px h-full bg-gradient-to-b from-transparent via-gray-200 to-transparent opacity-40 -skew-x-12"></div>
    </div>

    <div class="relative mx-auto w-full max-w-[1200px] px-4 sm:px-6 lg:px-0">

      <!-- Breadcrumbs -->
      <nav class="mb-8 text-[15px] leading-none text-slate-500 sm:mb-10 md:mt-12">
				<a href="/" class="transition-colors hover:text-slate-700">Главная</a>
				<span class="mx-2 text-slate-400">/</span>
				<span class="text-slate-600">Услуги</span>
    	</nav>

      <!-- Title -->
      <h1 class="mb-8 text-[38px] font-extrabold leading-none tracking-[-0.03em] text-slate-900 sm:mb-10 sm:text-[56px]">
      Услуги
    </h1>

      <!-- Description -->
      <p class="text-gray-600 leading-relaxed mb-10 max-w-[650px]">
        Комплексная поддержка проектов в складской логистике: от анализа задач и проектирования до монтажа, запуска и сервисного сопровождения.
      </p>

      <!-- Cards -->
      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5">

        <?php
        $services_query = new WP_Query( array(
          'post_type'      => 'services',
          'post_status'    => 'publish',
          'posts_per_page' => -1,
          'orderby'        => 'menu_order',
          'order'          => 'ASC',
        ) );

if ( $services_query->have_posts() ) :
		  while ( $services_query->have_posts() ) :
			$services_query->the_post();
			$service_id   = get_the_ID();
			$service_link = get_permalink();
			$service_desc = get_post_meta( $service_id, 'service_description', true );
			if ( ! $service_desc ) {
			  $service_desc = wp_strip_all_tags( get_the_excerpt() );
			}
			$service_icon = function_exists( 'get_field' ) ? get_field( 'service_icon' ) : '';
			$icon_url     = '';
			$icon_alt     = get_the_title();
			if ( is_array( $service_icon ) ) {
			  $icon_url = isset( $service_icon['url'] ) ? $service_icon['url'] : '';
			  if ( ! empty( $service_icon['alt'] ) ) {
				$icon_alt = $service_icon['alt'];
			  }
			} elseif ( is_string( $service_icon ) ) {
			  $icon_url = $service_icon;
			}
			?>
			<div class="bg-white rounded-lg shadow-sm p-6 hover:shadow-md transition-shadow">
			  <div class="flex items-center gap-3 mb-4">
				<div class="flex-shrink-0">
				  <?php if ( $icon_url ) : ?>
					<img src="<?php echo esc_url( $icon_url ); ?>" alt="<?php echo esc_attr( $icon_alt ); ?>" class="w-[58px] h-[44px] text-primary">
				  <?php else : ?>
					<i data-lucide="bell" class="w-8 h-8 text-primary"></i>
				  <?php endif; ?>
				</div>
				<h3 class="text-base font-bold !text-gray-800 dark:!text-white leading-tight"><?php the_title(); ?></h3>
			  </div>
			  <p class="text-sm text-gray-600 leading-relaxed mb-5">
				<?php echo esc_html( $service_desc ); ?>
			  </p>
			  <a href="<?php echo esc_url( $service_link ); ?>" class="inline-flex items-center text-sm font-semibold text-primary border border-[#D0D6E8] rounded-[4px] px-4 py-2 hover:bg-primary hover:text-white transition-colors">
				Подробнее
			  </a>
			</div>
			<?php
		  endwhile;
		  wp_reset_postdata();
		else :
          // Fallback static cards if no services
          for ( $i = 0; $i < 4; $i++ ) :
            ?>
            <div class="bg-white rounded-lg shadow-sm p-6 hover:shadow-md transition-shadow">
              <div class="flex items-center gap-3 mb-4">
                <div class="flex-shrink-0 text-primary">
                  <i data-lucide="lightbulb" class="w-8 h-8"></i>
                </div>
                <h3 class="text-base font-bold text-gray-900 leading-tight">Услуга <?php echo $i + 1; ?></h3>
              </div>
              <p class="text-sm text-gray-600 leading-relaxed mb-5">Описание услуги.</p>
              <a href="#" class="inline-flex items-center text-sm font-semibold text-primary border border-primary/30 rounded-md px-4 py-2 hover:bg-primary hover:text-white transition-colors">
                Подробнее
              </a>
            </div>
            <?php
          endfor;
        endif;
        ?>

      </div>
    </div>
  </section>
	<!-- Contact form section -->
<?php get_template_part( 'template-parts/contact-form', 'form' ); ?>
</main>

<?php
get_footer();
