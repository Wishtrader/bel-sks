<?php
/**
 * Template Name: Front Page
 *
 * @package BelSKS
 */

get_header();
?>

<main id="primary" class="site-main bg-[#f5f5f9] dark:bg-gray-900 text-gray-900 dark:text-gray-100">

<!-- Hero Section -->
	<section class="relative h-[600px] lg:h-[700px] flex items-center overflow-hidden">
		<!-- Background Image -->
		<div class="absolute inset-0 dark:bg-gray-800">
			<img src="<?php the_field('hero_image') ?>" alt="Warehouse" class="w-full h-full object-cover">
			<div class="absolute inset-0 gradient-overlay-light dark:hidden"></div>
			<div class="absolute inset-0 gradient-overlay-dark hidden dark:block"></div>
		</div>

		<div class="relative max-w-[1200px] mx-auto px-4 w-full">
			<div class="max-w-2xl">
				<h1 class="text-lg font-medium text-[#424242] mb-6 leading-tight">
					<?php the_field('hero_heading') ?>
				</h1>
				<p class="text-lg text-gray-600 mb-8">
					<?php the_field('hero_desc') ?>
				</p>
				<div class="flex flex-wrap gap-4">
					<a href="#" class="inline-flex items-center gap-2 bg-[#1e3a5f] text-white px-8 py-3 rounded-lg font-medium hover:bg-[#162d4a] transition-colors">
						Получить консультацию
						<i data-lucide="arrow-right" class="w-4 h-4"></i>
					</a>
					<a href="#" class="inline-flex items-center gap-2 bg-white text-[#1e3a5f] border border-[#1e3a5f] px-8 py-3 rounded-lg font-medium hover:bg-gray-50 transition-colors">
						В каталог
					</a>
				</div>
			</div>
		</div>
	</section>

	<!-- Basic Directions -->
	<section class="py-16 lg:py-24 bg-white dark:bg-gray-900">
		<div class="max-w-[1200px] mx-auto px-4">
			<div class="flex flex-col lg:flex-row justify-between items-start lg:items-center mb-12 gap-4">
				<h2 class="text-3xl font-bold text-[#222222]">Основные направления</h2>
				<a href="#" class="text-[#1e3a5f] font-medium hover:underline flex items-center gap-1">
					Перейти в каталог
					<i data-lucide="arrow-right" class="w-4 h-4"></i>
				</a>
			</div>

			<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
				<!-- Card 1 -->
				<div class="bg-white border border-gray-200 rounded-xl overflow-hidden hover:shadow-lg transition-shadow group">
					<div class="h-48 bg-gray-100 overflow-hidden">
						<img src="https://placehold.co/400x300/e2e8f0/94a3b8?text=Shelving" alt="Стеллажные системы" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
					</div>
					<div class="p-6">
						<h3 class="text-lg font-bold text-[#222222] mb-2">Стеллажные системы</h3>
						<p class="text-sm text-gray-600 mb-4 line-clamp-3">Надёжные решения для хранения и рациональной организации складского пространства.</p>
						<a href="#" class="text-[#1e3a5f] font-medium text-sm hover:underline inline-flex items-center gap-1">
							Подробнее <i data-lucide="arrow-right" class="w-3 h-3"></i>
						</a>
					</div>
				</div>

				<!-- Card 2 -->
				<div class="bg-white border border-gray-200 rounded-xl overflow-hidden hover:shadow-lg transition-shadow group">
					<div class="h-48 bg-gray-100 overflow-hidden">
						<img src="https://placehold.co/400x300/e2e8f0/94a3b8?text=Automated" alt="Автоматизированные системы" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
					</div>
					<div class="p-6">
						<h3 class="text-lg font-bold text-[#222222] mb-2">Автоматизированные системы</h3>
						<p class="text-sm text-gray-600 mb-4 line-clamp-3">Надёжные решения для хранения и рациональной организации складского пространства.</p>
						<a href="#" class="text-[#1e3a5f] font-medium text-sm hover:underline inline-flex items-center gap-1">
							Подробнее <i data-lucide="arrow-right" class="w-3 h-3"></i>
						</a>
					</div>
				</div>

				<!-- Card 3 -->
				<div class="bg-white border border-gray-200 rounded-xl overflow-hidden hover:shadow-lg transition-shadow group">
					<div class="h-48 bg-gray-100 overflow-hidden">
						<img src="https://placehold.co/400x300/e2e8f0/94a3b8?text=Conveyors" alt="Конвейеры" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
					</div>
					<div class="p-6">
						<h3 class="text-lg font-bold text-[#222222] mb-2">Конвейеры и комплектующие</h3>
						<p class="text-sm text-gray-600 mb-4 line-clamp-3">Оборудование для перемещения, сортировки и внутренней логистики грузов.</p>
						<a href="#" class="text-[#1e3a5f] font-medium text-sm hover:underline inline-flex items-center gap-1">
							Подробнее <i data-lucide="arrow-right" class="w-3 h-3"></i>
						</a>
					</div>
				</div>

				<!-- Card 4 -->
				<div class="bg-white border border-gray-200 rounded-xl overflow-hidden hover:shadow-lg transition-shadow group">
					<div class="h-48 bg-gray-100 overflow-hidden">
						<img src="https://placehold.co/400x300/e2e8f0/94a3b8?text=Furniture" alt="Мебель" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
					</div>
					<div class="p-6">
						<h3 class="text-lg font-bold text-[#222222] mb-2">Производственная мебель</h3>
						<p class="text-sm text-gray-600 mb-4 line-clamp-3">Оснащение рабочих и производственных зон с учётом практических задач предприятия.</p>
						<a href="#" class="text-[#1e3a5f] font-medium text-sm hover:underline inline-flex items-center gap-1">
							Подробнее <i data-lucide="arrow-right" class="w-3 h-3"></i>
						</a>
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- Services -->
	<section class="py-16 lg:py-24 bg-[#f8fafc] dark:bg-gray-800">
		<div class="max-w-[1200px] mx-auto px-4">
			<h2 class="text-3xl font-bold text-[#222222] mb-12">Услуги</h2>

			<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
				<!-- Service 1 -->
				<div class="bg-white p-6 rounded-xl shadow-sm hover:shadow-md transition-shadow">
					<div class="w-12 h-12 bg-blue-50 rounded-lg flex items-center justify-center mb-4 text-[#1e3a5f]">
						<i data-lucide="lightbulb" class="w-6 h-6"></i>
					</div>
					<h3 class="text-lg font-bold text-[#222222] mb-2">Разработка концепции</h3>
					<p class="text-sm text-gray-600 mb-4">Формируем оптимальную логистическую схему хранения, перемещения и обработки грузов.</p>
					<a href="#" class="text-[#1e3a5f] font-medium text-sm hover:underline inline-flex items-center gap-1">
						Подробнее <i data-lucide="arrow-right" class="w-3 h-3"></i>
					</a>
				</div>

				<!-- Service 2 -->
				<div class="bg-white p-6 rounded-xl shadow-sm hover:shadow-md transition-shadow">
					<div class="w-12 h-12 bg-blue-50 rounded-lg flex items-center justify-center mb-4 text-[#1e3a5f]">
						<i data-lucide="blueprint" class="w-6 h-6"></i>
					</div>
					<h3 class="text-lg font-bold text-[#222222] mb-2">Индивидуальные проекты</h3>
					<p class="text-sm text-gray-600 mb-4">Подбираем решения под конкретные задачи объекта и специфику бизнеса.</p>
					<a href="#" class="text-[#1e3a5f] font-medium text-sm hover:underline inline-flex items-center gap-1">
						Подробнее <i data-lucide="arrow-right" class="w-3 h-3"></i>
					</a>
				</div>

				<!-- Service 3 -->
				<div class="bg-white p-6 rounded-xl shadow-sm hover:shadow-md transition-shadow">
					<div class="w-12 h-12 bg-blue-50 rounded-lg flex items-center justify-center mb-4 text-[#1e3a5f]">
						<i data-lucide="wrench" class="w-6 h-6"></i>
					</div>
					<h3 class="text-lg font-bold text-[#222222] mb-2">Монтажные работы</h3>
					<p class="text-sm text-gray-600 mb-4">Организуем профессиональный монтаж оборудования с контролем качества.</p>
					<a href="#" class="text-[#1e3a5f] font-medium text-sm hover:underline inline-flex items-center gap-1">
						Подробнее <i data-lucide="arrow-right" class="w-3 h-3"></i>
					</a>
				</div>

				<!-- Service 4 -->
				<div class="bg-white p-6 rounded-xl shadow-sm hover:shadow-md transition-shadow">
					<div class="w-12 h-12 bg-blue-50 rounded-lg flex items-center justify-center mb-4 text-[#1e3a5f]">
						<i data-lucide="settings" class="w-6 h-6"></i>
					</div>
					<h3 class="text-lg font-bold text-[#222222] mb-2">Сервисное обслуживание</h3>
					<p class="text-sm text-gray-600 mb-4">Обеспечиваем сопровождение для стабильной и безопасной эксплуатации.</p>
					<a href="#" class="text-[#1e3a5f] font-medium text-sm hover:underline inline-flex items-center gap-1">
						Подробнее <i data-lucide="arrow-right" class="w-3 h-3"></i>
					</a>
				</div>
			</div>
		</div>
	</section>

	<!-- About Section -->
	<section class="py-16 lg:py-24 bg-white dark:bg-gray-900">
		<div class="max-w-[1200px] mx-auto px-4">
			<div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
				<!-- Text Content -->
				<div>
					<h2 class="text-3xl font-bold text-[#222222] mb-4">БелСКС логистик —<br>инженерный подход к складским решениям</h2>
					<p class="text-gray-600 mb-6">
						Мы помогаем компаниям подобрать и внедрить решения для хранения, перемещения и организации рабочих пространств. В центре внимания — надёжность, эффективность и адаптация под реальные задачи бизнеса.
					</p>
					<p class="text-gray-600 mb-8">
						За 20 лет работы мы реализовали свыше 1 600 проектов, установили больше семи километров конвейеров и более миллиона паллетомест.
					</p>
					<a href="#" class="inline-flex items-center gap-2 bg-[#1e3a5f] text-white px-6 py-3 rounded-lg font-medium hover:bg-[#162d4a] transition-colors">
						Подробнее о компании
					</a>
				</div>

				<!-- Image & Features -->
				<div class="relative">
					<div class="rounded-xl overflow-hidden shadow-lg mb-6">
						<img src="https://placehold.co/600x400/e2e8f0/94a3b8?text=Robot+Arm" alt="Robot" class="w-full h-auto">
					</div>
					<div class="grid grid-cols-2 gap-4">
						<div class="bg-white p-4 rounded-lg shadow-md border border-gray-100 flex items-start gap-3">
							<div class="w-10 h-10 bg-blue-50 rounded flex items-center justify-center text-[#1e3a5f] flex-shrink-0">
								<i data-lucide="clipboard-check" class="w-5 h-5"></i>
							</div>
							<div>
								<h4 class="font-bold text-[#222222] text-sm">Подбор под задачи объекта</h4>
							</div>
						</div>
						<div class="bg-white p-4 rounded-lg shadow-md border border-gray-100 flex items-start gap-3">
							<div class="w-10 h-10 bg-blue-50 rounded flex items-center justify-center text-[#1e3a5f] flex-shrink-0">
								<i data-lucide="shield-check" class="w-5 h-5"></i>
							</div>
							<div>
								<h4 class="font-bold text-[#222222] text-sm">Надёжные решения для B2B</h4>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- Projects Section -->
	<section class="py-16 lg:py-24 bg-[#f8fafc] dark:bg-gray-800">
		<div class="max-w-[1200px] mx-auto px-4">
			<div class="flex flex-col lg:flex-row justify-between items-start lg:items-center mb-12 gap-4">
				<h2 class="text-3xl font-bold text-[#222222]">Реализованные проекты</h2>
				<a href="#" class="text-[#1e3a5f] font-medium hover:underline flex items-center gap-1">
					Показать больше проектов
					<i data-lucide="arrow-right" class="w-4 h-4"></i>
				</a>
			</div>

			<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
				<!-- Project 1 (Large) -->
				<div class="md:col-span-2 lg:col-span-2 row-span-2 rounded-xl overflow-hidden group relative min-h-[400px]">
					<img src="https://placehold.co/800x600/e2e8f0/94a3b8?text=Project+1" alt="Project" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
					<div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent opacity-0 group-hover:opacity-100 transition-opacity flex items-end p-6">
						<span class="text-white font-medium">Название проекта</span>
					</div>
				</div>

				<!-- Project 2 -->
				<div class="rounded-xl overflow-hidden group relative h-full min-h-[190px]">
					<img src="https://placehold.co/400x300/e2e8f0/94a3b8?text=Project+2" alt="Project" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
					<div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent opacity-0 group-hover:opacity-100 transition-opacity flex items-end p-6">
						<span class="text-white font-medium">Название проекта</span>
					</div>
				</div>

				<!-- Project 3 -->
				<div class="rounded-xl overflow-hidden group relative h-full min-h-[190px]">
					<img src="https://placehold.co/400x300/e2e8f0/94a3b8?text=Project+3" alt="Project" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
					<div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent opacity-0 group-hover:opacity-100 transition-opacity flex items-end p-6">
						<span class="text-white font-medium">Название проекта</span>
					</div>
				</div>
			</div>

			<!-- Projects 4 & 5 (Full width row) -->
			<div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-6">
				<!-- Project 4 -->
				<div class="rounded-xl overflow-hidden group relative h-64">
					<img src="https://placehold.co/600x300/e2e8f0/94a3b8?text=Project+4" alt="Project" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
					<div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent opacity-0 group-hover:opacity-100 transition-opacity flex items-end p-6">
						<span class="text-white font-medium">Название проекта</span>
					</div>
				</div>

				<!-- Project 5 -->
				<div class="rounded-xl overflow-hidden group relative h-64">
					<img src="https://placehold.co/600x300/e2e8f0/94a3b8?text=Project+5" alt="Project" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
					<div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent opacity-0 group-hover:opacity-100 transition-opacity flex items-end p-6">
						<span class="text-white font-medium">Название проекта</span>
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- News Section -->
	<section class="py-16 lg:py-24 bg-white dark:bg-gray-900">
		<div class="max-w-[1200px] mx-auto px-4">
			<div class="flex flex-col lg:flex-row justify-between items-start lg:items-center mb-12 gap-4">
				<h2 class="text-3xl font-bold text-[#222222]">Новости и статьи</h2>
				<a href="#" class="text-[#1e3a5f] font-medium hover:underline flex items-center gap-1">
					К другим новостям
					<i data-lucide="arrow-right" class="w-4 h-4"></i>
				</a>
			</div>

			<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
				<!-- News Card 1 -->
				<div class="group cursor-pointer">
					<div class="rounded-xl overflow-hidden mb-4 h-48 bg-gray-100">
						<img src="https://placehold.co/400x300/e2e8f0/94a3b8?text=News+1" alt="News" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
					</div>
					<p class="text-xs text-gray-500 mb-2">15 Января 2025</p>
					<h3 class="text-base font-bold text-[#222222] group-hover:text-[#1e3a5f] transition-colors line-clamp-2">Как выбрать стеллажную систему под задачи склада</h3>
				</div>

				<!-- News Card 2 -->
				<div class="group cursor-pointer">
					<div class="rounded-xl overflow-hidden mb-4 h-48 bg-gray-100">
						<img src="https://placehold.co/400x300/e2e8f0/94a3b8?text=News+2" alt="News" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
					</div>
					<p class="text-xs text-gray-500 mb-2">15 Января 2025</p>
					<h3 class="text-base font-bold text-[#222222] group-hover:text-[#1e3a5f] transition-colors line-clamp-2">Как выбрать стеллажную систему под задачи склада</h3>
				</div>

				<!-- News Card 3 -->
				<div class="group cursor-pointer">
					<div class="rounded-xl overflow-hidden mb-4 h-48 bg-gray-100">
						<img src="https://placehold.co/400x300/e2e8f0/94a3b8?text=News+3" alt="News" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
					</div>
					<p class="text-xs text-gray-500 mb-2">15 Января 2025</p>
					<h3 class="text-base font-bold text-[#222222] group-hover:text-[#1e3a5f] transition-colors line-clamp-2">Как выбрать стеллажную систему под задачи склада</h3>
				</div>

				<!-- News Card 4 -->
				<div class="group cursor-pointer">
					<div class="rounded-xl overflow-hidden mb-4 h-48 bg-gray-100">
						<img src="https://placehold.co/400x300/e2e8f0/94a3b8?text=News+4" alt="News" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
					</div>
					<p class="text-xs text-gray-500 mb-2">15 Января 2025</p>
					<h3 class="text-base font-bold text-[#222222] group-hover:text-[#1e3a5f] transition-colors line-clamp-2">Как выбрать стеллажную систему под задачи склада</h3>
				</div>
			</div>
		</div>
	</section>

	<!-- Contact Form Section -->
	<section class="relative py-16 lg:py-24 overflow-hidden">
		<!-- Background -->
		<div class="absolute inset-0 bg-gray-200 dark:bg-gray-800">
			<img src="https://placehold.co/1920x800/e2e8f0/94a3b8?text=Contact+BG" alt="Background" class="w-full h-full object-cover">
			<div class="absolute inset-0 bg-white/80 overlay-light dark:hidden"></div>
			<div class="absolute inset-0 bg-gray-900/80 overlay-dark hidden dark:block"></div>
		</div>

		<div class="relative max-w-[1200px] mx-auto px-4">
			<div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
				<!-- Left Text -->
				<div>
					<h2 class="text-3xl font-bold text-[#222222] mb-4">Обсудим вашу задачу?</h2>
					<p class="text-gray-600">
						Свяжитесь с нами, чтобы получить консультацию, подобрать решения и запросить коммерческое предложение.
					</p>
				</div>

				<!-- Form -->
				<div class="bg-white p-8 rounded-2xl shadow-lg">
					<form class="space-y-4">
						<div class="grid grid-cols-1 md:grid-cols-2 gap-4">
							<div>
								<label class="block text-sm font-medium text-gray-700 mb-1">Ваше имя *</label>
								<input type="text" placeholder="Ваше имя" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition-all">
							</div>
							<div>
								<label class="block text-sm font-medium text-gray-700 mb-1">Укажите телефон или e-mail *</label>
								<input type="text" placeholder="+375 (__) ___-__-__" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition-all">
							</div>
						</div>

						<div>
							<label class="block text-sm font-medium text-gray-700 mb-2">Предпочтительный способ связи:</label>
							<div class="flex flex-wrap gap-4">
								<label class="flex items-center gap-2 cursor-pointer">
									<input type="radio" name="contact_method" value="phone" class="w-4 h-4 text-blue-600 border-gray-300 focus:ring-blue-500">
									<span class="text-sm text-gray-600">Телефон</span>
								</label>
								<label class="flex items-center gap-2 cursor-pointer">
									<input type="radio" name="contact_method" value="viber" class="w-4 h-4 text-blue-600 border-gray-300 focus:ring-blue-500">
									<span class="text-sm text-gray-600">Viber</span>
								</label>
								<label class="flex items-center gap-2 cursor-pointer">
									<input type="radio" name="contact_method" value="whatsapp" class="w-4 h-4 text-blue-600 border-gray-300 focus:ring-blue-500">
									<span class="text-sm text-gray-600">WhatsApp</span>
								</label>
								<label class="flex items-center gap-2 cursor-pointer">
									<input type="radio" name="contact_method" value="telegram" class="w-4 h-4 text-blue-600 border-gray-300 focus:ring-blue-500">
									<span class="text-sm text-gray-600">Telegram</span>
								</label>
								<label class="flex items-center gap-2 cursor-pointer">
									<input type="radio" name="contact_method" value="email" class="w-4 h-4 text-blue-600 border-gray-300 focus:ring-blue-500">
									<span class="text-sm text-gray-600">E-mail</span>
								</label>
							</div>
						</div>

						<div>
							<label class="block text-sm font-medium text-gray-700 mb-1">Комментарий</label>
							<textarea rows="3" placeholder="Опишите вашу задачу" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition-all resize-none"></textarea>
						</div>

						<div class="flex items-start gap-2">
							<input type="checkbox" id="privacy" class="mt-1 w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
							<label for="privacy" class="text-xs text-gray-500">Соглашаюсь с политикой обработки персональных данных</label>
						</div>

						<button type="submit" class="w-full bg-[#1e3a5f] text-white py-3 rounded-lg font-medium hover:bg-[#162d4a] transition-colors">
							Отправить заявку
						</button>
					</form>
				</div>
			</div>
		</div>
	</section>

</main>

<?php
get_footer();
