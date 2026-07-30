<?php
/**
 * The template for displaying single projects posts
 *
 * @package BelSKS
 */

get_header();

$main_image    = get_field( 'project_image' );
$gallery       = get_field( 'project_gallery' );
$description   = get_field( 'project_description' );
$client        = get_field( 'project_client' );
$year          = get_field( 'project_year' );
$area          = get_field( 'project_area' );

$cat_terms     = get_the_terms( get_the_ID(), 'project_cat' );
$category      = ( $cat_terms && ! is_wp_error( $cat_terms ) ) ? $cat_terms[0] : null;
$full_desc     = get_field( 'project_full_description' );

$all_images = array();
if ( $main_image && is_array( $main_image ) ) {
	$all_images[] = $main_image;
}
if ( $gallery && is_array( $gallery ) ) {
	foreach ( $gallery as $img ) {
		if ( is_array( $img ) ) {
			$all_images[] = $img;
		}
	}
}
?>

<main class="bg-[#f7f7fb]">

  <!-- Breadcrumb + Title -->
  <section class="relative overflow-hidden py-8 sm:py-10 lg:py-12">
    <div class="pointer-events-none absolute inset-0">
      <div class="absolute -left-40 top-20 h-[2px] w-[130%] rotate-[-45deg] bg-gradient-to-r from-transparent via-slate-200/40 to-transparent"></div>
      <div class="absolute left-[38%] top-0 h-[2px] w-[70%] rotate-[-45deg] bg-gradient-to-r from-transparent via-slate-200/40 to-transparent"></div>
    </div>

    <div class="relative mx-auto w-full max-w-[1200px] px-4 sm:px-6 lg:px-0 lg:mt-14">
      <nav class="mb-6 text-[14px] leading-none text-slate-500 sm:mb-8">
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="transition-colors hover:text-slate-700">Главная</a>
        <span class="mx-1 text-slate-400">/</span>
        <a href="<?php
          $projects_page = get_page_by_title( 'Проекты' );
          echo $projects_page ? esc_url( get_permalink( $projects_page->ID ) ) : '#';
        ?>" class="transition-colors hover:text-slate-700">Проекты</a>
        <span class="mx-1 text-slate-400">/</span>
        <span class="text-[#294F78]"><?php the_title(); ?></span>
      </nav>

      <h1 class="text-[28px] font-extrabold leading-tight tracking-[-0.02em] text-slate-900 sm:text-[44px] lg:text-[54px]">
        <?php the_title(); ?>
      </h1>
      <?php if ( $category ) : ?>
        <a href="<?php echo esc_url( add_query_arg( 'category', $category->slug, get_post_type_archive_link( 'projects' ) ) ); ?>" class="mt-3 inline-block rounded-sm bg-[#3f5d7e]/10 px-3 py-1 text-[13px] font-medium text-[#3f5d7e] transition hover:bg-[#3f5d7e]/20">
          <?php echo esc_html( $category->name ); ?>
        </a>
      <?php endif; ?>
    </div>
  </section>

  <!-- Project Content: Gallery + Description -->
  <section class="relative overflow-hidden pb-12 sm:pb-16 lg:pb-20">
    <div class="mx-auto w-full max-w-[1200px] px-4 sm:px-6 lg:px-0">

      <div class="flex flex-col gap-8 lg:flex-row lg:gap-12">

        <!-- LEFT: Gallery -->
        <div class="w-full lg:w-1/2">
          <?php if ( ! empty( $all_images ) ) : ?>
            <!-- Main Image -->
            <div class="project-gallery-main relative overflow-hidden rounded-sm bg-slate-200 aspect-[4/3]">
              <img
                id="project-main-image"
                src="<?php echo esc_url( $all_images[0]['url'] ); ?>"
                alt="<?php echo esc_attr( get_the_title() ); ?>"
                class="absolute inset-0 h-full w-full object-cover transition-opacity duration-300"
              >
            </div>

            <?php if ( count( $all_images ) > 1 ) : ?>
              <!-- Thumbnails -->
              <div class="project-gallery-thumbs relative mt-4">
                <!-- Arrow Left -->
                <button
                  type="button"
                  id="gallery-arrow-left"
                  class="gallery-arrow gallery-arrow-left absolute left-0 top-1/2 z-10 flex h-8 w-8 -translate-y-1/2 items-center justify-center rounded-full bg-white/90 text-slate-600 shadow-md transition hover:bg-white hover:text-slate-900"
                  style="display: none;"
                >
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m15 18-6-6 6-6"/></svg>
                </button>

                <div id="gallery-thumbs-track" class="flex gap-2 overflow-hidden">
                  <?php foreach ( $all_images as $idx => $img ) : ?>
                    <button
                      type="button"
                      class="gallery-thumb flex-shrink-0 overflow-hidden rounded-sm border-2 transition <?php echo $idx === 0 ? 'border-[#3f5d7e] opacity-100' : 'border-transparent opacity-70 hover:opacity-100'; ?>"
                      data-url="<?php echo esc_url( $img['url'] ); ?>"
                      data-index="<?php echo (int) $idx; ?>"
                    >
                      <img
                        src="<?php echo esc_url( $img['sizes']['thumbnail'] ?? $img['url'] ); ?>"
                        alt="<?php echo esc_attr( get_the_title() . ' — ' . ( $idx + 1 ) ); ?>"
                        class="h-[72px] w-[96px] object-cover sm:h-[80px] sm:w-[106px]"
                        loading="lazy"
                      >
                    </button>
                  <?php endforeach; ?>
                </div>

                <!-- Arrow Right -->
                <button
                  type="button"
                  id="gallery-arrow-right"
                  class="gallery-arrow gallery-arrow-right absolute right-0 top-1/2 z-10 flex h-8 w-8 -translate-y-1/2 items-center justify-center rounded-full bg-white/90 text-slate-600 shadow-md transition hover:bg-white hover:text-slate-900"
                  style="display: none;"
                >
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m9 18 6-6-6-6"/></svg>
                </button>
              </div>
            <?php endif; ?>

          <?php else : ?>
            <div class="flex aspect-[4/3] items-center justify-center rounded-sm bg-slate-200">
              <span class="text-slate-400">Нет изображений</span>
            </div>
          <?php endif; ?>
        </div>

        <!-- RIGHT: Description -->
        <div class="w-full lg:w-1/2">
          <?php if ( $description ) : ?>
            <div class="prose prose-slate max-w-none text-[15px] leading-relaxed text-slate-700 sm:text-[16px]">
              <?php echo wp_kses_post( wpautop( $description ) ); ?>
            </div>
          <?php endif; ?>

          <!-- Project Details -->
          <?php if ( $client || $year || $area || $category ) : ?>
            <div class="mt-8 rounded-sm border border-slate-200 bg-white p-5 sm:p-6">
              <h3 class="mb-4 text-[17px] font-semibold text-slate-900">Информация о проекте</h3>
              <dl class="grid grid-cols-1 gap-3 sm:grid-cols-2">
                <?php if ( $category ) : ?>
                  <div>
                    <dt class="text-[13px] font-medium uppercase tracking-wide text-slate-400">Категория</dt>
                    <dd class="mt-1 text-[15px] text-slate-700"><?php echo esc_html( $category->name ); ?></dd>
                  </div>
                <?php endif; ?>
                <?php if ( $client ) : ?>
                  <div>
                    <dt class="text-[13px] font-medium uppercase tracking-wide text-slate-400">Заказчик</dt>
                    <dd class="mt-1 text-[15px] text-slate-700"><?php echo esc_html( $client ); ?></dd>
                  </div>
                <?php endif; ?>
                <?php if ( $year ) : ?>
                  <div>
                    <dt class="text-[13px] font-medium uppercase tracking-wide text-slate-400">Год</dt>
                    <dd class="mt-1 text-[15px] text-slate-700"><?php echo esc_html( $year ); ?></dd>
                  </div>
                <?php endif; ?>
                <?php if ( $area ) : ?>
                  <div>
                    <dt class="text-[13px] font-medium uppercase tracking-wide text-slate-400">Площадь</dt>
                    <dd class="mt-1 text-[15px] text-slate-700"><?php echo esc_html( $area ); ?></dd>
                  </div>
                <?php endif; ?>
              </dl>
            </div>
          <?php endif; ?>
        </div>

      </div>
    </div>
  </section>

  <?php if ( $full_desc ) : ?>
  <!-- Full Description -->
  <section class="relative overflow-hidden pb-12 sm:pb-16 lg:pb-20">
    <div class="mx-auto w-full max-w-[1200px] px-4 sm:px-6 lg:px-0">
      <div class="prose prose-slate max-w-none text-[15px] leading-relaxed text-slate-700 sm:text-[16px]">
        <?php echo wp_kses_post( $full_desc ); ?>
      </div>
    </div>
  </section>
  <?php endif; ?>

  <!-- Contact form section -->
  <?php get_template_part( 'template-parts/contact-form', 'form' ); ?>
</main>

<!-- Gallery Script -->
<script>
(function () {
  const mainImage = document.getElementById('project-main-image');
  const track     = document.getElementById('gallery-thumbs-track');
  const btnLeft   = document.getElementById('gallery-arrow-left');
  const btnRight  = document.getElementById('gallery-arrow-right');

  if ( ! mainImage || ! track ) return;

  const thumbs = track.querySelectorAll('.gallery-thumb');
  const thumbWidth = thumbs.length ? thumbs[0].offsetWidth + 8 : 0; // gap-2 = 8px
  let scrollPos = 0;

  function updateArrows() {
    if ( ! btnLeft || ! btnRight ) return;
    const maxScroll = track.scrollWidth - track.clientWidth;
    btnLeft.style.display  = scrollPos > 0 ? 'flex' : 'none';
    btnRight.style.display = scrollPos < maxScroll - 1 ? 'flex' : 'none';
  }

  thumbs.forEach(function (btn) {
    btn.addEventListener('click', function () {
      var url = this.getAttribute('data-url');
      if ( ! url ) return;
      mainImage.style.opacity = '0';
      setTimeout(function () {
        mainImage.src = url;
        mainImage.style.opacity = '1';
      }, 150);

      thumbs.forEach(function (t) {
        t.classList.remove('border-[#3f5d7e]', 'opacity-100');
        t.classList.add('border-transparent', 'opacity-70');
      });
      btn.classList.remove('border-transparent', 'opacity-70');
      btn.classList.add('border-[#3f5d7e]', 'opacity-100');
    });
  });

  if ( btnLeft ) {
    btnLeft.addEventListener('click', function () {
      scrollPos = Math.max(0, scrollPos - thumbWidth * 4);
      track.scrollTo({ left: scrollPos, behavior: 'smooth' });
      setTimeout(updateArrows, 350);
    });
  }

  if ( btnRight ) {
    btnRight.addEventListener('click', function () {
      var maxScroll = track.scrollWidth - track.clientWidth;
      scrollPos = Math.min(maxScroll, scrollPos + thumbWidth * 4);
      track.scrollTo({ left: scrollPos, behavior: 'smooth' });
      setTimeout(updateArrows, 350);
    });
  }

  track.addEventListener('scroll', function () {
    scrollPos = track.scrollLeft;
    updateArrows();
  });

  updateArrows();
  window.addEventListener('resize', updateArrows);
})();
</script>

<style>
  .project-gallery-thumbs {
    padding: 0 20px;
  }
  .project-gallery-thumbs #gallery-thumbs-track {
    scroll-behavior: smooth;
    -ms-overflow-style: none;
    scrollbar-width: none;
  }
  .project-gallery-thumbs #gallery-thumbs-track::-webkit-scrollbar {
    display: none;
  }
  .gallery-arrow {
    width: 32px;
    height: 32px;
  }
</style>

<?php
get_footer();
