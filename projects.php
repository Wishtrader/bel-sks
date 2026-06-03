<?php
/**
 * Template Name: Projects
 * Template Post Type: page
 *
 * @package BelSKS
 */

get_header();
?>

<main class="bg-[#f7f7fb]">

  <!-- Hero / Intro -->
  <section class="relative overflow-hidden py-10 sm:py-14 lg:py-16">
    <div class="pointer-events-none absolute inset-0">
      <div class="absolute -left-40 top-20 h-[2px] w-[130%] rotate-[-45deg] bg-gradient-to-r from-transparent via-slate-200/40 to-transparent"></div>
      <div class="absolute left-[38%] top-0 h-[2px] w-[70%] rotate-[-45deg] bg-gradient-to-r from-transparent via-slate-200/40 to-transparent"></div>
      <div class="absolute right-0 top-[18%] h-px w-[55%] bg-slate-200/40"></div>
    </div>

    <div class="relative mx-auto w-full max-w-[1200px] px-4 sm:px-6 lg:px-0 md:mt-6">
      <nav class="mb-6 text-[15px] leading-none text-slate-500 sm:mb-8">
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="transition-colors hover:text-slate-700">Главная</a>
        <span class="mx-2 text-slate-400">/</span>
        <span class="text-slate-600">Проекты</span>
      </nav>

      <div class="flex flex-col gap-6 lg:flex-row lg:items-end lg:justify-between">
        <div>
          <h1 class="mb-4 text-[38px] font-extrabold leading-none tracking-[-0.03em] text-slate-900 sm:mb-5 sm:text-[54px]">
            Реализованные проекты
          </h1>
          <p class="max-w-[620px] text-[15px] leading-snug text-slate-600 sm:text-[17px]">
            Проекты по оснащению складов, внедрению оборудования и реализации
            логистических решений для бизнеса.
          </p>
        </div>

        <a href="#contact-form" class="inline-flex shrink-0 items-center gap-3 rounded-sm bg-[#3f5d7e] px-6 py-3 text-[14px] font-semibold tracking-wide text-white shadow-[0_10px_26px_rgba(15,23,42,0.35)] transition hover:bg-[#344d6a]">
          <span>Обсудить проект</span>
          <span class="flex h-7 w-7 items-center justify-center rounded bg-white/10 text-base leading-none">→</span>
        </a>
      </div>
    </div>
  </section>

  <!-- Tabs + Grid -->
  <section class="relative overflow-hidden pb-10 sm:pb-14 lg:pb-16">
    <div class="pointer-events-none absolute inset-0">
      <div class="absolute -left-40 top-24 h-[2px] w-[130%] rotate-[-45deg] bg-gradient-to-r from-transparent via-slate-200/40 to-transparent"></div>
      <div class="absolute right-0 top-[50%] h-[2px] w-[55%] bg-slate-200/40"></div>
    </div>

    <div class="relative mx-auto w-full max-w-[1200px] px-4 sm:px-6 lg:px-0">
      <!-- Tabs -->
      <div class="mb-8 flex flex-wrap gap-2">
        <button class="rounded-sm border border-[#3f5d7e] bg-white px-5 py-2.5 text-[14px] font-semibold leading-none text-[#3f5d7e] shadow-[0_2px_6px_rgba(15,23,42,0.08)] transition hover:bg-slate-50">
          Все проекты
        </button>
        <button class="rounded-sm border border-slate-200 bg-white px-5 py-2.5 text-[14px] font-semibold leading-none text-slate-700 shadow-[0_2px_6px_rgba(15,23,42,0.06)] transition hover:bg-slate-50">
          Стеллажи
        </button>
        <button class="rounded-sm border border-slate-200 bg-white px-5 py-2.5 text-[14px] font-semibold leading-none text-slate-700 shadow-[0_2px_6px_rgba(15,23,42,0.06)] transition hover:bg-slate-50">
          Автоматизация
        </button>
        <button class="rounded-sm border border-slate-200 bg-white px-5 py-2.5 text-[14px] font-semibold leading-none text-slate-700 shadow-[0_2px_6px_rgba(15,23,42,0.06)] transition hover:bg-slate-50">
          Конвейеры
        </button>
        <button class="rounded-sm border border-slate-200 bg-white px-5 py-2.5 text-[14px] font-semibold leading-none text-slate-700 shadow-[0_2px_6px_rgba(15,23,42,0.06)] transition hover:bg-slate-50">
          Комплексные решения
        </button>
      </div>

      <?php
      $paged = max( 1, (int) get_query_var( 'paged' ) );

      $projects_query = new WP_Query( array(
        'post_type'      => 'projects',
        'post_status'    => 'publish',
        'posts_per_page' => 10,
        'paged'          => $paged,
        'orderby'        => array( 'menu_order' => 'ASC', 'date' => 'DESC' ),
      ) );

      if ( $projects_query->have_posts() ) :
        $projects = array();
        while ( $projects_query->have_posts() ) {
          $projects_query->the_post();
          $image_id = (int) get_post_meta( get_the_ID(), 'project_image', true );
          $image_url = $image_id ? wp_get_attachment_image_url( $image_id, 'large' ) : '';
          $projects[] = array(
            'title' => get_the_title(),
            'url'   => $image_url,
          );
        }

        // For any missing items in a block, pad with placeholders.
        while ( count( $projects ) < 10 ) {
          $projects[] = array( 'title' => '', 'url' => '' );
        }
        ?>

        <!-- Block 1 (5 items: 1 large 2x2, 2 small stacked, 2 wide medium) -->
        <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-3">
          <?php
          $sizes_block1 = array(
            array( 'col_span' => 2, 'row_span' => 2, 'aspect' => 'aspect-[5/4]', 'h' => 'min-h-[260px] sm:min-h-[420px] lg:min-h-[520px]' ),
            array( 'col_span' => 1, 'row_span' => 1, 'aspect' => '',                 'h' => 'min-h-[180px] sm:min-h-[200px] lg:min-h-[250px]' ),
            array( 'col_span' => 1, 'row_span' => 1, 'aspect' => '',                 'h' => 'min-h-[180px] sm:min-h-[200px] lg:min-h-[250px]' ),
            array( 'col_span' => 1, 'row_span' => 1, 'aspect' => 'aspect-[4/3]',     'h' => 'min-h-[180px] sm:min-h-[200px] lg:min-h-[250px]' ),
            array( 'col_span' => 2, 'row_span' => 1, 'aspect' => 'aspect-[5/3]',     'h' => 'min-h-[200px] sm:min-h-[240px] lg:min-h-[300px]' ),
          );

          for ( $i = 0; $i < 5; $i++ ) :
            $p = $projects[ $i ];
            $s = $sizes_block1[ $i ];
            ?>
            <a href="#" class="group relative overflow-hidden bg-slate-200 <?php echo esc_attr( "col-span-1 lg:col-span-{$s['col_span']} lg:row-span-{$s['row_span']} {$s['h']}" ); ?>">
              <?php if ( $p['url'] ) : ?>
                <img src="<?php echo esc_url( $p['url'] ); ?>" alt="<?php echo esc_attr( $p['title'] ); ?>" class="absolute inset-0 h-full w-full object-cover transition-transform duration-500 group-hover:scale-105" loading="lazy">
              <?php else : ?>
                <div class="absolute inset-0 bg-[linear-gradient(135deg,#d9e0ea_0%,#9fb2c7_45%,#c7d0db_100%)]"></div>
              <?php endif; ?>
            </a>
          <?php endfor; ?>
        </div>

        <!-- Block 2 (5 items: 2 wide medium, 1 large 2x2, 2 small stacked) -->
        <div class="mt-4 grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-3">
          <?php
          $sizes_block2 = array(
            array( 'col_span' => 1, 'row_span' => 1, 'aspect' => 'aspect-[4/3]',     'h' => 'min-h-[200px] sm:min-h-[240px] lg:min-h-[300px]' ),
            array( 'col_span' => 2, 'row_span' => 1, 'aspect' => 'aspect-[5/3]',     'h' => 'min-h-[200px] sm:min-h-[240px] lg:min-h-[300px]' ),
            array( 'col_span' => 2, 'row_span' => 2, 'aspect' => 'aspect-[5/4]',     'h' => 'min-h-[260px] sm:min-h-[420px] lg:min-h-[520px]' ),
            array( 'col_span' => 1, 'row_span' => 1, 'aspect' => '',                 'h' => 'min-h-[180px] sm:min-h-[200px] lg:min-h-[250px]' ),
            array( 'col_span' => 1, 'row_span' => 1, 'aspect' => '',                 'h' => 'min-h-[180px] sm:min-h-[200px] lg:min-h-[250px]' ),
          );

          for ( $i = 0; $i < 5; $i++ ) :
            $p = $projects[ $i + 5 ];
            $s = $sizes_block2[ $i ];
            ?>
            <a href="#" class="group relative overflow-hidden bg-slate-200 <?php echo esc_attr( "col-span-1 lg:col-span-{$s['col_span']} lg:row-span-{$s['row_span']} {$s['h']}" ); ?>">
              <?php if ( $p['url'] ) : ?>
                <img src="<?php echo esc_url( $p['url'] ); ?>" alt="<?php echo esc_attr( $p['title'] ); ?>" class="absolute inset-0 h-full w-full object-cover transition-transform duration-500 group-hover:scale-105" loading="lazy">
              <?php else : ?>
                <div class="absolute inset-0 bg-[linear-gradient(135deg,#d9e0ea_0%,#9fb2c7_45%,#c7d0db_100%)]"></div>
              <?php endif; ?>
            </a>
          <?php endfor; ?>
        </div>

        <?php
        $total_pages = (int) $projects_query->max_num_pages;
        if ( $total_pages > 1 ) :
          $current_page = $paged;
          ?>
          <div class="mt-10 flex justify-center">
            <nav class="inline-flex items-center gap-2 rounded-full bg-white px-4 py-2 shadow-[0_8px_22px_rgba(15,23,42,0.18)]" aria-label="Пагинация">
              <?php
              $window_size = 2;
              $visible = array( 1 );
              for ( $j = max( 2, $current_page - $window_size ); $j <= min( $total_pages - 1, $current_page + $window_size ); $j++ ) {
                $visible[] = $j;
              }
              if ( $total_pages > 1 ) {
                $visible[] = $total_pages;
              }
              $visible = array_unique( $visible );
              sort( $visible );

              $prev_link = get_previous_posts_page_link();
              if ( $prev_link ) : ?>
                <a href="<?php echo esc_url( $prev_link ); ?>" class="flex h-8 w-8 items-center justify-center rounded-full text-slate-500 hover:bg-slate-100" aria-label="Предыдущая страница">
                  <i data-lucide="chevron-left" class="h-4 w-4"></i>
                </a>
              <?php endif; ?>

              <?php
              $last_shown = 0;
              foreach ( $visible as $page_num ) :
                if ( $last_shown && $page_num - $last_shown > 1 ) : ?>
                  <span class="px-1 text-[13px] text-slate-400">&hellip;</span>
                <?php endif; ?>
                <?php if ( $page_num === $current_page ) : ?>
                  <span class="flex h-8 w-8 items-center justify-center rounded-full bg-[#3f5d7e] text-[13px] font-semibold text-white"><?php echo (int) $page_num; ?></span>
                <?php else :
                  $link = get_pagenum_link( $page_num );
                  ?>
                  <a href="<?php echo esc_url( $link ); ?>" class="flex h-8 w-8 items-center justify-center rounded-full text-[13px] font-semibold text-slate-600 hover:bg-slate-100"><?php echo (int) $page_num; ?></a>
                <?php endif; ?>
                <?php $last_shown = $page_num; ?>
              <?php endforeach; ?>

              <?php
              $next_link = get_next_posts_page_link();
              if ( $next_link ) : ?>
                <a href="<?php echo esc_url( $next_link ); ?>" class="flex h-8 w-8 items-center justify-center rounded-full text-slate-500 hover:bg-slate-100" aria-label="Следующая страница">
                  <i data-lucide="chevron-right" class="h-4 w-4"></i>
                </a>
              <?php endif; ?>
            </nav>
          </div>
        <?php endif; ?>

        <?php
        wp_reset_postdata();
      else :
        ?>
        <p class="rounded-md border border-dashed border-slate-300 bg-white p-8 text-center text-slate-500">
          Проекты пока не добавлены.
        </p>
        <?php
      endif;
      ?>
    </div>
  </section>

  <!-- Contact form section -->
  <?php get_template_part( 'template-parts/contact-form', 'form' ); ?>
</main>

<?php
get_footer();
