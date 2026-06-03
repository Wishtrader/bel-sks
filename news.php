<?php
/**
 * Template Name: News
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
      <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="transition-colors hover:text-slate-700">Главная</a>
      <span class="mx-2 text-slate-400">/</span>
      <span class="text-slate-600">Новости</span>
    </nav>

    <h1 class="mb-8 text-[40px] font-extrabold leading-none tracking-[-0.03em] text-slate-900 sm:mb-10 sm:text-[54px]">
      Новости
    </h1>

    <p class="mb-12 max-w-[820px] text-[15px] leading-snug text-slate-600 sm:mb-16 sm:text-[16px]">
      БелСКС логистик — поставщик решений для складской логистики, хранения, перемещения и организации производственного пространства.
    </p>

    <?php
    $paged = max( 1, (int) get_query_var( 'paged' ) );

    $news_query = new WP_Query( array(
      'post_type'      => 'post',
      'post_status'    => 'publish',
      'posts_per_page' => 9,
      'paged'          => $paged,
      'orderby'        => 'date',
      'order'          => 'DESC',
    ) );

    $russian_months = array(
      'January'   => 'Января',
      'February'  => 'Февраля',
      'March'     => 'Марта',
      'April'     => 'Апреля',
      'May'       => 'Мая',
      'June'      => 'Июня',
      'July'      => 'Июля',
      'August'    => 'Августа',
      'September' => 'Сентября',
      'October'   => 'Октября',
      'November'  => 'Ноября',
      'December'  => 'Декабря',
    );

    if ( $news_query->have_posts() ) :
      ?>
      <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3">
        <?php
        while ( $news_query->have_posts() ) :
          $news_query->the_post();
          $raw_date = get_the_date( 'd F Y' );
          $display_date = strtr( $raw_date, $russian_months );
          ?>
          <a href="<?php the_permalink(); ?>" class="group block overflow-hidden border border-slate-200 bg-white shadow-[0_2px_12px_rgba(15,23,42,0.06)] transition-shadow hover:shadow-[0_4px_20px_rgba(15,23,42,0.10)]">
            <div class="h-[240px] overflow-hidden bg-white sm:h-[280px]">
              <?php if ( has_post_thumbnail() ) : ?>
                <?php the_post_thumbnail( 'medium_large', array( 'class' => 'h-full w-full object-cover transition-transform duration-300 group-hover:scale-105' ) ); ?>
              <?php else : ?>
                <div class="flex h-full w-full items-center justify-center bg-slate-100">
                  <span class="text-sm text-slate-400">Нет изображения</span>
                </div>
              <?php endif; ?>
            </div>
            <div class="p-5 sm:p-6">
              <p class="mb-3 flex items-center gap-2 text-[13px] text-slate-500">
                <i data-lucide="calendar" class="h-4 w-4"></i>
                <span><?php echo esc_html( $display_date ); ?></span>
              </p>
              <h2 class="text-[16px] font-bold leading-snug text-slate-900 transition-colors group-hover:text-[#1e3a5f] sm:text-[18px]">
                <?php the_title(); ?>
              </h2>
            </div>
          </a>
          <?php
        endwhile;
        ?>
      </div>

      <?php
      $total_pages = (int) $news_query->max_num_pages;
      if ( $total_pages > 1 ) :
        $current_page = $paged;
        $big          = 999999999;
        $links        = paginate_links( array(
          'base'      => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
          'format'    => '?paged=%#%',
          'current'   => $current_page,
          'total'     => $total_pages,
          'type'      => 'array',
          'prev_next' => false,
        ) );

        if ( ! empty( $links ) ) :
          ?>
          <nav class="mt-12 flex items-center justify-center gap-2" aria-label="Пагинация">
            <?php
            $window_size  = 2;
            $visible      = array();
            $visible[]    = 1;
            for ( $i = max( 2, $current_page - $window_size ); $i <= min( $total_pages - 1, $current_page + $window_size ); $i++ ) {
              $visible[] = $i;
            }
            if ( $total_pages > 1 ) {
              $visible[] = $total_pages;
            }
            $visible = array_unique( $visible );
            sort( $visible );

            $prev_link = get_previous_posts_page_link();
            if ( $prev_link ) : ?>
              <a href="<?php echo esc_url( $prev_link ); ?>" class="inline-flex h-10 w-10 items-center justify-center rounded-md border border-slate-200 bg-white text-slate-600 transition-colors hover:bg-slate-50" aria-label="Предыдущая страница">
                <i data-lucide="chevron-left" class="h-4 w-4"></i>
              </a>
            <?php endif; ?>

            <?php
            $last_shown = 0;
            foreach ( $visible as $page_num ) :
              if ( $last_shown && $page_num - $last_shown > 1 ) : ?>
                <span class="px-1 text-slate-400">&hellip;</span>
              <?php endif; ?>
              <?php if ( $page_num === $current_page ) : ?>
                <span class="inline-flex h-10 w-10 items-center justify-center rounded-md bg-[#1e3a5f] text-[15px] font-semibold text-white"><?php echo (int) $page_num; ?></span>
              <?php else :
                $link = get_pagenum_link( $page_num );
                ?>
                <a href="<?php echo esc_url( $link ); ?>" class="inline-flex h-10 w-10 items-center justify-center rounded-md border border-slate-200 bg-white text-[15px] font-medium text-slate-700 transition-colors hover:bg-slate-50"><?php echo (int) $page_num; ?></a>
              <?php endif; ?>
              <?php $last_shown = $page_num; ?>
            <?php endforeach; ?>

            <?php
            $next_link = get_next_posts_page_link();
            if ( $next_link ) : ?>
              <a href="<?php echo esc_url( $next_link ); ?>" class="inline-flex h-10 w-10 items-center justify-center rounded-md border border-slate-200 bg-white text-slate-600 transition-colors hover:bg-slate-50" aria-label="Следующая страница">
                <i data-lucide="chevron-right" class="h-4 w-4"></i>
              </a>
            <?php endif; ?>
          </nav>
          <?php
        endif;
      endif;

      wp_reset_postdata();
    else :
      ?>
      <p class="rounded-md border border-dashed border-slate-300 bg-white p-8 text-center text-slate-500">
        Пока нет новостей.
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
