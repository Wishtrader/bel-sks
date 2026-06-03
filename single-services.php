<?php
/**
 * Single Service Template
 *
 * @package BelSKS
 */

get_header();

$service_id         = get_the_ID();
$service_title      = get_the_title();
$service_lead       = get_post_meta( $service_id, 'service_lead', true );
$service_short_desc = get_post_meta( $service_id, 'service_description', true );
$service_steps_raw  = get_post_meta( $service_id, 'service_steps', true );
$service_includes   = get_post_meta( $service_id, 'service_includes_text', true );
$service_includes_img = (int) get_post_meta( $service_id, 'service_includes_image', true );
$service_why_text   = get_post_meta( $service_id, 'service_why_text', true );
$service_why_img    = (int) get_post_meta( $service_id, 'service_why_image', true );
$service_why_items  = get_post_meta( $service_id, 'service_why_items', true );
$service_benefits   = get_post_meta( $service_id, 'service_benefits', true );

// Fallback data so the template is usable for every service post right away.
$default_lead = 'Скорость и безошибочность приёма и отгрузки товаров напрямую влияют на рентабельность и стабильность работы склада. Мы разрабатываем концепции, которые помогают сократить простои, снизить количество ошибок и повысить прозрачность операций.';

$default_steps = array(
  'Анализ текущей ситуации и пожеланий',
  'Постановка целей и задач',
  'Разработка концепции и согласование',
  'Проектирование',
  'Реализация проекта',
  'Обучение сотрудников и рекомендации по эксплуатации',
);

$default_includes = 'Мы разрабатываем современные интралогистические решения в соответствии с задачами, возможностями и особенностями вашего объекта. Концепция становится основой для дальнейшего проектирования и реализации — с учётом логистических потоков, типов товаров, площади склада и целей бизнеса.';

$default_why_text = 'Грамотно разработанная концепция помогает заранее определить эффективную логику хранения, обработки и перемещения товаров. Это снижает риск ошибок на этапе внедрения, упрощает принятие технических решений и позволяет выстроить систему, адаптированную под реальные задачи бизнеса.';

$default_why_items = array(
  'Понятная структура процесса',
  'Снижение ошибок при реализации',
  'Основа для дальнейшего проектирования',
);

$default_benefits = array(
  array( 'icon' => 'timer',         'text' => 'Ускорить основные процессы складской логистики' ),
  array( 'icon' => 'package-open',  'text' => 'Повысить эффективность использования складского пространства' ),
  array( 'icon' => 'shield-check',  'text' => 'Минимизировать количество ошибок' ),
  array( 'icon' => 'user-cog',      'text' => 'Снизить долю ручного труда' ),
  array( 'icon' => 'trending-up',   'text' => 'Увеличить надёжность и прозрачность операций' ),
);

// Allow meta to override defaults. Each meta value can be a JSON array or a newline-separated list.
$decode_list = function( $raw ) {
  if ( ! $raw ) {
    return null;
  }
  $decoded = json_decode( $raw, true );
  if ( is_array( $decoded ) ) {
    return $decoded;
  }
  $lines = array_filter( array_map( 'trim', preg_split( '/\r?\n/', $raw ) ) );
  return $lines ? array_values( $lines ) : null;
};

$steps      = $decode_list( $service_steps_raw ) ?: $default_steps;
$includes   = $service_includes ?: $default_includes;
$why_text   = $service_why_text ?: $default_why_text;
$why_items  = $decode_list( $service_why_items ) ?: $default_why_items;
$benefits   = $decode_list( $service_benefits );
if ( ! $benefits || ! is_array( $benefits ) || ! isset( $benefits[0]['icon'] ) ) {
  $benefits = $default_benefits;
}
$lead = $service_lead ?: $default_lead;
?>

<main class="bg-[#f5f5f9]">

  <!-- Hero / Intro -->
  <section class="relative overflow-hidden bg-[#f7f7fb] py-10 sm:py-14 lg:py-16">
    <div class="pointer-events-none absolute inset-0">
      <div class="absolute -left-40 top-20 h-[2px] w-[130%] rotate-[-45deg] bg-gradient-to-r from-transparent via-slate-200/40 to-transparent"></div>
      <div class="absolute left-[38%] top-0 h-[2px] w-[70%] rotate-[-45deg] bg-gradient-to-r from-transparent via-slate-200/40 to-transparent"></div>
      <div class="absolute right-0 top-[18%] h-px w-[55%] bg-slate-200/40"></div>
    </div>

    <div class="relative mx-auto w-full max-w-[1200px] px-4 sm:px-6 lg:px-0 md:mt-6">
      <nav class="mb-6 text-[15px] leading-none text-slate-500 sm:mb-8">
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="transition-colors hover:text-slate-700">Главная</a>
        <span class="mx-2 text-slate-400">/</span>
        <?php
        $services_page = get_page_by_path( 'uslugi' );
        $services_page = $services_page ? $services_page : get_page_by_title( 'Услуги' );
        $services_url  = $services_page ? get_permalink( $services_page ) : get_post_type_archive_link( 'services' );
        ?>
        <a href="<?php echo esc_url( $services_url ); ?>" class="transition-colors hover:text-slate-700">Услуги</a>
        <span class="mx-2 text-slate-400">/</span>
        <span class="text-slate-600"><?php echo esc_html( $service_title ); ?></span>
      </nav>

      <div class="flex flex-col gap-6 lg:flex-row lg:items-end lg:justify-between">
        <div class="max-w-[700px]">
          <h1 class="mb-4 text-[38px] font-extrabold leading-none tracking-[-0.03em] text-slate-900 sm:mb-5 sm:text-[54px]">
            <?php echo esc_html( $service_title ); ?>
          </h1>
          <p class="text-[15px] leading-snug text-slate-600 sm:text-[17px]">
            <?php echo esc_html( $lead ); ?>
          </p>
        </div>

        <a href="#contact-form" class="inline-flex shrink-0 items-center gap-3 rounded-sm bg-[#3f5d7e] px-6 py-3 text-[14px] font-semibold tracking-wide text-white shadow-[0_10px_26px_rgba(15,23,42,0.35)] transition hover:bg-[#344d6a]">
          <span>Получить консультацию</span>
          <span class="flex h-7 w-7 items-center justify-center rounded bg-white/10 text-base leading-none">→</span>
        </a>
      </div>
    </div>
  </section>

  <!-- How it works (steps) -->
  <section class="bg-white py-12 sm:py-16 lg:py-20">
    <div class="mx-auto w-full max-w-[1200px] px-4 sm:px-6 lg:px-0">
      <h2 class="mb-10 text-[26px] font-extrabold leading-tight text-slate-900 sm:mb-14 sm:text-[32px]">
        Как проходит <?php echo esc_html( mb_strtolower( $service_title ) ); ?>
      </h2>

      <ol class="relative grid grid-cols-2 gap-x-4 gap-y-10 sm:grid-cols-3 lg:grid-cols-6">
        <span class="pointer-events-none absolute left-[8%] right-[8%] top-[26px] hidden h-px bg-slate-200 lg:block"></span>
        <?php foreach ( $steps as $i => $step ) :
          $num = str_pad( (string) ( $i + 1 ), 2, '0', STR_PAD_LEFT );
          ?>
          <li class="relative flex flex-col items-center text-center">
            <span class="relative z-10 mb-4 flex h-[52px] w-[52px] items-center justify-center rounded-full bg-[#1e3a5f] text-[15px] font-semibold text-white shadow-[0_4px_12px_rgba(30,58,95,0.35)]">
              <?php echo esc_html( $num ); ?>
            </span>
            <p class="max-w-[160px] text-[14px] leading-snug text-slate-700 sm:text-[15px]">
              <?php echo esc_html( $step ); ?>
            </p>
          </li>
        <?php endforeach; ?>
      </ol>
    </div>
  </section>

  <!-- What's included -->
  <section class="relative overflow-hidden bg-[#f5f5f9] py-12 sm:py-16 lg:py-20">
    <div class="pointer-events-none absolute inset-0">
      <div class="absolute -left-40 top-32 h-[2px] w-[130%] rotate-[-45deg] bg-gradient-to-r from-transparent via-slate-200/40 to-transparent"></div>
    </div>
    <div class="relative mx-auto w-full max-w-[1200px] px-4 sm:px-6 lg:px-0">
      <div class="grid items-center gap-10 lg:grid-cols-2 lg:gap-16">
        <div>
          <h2 class="mb-5 text-[26px] font-extrabold leading-tight text-slate-900 sm:mb-6 sm:text-[32px]">
            Что включает<br><?php echo esc_html( mb_strtolower( $service_title ) ); ?>
          </h2>
          <p class="text-[15px] leading-relaxed text-slate-600 sm:text-[16px]">
            <?php echo esc_html( $includes ); ?>
          </p>
        </div>

        <div class="overflow-hidden">
          <?php if ( $service_includes_img ) : ?>
            <?php echo wp_get_attachment_image( $service_includes_img, 'large', false, array( 'class' => 'h-auto w-full object-cover' ) ); ?>
          <?php else : ?>
            <div class="aspect-[4/3] w-full bg-[linear-gradient(135deg,#dde3ee_0%,#b9c4d6_45%,#dde3ee_100%)]"></div>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </section>

  <!-- Why it matters -->
  <section class="relative overflow-hidden bg-white py-12 sm:py-16 lg:py-20">
    <div class="pointer-events-none absolute inset-0">
      <div class="absolute -right-40 top-32 h-[2px] w-[130%] rotate-[-45deg] bg-gradient-to-r from-transparent via-slate-200/40 to-transparent"></div>
    </div>
    <div class="relative mx-auto w-full max-w-[1200px] px-4 sm:px-6 lg:px-0">
      <div class="grid items-center gap-10 lg:grid-cols-2 lg:gap-16">
        <div class="order-2 overflow-hidden lg:order-1">
          <?php if ( $service_why_img ) : ?>
            <?php echo wp_get_attachment_image( $service_why_img, 'large', false, array( 'class' => 'h-auto w-full object-cover' ) ); ?>
          <?php else : ?>
            <div class="aspect-[4/3] w-full bg-[linear-gradient(135deg,#dde3ee_0%,#b9c4d6_45%,#dde3ee_100%)]"></div>
          <?php endif; ?>
        </div>

        <div class="order-1 lg:order-2">
          <h2 class="mb-5 text-[26px] font-extrabold leading-tight text-slate-900 sm:mb-6 sm:text-[32px]">
            Почему важно начать с <?php echo esc_html( mb_strtolower( $service_title ) ); ?>
          </h2>
          <p class="mb-6 text-[15px] leading-relaxed text-slate-600 sm:text-[16px]">
            <?php echo esc_html( $why_text ); ?>
          </p>
          <ul class="space-y-3">
            <?php foreach ( $why_items as $item ) : ?>
              <li class="flex items-start gap-3 text-[15px] leading-snug text-slate-800">
                <span class="mt-0.5 inline-flex h-6 w-6 shrink-0 items-center justify-center rounded-md bg-[#1e3a5f]/10 text-[#1e3a5f]">
                  <i data-lucide="check" class="h-4 w-4"></i>
                </span>
                <span><?php echo esc_html( $item ); ?></span>
              </li>
            <?php endforeach; ?>
          </ul>
        </div>
      </div>
    </div>
  </section>

  <!-- Benefits -->
  <section class="relative overflow-hidden bg-[#f5f5f9] py-12 sm:py-16 lg:py-20">
    <div class="pointer-events-none absolute inset-0">
      <div class="absolute -left-40 top-32 h-[2px] w-[130%] rotate-[-45deg] bg-gradient-to-r from-transparent via-slate-200/40 to-transparent"></div>
    </div>
    <div class="relative mx-auto w-full max-w-[1200px] px-4 sm:px-6 lg:px-0">
      <h2 class="mb-8 text-[24px] font-extrabold leading-tight text-slate-900 sm:mb-10 sm:text-[30px]">
        Предложенная концепция позволяет
      </h2>

      <div class="grid grid-cols-2 gap-4 border border-slate-200 bg-white p-4 shadow-[0_2px_12px_rgba(15,23,42,0.05)] sm:gap-6 sm:p-6 md:grid-cols-3 lg:grid-cols-5">
        <?php foreach ( $benefits as $benefit ) :
          $icon = is_array( $benefit ) && isset( $benefit['icon'] ) ? $benefit['icon'] : 'check';
          $text = is_array( $benefit ) && isset( $benefit['text'] ) ? $benefit['text'] : ( is_string( $benefit ) ? $benefit : '' );
          ?>
          <div class="flex flex-col items-center text-center">
            <span class="mb-4 inline-flex h-12 w-12 items-center justify-center text-[#1e3a5f]">
              <i data-lucide="<?php echo esc_attr( $icon ); ?>" class="h-10 w-10"></i>
            </span>
            <p class="text-[13px] leading-snug text-slate-700 sm:text-[14px]">
              <?php echo esc_html( $text ); ?>
            </p>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <!-- Contact form section -->
  <?php get_template_part( 'template-parts/contact-form', 'form' ); ?>
</main>

<?php
get_footer();
