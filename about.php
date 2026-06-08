<?php
/**
 * Template Name: About
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

    <div class="relative mx-auto w-full max-w-[1200px] px-4 sm:px-6 lg:px-0">
    <nav class="mb-8 text-[15px] leading-none text-slate-500 sm:mb-10 md:mt-12">
      <a href="#" class="transition-colors hover:text-slate-700">Главная</a>
      <span class="mx-2 text-slate-400">/</span>
      <span class="text-slate-600">О Компании</span>
    </nav>

      <h1 class="mb-4 text-[38px] font-extrabold leading-none tracking-[-0.03em] text-slate-900 sm:mb-5 sm:text-[56px]">
        <?php the_field('about_heading') ?>
      </h1>

      <p class="max-w-[640px] text-[17px] leading-snug text-slate-600 sm:text-[18px]">
        <?php the_field('about_description') ?>
      </p>
    </div>
  </section>

  <!-- Engineering expertise -->
  <section class="relative overflow-hidden bg-white py-10 sm:py-14 lg:py-16">
    <div class="pointer-events-none absolute inset-0">
      <div class="absolute -left-40 top-24 h-[2px] w-[130%] rotate-[-45deg] bg-gradient-to-r from-transparent via-slate-200/40 to-transparent"></div>
      <div class="absolute left-[38%] top-0 h-[2px] w-[70%] rotate-[-45deg] bg-gradient-to-r from-transparent via-slate-200/40 to-transparent"></div>
      <div class="absolute right-0 top-[25%] h-px w-[55%] bg-slate-200/40"></div>
    </div>

    <div class="relative mx-auto w-full max-w-[1200px] px-4 sm:px-6 lg:px-0">
      <div class="grid gap-8 lg:grid-cols-[minmax(0,1.15fr)_minmax(0,1fr)] lg:items-center">
        <img src="<?php the_field('sec2_image') ?>" alt="" class="w-full h-full object-cover">

        <div>
          <h2 class="mb-5 text-[26px] font-extrabold leading-tight tracking-[-0.02em] text-slate-900 sm:text-[30px]">
            <?php the_field('sec2_heading') ?>
          </h2>

          <div class="space-y-3 text-[15px] leading-relaxed text-slate-600 sm:text-[16px]">
            <p>
              <?php the_field('sec2_description1') ?>
            </p>
						<p>
              <?php the_field('sec2_description2') ?>
            </p>
						<p>
              <?php the_field('sec2_description3') ?>
            </p>
          </div>

          <div class="mt-8 grid gap-4 sm:grid-cols-2">
            <div class="rounded-sm border border-slate-200 bg-white px-5 py-4 shadow-[0_4px_18px_rgba(15,23,42,0.12)]">
              <div class="mb-1 text-[26px] font-extrabold tracking-[-0.02em] text-[#3f5d7e]">
                1400+
              </div>
              <div class="text-[15px] leading-snug text-slate-500">
                Реализованных проектов
              </div>
            </div>

            <div class="rounded-sm border border-slate-200 bg-white px-5 py-4 shadow-[0_4px_18px_rgba(15,23,42,0.12)]">
              <div class="mb-1 text-[26px] font-extrabold tracking-[-0.02em] text-[#3f5d7e]">
                50+
              </div>
              <div class="text-[15px] leading-snug text-slate-500">
                Опытных специалистов
              </div>
            </div>

            <div class="rounded-sm border border-slate-200 bg-white px-5 py-4 shadow-[0_4px_18px_rgba(15,23,42,0.12)]">
              <div class="mb-1 text-[26px] font-extrabold tracking-[-0.02em] text-[#3f5d7e]">
                20+
              </div>
              <div class="text-[15px] leading-snug text-slate-500">
                Лет на рынке Беларуси
              </div>
            </div>

            <div class="rounded-sm border border-slate-200 bg-white px-5 py-4 shadow-[0_4px_18px_rgba(15,23,42,0.12)]">
              <div class="mb-1 text-[26px] font-extrabold tracking-[-0.02em] text-[#3f5d7e]">
                94%
              </div>
              <div class="text-[15px] leading-snug text-slate-500">
                Повторных обращений
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Partners -->
  <section class="relative overflow-hidden bg-[#f7f7fb] py-10 sm:py-14 lg:py-16">
  <div class="pointer-events-none absolute inset-0">
    <div class="absolute -left-40 top-16 h-[2px] w-[130%] rotate-[-45deg] bg-gradient-to-r from-transparent via-slate-200/40 to-transparent"></div>
    <div class="absolute right-0 top-[60%] h-[2px] w-[55%] bg-slate-200/40"></div>
  </div>

  <div class="relative mx-auto w-full max-w-[1200px] sm:px-6 lg:px-0">
    <div class="py-6 sm:py-8 lg:py-9">
      <div class="mb-6 sm:mb-7 lg:mb-8">
        <h2 class="mb-3 text-[24px] font-extrabold leading-tight tracking-[-0.02em] text-slate-900 sm:text-[26px]">
          <?php the_field('sec3_heading') ?>
        </h2>
        <p class="max-w-[640px] text-[15px] leading-relaxed text-slate-600 sm:text-[16px]">
          <?php the_field('sec3_description') ?>
        </p>
      </div>

      <div class="w-full">
        <?php 
        $partners = function_exists('get_field') ? get_field('partners') : null;
        if ( !empty($partners) && is_array($partners) ) : ?>
          <div id="partners-viewport" class="overflow-hidden">
            <div id="partners-track" class="flex transition-transform duration-500 ease-in-out">
              <?php foreach ($partners as $partner) : 
                $logo_id = isset($partner['logo']) ? $partner['logo'] : null;
                $logo_url = $logo_id ? wp_get_attachment_image_url($logo_id, 'medium') : '';
                $partner_name = isset($partner['name']) ? $partner['name'] : '';
              ?>
                <div class="partners-item min-w-[50%] sm:min-w-[33.333%] lg:min-w-[16.666%] px-2">
                  <div class="flex h-14 items-center justify-center rounded bg-slate-50 text-[12px] font-semibold uppercase tracking-wide text-slate-400 sm:h-16">
                    <?php if ( $logo_url ) : ?>
                      <img src="<?php echo esc_url($logo_url); ?>" alt="<?php echo esc_attr($partner_name); ?>" class="object-contain">
                    <?php else : ?>
                      <span class="opacity-50"><?php echo esc_html($partner_name ?: 'Logo'); ?></span>
                    <?php endif; ?>
                  </div>
                </div>
              <?php endforeach; ?>
            </div>
          </div>

          <?php if ( count($partners) > 6 ) : ?>
            <button id="partners-prev" class="absolute -left-3 top-1/2 -translate-y-1/2 bg-white rounded-full p-2 shadow-lg z-10 border border-slate-100 opacity-0 group-hover:opacity-100 transition-opacity disabled:hidden">
              <i data-lucide="chevron-left" class="w-5 h-5 text-slate-600"></i>
            </button>
            <button id="partners-next" class="absolute -right-3 top-1/2 -translate-y-1/2 bg-white rounded-full p-2 shadow-lg z-10 border border-slate-100 opacity-0 group-hover:opacity-100 transition-opacity disabled:hidden">
              <i data-lucide="chevron-right" class="w-5 h-5 text-slate-600"></i>
            </button>

            <script>
            document.addEventListener('DOMContentLoaded', function() {
              const track = document.getElementById('partners-track');
              const prev = document.getElementById('partners-prev');
              const next = document.getElementById('partners-next');
              if (!track || !prev || !next) return;

              let index = 0;
              const items = track.querySelectorAll('.partners-item');
              const total = items.length;
              
              function getVisibleCount() {
                if (window.innerWidth >= 1024) return 6;
                if (window.innerWidth >= 640) return 3;
                return 2;
              }

              function updateSlider() {
                const visible = getVisibleCount();
                const maxIndex = Math.max(0, total - visible);
                if (index > maxIndex) index = maxIndex;
                
                const width = 100 / visible;
                track.style.transform = `translateX(-${index * width}%)`;
                
                prev.disabled = index === 0;
                next.disabled = index >= maxIndex;
                
                prev.style.display = index === 0 ? 'none' : 'block';
                next.style.display = index >= maxIndex ? 'none' : 'block';
              }

              prev.addEventListener('click', () => {
                if (index > 0) {
                  index--;
                  updateSlider();
                }
              });

              next.addEventListener('click', () => {
                if (index < total - getVisibleCount()) {
                  index++;
                  updateSlider();
                }
              });

              window.addEventListener('resize', updateSlider);
              updateSlider();
            });
            </script>
          <?php endif; ?>
        <?php else : ?>
          <!-- Placeholder if no partners added -->
          <div class="grid grid-cols-2 gap-4 sm:grid-cols-3 lg:grid-cols-6 opacity-30">
            <?php for($i=0; $i<6; $i++): ?>
              <div class="flex h-14 items-center justify-center rounded bg-slate-50 text-[12px] font-semibold uppercase tracking-wide text-slate-400 sm:h-16">Logo</div>
            <?php endfor; ?>
          </div>
        <?php endif; ?>
      </div>
    </div>
    </div>
  </div>
</section>

  <!-- Expertise -->
  <section class="relative overflow-hidden bg-white py-10 sm:py-14 lg:py-16">
    <div class="pointer-events-none absolute inset-0">
      <div class="absolute -left-40 top-20 h-[2px] w-[130%] rotate-[-45deg] bg-gradient-to-r from-transparent via-slate-200/40 to-transparent"></div>
      <div class="absolute right-0 top-[55%] h-[2px] w-[55%] bg-slate-200/40"></div>
    </div>

    <div class="relative mx-auto w-full max-w-[1200px] px-4 sm:px-6 lg:px-0">
      <div class="grid gap-10 lg:grid-cols-[minmax(0,1.2fr)_minmax(0,1.1fr)] lg:items-start">
        <div>
          <h2 class="mb-4 text-[26px] font-extrabold leading-tight tracking-[-0.02em] text-slate-900 sm:text-[30px]">
            <?php the_field('sec4_heading') ?>
          </h2>
          <div class="space-y-3 text-[15px] leading-relaxed text-slate-600 sm:text-[16px]">
            <p>
              <?php the_field('sec4_description1') ?>
            </p>
            <p>
              <?php the_field('sec4_description2') ?>
            </p>
          </div>
        </div>

        <div class="grid gap-4 sm:grid-cols-2">
          <div class="rounded-sm border border-slate-200 bg-white px-5 py-4 shadow-[0_4px_18px_rgba(15,23,42,0.12)]">
            <h3 class="mb-2 text-[17px] font-bold leading-snug text-slate-900">
              Стеллажные системы
            </h3>
            <p class="text-[14px] leading-snug text-slate-600">
              Решения для эффективного хранения.
            </p>
          </div>

          <div class="rounded-sm border border-slate-200 bg-white px-5 py-4 shadow-[0_4px_18px_rgba(15,23,42,0.12)]">
            <h3 class="mb-2 text-[17px] font-bold leading-snug text-slate-900">
              Автоматизированные системы
            </h3>
            <p class="text-[14px] leading-snug text-slate-600">
              Системы автоматизации складских операций.
            </p>
          </div>

          <div class="rounded-sm border border-slate-200 bg-white px-5 py-4 shadow-[0_4px_18px_rgba(15,23,42,0.12)]">
            <h3 class="mb-2 text-[17px] font-bold leading-snug text-slate-900">
              Конвейеры и<br class="hidden sm:block" />монолинии
            </h3>
            <p class="text-[14px] leading-snug text-slate-600">
              Решения для транспортировки и сортировки грузов.
            </p>
          </div>

          <div class="rounded-sm border border-slate-200 bg-white px-5 py-4 shadow-[0_4px_18px_rgba(15,23,42,0.12)]">
            <h3 class="mb-2 text-[17px] font-bold leading-snug text-slate-900">
              Производственная мебель и сервис
            </h3>
            <p class="text-[14px] leading-snug text-slate-600">
              Организация рабочих мест и техническая поддержка.
            </p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Success criteria -->
  <section class="relative overflow-hidden bg-[#f7f7fb] py-10 sm:py-14 lg:py-16">
    <div class="pointer-events-none absolute inset-0">
      <div class="absolute -left-40 top-24 h-[2px] w-[130%] rotate-[-45deg] bg-gradient-to-r from-transparent via-slate-200/40 to-transparent"></div>
      <div class="absolute right-0 top-[65%] h-[2px] w-[55%] bg-slate-200/40"></div>
    </div>

    <div class="relative mx-auto w-full max-w-[1200px] px-4 sm:px-6 lg:px-0">
      <h2 class="mb-3 text-[26px] font-extrabold leading-tight tracking-[-0.02em] text-slate-900 sm:text-[30px]">
        <?php the_field('sec5_heading') ?>
      </h2>
      <p class="mb-8 max-w-[652px] text-[15px] leading-relaxed text-slate-600 sm:text-[16px]">
        <?php the_field('sec5_description') ?>
      </p>

      <div class="overflow-hidden rounded-sm border border-slate-200 bg-white shadow-[0_8px_26px_rgba(15,23,42,0.14)]">
        <div class="grid gap-px bg-slate-100 sm:grid-cols-3 lg:grid-cols-5">
          <div class="flex flex-col items-center gap-3 bg-white px-5 py-6 text-center">
              <img class="h-[68px] w-[68px]"
              src="<?php the_field('icon1'); ?>"
              alt="icon" />
            <div class="text-base font-normal leading-[1.2] text-slate-800">
              <?php the_field('title1') ?>
            </div>
          </div>

					<div class="flex flex-col items-center gap-3 bg-white px-3 py-6 text-center">
              <img class="h-[68px] w-[68px]"
              src="<?php the_field('icon2'); ?>"
              alt="icon" />
            <div class="text-base font-normal leading-[1.2] text-slate-800">
              <?php the_field('title2') ?>
            </div>
          </div>

					<div class="flex flex-col items-center gap-3 bg-white px-5 py-6 text-center">
              <img class="h-[68px] w-[68px]"
              src="<?php the_field('icon3'); ?>"
              alt="icon" />
            <div class="text-base font-normal leading-[1.2] text-slate-800">
              <?php the_field('title3') ?>
            </div>
          </div>

					<div class="flex flex-col items-center gap-3 bg-white px-5 py-6 text-center">
              <img class="h-[68px] w-[68px]"
              src="<?php the_field('icon4'); ?>"
              alt="icon" />
            <div class="text-base font-normal leading-[1.2] text-slate-800">
              <?php the_field('title4') ?>
            </div>
          </div>

					<div class="flex flex-col items-center gap-3 bg-white px-5 py-6 text-center">
              <img class="h-[68px] w-[68px]"
              src="<?php the_field('icon5'); ?>"
              alt="icon" />
            <div class="text-base font-normal leading-[1.2] text-slate-800">
              <?php the_field('title5') ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Result for business -->
  <section class="relative overflow-hidden bg-white py-10 sm:py-14 lg:py-16">
    <div class="pointer-events-none absolute inset-0">
      <div class="absolute -left-40 top-24 h-[2px] w-[130%] rotate-[-45deg] bg-gradient-to-r from-transparent via-slate-200/40 to-transparent"></div>
      <div class="absolute right-0 top-[55%] h-[2px] w-[55%] bg-slate-200/40"></div>
    </div>

    <div class="relative mx-auto w-full max-w-[1200px] px-4 sm:px-6 lg:px-0">
      <div class="grid gap-8 lg:grid-cols-[minmax(0,1.1fr)_minmax(0,1fr)] lg:items-center">
        <img src="<?php the_field('sec6_img')?>" alt="img">

        <div>
          <h2 class="mb-4 text-[26px] font-extrabold leading-tight tracking-[-0.02em] text-slate-900 sm:text-[30px]">
            <?php the_field('sec6_heading') ?>
          </h2>
          <div class="space-y-3 text-[15px] leading-relaxed text-slate-600 sm:text-[16px]">
            <p>
              <?php the_field('sec6_description') ?>
            </p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Contact form section -->
<?php get_template_part( 'template-parts/contact-form', 'form' ); ?>
</main>

<?php
get_footer();
