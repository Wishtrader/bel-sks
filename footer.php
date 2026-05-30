<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package BelSKS
 */

?>

	<footer id="colophon" class="site-footer bg-[#0f172a] text-gray-300">
		<div class="max-w-[1200px] mx-auto px-4">
			<!-- Main footer -->
			<div class="py-12 grid grid-cols-1 lg:grid-cols-12 gap-8">
				<!-- Logo & Social -->
				<div class="lg:col-span-3">
					<?php
					the_custom_logo();
					if ( ! has_custom_logo() ) :
						?>
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" class="inline-block mb-4">
							<svg class="w-24 h-24" viewBox="0 0 48 48" fill="none">
								<path d="M24 4L4 38h40L24 4z" fill="#1e3a5f"/>
								<path d="M24 14L14 32h20L24 14z" fill="#3b82f6"/>
								<path d="M24 24l-5 8h10l-5-8z" fill="#1e40af"/>
							</svg>
						</a>
						<?php
					endif;
					?>
					<p class="text-sm text-gray-400 mb-2">Складские стеллажи</p>
					<p class="text-sm text-gray-400 mb-6">© БелСКС логистик 2026</p>

					<!-- Social icons -->
					<div class="flex items-center gap-3">
						<a href="#" class="w-10 h-10 bg-[#1e3a5f] rounded flex items-center justify-center hover:bg-blue-600 transition-colors" aria-label="Facebook">
							<i data-lucide="facebook" class="w-5 h-5 text-white"></i>
						</a>
						<a href="#" class="w-10 h-10 bg-[#1e3a5f] rounded flex items-center justify-center hover:bg-blue-600 transition-colors" aria-label="VK">
							<i data-lucide="message-circle" class="w-5 h-5 text-white"></i>
						</a>
						<a href="#" class="w-10 h-10 bg-[#1e3a5f] rounded flex items-center justify-center hover:bg-blue-600 transition-colors" aria-label="Telegram">
							<i data-lucide="send" class="w-5 h-5 text-white"></i>
						</a>
					</div>
				</div>

				<!-- Catalog -->
				<div class="lg:col-span-2">
					<h3 class="text-white font-semibold text-base mb-4">Каталог</h3>
					<ul class="space-y-3">
						<li><a href="#" class="text-sm text-gray-300 hover:text-white transition-colors">Стеллажные системы</a></li>
						<li><a href="#" class="text-sm text-gray-300 hover:text-white transition-colors">Автоматизированные системы</a></li>
						<li><a href="#" class="text-sm text-gray-300 hover:text-white transition-colors">Конвейеры и комплектующие</a></li>
						<li><a href="#" class="text-sm text-gray-300 hover:text-white transition-colors">Производственная мебель</a></li>
					</ul>
				</div>

				<!-- Services -->
				<div class="lg:col-span-2">
					<h3 class="text-white font-semibold text-base mb-4">Услуги</h3>
					<ul class="space-y-3">
						<li><a href="#" class="text-sm text-gray-300 hover:text-white transition-colors">Разработка концепции</a></li>
						<li><a href="#" class="text-sm text-gray-300 hover:text-white transition-colors">Индивидуальные проекты</a></li>
						<li><a href="#" class="text-sm text-gray-300 hover:text-white transition-colors">Монтажные работы</a></li>
						<li><a href="#" class="text-sm text-gray-300 hover:text-white transition-colors">Сервисное обслуживание</a></li>
					</ul>
				</div>

				<!-- Information -->
				<div class="lg:col-span-2">
					<h3 class="text-white font-semibold text-base mb-4">Информация</h3>
					<ul class="space-y-3">
						<li><a href="#" class="text-sm text-gray-300 hover:text-white transition-colors">Проекты</a></li>
						<li><a href="#" class="text-sm text-gray-300 hover:text-white transition-colors">О компании</a></li>
						<li><a href="#" class="text-sm text-gray-300 hover:text-white transition-colors">Новости</a></li>
						<li><a href="#" class="text-sm text-gray-300 hover:text-white transition-colors">Контакты</a></li>
					</ul>
				</div>

				<!-- Contacts -->
				<div class="lg:col-span-3">
					<h3 class="text-white font-semibold text-base mb-4">Контакты</h3>
					<div class="space-y-4">
						<!-- Address -->
						<div class="flex items-start gap-3">
							<i data-lucide="map-pin" class="w-5 h-5 text-gray-400 flex-shrink-0 mt-0.5"></i>
							<p class="text-sm text-gray-300">220073, Беларусь,<br>г. Минск, ул. Бирюзова, 4/5,<br>офис 4004А</p>
						</div>

						<!-- Working hours -->
						<div class="flex items-start gap-3">
							<i data-lucide="clock" class="w-5 h-5 text-gray-400 flex-shrink-0 mt-0.5"></i>
							<div class="text-sm text-gray-300">
								<p>Пн-Пт: 9:00 - 18:00</p>
								<p>Сб-Вс: Выходной</p>
							</div>
						</div>

						<!-- Phones -->
						<div class="flex items-start gap-3">
							<i data-lucide="phone" class="w-5 h-5 text-gray-400 flex-shrink-0 mt-0.5"></i>
							<div class="text-sm text-gray-300 space-y-1">
								<p><a href="tel:+375172381717" class="hover:text-white transition-colors">+375 17 238 17 17</a></p>
								<p><a href="tel:+375173748682" class="hover:text-white transition-colors">+375 17 374 86 82</a></p>
								<p><a href="tel:+375447797030" class="hover:text-white transition-colors">+375 44 779 70 30</a></p>
							</div>
						</div>

						<!-- Email -->
						<div class="flex items-start gap-3">
							<i data-lucide="mail" class="w-5 h-5 text-gray-400 flex-shrink-0 mt-0.5"></i>
							<a href="mailto:info@belsks.by" class="text-sm text-gray-300 hover:text-white transition-colors underline">info@belsks.by</a>
						</div>
					</div>
				</div>
			</div>

			<!-- Legal links -->
			<div class="flex flex-wrap gap-6 pb-6 border-b border-gray-700">
				<a href="#" class="text-sm text-gray-400 hover:text-white underline transition-colors">Публичная оферта</a>
				<a href="#" class="text-sm text-gray-400 hover:text-white underline transition-colors">Политика обработки файлов cookie</a>
				<a href="#" class="text-sm text-gray-400 hover:text-white underline transition-colors">Политика обработки персональных данных</a>
			</div>

			<!-- Bottom section -->
			<div class="py-6 border-b border-gray-700">
				<div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
					<!-- Legal info -->
					<div class="text-xs text-gray-500 space-y-2">
						<p>© 2007-2026 ООО «БелСКС логистик», интернет-магазин sylka.by, info@belsks.by</p>
						<p>Юридический адрес: Беларусь, г. Минск, ул. Бирюзова, 4/5, офис 4004А</p>
						<p>Почтовый адрес: 220073, Беларусь, г. Минск, ул. Бирюзова, 4/5, офис 4004А</p>
						<p>ООО «БелСКС логистик». Зарегистрировано Минским городским исполнительным комитетом №?? от ???</p>
						<p>УНП 791365199. Регистрация в Торговом реестре Республики Беларусь №210825 04.03.2015г.</p>
					</div>

					<!-- Payment systems -->
					<div class="flex items-center justify-start lg:justify-end gap-4 flex-wrap">
						<div class="flex items-center gap-2 text-gray-400">
							<span class="text-sm font-bold">VISA</span>
						</div>
						<div class="flex items-center gap-2 text-gray-400">
							<span class="text-xs">Verified by</span>
							<span class="text-sm font-bold">VISA</span>
						</div>
						<div class="flex items-center gap-2 text-gray-400">
							<div class="flex">
								<div class="w-5 h-5 bg-red-500 rounded-full"></div>
								<div class="w-5 h-5 bg-yellow-500 rounded-full -ml-2"></div>
							</div>
							<span class="text-xs">Mastercard<br>SecureCode</span>
						</div>
						<div class="flex items-center gap-2 text-gray-400">
							<div class="w-6 h-6 bg-blue-600 rounded flex items-center justify-center">
								<i data-lucide="shield" class="w-4 h-4 text-white"></i>
							</div>
							<span class="text-xs">3D Secure</span>
						</div>
						<div class="flex items-center gap-2 text-gray-400">
							<span class="text-xs font-bold text-blue-400">БЕЛКАРТ</span>
						</div>
						<div class="flex items-center gap-2 text-gray-400">
							<span class="text-sm font-bold text-orange-400">bePaid</span>
						</div>
						<div class="flex items-center gap-2 text-gray-400">
							<span class="text-sm font-bold">ОПЛАТИ</span>
						</div>
					</div>
				</div>
			</div>

			<!-- Consumer protection -->
			<div class="py-6">
				<div class="grid grid-cols-1 lg:grid-cols-2 gap-6 text-xs text-gray-500">
					<div>
						<p class="mb-1">Контакты для обращения покупателей (по вопросам нарушения их прав):</p>
						<p><a href="tel:+375172381717" class="hover:text-gray-300 transition-colors">+375 17 238 17 17</a>, <a href="mailto:info@belsks.by" class="hover:text-gray-300 transition-colors">info@belsks.by</a></p>
					</div>
					<div class="lg:text-right">
						<p class="mb-1">Телефон уполномоченных по защите прав потребителей:</p>
						<p>??? – ??? г. Минск</p>
					</div>
				</div>
			</div>
		</div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<script>
	// Theme toggle - Desktop
	const themeToggle = document.getElementById('theme-toggle');
	// Theme toggle - Mobile
	const themeToggleMobile = document.getElementById('theme-toggle-mobile');
	
	if (themeToggle) {
		themeToggle.addEventListener('click', toggleTheme);
	}
	
	if (themeToggleMobile) {
		themeToggleMobile.addEventListener('click', toggleTheme);
	}

	// Mobile menu toggle
	const mobileMenuToggle = document.getElementById('mobile-menu-toggle');
	const mobileMenu = document.getElementById('mobile-menu');
	const menuIcon = mobileMenuToggle?.querySelector('.menu-icon');
	const closeIcon = mobileMenuToggle?.querySelector('.close-icon');
	
	function openMobileMenu() {
		if (mobileMenu) {
			mobileMenu.classList.remove('hidden');
			document.body.classList.add('menu-open');
			if (menuIcon) menuIcon.classList.add('hidden');
			if (closeIcon) closeIcon.classList.remove('hidden');
			if (typeof lucide !== 'undefined') {
				lucide.createIcons();
			}
		}
	}
	
	function closeMobileMenu() {
		if (mobileMenu) {
			mobileMenu.classList.add('hidden');
			document.body.classList.remove('menu-open');
			if (menuIcon) menuIcon.classList.remove('hidden');
			if (closeIcon) closeIcon.classList.add('hidden');
		}
	}
	
	if (mobileMenuToggle) {
		mobileMenuToggle.addEventListener('click', () => {
			if (mobileMenu.classList.contains('hidden')) {
				openMobileMenu();
			} else {
				closeMobileMenu();
			}
		});
	}
	
	// Close menu when clicking on a link
	if (mobileMenu) {
		const menuLinks = mobileMenu.querySelectorAll('a');
		menuLinks.forEach(link => {
			link.addEventListener('click', closeMobileMenu);
		});
	}

	// Initialize Lucide icons
	function initIcons() {
		if (typeof lucide !== 'undefined') {
			lucide.createIcons();
		} else {
			setTimeout(initIcons, 100);
		}
	}
	initIcons();
</script>

<?php wp_footer(); ?>

</body>
</html>
