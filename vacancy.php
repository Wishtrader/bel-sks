<?php
/**
 * Template Name: Vacancy
 * Template Post Type: page
 *
 * @package BelSKS
 */

get_header();

// ── Hero fields ──
$hero_title = get_field( 'vacancy_hero_title' ) ?: 'Вакансии';
$hero_desc  = get_field( 'vacancy_hero_desc' ) ?: 'В связи с развитием компании мы заинтересованы в привлечении квалифицированных специалистов, готовых становиться частью команды и расти вместе с нами. Актуальные вакансии представлены на этой странице.';

// ── Vacancies repeater ──
$vacancies_raw = get_field( 'vacancy_items' );

$fallback_vacancies = array(
	array(
		'title'           => 'Руководитель проекта',
		'experience'      => 'Требуемый опыт работы: от 3 лет.',
		'responsibilities' => "Активное участие в разработках технически сложных проектов в области внутрискладской и внутрипроизводственной логистики;\nПоиск новых клиентов и налаживание постоянной работы с ними, ведение уже существующей клиентской базы;\nГрамотное консультирование по вопросам применения продукции, составление технических спецификаций;\nВыезд на встречи с потенциальными клиентами;\nПроведение коммерческих переговоров, презентация для Заказчиков;\nВедение и согласование проектов Заказчиков;\nСогласование и сопровождение договорной документации.",
		'requirements'    => "Высшее образование, инженерного профиля - желательно;\nНацеленность на эффективное решение задач Заказчиков;\nУспешный опыт продаж и привлечения новых Заказчиков;\nУверенный пользователь ПК;\nНацеленность на результат, динамичный стиль работы.",
		'conditions'      => "Официальное трудоустройство согласно законодательству Беларуси;\nДостойный уровень вознаграждения;\nРабота в молодом (но опытном) и активном коллективе;\nВозможность постоянного повышения квалификации;\nОборудованное рабочее место;\nКомпенсации расходов;\nОфис в центре города.",
	),
	array(
		'title'           => 'Руководитель проекта',
		'experience'      => 'Требуемый опыт работы: от 3 лет.',
		'responsibilities' => "Активное участие в разработках технически сложных проектов в области внутрискладской и внутрипроизводственной логистики;\nПоиск новых клиентов и налаживание постоянной работы с ними, ведение уже существующей клиентской базы;\nГрамотное консультирование по вопросам применения продукции, составление технических спецификаций;\nВыезд на встречи с потенциальными клиентами;\nПроведение коммерческих переговоров, презентация для Заказчиков;\nВедение и согласование проектов Заказчиков;\nСогласование и сопровождение договорной документации.",
		'requirements'    => "Высшее образование, инженерного профиля - желательно;\nНацеленность на эффективное решение задач Заказчиков;\nУспешный опыт продаж и привлечения новых Заказчиков;\nУверенный пользователь ПК;\nНацеленность на результат, динамичный стиль работы.",
		'conditions'      => "Официальное трудоустройство согласно законодательству Беларуси;\nДостойный уровень вознаграждения;\nРабота в молодом (но опытном) и активном коллективе;\nВозможность постоянного повышения квалификации;\nОборудованное рабочее место;\nКомпенсации расходов;\nОфис в центре города.",
	),
);

if ( ! empty( $vacancies_raw ) && is_array( $vacancies_raw ) ) {
	$vacancies = array_map( function ( $item ) {
		return array(
			'title'           => $item['title'] ?? '',
			'experience'      => $item['experience'] ?? '',
			'responsibilities' => $item['responsibilities'] ?? '',
			'requirements'    => $item['requirements'] ?? '',
			'conditions'      => $item['conditions'] ?? '',
		);
	}, $vacancies_raw );
} else {
	$vacancies = $fallback_vacancies;
}

// ── CTA fields ──
$cta_title = get_field( 'vacancy_cta_title' ) ?: 'Не нашли подходящую вакансию?';
$cta_email = get_field( 'vacancy_cta_email' ) ?: 'hr@belsks.by';
$cta_desc  = get_field( 'vacancy_cta_desc' ) ?: 'Отправьте ваше резюме на почту — мы рассмотрим его и свяжемся с вами при появлении подходящей позиции.';
$cta_bg    = get_field( 'vacancy_cta_bg' );
if ( empty( $cta_bg ) ) {
	$cta_bg = content_url( '/uploads/2026/06/bg-6.png' );
}
?>

<main class="bg-[#f7f7fb]">

  <!-- Hero / Intro -->
  <section class="relative overflow-hidden py-10 sm:py-14 lg:py-16">
    <div class="pointer-events-none absolute inset-0">
      <div class="absolute -left-40 top-20 h-[2px] w-[130%] rotate-[-45deg] bg-gradient-to-r from-transparent via-slate-200/40 to-transparent"></div>
      <div class="absolute left-[38%] top-0 h-[2px] w-[70%] rotate-[-45deg] bg-gradient-to-r from-transparent via-slate-200/40 to-transparent"></div>
      <div class="absolute right-0 top-[18%] h-px w-[55%] bg-slate-200/40"></div>
    </div>

    <div class="relative mx-auto w-full max-w-[1200px] px-4 sm:px-6 lg:px-0 md:mt-12">
      <nav class="mb-6 text-[15px] leading-none text-slate-500 sm:mb-8">
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="transition-colors hover:text-slate-700">Главная</a>
        <span class="mx-2 text-slate-400">/</span>
        <span class="text-slate-600">Вакансии</span>
      </nav>

      <h1 class="mb-4 text-[40px] font-extrabold leading-none text-slate-900 sm:mb-5 sm:text-[54px]">
        <?php echo esc_html( $hero_title ); ?>
      </h1>

      <p class="max-w-[690px] text-[15px] font-light leading-snug text-slate-600 sm:text-[16px]">
        <?php echo esc_html( $hero_desc ); ?>
      </p>
    </div>
  </section>

  <!-- Vacancy List -->
  <section class="bg-[#f7f7fb] pb-16 sm:pb-20">
    <div class="mx-auto w-full max-w-[970px] px-4 sm:px-6 lg:px-0">

      <?php foreach ( $vacancies as $vacancy ) :
        $responsibilities = array_filter( array_map( 'trim', explode( "\n", $vacancy['responsibilities'] ) ) );
        $requirements    = array_filter( array_map( 'trim', explode( "\n", $vacancy['requirements'] ) ) );
        $conditions      = array_filter( array_map( 'trim', explode( "\n", $vacancy['conditions'] ) ) );
      ?>
        <article class="mb-6 overflow-hidden border border-slate-200 bg-white shadow-[0_2px_12px_rgba(15,23,42,0.06)]">
          <header class="border-b border-slate-200 bg-[#eef2f9] px-6 py-4 sm:px-8">
            <h2 class="text-[18px] font-bold text-slate-900 sm:text-[20px]">
              <?php echo esc_html( $vacancy['title'] ); ?>
            </h2>
          </header>

          <div class="px-6 py-6 sm:px-8 sm:py-7">
            <p class="mb-5 text-[15px] font-semibold text-slate-900 sm:text-[16px]">
              <?php echo esc_html( $vacancy['experience'] ); ?>
            </p>

            <?php if ( ! empty( $responsibilities ) ) : ?>
            <div class="mb-5">
              <p class="mb-2 text-[15px] font-semibold text-slate-900 sm:text-[16px]">Обязанности:</p>
              <ul class="list-disc space-y-1 pl-6 text-[15px] leading-snug text-slate-700 marker:text-slate-500">
                <?php foreach ( $responsibilities as $item ) : ?>
                  <li><?php echo esc_html( $item ); ?></li>
                <?php endforeach; ?>
              </ul>
            </div>
            <?php endif; ?>

            <?php if ( ! empty( $requirements ) ) : ?>
            <div class="mb-5">
              <p class="mb-2 text-[15px] font-semibold text-slate-900 sm:text-[16px]">Требования:</p>
              <ul class="list-disc space-y-1 pl-6 text-[15px] leading-snug text-slate-700 marker:text-slate-500">
                <?php foreach ( $requirements as $item ) : ?>
                  <li><?php echo esc_html( $item ); ?></li>
                <?php endforeach; ?>
              </ul>
            </div>
            <?php endif; ?>

            <?php if ( ! empty( $conditions ) ) : ?>
            <div class="mb-2">
              <p class="mb-2 text-[15px] font-semibold text-slate-900 sm:text-[16px]">Условия:</p>
              <ul class="list-disc space-y-1 pl-6 text-[15px] leading-snug text-slate-700 marker:text-slate-500">
                <?php foreach ( $conditions as $item ) : ?>
                  <li><?php echo esc_html( $item ); ?></li>
                <?php endforeach; ?>
              </ul>
            </div>
            <?php endif; ?>

            <div class="mt-6 flex justify-end">
              <a href="mailto:hr@belsks.by" class="inline-flex items-center gap-2 rounded-md bg-[#1e3a5f] px-7 py-3 text-[15px] font-semibold text-white transition-colors hover:bg-[#142d4a]">
                Откликнуться
                <i data-lucide="arrow-right" class="h-4 w-4"></i>
              </a>
            </div>
          </div>
        </article>
      <?php endforeach; ?>

    </div>
  </section>

  <!-- Bottom CTA -->
  <section class="relative overflow-hidden">
    <div class="absolute inset-0">
      <img src="<?php echo esc_url( $cta_bg ); ?>" alt="" class="h-full w-full object-cover opacity-70">
      <div class="absolute inset-0 bg-white/40"></div>
    </div>
    <div class="relative mx-auto flex w-full max-w-[820px] flex-col items-center px-4 py-16 text-center sm:py-20">
      <h2 class="mb-4 text-[28px] font-bold leading-tight text-slate-900 sm:text-[32px]">
        <?php echo esc_html( $cta_title ); ?>
      </h2>
      <p class="max-w-[640px] text-[15px] leading-snug text-slate-800 sm:text-[16px]">
        <?php echo esc_html( $cta_desc ); ?>
        <a href="mailto:<?php echo esc_attr( $cta_email ); ?>" class="font-semibold text-[#1e3a5f] underline-offset-2 hover:underline"><?php echo esc_html( $cta_email ); ?></a>
      </p>
    </div>
  </section>
</main>

<?php
get_footer();
