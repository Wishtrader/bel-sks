<?php
/**
 * Template Name: Shiping
 * Template Post Type: page
 *
 * @package BelSKS
 */

get_header();
?>

<main class="bg-[#f7f7fb]">
  <section class="relative overflow-hidden py-10 sm:py-14 lg:py-16 md:h-[360px]">
    <div class="pointer-events-none absolute inset-0">
      <div class="absolute -left-40 top-20 h-[2px] w-[130%] rotate-[-45deg] bg-gradient-to-r from-transparent via-slate-200/40 to-transparent"></div>
      <div class="absolute left-[38%] top-0 h-[2px] w-[70%] rotate-[-45deg] bg-gradient-to-r from-transparent via-slate-200/40 to-transparent"></div>
      <div class="absolute right-0 top-[18%] h-px w-[55%] bg-slate-200/40"></div>
    </div>

    <div class="relative mx-auto w-full max-w-[1200px] px-4 sm:px-6 lg:px-0 md:mt-12">
      <nav class="mb-6 text-[15px] leading-none text-slate-500 sm:mb-8">
        <a href="#" class="transition-colors hover:text-slate-700">Главная</a>
        <span class="mx-2 text-slate-400">/</span>
        <span class="text-slate-600">Доставка и оплата</span>
      </nav>

      <h1 class="mb-4 text-[38px] font-extrabold leading-none tracking-[-0.03em] text-slate-900 sm:mb-5 sm:text-[56px]">
        Доставка и оплата
      </h1>

      <p class="max-w-[620px] max-w-[690px] text-[16px] leading-[1.2] text-slate-600">
        Условия поставки и оплаты согласовываются индивидуально в зависимости от типа оборудования, объёма проекта и особенностей объекта.
      </p>
</section>
<!-- Payment and Delivery section -->
    <section class="bg-white w-full relative overflow-hidden">
        <div class="max-w-[1200px] mx-auto px-4 sm:px-6 lg:px-8 py-16 sm:py-20">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                <!-- Payment card -->
                <div class="bg-white shadow-md rounded-sm p-8 sm:p-10 border-t-2 border-gray-100">
                    <h2 class="text-3xl sm:text-4xl font-bold text-gray-900 mb-6">Оплата</h2>
                    <p class="text-gray-700 font-light mb-4 text-base leading-[1.2]">
                        Мы работаем с юридическими лицами и согласовываем условия оплаты индивидуально — с учётом состава проекта, объёма поставки и формата сотрудничества.
                    </p>
                    <ul class="space-y-2 text-gray-700">
                        <li class="flex items-start">
                            <span class="text-gray-900 mr-3 mt-1">•</span>
                            <span>Безналичный расчёт</span>
                        </li>
                        <li class="flex items-start">
                            <span class="text-gray-900 mr-3 mt-1">•</span>
                            <span>Подготовка коммерческого предложения</span>
                        </li>
                        <li class="flex items-start">
                            <span class="text-gray-900 mr-3 mt-1">•</span>
                            <span>Согласование условий с менеджером</span>
                        </li>
                        <li class="flex items-start">
                            <span class="text-gray-900 mr-3 mt-1">•</span>
                            <span>Индивидуальный подход к проектным поставкам</span>
                        </li>
                    </ul>
                </div>

                <!-- Delivery card -->
                <div class="bg-white shadow-md rounded-sm p-8 sm:p-10 border-t-2 border-gray-100">
                    <h2 class="text-3xl sm:text-4xl font-bold text-gray-900 mb-6">Доставка</h2>
                    <p class="text-gray-700 leading-relaxed mb-4">
                        Сроки и формат доставки зависят от состава заказа, наличия оборудования, адреса объекта и этапов реализации проекта. Мы организуем поставку с учётом согласованных сроков и специфики объекта.
                    </p>
                    <ul class="space-y-2 text-gray-700">
                        <li class="flex items-start">
                            <span class="text-gray-900 mr-3 mt-1">•</span>
                            <span>Доставка на объект</span>
                        </li>
                        <li class="flex items-start">
                            <span class="text-gray-900 mr-3 mt-1">•</span>
                            <span>Самовывоз</span>
                        </li>
                        <li class="flex items-start">
                            <span class="text-gray-900 mr-3 mt-1">•</span>
                            <span>Согласование сроков поставки</span>
                        </li>
                        <li class="flex items-start">
                            <span class="text-gray-900 mr-3 mt-1">•</span>
                            <span>Координация логистики с менеджером</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
	<!-- Contact form section -->
<?php get_template_part( 'template-parts/contact-form', 'form' ); ?>
</main>

<?php
get_footer();
