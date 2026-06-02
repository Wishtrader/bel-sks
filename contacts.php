<?php
/**
 * Template Name: Contacts
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
        <a href="#" class="transition-colors hover:text-slate-700">Главная</a>
        <span class="mx-2 text-slate-400">/</span>
        <span class="text-slate-600">Контакты</span>
      </nav>

      <h1 class="mb-4 text-[44px] font-extrabold leading-[1.4] text-slate-900 sm:mb-5 sm:text-[56px]">
        Контакты
      </h1>
    </div>
  </section>

  <!-- Contacts section -->
    <section class="relative overflow-hidden">
        <div class="absolute top-0 right-0 w-24 h-24 bg-gray-100 transform rotate-45 translate-x-8 -translate-y-8 opacity-60 hidden lg:block"></div>
        <div class="absolute bottom-0 right-32 w-40 h-40 bg-gray-50 transform rotate-45 opacity-40 hidden lg:block"></div>

        <div class="relative max-w-[1200px] mx-auto px-4 sm:px-6 lg:px-8 py-16 sm:py-20">

            <!-- Info cards -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-10">
                <!-- Address -->
                <div class="flex items-start">
                    <div class="flex-shrink-0 w-10 h-10 border border-gray-300 rounded flex items-center justify-center mr-3">
                        <svg class="w-5 h-5 text-blue-700" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M17.657 16.657L13.414 20.9a2 2 0 01-2.828 0l-4.243-4.243a8 8 0 1111.314 0z"/>
                            <circle cx="12" cy="11" r="3" stroke-width="2"/>
                        </svg>
                    </div>
                    <div>
                        <h3 class="font-semibold text-gray-900 mb-2">Адрес офиса</h3>
                        <p class="text-gray-700 text-sm leading-relaxed">
                            220073, Беларусь, г. Минск,<br>
                            ул. Бирюзова, 4/5, офис 4004А
                        </p>
                    </div>
                </div>

                <!-- Working hours -->
                <div class="flex items-start">
                    <div class="flex-shrink-0 w-10 h-10 border border-gray-300 rounded flex items-center justify-center mr-3">
                        <svg class="w-5 h-5 text-blue-700" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                            <circle cx="12" cy="12" r="9"/>
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 7v5l3 3"/>
                        </svg>
                    </div>
                    <div>
                        <h3 class="font-semibold text-gray-900 mb-2">Время работы</h3>
                        <p class="text-gray-700 text-sm leading-relaxed">
                            Пн-Пт: 9:00 – 18:00<br>
                            Сб-Вс: Выходной
                        </p>
                    </div>
                </div>

                <!-- Phones -->
                <div class="flex items-start">
                    <div class="flex-shrink-0 w-10 h-10 border border-gray-300 rounded flex items-center justify-center mr-3">
                        <svg class="w-5 h-5 text-blue-700" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 5a2 2 0 012-2h3l2 5-2 1a11 11 0 006 6l1-2 5 2v3a2 2 0 01-2 2A16 16 0 013 5z"/>
                        </svg>
                    </div>
                    <div>
                        <h3 class="font-semibold text-gray-900 mb-2">Телефоны</h3>
                        <p class="text-gray-700 text-sm leading-relaxed">
                            <a href="tel:+375172381717" class="hover:text-blue-700">+375 17 238 17 17</a><br>
                            <a href="tel:+375173748682" class="hover:text-blue-700">+375 17 374 86 82</a><br>
                            <a href="tel:+375447797030" class="hover:text-blue-700">+375 44 779 70 30</a>
                        </p>
                    </div>
                </div>

                <!-- Email -->
                <div class="flex items-start">
                    <div class="flex-shrink-0 w-10 h-10 border border-gray-300 rounded flex items-center justify-center mr-3">
                        <svg class="w-5 h-5 text-blue-700" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                            <rect x="3" y="5" width="18" height="14" rx="2"/>
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 7l9 6 9-6"/>
                        </svg>
                    </div>
                    <div>
                        <h3 class="font-semibold text-gray-900 mb-2">Электронная почта</h3>
                        <p class="text-gray-700 text-sm leading-relaxed">
                            <a href="mailto:info@belsks.by" class="hover:text-blue-700">info@belsks.by</a>
                        </p>
                    </div>
                </div>
            </div>

            <!-- Social links -->
            <div class="flex items-center mb-8">
                <p class="text-gray-700 font-semibold mr-4">Мы в соц сетях</p>
                <div class="flex gap-3">
                    <a href="#" aria-label="Facebook" class="w-8 h-8 bg-gray-800 hover:bg-blue-700 flex items-center justify-center rounded transition-colors">
                        <svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 24 24"><path d="M22 12a10 10 0 10-11.6 9.9v-7h-2v-3h2V9.3c0-2 1.2-3.1 3-3.1.9 0 1.8.2 1.8.2v2h-1c-1 0-1.3.6-1.3 1.3V12h2.3l-.4 3h-2v7A10 10 0 0022 12z"/></svg>
                    </a>
                    <a href="#" aria-label="VK" class="w-8 h-8 bg-gray-800 hover:bg-blue-700 flex items-center justify-center rounded transition-colors">
                        <svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 24 24"><path d="M14.8 16.2c-4.8 0-7.6-3.3-7.8-8.5h2.4c.1 3.5 1.9 5.3 3.5 5.6V7.7h2.3v3.8c1.5-.2 3.3-2 3.9-3.8h2.3c-.5 2.7-2.5 4.2-3.8 4.9 1.3.7 3 2.4 3.7 4.8h-2.5c-.6-1.9-2-3.2-3.8-3.4v3.4h-.3z"/></svg>
                    </a>
                    <a href="#" aria-label="Telegram" class="w-8 h-8 bg-gray-800 hover:bg-blue-500 flex items-center justify-center rounded transition-colors">
                        <svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 24 24"><path d="M9.78 15.27l-.39 4.55c.56 0 .8-.24 1.1-.52l2.62-2.5 5.44 3.98c1 .55 1.71.26 1.97-.92L22 4.18l.01-.01c.27-1.22-.44-1.7-1.29-1.41L2.2 10.37c-1.21.47-1.19 1.15-.21 1.46l4.96 1.54 11.53-7.26c.54-.35 1.04-.15.63.22"/></svg>
                    </a>
                </div>
            </div>

            
            <div class="border border-gray-200 shadow-sm">
                <iframe src="https://yandex.by/map-widget/v1/?lang=ru_RU&amp;ll=27.5766%2C53.9082&amp;z=16&amp;mode=search&amp;text=%D0%A0%D0%B5%D1%81%D0%BF%D1%83%D0%B1%D0%BB%D0%B8%D0%BA%D0%B0%20%D0%91%D0%B5%D0%BB%D0%B0%D1%80%D1%83%D1%81%D1%8C%2C%20%D0%B3%D0%BE%D1%80%D0%BE%D0%B4%D0%9C%D0%B8%D0%BD%D1%81%D0%BA%2C%20%D1%83%D0%BB%D0%B8%D1%86%D0%B0%20%D0%91%D0%B8%D1%80%D1%8E%D0%B7%D0%BE%D0%B2%D0%B0%D1%8F%2C%20%D0%B4%D0%BE%D0%BC%204%2F5&amp;pt=27.5766%2C53.9082%2Cpm2rdl" 
                        class="w-full h-[400px] sm:h-[450px]" 
                        allowfullscreen 
                        style="border:0;">
                </iframe>
            </div>
        </div>
    </section>
		<?php get_template_part( 'template-parts/contact-form', 'form' ); ?>
</main>

<?php
get_footer();
