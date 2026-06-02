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

    <div class="relative mx-auto w-full max-w-[1200px] px-4 sm:px-6 lg:px-0 md:mt-6">
      <nav class="mb-6 text-[15px] leading-none text-slate-500 sm:mb-8">
        <a href="#" class="transition-colors hover:text-slate-700">Главная</a>
        <span class="mx-2 text-slate-400">/</span>
        <span class="text-slate-600">Вакансии</span>
      </nav>

      <h1 class="mb-4 text-[44px] font-extrabold leading-[1.4] text-slate-900 sm:mb-5 sm:text-[56px]">
        Вакансии
      </h1>
			<p class="text-slate-600 max-w-[690px] font-light">В связи с развитием компании мы заинтересованы в привлечении квалифицированных специалистов, готовых становиться частью команды и расти вместе с нами. Актуальные вакансии представлены на этой странице.</p>

      
</main>

<?php
get_footer();
