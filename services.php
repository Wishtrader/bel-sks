<?php
/**
 * Template Name: Services Page
 *
 * @package BelSKS
 */

get_header();
?>

  <section class="bg-[#f5f5f9] py-12 relative overflow-hidden">
    <!-- Diagonal background lines -->
    <div class="absolute inset-0 pointer-events-none overflow-hidden">
      <div class="absolute top-0 left-[40%] w-px h-full bg-gradient-to-b from-transparent via-gray-200 to-transparent opacity-40 -skew-x-12"></div>
      <div class="absolute top-0 left-[60%] w-px h-full bg-gradient-to-b from-transparent via-gray-200 to-transparent opacity-40 -skew-x-12"></div>
    </div>

    <div class="max-w-[1200px] md:mt-12 mx-auto px-6 relative z-10">

      <!-- Breadcrumbs -->
      <nav class="text-sm text-gray-500 mb-6">
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="hover:text-primary transition-colors">Главная</a>
        <span class="mx-1">/</span>
        <span class="text-primary font-medium">Услуги</span>
      </nav>

      <!-- Title -->
      <h2 class="text-4xl font-bold text-gray-900 mb-5">Услуги</h2>

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
          $service_icons = array(
            0 => '<svg class="w-8 h-8 text-primary" viewBox="0 0 40 40" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M20 3C14.5 3 10 7.5 10 13c0 3.5 1.5 6.5 4 8.5V25c0 1.1.9 2 2 2h8c1.1 0 2-.9 2-2v-3.5c2.5-2 4-5 4-8.5 0-5.5-4.5-10-10-10z"/>
                    <path d="M16 29h8"/>
                    <path d="M14 32h12"/>
                    <circle cx="28" cy="8" r="1" fill="currentColor"/>
                    <circle cx="31" cy="11" r="0.8" fill="currentColor"/>
                    <circle cx="9" cy="9" r="0.8" fill="currentColor"/>
                    <circle cx="7" cy="13" r="0.6" fill="currentColor"/>
                  </svg>',
            1 => '<svg class="w-8 h-8 text-primary" viewBox="0 0 40 40" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                    <rect x="5" y="5" width="22" height="18" rx="1"/>
                    <path d="M5 12h22"/>
                    <path d="M12 12v11"/>
                    <rect x="12" y="16" width="8" height="7" rx="1"/>
                    <path d="M27 9l8 4v14l-8 4"/>
                    <path d="M27 9v22"/>
                    <circle cx="27" cy="20" r="2"/>
                  </svg>',
            2 => '<svg class="w-8 h-8 text-primary" viewBox="0 0 40 40" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M22 8l-6 6"/>
                    <path d="M18 10l-4-4"/>
                    <path d="M14 6l6 6"/>
                    <rect x="11" y="3" width="4" height="4" rx="0.5" transform="rotate(45 13 5)"/>
                    <path d="M10 20l4-4"/>
                    <path d="M16 24l-2-2"/>
                    <path d="M24 28l-6-6"/>
                    <path d="M26 30l-4-4"/>
                    <path d="M30 24l-2-2"/>
                    <circle cx="28" cy="22" r="3"/>
                    <path d="M30 24l3 3"/>
                    <circle cx="32" cy="12" r="1" fill="currentColor"/>
                    <circle cx="8" cy="14" r="0.8" fill="currentColor"/>
                    <circle cx="14" cy="30" r="0.7" fill="currentColor"/>
                  </svg>',
            3 => '<svg class="w-8 h-8 text-primary" viewBox="0 0 40 40" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                    <circle cx="14" cy="18" r="8"/>
                    <circle cx="14" cy="18" r="3"/>
                    <path d="M14 10v-3"/>
                    <path d="M14 26v3"/>
                    <path d="M6 18H3"/>
                    <path d="M25 18h3"/>
                    <path d="M8.4 12.4L6.3 10.3"/>
                    <path d="M21.7 23.7l2.1 2.1"/>
                    <path d="M8.4 23.6l-2.1 2.1"/>
                    <path d="M21.7 12.3l2.1-2.1"/>
                    <circle cx="30" cy="26" r="5"/>
                    <circle cx="30" cy="26" r="2"/>
                    <path d="M30 21v-2"/>
                    <path d="M30 31v2"/>
                    <path d="M25 26h-2"/>
                    <path d="M37 26h2"/>
                    <circle cx="34" cy="16" r="1" fill="currentColor"/>
                    <circle cx="26" cy="14" r="0.7" fill="currentColor"/>
                  </svg>',
          );
          $i = 0;
          while ( $services_query->have_posts() ) :
            $services_query->the_post();
            $service_id   = get_the_ID();
            $service_link = get_permalink();
            $service_desc = get_post_meta( $service_id, 'service_description', true );
            if ( ! $service_desc ) {
              $service_desc = wp_strip_all_tags( get_the_excerpt() );
            }
            $icon_svg = isset( $service_icons[ $i ] ) ? $service_icons[ $i ] : $service_icons[0];
            ?>
            <div class="bg-white rounded-lg shadow-sm p-6 hover:shadow-md transition-shadow">
              <div class="flex items-center gap-3 mb-4">
                <div class="flex-shrink-0">
                  <?php echo $icon_svg; ?>
                </div>
                <h3 class="text-base font-bold text-gray-900 leading-tight"><?php the_title(); ?></h3>
              </div>
              <p class="text-sm text-gray-600 leading-relaxed mb-5">
                <?php echo esc_html( $service_desc ); ?>
              </p>
              <a href="<?php echo esc_url( $service_link ); ?>" class="inline-flex items-center text-sm font-semibold text-primary border border-primary/30 rounded-md px-4 py-2 hover:bg-primary hover:text-white transition-colors">
                Подробнее
              </a>
            </div>
            <?php
            $i++;
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
