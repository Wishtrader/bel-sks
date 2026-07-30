<?php
/**
 * Template Name: Stellazh Template
 * Template Post Type: page
 *
 * @package BelSKS
 */

get_header();
?>

<main id="primary" class="site-main bg-[#f5f5f9] dark:bg-gray-900 text-gray-900 dark:text-gray-100">

  <!-- Hero Section -->
  <section class="bg-[#f5f5f9] dark:bg-[#111827] py-10 sm:py-14 lg:py-16 relative overflow-hidden">
    <!-- Diagonal background lines -->
    <div class="absolute inset-0 pointer-events-none overflow-hidden">
      <div class="absolute top-0 left-[40%] w-px h-full bg-gradient-to-b from-transparent via-gray-200 to-transparent opacity-40 -skew-x-12"></div>
      <div class="absolute top-0 left-[60%] w-px h-full bg-gradient-to-b from-transparent via-gray-200 to-transparent opacity-40 -skew-x-12"></div>
    </div>

    <div class="relative mx-auto w-full max-w-[1200px] px-4 sm:px-6 lg:px-0 lg:mt-10">
      <!-- Breadcrumbs -->
      <nav class="mb-6 text-[14px] leading-none text-slate-500 sm:mb-8">
        <a href="/" class="transition-colors hover:text-slate-700">Главная</a>
        <span class="mx-1 text-slate-400">/</span>
        <a href="#" class="transition-colors hover:text-slate-700">Каталог</a>
        <span class="mx-1 text-slate-400">/</span>
        <a href="#" class="transition-colors hover:text-slate-700">Стеллажные системы</a>
        <span class="mx-1 text-slate-400">/</span>
        <a href="#" class="transition-colors hover:text-slate-700">Паллетные стеллажи</a>
        <span class="mx-1 text-slate-400">/</span>
        <span class="text-[#294F78]">Фронтальные стеллажи</span>
      </nav>

      <!-- Title -->
      <h1 class="mb-8 text-[38px] font-extrabold leading-none tracking-[-0.03em] text-slate-900 sm:mb-10 sm:text-[56px]">
        Фронтальные стеллажи
      </h1>

      <!-- Description -->
      <p class="text-gray-600 leading-relaxed mb-10 max-w-[800px]">
        Одна из самых распространенных систем. Широкая сфера применения, возможность складирования различного груза, обеспечение прямого доступа.
      </p>
    </div>
  </section>

  <!-- О системе -->
  <section class="bg-white dark:bg-gray-900 py-12 sm:py-16 lg:py-20">
    <div class="mx-auto w-full max-w-[1200px] px-4 sm:px-6 lg:px-0">
      <h2 class="mb-8 text-[32px] sm:text-[40px] font-bold leading-tight text-[#222222] dark:text-white sm:mb-12">
        О системе
      </h2>

      <div class="grid grid-cols-1 lg:grid-cols-2 gap-10 lg:gap-16 items-start">
        <!-- Text -->
        <div>
          <p class="text-gray-600 dark:text-gray-300 text-base leading-relaxed mb-4">
            Металлические фронтальные стеллажи стали одним из самых востребованных вариантов для хранения грузов. Многофункциональность и широкая сфера применения, возможность складирования объемного груза, обеспечение свободного и моментального доступа к ним – вот далеко не все достоинства данного складского оборудования.
          </p>
          <p class="text-gray-600 dark:text-gray-300 text-base leading-relaxed">
            Заказать фронтальный стеллаж – значит создать все условия для эффективного распределения многообразных типов товаров сразу на нескольких ярусах. При этом грузы располагаются на паллетах.
          </p>
        </div>

        <!-- Feature list -->
        <div class="bg-[#f8fafc] dark:bg-gray-800 rounded-lg p-6 sm:p-8">
          <ul class="space-y-5">
            <li class="flex items-center gap-4">
              <div class="w-10 h-10 bg-[#e8eef6] dark:bg-gray-700 rounded-lg flex items-center justify-center flex-shrink-0">
                <i data-lucide="layout-grid" class="w-5 h-5 text-[#294F78] dark:text-blue-400"></i>
              </div>
              <span class="text-slate-800 dark:text-gray-200 font-medium text-base">Широкая сфера применения</span>
            </li>
            <li class="flex items-center gap-4">
              <div class="w-10 h-10 bg-[#e8eef6] dark:bg-gray-700 rounded-lg flex items-center justify-center flex-shrink-0">
                <i data-lucide="unlock" class="w-5 h-5 text-[#294F78] dark:text-blue-400"></i>
              </div>
              <span class="text-slate-800 dark:text-gray-200 font-medium text-base">Прямой доступ к грузам</span>
            </li>
            <li class="flex items-center gap-4">
              <div class="w-10 h-10 bg-[#e8eef6] dark:bg-gray-700 rounded-lg flex items-center justify-center flex-shrink-0">
                <i data-lucide="box" class="w-5 h-5 text-[#294F78] dark:text-blue-400"></i>
              </div>
              <span class="text-slate-800 dark:text-gray-200 font-medium text-base">Хранение на паллетах</span>
            </li>
            <li class="flex items-center gap-4">
              <div class="w-10 h-10 bg-[#e8eef6] dark:bg-gray-700 rounded-lg flex items-center justify-center flex-shrink-0">
                <i data-lucide="layers" class="w-5 h-5 text-[#294F78] dark:text-blue-400"></i>
              </div>
              <span class="text-slate-800 dark:text-gray-200 font-medium text-base">Многоярусное размещение</span>
            </li>
          </ul>
        </div>
      </div>

      <!-- CTA Button -->
      <div class="mt-10 sm:mt-12">
        <a href="#contact-form" class="inline-flex items-center gap-2 bg-[#294F78] text-white px-8 py-3 rounded-[4px] font-normal hover:bg-[#162d4a] transition-colors">
          Получить консультацию
          <i data-lucide="arrow-right" class="w-4 h-4"></i>
        </a>
      </div>
    </div>
  </section>

  <!-- Особенности конструкции и классификация -->
  <section class="bg-[#f5f5f9] dark:bg-[#111827] py-12 sm:py-16 lg:py-20">
    <div class="mx-auto w-full max-w-[1200px] px-4 sm:px-6 lg:px-0">
      <h2 class="mb-6 text-[28px] sm:text-[36px] font-bold leading-tight text-[#222222] dark:text-white sm:mb-8">
        Особенности конструкции и классификация
      </h2>
      <p class="text-gray-600 dark:text-gray-300 text-base leading-relaxed mb-10 max-w-[1000px]">
        Системы фронтального размещения грузов – это металлические конструкции, состоящие из нескольких частей и элементов. В качестве основания выступает рама из вертикальных подпорок, которая соединяется по горизонтали и диагонали. Конструкция устанавливается на пол с помощью подпятников и крепится к поверхности анкерными болтами.
      </p>

      <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <!-- Широкопроходные -->
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm hover:shadow-md transition-shadow">
          <div class="h-[280px] sm:h-[320px] bg-gray-200 dark:bg-gray-700 overflow-hidden">
            <img src="<?php echo get_template_directory_uri(); ?>/img/stellazh-placeholder-1.jpg" alt="Широкопроходные стеллажи" class="w-full h-full object-cover">
          </div>
          <div class="p-6">
            <h3 class="text-xl font-bold text-[#222222] dark:text-white mb-3">Широкопроходные</h3>
            <p class="text-gray-600 dark:text-gray-300 text-base leading-relaxed">
              Данное оборудование обеспечивает удобное перемещение вдоль секций с шириной коридора до 3,5 метра. Благодаря этому для погрузки и разгрузки товара можно использовать спецтехнику. Единственным недостатком стеллажей такого типа видится неרציональное использование свободного пространства: 40% от полезной площади помещения.
            </p>
          </div>
        </div>

        <!-- Узкопроходные -->
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm hover:shadow-md transition-shadow">
          <div class="h-[280px] sm:h-[320px] bg-gray-200 dark:bg-gray-700 overflow-hidden">
            <img src="<?php echo get_template_directory_uri(); ?>/img/stellazh-placeholder-2.jpg" alt="Узкопроходные стеллажи" class="w-full h-full object-cover">
          </div>
          <div class="p-6">
            <h3 class="text-xl font-bold text-[#222222] dark:text-white mb-3">Узкопроходные</h3>
            <p class="text-gray-600 dark:text-gray-300 text-base leading-relaxed">
              Узкопроходные стеллажи имеют ширину прохода не более 2 метров. Площадь складского помещения используется эффективно, но могут возникнуть сложности с подъездом спецтехники. Данная проблема решается за счет приобретения узкоспециализированных моделей, комфортно работающих даже в условиях ограниченного пространства.
            </p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Преимущества стеллажей -->
  <section class="bg-white dark:bg-gray-900 py-12 sm:py-16 lg:py-20">
    <div class="mx-auto w-full max-w-[1200px] px-4 sm:px-6 lg:px-0">
      <h2 class="mb-10 text-[28px] sm:text-[36px] font-bold leading-tight text-[#222222] dark:text-white sm:mb-12">
        Преимущества стеллажей
      </h2>

      <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-5 gap-6">
        <!-- 1 -->
        <div class="bg-[#f8fafc] dark:bg-gray-800 p-5 rounded-lg flex flex-col items-center text-center">
          <div class="w-14 h-14 bg-[#e8eef6] dark:bg-gray-700 rounded-xl flex items-center justify-center mb-4">
            <i data-lucide="package-open" class="w-7 h-7 text-[#294F78] dark:text-blue-400"></i>
          </div>
          <p class="text-sm sm:text-base font-medium text-slate-800 dark:text-gray-200 leading-snug">Свободный доступ к грузам</p>
        </div>
        <!-- 2 -->
        <div class="bg-[#f8fafc] dark:bg-gray-800 p-5 rounded-lg flex flex-col items-center text-center">
          <div class="w-14 h-14 bg-[#e8eef6] dark:bg-gray-700 rounded-xl flex items-center justify-center mb-4">
            <i data-lucide="warehouse" class="w-7 h-7 text-[#294F78] dark:text-blue-400"></i>
          </div>
          <p class="text-sm sm:text-base font-medium text-slate-800 dark:text-gray-200 leading-snug">Универсальность для различных складских помещений</p>
        </div>
        <!-- 3 -->
        <div class="bg-[#f8fafc] dark:bg-gray-800 p-5 rounded-lg flex flex-col items-center text-center">
          <div class="w-14 h-14 bg-[#e8eef6] dark:bg-gray-700 rounded-xl flex items-center justify-center mb-4">
            <i data-lucide="banknote" class="w-7 h-7 text-[#294F78] dark:text-blue-400"></i>
          </div>
          <p class="text-sm sm:text-base font-medium text-slate-800 dark:text-gray-200 leading-snug">Сравнительно небольшая стоимость</p>
        </div>
        <!-- 4 -->
        <div class="bg-[#f8fafc] dark:bg-gray-800 p-5 rounded-lg flex flex-col items-center text-center">
          <div class="w-14 h-14 bg-[#e8eef6] dark:bg-gray-700 rounded-xl flex items-center justify-center mb-4">
            <i data-lucide="settings" class="w-7 h-7 text-[#294F78] dark:text-blue-400"></i>
          </div>
          <p class="text-sm sm:text-base font-medium text-slate-800 dark:text-gray-200 leading-snug">Легкость монтажа и эксплуатации</p>
        </div>
        <!-- 5 -->
        <div class="bg-[#f8fafc] dark:bg-gray-800 p-5 rounded-lg flex flex-col items-center text-center">
          <div class="w-14 h-14 bg-[#e8eef6] dark:bg-gray-700 rounded-xl flex items-center justify-center mb-4">
            <i data-lucide="clipboard-check" class="w-7 h-7 text-[#294F78] dark:text-blue-400"></i>
          </div>
          <p class="text-sm sm:text-base font-medium text-slate-800 dark:text-gray-200 leading-snug">Простота проверки товарных запасов</p>
        </div>
      </div>
    </div>
  </section>

  <!-- Преимущества покупки фронтальных стеллажей у нас -->
  <section class="bg-[#f5f5f9] dark:bg-[#111827] py-12 sm:py-16 lg:py-20">
    <div class="mx-auto w-full max-w-[1200px] px-4 sm:px-6 lg:px-0">
      <h2 class="mb-6 text-[28px] sm:text-[36px] font-bold leading-tight text-[#222222] dark:text-white sm:mb-8">
        Преимущества покупки фронтальных стеллажей у нас
      </h2>
      <p class="text-gray-600 dark:text-gray-300 text-base leading-relaxed mb-10 max-w-[1000px]">
        Если вас заинтересовала возможность купить фронтальный стеллаж в Минске, внимательно ознакомьтесь с ассортиментом продукции от группы компаний «БелСКС». Мы работаем с самыми известными производителями складского оборудования, гарантируем качество и длительный срок эксплуатации. Наши специалисты возьмут на себя монтаж конструкций, а также гарантийное и сервисное обслуживание на выгодных условиях!
      </p>

      <!-- Image Gallery -->
      <div class="grid grid-cols-2 sm:grid-cols-3 gap-3 sm:gap-4">
        <div class="col-span-2 row-span-2 h-[250px] sm:h-[400px] bg-gray-200 dark:bg-gray-700 overflow-hidden">
          <img src="<?php echo get_template_directory_uri(); ?>/img/stellazh-gallery-1.jpg" alt="Стеллажи" class="w-full h-full object-cover">
        </div>
        <div class="h-[120px] sm:h-[194px] bg-gray-200 dark:bg-gray-700 overflow-hidden">
          <img src="<?php echo get_template_directory_uri(); ?>/img/stellazh-gallery-2.jpg" alt="Стеллажи" class="w-full h-full object-cover">
        </div>
        <div class="h-[120px] sm:h-[194px] bg-gray-200 dark:bg-gray-700 overflow-hidden">
          <img src="<?php echo get_template_directory_uri(); ?>/img/stellazh-gallery-3.jpg" alt="Стеллажи" class="w-full h-full object-cover">
        </div>
        <div class="h-[120px] sm:h-[194px] bg-gray-200 dark:bg-gray-700 overflow-hidden">
          <img src="<?php echo get_template_directory_uri(); ?>/img/stellazh-gallery-4.jpg" alt="Стеллажи" class="w-full h-full object-cover">
        </div>
        <div class="h-[120px] sm:h-[194px] bg-gray-200 dark:bg-gray-700 overflow-hidden">
          <img src="<?php echo get_template_directory_uri(); ?>/img/stellazh-gallery-5.jpg" alt="Стеллажи" class="w-full h-full object-cover">
        </div>
      </div>
    </div>
  </section>

  <!-- Contact form section -->
  <?php get_template_part('template-parts/contact-form', 'form'); ?>

</main>

<?php
get_footer();
