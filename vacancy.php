<?php
/**
 * Template Name: Vacancy
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

    <div class="relative mx-auto w-full max-w-[1200px] px-4 sm:px-6 lg:px-0 md:mt-12">
      <nav class="mb-6 text-[15px] leading-none text-slate-500 sm:mb-8">
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="transition-colors hover:text-slate-700">Главная</a>
        <span class="mx-2 text-slate-400">/</span>
        <span class="text-slate-600">Вакансии</span>
      </nav>

      <h1 class="mb-4 text-[40px] font-extrabold leading-none text-slate-900 sm:mb-5 sm:text-[54px]">
        Вакансии
      </h1>

      <p class="max-w-[690px] text-[15px] font-light leading-snug text-slate-600 sm:text-[16px]">
        В связи с развитием компании мы заинтересованы в привлечении квалифицированных специалистов, готовых становиться частью команды и расти вместе с нами. Актуальные вакансии представлены на этой странице.
      </p>
    </div>
  </section>

  <!-- Vacancy List -->
  <section class="bg-[#f7f7fb] pb-16 sm:pb-20">
    <div class="mx-auto w-full max-w-[970px] px-4 sm:px-6 lg:px-0">

      <?php
      $vacancies = array(
        array(
          'title'        => 'Руководитель проекта',
          'experience'   => 'Требуемый опыт работы: от 3 лет.',
          'responsibilities' => array(
            'Активное участие в разработках технически сложных проектов в области внутрискладской и внутрипроизводственной логистики;',
            'Поиск новых клиентов и налаживание постоянной работы с ними, ведение уже существующей клиентской базы;',
            'Грамотное консультирование по вопросам применения продукции, составление технических спецификаций;',
            'Выезд на встречи с потенциальными клиентами;',
            'Проведение коммерческих переговоров, презентация для Заказчиков;',
            'Ведение и согласование проектов Заказчиков;',
            'Согласование и сопровождение договорной документации.',
          ),
          'requirements' => array(
            'Высшее образование, инженерного профиля - желательно;',
            'Нацеленность на эффективное решение задач Заказчиков;',
            'Успешный опыт продаж и привлечения новых Заказчиков;',
            'Уверенный пользователь ПК;',
            'Нацеленность на результат, динамичный стиль работы.',
          ),
          'conditions'   => array(
            'Официальное трудоустройство согласно законодательству Беларуси;',
            'Достойный уровень вознаграждения;',
            'Работа в молодом (но опытном) и активном коллективе;',
            'Возможность постоянного повышения квалификации;',
            'Оборудованное рабочее место;',
            'Компенсации расходов;',
            'Офис в центре города.',
          ),
        ),
        array(
          'title'        => 'Руководитель проекта',
          'experience'   => 'Требуемый опыт работы: от 3 лет.',
          'responsibilities' => array(
            'Активное участие в разработках технически сложных проектов в области внутрискладской и внутрипроизводственной логистики;',
            'Поиск новых клиентов и налаживание постоянной работы с ними, ведение уже существующей клиентской базы;',
            'Грамотное консультирование по вопросам применения продукции, составление технических спецификаций;',
            'Выезд на встречи с потенциальными клиентами;',
            'Проведение коммерческих переговоров, презентация для Заказчиков;',
            'Ведение и согласование проектов Заказчиков;',
            'Согласование и сопровождение договорной документации.',
          ),
          'requirements' => array(
            'Высшее образование, инженерного профиля - желательно;',
            'Нацеленность на эффективное решение задач Заказчиков;',
            'Успешный опыт продаж и привлечения новых Заказчиков;',
            'Уверенный пользователь ПК;',
            'Нацеленность на результат, динамичный стиль работы.',
          ),
          'conditions'   => array(
            'Официальное трудоустройство согласно законодательству Беларуси;',
            'Достойный уровень вознаграждения;',
            'Работа в молодом (но опытном) и активном коллективе;',
            'Возможность постоянного повышения квалификации;',
            'Оборудованное рабочее место;',
            'Компенсации расходов;',
            'Офис в центре города.',
          ),
        ),
      );

      foreach ( $vacancies as $vacancy ) :
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

            <div class="mb-5">
              <p class="mb-2 text-[15px] font-semibold text-slate-900 sm:text-[16px]">Обязанности:</p>
              <ul class="list-disc space-y-1 pl-6 text-[15px] leading-snug text-slate-700 marker:text-slate-500">
                <?php foreach ( $vacancy['responsibilities'] as $item ) : ?>
                  <li><?php echo esc_html( $item ); ?></li>
                <?php endforeach; ?>
              </ul>
            </div>

            <div class="mb-5">
              <p class="mb-2 text-[15px] font-semibold text-slate-900 sm:text-[16px]">Требования:</p>
              <ul class="list-disc space-y-1 pl-6 text-[15px] leading-snug text-slate-700 marker:text-slate-500">
                <?php foreach ( $vacancy['requirements'] as $item ) : ?>
                  <li><?php echo esc_html( $item ); ?></li>
                <?php endforeach; ?>
              </ul>
            </div>

            <div class="mb-2">
              <p class="mb-2 text-[15px] font-semibold text-slate-900 sm:text-[16px]">Условия:</p>
              <ul class="list-disc space-y-1 pl-6 text-[15px] leading-snug text-slate-700 marker:text-slate-500">
                <?php foreach ( $vacancy['conditions'] as $item ) : ?>
                  <li><?php echo esc_html( $item ); ?></li>
                <?php endforeach; ?>
              </ul>
            </div>

            <div class="mt-6 flex justify-end">
              <a href="mailto:hr@belsks.by" class="inline-flex items-center gap-2 rounded-md bg-[#1e3a5f] px-7 py-3 text-[15px] font-semibold text-white transition-colors hover:bg-[#142d4a]">
                Откликнуться
                <i data-lucide="arrow-right" class="h-4 w-4"></i>
              </a>
            </div>
          </div>
        </article>
        <?php
      endforeach;
      ?>

    </div>
  </section>

  <!-- Bottom CTA -->
  <section class="relative overflow-hidden bg-slate-900">
    <div class="absolute inset-0">
      <img src="<?php echo esc_url( content_url( '/uploads/2026/06/bg-6.png' ) ); ?>" alt="" class="h-full w-full object-cover opacity-70">
      <div class="absolute inset-0 bg-white/40"></div>
    </div>
    <div class="relative mx-auto flex w-full max-w-[820px] flex-col items-center px-4 py-16 text-center sm:py-20">
      <h2 class="mb-4 text-[28px] font-extrabold leading-tight text-slate-900 sm:text-[36px]">
        Не нашли подходящую вакансию?
      </h2>
      <p class="max-w-[640px] text-[15px] leading-snug text-slate-800 sm:text-[16px]">
        Отправьте ваше резюме на почту
        <a href="mailto:hr@belsks.by" class="font-semibold text-[#1e3a5f] underline-offset-2 hover:underline">hr@belsks.by</a>
        — мы рассмотрим его и свяжемся с вами при появлении подходящей позиции.
      </p>
    </div>
  </section>

  <!-- Contact form section -->
  <?php get_template_part( 'template-parts/contact-form', 'form' ); ?>
</main>

<?php
get_footer();
