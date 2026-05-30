<?php
/**
 * Template Name: Catalog
 *
 * @package BelSKS
 */

get_header();
?>

  <section class="relative overflow-hidden bg-[#f7f7fb] py-10 sm:py-14 lg:py-16">
  <div class="pointer-events-none absolute inset-0">
    <div class="absolute left-0 top-0 h-px w-full bg-white/70"></div>
    <div class="absolute -left-40 top-24 h-[2px] w-[130%] rotate-[-45deg] bg-gradient-to-r from-transparent via-slate-200/50 to-transparent"></div>
    <div class="absolute left-[38%] top-0 h-[2px] w-[70%] rotate-[-45deg] bg-gradient-to-r from-transparent via-slate-200/40 to-transparent"></div>
    <div class="absolute right-0 top-[22%] h-px w-[55%] bg-slate-200/50"></div>
  </div>

  <div class="relative mx-auto w-full max-w-[1200px] px-4 sm:px-6 lg:px-0">
    <nav class="mb-8 text-[15px] leading-none text-slate-500 sm:mb-10">
      <a href="#" class="transition-colors hover:text-slate-700">Главная</a>
      <span class="mx-2 text-slate-400">/</span>
      <span class="text-slate-600">Каталог</span>
    </nav>

    <h1 class="mb-8 text-[38px] font-extrabold leading-none tracking-[-0.03em] text-slate-900 sm:mb-10 sm:text-[56px]">
      Каталог
    </h1>

    <div class="grid gap-6 lg:grid-cols-[380px_minmax(0,1fr)] lg:items-start">
      <aside class="rounded-sm border border-slate-200 bg-white p-4 shadow-[0_2px_12px_rgba(15,23,42,0.08)] sm:p-6">
        <div class="mb-4 inline-flex rounded-md bg-[#3d5f86] px-5 py-2 text-[18px] font-semibold leading-none text-white">
          Каталог
        </div>

        <ul class="space-y-4">
          <li>
            <a href="#" class="flex items-center justify-between gap-4 text-[20px] font-semibold leading-snug text-[#3f5d7e] transition-colors hover:text-slate-900">
              <span>Стеллажные системы</span>
              <svg class="h-5 w-5 shrink-0 text-[#3f5d7e]" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path d="M12 19V5" />
                <path d="M5 12l7-7 7 7" />
              </svg>
            </a>
          </li>
          <li>
            <a href="#" class="flex items-center justify-between gap-4 text-[20px] font-semibold leading-snug text-[#3f5d7e] transition-colors hover:text-slate-900">
              <span>Автоматизированные системы</span>
              <svg class="h-5 w-5 shrink-0 text-[#3f5d7e]" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path d="M12 5v14" />
                <path d="M19 12l-7 7-7-7" />
              </svg>
            </a>
          </li>
          <li>
            <a href="#" class="flex items-center justify-between gap-4 text-[20px] font-semibold leading-snug text-[#3f5d7e] transition-colors hover:text-slate-900">
              <span>Конвейеры и комплектующие</span>
              <svg class="h-5 w-5 shrink-0 text-[#3f5d7e]" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path d="M12 5v14" />
                <path d="M19 12l-7 7-7-7" />
              </svg>
            </a>
          </li>
          <li>
            <a href="#" class="flex items-center justify-between gap-4 text-[20px] font-semibold leading-snug text-[#3f5d7e] transition-colors hover:text-slate-900">
              <span>Производственная мебель</span>
              <svg class="h-5 w-5 shrink-0 text-[#3f5d7e]" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path d="M12 5v14" />
                <path d="M19 12l-7 7-7-7" />
              </svg>
            </a>
          </li>
        </ul>
      </aside>

      <div class="grid gap-6 sm:grid-cols-2 xl:grid-cols-3">
        <article class="overflow-hidden bg-white shadow-[0_2px_12px_rgba(15,23,42,0.08)]">
          <div class="h-52 bg-[linear-gradient(135deg,#d9e0ea_0%,#9fb2c7_45%,#c7d0db_100%)] sm:h-56"></div>
          <div class="p-5">
            <h2 class="mb-3 text-[18px] font-bold leading-snug text-slate-900">
              Стеллажные системы
            </h2>
            <p class="text-[17px] leading-snug text-slate-600">
              Надёжные решения для хранения и рациональной организации складского пространства.
            </p>
          </div>
        </article>

        <article class="overflow-hidden bg-white shadow-[0_2px_12px_rgba(15,23,42,0.08)]">
          <div class="h-52 bg-[linear-gradient(135deg,#d8e1ee_0%,#7e97b3_45%,#c9d2de_100%)] sm:h-56"></div>
          <div class="p-5">
            <h2 class="mb-3 text-[18px] font-bold leading-snug text-slate-900">
              Автоматизированные системы
            </h2>
            <p class="text-[17px] leading-snug text-slate-600">
              Надёжные решения для хранения и рациональной организации складского пространства.
            </p>
          </div>
        </article>

        <article class="overflow-hidden bg-white shadow-[0_2px_12px_rgba(15,23,42,0.08)]">
          <div class="h-52 bg-[linear-gradient(135deg,#e4e7ee_0%,#adb7c8_45%,#d7dde6_100%)] sm:h-56"></div>
          <div class="p-5">
            <h2 class="mb-3 text-[18px] font-bold leading-snug text-slate-900">
              Конвейеры и комплектующие
            </h2>
            <p class="text-[17px] leading-snug text-slate-600">
              Оборудование для перемещения, сортировки и внутренней логистики грузов.
            </p>
          </div>
        </article>

        <article class="overflow-hidden bg-white shadow-[0_2px_12px_rgba(15,23,42,0.08)] sm:col-span-2 xl:col-span-1">
          <div class="h-52 bg-[linear-gradient(135deg,#cfd7e4_0%,#8b9db7_45%,#d9e1ec_100%)] sm:h-56"></div>
          <div class="p-5">
            <h2 class="mb-3 text-[18px] font-bold leading-snug text-slate-900">
              Производственная мебель
            </h2>
            <p class="text-[17px] leading-snug text-slate-600">
              Оснащение рабочих и производственных зон с учётом практических задач предприятия.
            </p>
          </div>
        </article>
      </div>
    </div>
  </div>
</section>
</main>
</body

<?php
get_footer();
