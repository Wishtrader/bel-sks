<?php
/**
 * Template Name: Projects
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
        <span class="text-slate-600">Проекты</span>
      </nav>

      <h1 class="mb-4 text-[38px] font-extrabold leading-none tracking-[-0.03em] text-slate-900 sm:mb-5 sm:text-[56px]">
        Реализованные проекты
      </h1>

      <p class="max-w-[620px] text-[15px] leading-snug text-slate-600 sm:text-[17px]">
        Проекты по оснащению складов, внедрению оборудования и реализации
        логистических решений для бизнеса.
      </p>

      <!-- Tabs + CTA (исправленный вариант) -->
<div class="mt-8 flex flex-wrap items-center justify-between gap-4">
  <!-- Tabs -->
  <div class="flex flex-wrap gap-2">
    <!-- Активный таб -->
    <button
      class="rounded-sm border border-[#3f5d7e] bg-[#3f5d7e] px-5 py-2.5 text-[14px] font-semibold leading-none text-white shadow-[0_2px_6px_rgba(15,23,42,0.18)] transition hover:bg-[#344d6a]"
    >
      Все проекты
    </button>

    <!-- Неактивные табы -->
    <button
      class="rounded-sm border border-slate-200 bg-white px-5 py-2.5 text-[14px] font-semibold leading-none text-slate-700 shadow-[0_2px_6px_rgba(15,23,42,0.12)] transition hover:bg-slate-50"
    >
      Стеллажи
    </button>
    <button
      class="rounded-sm border border-slate-200 bg-white px-5 py-2.5 text-[14px] font-semibold leading-none text-slate-700 shadow-[0_2px_6px_rgba(15,23,42,0.12)] transition hover:bg-slate-50"
    >
      Автоматизация
    </button>
    <button
      class="rounded-sm border border-slate-200 bg-white px-5 py-2.5 text-[14px] font-semibold leading-none text-slate-700 shadow-[0_2px_6px_rgba(15,23,42,0.12)] transition hover:bg-slate-50"
    >
      Конвейеры
    </button>
    <button
      class="rounded-sm border border-slate-200 bg-white px-5 py-2.5 text-[14px] font-semibold leading-none text-slate-700 shadow-[0_2px_6px_rgba(15,23,42,0.12)] transition hover:bg-slate-50"
    >
      Комплексные решения
    </button>
  </div>

  <!-- CTA "Обсудить проект" -->
  <button
    class="inline-flex items-center gap-3 rounded-sm bg-[#3f5d7e] px-6 py-3 text-[14px] font-semibold tracking-wide text-white shadow-[0_10px_26px_rgba(15,23,42,0.35)] transition hover:bg-[#344d6a]"
  >
    <span>Обсудить проект</span>
    <span
      class="flex h-8 w-8 items-center justify-center rounded bg-white/10 text-base leading-none"
    >
      →
    </span>
  </button>
</div>

	<!-- Projects grid (замена этой секции) -->
<section class="relative overflow-hidden pb-10 sm:pb-14 lg:pb-16">
  <div class="pointer-events-none absolute inset-0">
    <div class="absolute -left-40 top-24 h-[2px] w-[130%] rotate-[-45deg] bg-gradient-to-r from-transparent via-slate-200/40 to-transparent"></div>
    <div class="absolute right-0 top-[50%] h-[2px] w-[55%] bg-slate-200/40"></div>
  </div>

  <div class="relative mx-auto w-full max-w-[1200px] px-4 sm:px-6 lg:px-0">
    <!-- Верхний крупный проект (на всю ширину) -->
    <div class="mb-6 h-[220px] rounded-sm bg-[linear-gradient(135deg,#d9e0ea_0%,#9fb2c7_45%,#c7d0db_100%)] shadow-[0_16px_40px_rgba(15,23,42,0.25)] sm:h-[260px] lg:h-[320px]"></div>

    <!-- Основная сетка проектов, как в макете -->
    <div class="grid grid-cols-2 gap-4 md:grid-cols-3 lg:grid-cols-4">
      <!-- Колонка 1 (2 вертикальных блока) -->
      <div class="space-y-4">
        <div class="h-40 rounded-sm bg-[linear-gradient(135deg,#e5e9f2_0%,#a8b6cb_45%,#d2d9e5_100%)] shadow-[0_10px_24px_rgba(15,23,42,0.22)] sm:h-44 lg:h-48"></div>
        <div class="h-40 rounded-sm bg-[linear-gradient(135deg,#e5e9f2_0%,#a8b6cb_45%,#d2d9e5_100%)] shadow-[0_10px_24px_rgba(15,23,42,0.22)] sm:h-44 lg:h-48"></div>
      </div>

      <!-- Колонка 2 (2 вертикальных блока) -->
      <div class="space-y-4">
        <div class="h-40 rounded-sm bg-[linear-gradient(135deg,#e5e9f2_0%,#a8b6cb_45%,#d2d9e5_100%)] shadow-[0_10px_24px_rgba(15,23,42,0.22)] sm:h-44 lg:h-48"></div>
        <div class="h-40 rounded-sm bg-[linear-gradient(135deg,#e5e9f2_0%,#a8b6cb_45%,#d2d9e5_100%)] shadow-[0_10px_24px_rgba(15,23,42,0.22)] sm:h-44 lg:h-48"></div>
      </div>

      <!-- Колонка 3 (2 вертикальных блока) -->
      <div class="space-y-4">
        <div class="h-40 rounded-sm bg-[linear-gradient(135deg,#e5e9f2_0%,#a8b6cb_45%,#d2d9e5_100%)] shadow-[0_10px_24px_rgba(15,23,42,0.22)] sm:h-44 lg:h-48"></div>
        <div class="h-40 rounded-sm bg-[linear-gradient(135deg,#e5e9f2_0%,#a8b6cb_45%,#d2d9e5_100%)] shadow-[0_10px_24px_rgba(15,23,42,0.22)] sm:h-44 lg:h-48"></div>
      </div>

      <!-- Колонка 4 (2 вертикальных блока, появляется только на lg) -->
      <div class="hidden space-y-4 lg:block">
        <div class="h-40 rounded-sm bg-[linear-gradient(135deg,#e5e9f2_0%,#a8b6cb_45%,#d2d9e5_100%)] shadow-[0_10px_24px_rgba(15,23,42,0.22)] lg:h-48"></div>
        <div class="h-40 rounded-sm bg-[linear-gradient(135deg,#e5e9f2_0%,#a8b6cb_45%,#d2d9e5_100%)] shadow-[0_10px_24px_rgba(15,23,42,0.22)] lg:h-48"></div>
      </div>
    </div>

    <!-- Нижний ряд крупных изображений (как во второй «полосе» макета) -->
    <div class="mt-8 grid gap-4 md:grid-cols-2 lg:grid-cols-3">
      <div class="h-48 rounded-sm bg-[linear-gradient(135deg,#e5e9f2_0%,#a8b6cb_45%,#d2d9e5_100%)] shadow-[0_12px_30px_rgba(15,23,42,0.24)] sm:h-52 lg:h-56"></div>
      <div class="h-48 rounded-sm bg-[linear-gradient(135deg,#e5e9f2_0%,#a8b6cb_45%,#d2d9e5_100%)] shadow-[0_12px_30px_rgba(15,23,42,0.24)] sm:h-52 lg:h-56"></div>
      <div class="h-48 rounded-sm bg-[linear-gradient(135deg,#e5e9f2_0%,#a8b6cb_45%,#d2d9e5_100%)] shadow-[0_12px_30px_rgba(15,23,42,0.24)] sm:h-52 lg:h-56"></div>
    </div>

    <!-- Пагинация -->
    <div class="mt-10 flex justify-center">
      <nav class="inline-flex items-center gap-2 rounded-full bg-white px-4 py-2 shadow-[0_8px_22px_rgba(15,23,42,0.18)]">
        <button class="flex h-8 w-8 items-center justify-center rounded-full bg-[#3f5d7e] text-[13px] font-semibold text-white">
          1
        </button>
        <button class="flex h-8 w-8 items-center justify-center rounded-full text-[13px] font-semibold text-slate-600 hover:bg-slate-100">
          2
        </button>
        <button class="flex h-8 w-8 items-center justify-center rounded-full text-[13px] font-semibold text-slate-600 hover:bg-slate-100">
          3
        </button>
        <span class="px-1 text-[13px] text-slate-400">…</span>
        <button class="flex h-8 w-8 items-center justify-center rounded-full text-[13px] font-semibold text-slate-600 hover:bg-slate-100">
          12
        </button>
      </nav>
    </div>
  </div>
</section>

  <!-- Contact / Discuss project (повтор секции "Обсудим вашу задачу?" как на странице "О компании") -->
  <section class="relative overflow-hidden bg-[#e0e5f0] py-10 sm:py-14 lg:py-16">
    <div class="pointer-events-none absolute inset-0 bg-[linear-gradient(135deg,rgba(248,250,252,0.35)_0%,rgba(148,163,184,0.35)_40%,rgba(15,23,42,0.55)_100%)] mix-blend-multiply"></div>

    <div class="relative mx-auto w-full max-w-[1200px] px-4 sm:px-6 lg:px-0">
      <div class="grid gap-10 lg:grid-cols-[minmax(0,0.9fr)_minmax(0,1.1fr)] lg:items-start">
        <div class="text-white">
          <h2 class="mb-4 text-[26px] font-extrabold leading-tight tracking-[-0.02em] sm:text-[30px]">
            Обсудим вашу задачу?
          </h2>
          <p class="max-w-[440px] text-[15px] leading-relaxed sm:text-[16px]">
            Свяжитесь с нами, чтобы получить консультацию, подобрать решение и запросить коммерческое предложение.
          </p>
        </div>

        <form class="rounded-sm bg-white/95 p-5 shadow-[0_18px_40px_rgba(15,23,42,0.35)] backdrop-blur-sm sm:p-6 lg:p-7">
          <div class="grid gap-4 sm:grid-cols-2">
            <div class="sm:col-span-1">
              <label class="mb-1 block text-[13px] font-semibold uppercase tracking-wide text-slate-500">
                Ваше имя *
              </label>
              <input type="text" class="block w-full rounded border border-slate-200 bg-slate-50 px-3 py-2.5 text-[14px] text-slate-900 outline-none transition focus:border-[#3f5d7e] focus:bg-white focus:ring-1 focus:ring-[#3f5d7e]" placeholder="Ваше имя" />
            </div>

            <div class="sm:col-span-1">
              <label class="mb-1 block text-[13px] font-semibold uppercase tracking-wide text-slate-500">
                Укажите телефон или e-mail *
              </label>
              <input type="text" class="block w-full rounded border border-slate-200 bg-slate-50 px-3 py-2.5 text-[14px] text-slate-900 outline-none transition focus:border-[#3f5d7e] focus:bg-white focus:ring-1 focus:ring-[#3f5d7e]" placeholder="+375 ..." />
            </div>
          </div>

          <div class="mt-4">
            <div class="mb-2 flex flex-wrap items-center justify-between gap-3">
              <span class="text-[13px] font-semibold uppercase tracking-wide text-slate-500">
                Предпочтительный способ связи *
              </span>
              <div class="flex gap-2 text-[12px] text-slate-500">
                <span>Телефон</span>
                <span>•</span>
                <span>Соцсети</span>
              </div>
            </div>

            <div class="flex flex-wrap gap-2">
              <button type="button" class="rounded-full border border-[#3f5d7e] bg-[#3f5d7e] px-4 py-1.5 text-[13px] font-semibold text-white">
                Телефон
              </button>
              <button type="button" class="rounded-full border border-slate-200 bg-white px-4 py-1.5 text-[13px] font-semibold text-slate-700">
                Telegram
              </button>
              <button type="button" class="rounded-full border border-slate-200 bg-white px-4 py-1.5 text-[13px] font-semibold text-slate-700">
                Viber
              </button>
              <button type="button" class="rounded-full border border-slate-200 bg-white px-4 py-1.5 text-[13px] font-semibold text-slate-700">
                WhatsApp
              </button>
            </div>
          </div>

          <div class="mt-4">
            <label class="mb-1 block text-[13px] font-semibold uppercase tracking-wide text-slate-500">
              Комментарий
            </label>
            <textarea rows="3" class="block w-full rounded border border-slate-200 bg-slate-50 px-3 py-2.5 text-[14px] text-slate-900 outline-none transition focus:border-[#3f5d7e] focus:bg-white focus:ring-1 focus:ring-[#3f5d7e]" placeholder="Опишите вашу задачу"></textarea>
          </div>

          <label class="mt-4 flex items-start gap-2 text-[13px] text-slate-600">
            <input type="checkbox" class="mt-1 h-4 w-4 rounded border-slate-300 text-[#3f5d7e] focus:ring-[#3f5d7e]" />
            <span>
              Согласен с условиями
              <a href="#" class="text-[#3f5d7e] underline underline-offset-2">обработки персональных данных</a>.
            </span>
          </label>

          <button type="submit" class="mt-5 inline-flex w-full items-center justify-center rounded bg-[#3f5d7e] px-6 py-3 text-[15px] font-semibold tracking-wide text-white shadow-[0_10px_30px_rgba(15,23,42,0.35)] transition hover:bg-[#344d6a] sm:w-auto">
            Отправить заявку
          </button>
        </form>
      </div>
    </div>
  </section>
	<!-- Contact form section -->
<?php get_template_part( 'template-parts/contact-form', 'form' ); ?>
</main>

<?php
get_footer();
