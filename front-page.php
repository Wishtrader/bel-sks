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
	<section class="py-16 lg:py-24 dark:bg-gray-900 bg-[url('<?php the_field('sec2-bg')?>')] bg-cover bg-center bg-no-repeat basic-directions-section">
		<div class="max-w-[1200px] mx-auto px-4">
			<div class="flex flex-col lg:flex-row justify-between items-start lg:items-center mb-12 gap-4">
				<h2 class="text-3xl font-bold text-[#222222]">Основные направления</h2>
				<?php
				$catalog_page = get_page_by_title( 'Каталог' );
				$catalog_url  = $catalog_page ? get_permalink( $catalog_page->ID ) : '#';
				?>
				<a href="<?php echo esc_url( $catalog_url ); ?>" class="basic-directions-btn inline-flex items-center gap-2 bg-white text-[#1e3a5f] border border-[#D0D6E8] px-8 py-3 rounded-sm font-medium hover:bg-gray-50 transition-colors">
					Перейти в каталог
				</a>
			</div>

			<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
				<?php
				$categories = get_terms(
					array(
						'taxonomy'   => 'product_cat',
						'hide_empty' => false,
						'number'     => 4,
						'exclude'    => array( 1 ),
					)
				);

				if ( ! is_wp_error( $categories ) && ! empty( $categories ) ) {
					foreach ( $categories as $category ) {
						$thumbnail_id = get_term_meta( $category->term_id, 'thumbnail_id', true );
						$image_url    = $thumbnail_id ? wp_get_attachment_image_url( $thumbnail_id, 'medium' ) : '';

						if ( ! $image_url ) {
							$image_url = 'https://placehold.co/400x300/e2e8f0/94a3b8?text=' . urlencode( $category->name );
						}

						$description = ! empty( $category->description ) ? $category->description : 'Категория товаров для вашего склада.';
						$category_link = get_term_link( $category );
						?>
						<div class="bg-white border overflow-hidden shadow-sm hover:shadow-lg transition-shadow group">
							<div class="h-[250px] bg-gray-100 overflow-hidden">
								<img src="<?php echo esc_url( $image_url ); ?>" alt="<?php echo esc_attr( $category->name ); ?>" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
							</div>
							<div class="p-6 relative min-h-[226px]">
								<h3 class="text-lg font-bold text-[#222222] mb-2 leading-[1.2]"><?php echo esc_html( $category->name ); ?></h3>
								<p class="text-sm text-gray-600 mb-4 leading-[1.2]"><?php echo esc_html( $description ); ?></p>
								<a href="<?php echo esc_url( $category_link ); ?>" class="absolute bottom-[20px] basic-directions-btn bg-white border border-[#D0D6E8] rounded-sm hover:text-white text-[#1e3a5f] px-[20px] py-[5px] font-medium text-sm hover:bg-[#222222] inline-flex items-center gap-1">
									Подробнее
								</a>
							</div>
						</div>
						<?php
					}
				}
				?>
			</div>
		</div>
	</section>

	<!-- Services -->
	<section class="py-16 lg:py-24 bg-[#f8fafc] services-section bg-[url('<?php the_field('sec3-bg') ?>')] bg-cover bg-center bg-no-repeat">
		<div class="max-w-[1200px] mx-auto px-4">
			<h2 class="text-3xl font-bold text-[#222222] mb-12"><?php the_field('sec3_heading') ?></h2>

			<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
				<?php
				$services_query = new WP_Query( array(
					'post_type'      => 'services',
					'posts_per_page' => 4,
					'orderby'        => 'menu_order',
					'order'          => 'ASC',
				) );

				if ( $services_query->have_posts() ) {
					while ( $services_query->have_posts() ) {
						$services_query->the_post();
						$icon_url = get_field( 'service_icon' );
						$icon_src = is_array( $icon_url ) ? $icon_url['url'] : '';
						?>
						<div class="bg-white dark:bg-gray-800 relative min-h-[226px] p-[20px] shadow-sm hover:shadow-md transition-shadow">
						<div class="flex items-center">
							<div class="w-12 h-12 flex items-center justify-center mb-4 text-[#1e3a5f] dark:text-gray-100 mr-[10px]">
								<?php if ( $icon_src ) : ?>
									<img src="<?php echo esc_url( $icon_src ); ?>" alt="<?php the_title_attribute(); ?>" class="min-w-[58px] h-[44px]">
								<?php else : ?>
									<i data-lucide="lightbulb" class="w-6 h-6"></i>
								<?php endif; ?>
							</div>
							<h3 class="text-lg font-bold text-[#222222] leading-[1.2] dark:text-gray-100 mb-2"><?php the_title(); ?></h3>
							</div>
							<p class="text-base font-normal leading-[1.2] text-gray-600 dark:text-gray-300 mb-4"><?php echo esc_html( wp_strip_all_tags( get_field( 'service_description' ) ?: get_the_excerpt() ) ); ?></p>
							<a href="<?php echo esc_url( $category_link ); ?>" class="absolute bottom-[20px] basic-directions-btn bg-white border border-[#D0D6E8] rounded-sm hover:text-white text-[#1e3a5f] px-[20px] py-[5px] font-medium text-sm hover:bg-[#222222] inline-flex items-center gap-1">
							Подробнее
							</a>

						</div>
						<?php
					}
					wp_reset_postdata();
				} else {
					// Fallback static cards if no services
					for ( $i = 0; $i < 4; $i++ ) {
						?>
						<div class="bg-white dark:bg-gray-800 p-6 rounded-xl shadow-sm hover:shadow-md transition-shadow">
							<div class="w-12 h-12 bg-blue-50 dark:bg-blue-900 rounded-lg flex items-center justify-center mb-4 text-[#1e3a5f] dark:text-gray-100">
								<i data-lucide="lightbulb" class="w-6 h-6"></i>
							</div>
							<h3 class="text-lg font-bold text-[#222222] dark:text-gray-100 mb-2">Услуга <?php echo $i + 1; ?></h3>
							<p class="text-sm text-gray-600 dark:text-gray-300 mb-4">Описание услуги.</p>
							<a href="#" class="text-[#1e3a5f] dark:text-gray-100 font-medium text-sm hover:underline inline-flex items-center gap-1">
								Подробнее <i data-lucide="arrow-right" class="w-3 h-3"></i>
							</a>
						</div>
						<?php
					}
				}
				?>
			</div>
		</div>
	</section>

	<!-- About Section -->
	<section class="py-16 lg:py-24 bg-white dark:bg-gray-900 bg-[url('<?php the_field('sec4-bg') ?>')] bg-cover bg-center bg-no-repeat about-section">
		<div class="max-w-[1200px] mx-auto px-4 flex-col md:flex items-center">
			<div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
				<!-- Text Content -->
				<div class="max-w-[484px]">
					<h2 class="text-[44px] font-bold text-[#222222]"><?php the_field('sec4_heading') ?></h2>
					<h3 class="text-lg font-bold text-[#222222] mb-4"><?php the_field('sec4_subheading') ?></h3>
					<p class="text-gray-600 mb-3 text-base leading-[1.2]">
						<?php the_field('sec4_description') ?>
					</p>
					<p class="text-gray-600 mb-8 text-base leading-[1.2]">
						<?php the_field('sec4_description2') ?>
					</p>
				<?php
					$about_page = get_page_by_title( 'О Компании' );
					$about_url  = $about_page ? get_permalink( $about_page->ID ) : '#';
				?>
					<a href="<?php echo esc_url( $about_url ); ?>" class="basic-directions-btn inline-flex items-center gap-2 bg-white text-[#1e3a5f] border border-[#D0D6E8] px-8 py-3 rounded-sm font-medium hover:bg-gray-50 transition-colors">
						Подробнее о компании
					</a>
				</div>

				<!-- Image & Features -->
				<div class="relative">
					<div class="overflow-hidden shadow-lg mb-6">
						<img src="<?php the_field('sec4_img-right') ?>" alt="Robot" class="w-full h-auto md:min-h-[472px] md:min-w-[588px]">
					</div>
					<div class="grid grid-cols-2 gap-4 absolute bottom-[0px] max-w-[548px] pl-4">
						<div class="bg-white p-[20px] shadow-md flex items-start gap-[10px] flex flex-col">
							<img src="<?php the_field('sec4_icon1') ?>" class="" />
							<h4 class="font-bold text-[#222222] text-lg leading-[1.2]"><?php the_field('sec4_title1') ?></h4>
						</div>
						<div class="bg-white p-[20px] shadow-md flex items-start gap-[10px] flex flex-col">
							<img src="<?php the_field('sec4_icon1') ?>" class="" />
							<h4 class="font-bold text-[#222222] text-lg leading-[1.2]"><?php the_field('sec4_title2') ?></h4>
						</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- Projects Section -->
	<section class="py-16 lg:py-24 bg-[#f8fafc] dark:bg-gray-900 bg-[url('<?php the_field('sec5_bg') ?>')] bg-cover bg-center bg-no-repeat projects-section">
		<div class="max-w-[1200px] mx-auto px-4">
			<div class="flex flex-col lg:flex-row justify-between items-start lg:items-center mb-12 gap-4">
				<h2 class="text-3xl font-bold text-[#222222] dark:text-gray-100"><?php the_field('sec5_heading'); ?></h2>
				<?php
					$projects_page = get_page_by_title( 'Проекты' );
					$projects_url  = $projects_page ? get_permalink( $projects_page->ID ) : '#';
				?>
				<a href="<?php echo esc_url( $projects_url ); ?>" class="basic-directions-btn inline-flex items-center gap-2 bg-white text-[#1e3a5f] border border-[#D0D6E8] px-8 py-3 rounded-sm font-medium hover:bg-gray-50 transition-colors">
					Показать больше проектов
				</a>
			</div>

			<?php
			$projects_query = new WP_Query( array(
				'post_type'      => 'projects',
				'posts_per_page' => 5,
				'orderby'        => 'menu_order',
				'order'          => 'ASC',
			) );

			$projects = array();
			if ( $projects_query->have_posts() ) {
				while ( $projects_query->have_posts() ) {
					$projects_query->the_post();
					$projects[] = array(
						'title' => get_the_title(),
						'image' => get_field( 'project_image' ),
					);
				}
				wp_reset_postdata();
			}

			// Fill missing projects with placeholders if less than 5
			while ( count( $projects ) < 5 ) {
				$projects[] = array( 'title' => 'Проект', 'image' => null );
			}
			?>

			<!-- First Row: 3 items (1 large, 2 small) -->
			<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
				<!-- Project 1 (Large) -->
				<div class="md:col-span-2 lg:col-span-2 row-span-2 overflow-hidden group relative min-h-[400px]">
					<?php if ( $projects[0]['image'] && is_array( $projects[0]['image'] ) ) : ?>
						<img src="<?php echo esc_url( $projects[0]['image']['url'] ); ?>" alt="<?php echo esc_attr( $projects[0]['title'] ); ?>" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
					<?php else : ?>
						<div class="w-full h-full bg-gray-200 flex items-center justify-center">
							<span class="text-gray-400">Нет изображения</span>
						</div>
					<?php endif; ?>
					<div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent opacity-0 group-hover:opacity-100 transition-opacity flex items-end p-6">
						<span class="text-white font-medium"><?php echo esc_html( $projects[0]['title'] ); ?></span>
					</div>
				</div>

				<!-- Project 2 -->
				<div class="overflow-hidden group relative h-full min-h-[190px]">
					<?php if ( $projects[1]['image'] && is_array( $projects[1]['image'] ) ) : ?>
						<img src="<?php echo esc_url( $projects[1]['image']['url'] ); ?>" alt="<?php echo esc_attr( $projects[1]['title'] ); ?>" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
					<?php else : ?>
						<div class="w-full h-full bg-gray-200 flex items-center justify-center">
							<span class="text-gray-400">Нет изображения</span>
						</div>
					<?php endif; ?>
					<div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent opacity-0 group-hover:opacity-100 transition-opacity flex items-end p-6">
						<span class="text-white font-medium"><?php echo esc_html( $projects[1]['title'] ); ?></span>
					</div>
				</div>

				<!-- Project 3 -->
				<div class="overflow-hidden group relative h-full min-h-[190px]">
					<?php if ( $projects[2]['image'] && is_array( $projects[2]['image'] ) ) : ?>
						<img src="<?php echo esc_url( $projects[2]['image']['url'] ); ?>" alt="<?php echo esc_attr( $projects[2]['title'] ); ?>" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
					<?php else : ?>
						<div class="w-full h-full bg-gray-200 flex items-center justify-center">
							<span class="text-gray-400">Нет изображения</span>
						</div>
					<?php endif; ?>
					<div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent opacity-0 group-hover:opacity-100 transition-opacity flex items-end p-6">
						<span class="text-white font-medium"><?php echo esc_html( $projects[2]['title'] ); ?></span>
					</div>
				</div>
			</div>

			<!-- Projects 4 & 5 (Full width row) -->
			<div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-6">
				<!-- Project 4 -->
				<div class="overflow-hidden group relative h-64">
					<?php if ( $projects[3]['image'] && is_array( $projects[3]['image'] ) ) : ?>
						<img src="<?php echo esc_url( $projects[3]['image']['url'] ); ?>" alt="<?php echo esc_attr( $projects[3]['title'] ); ?>" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
					<?php else : ?>
						<div class="w-full h-full bg-gray-200 flex items-center justify-center">
							<span class="text-gray-400">Нет изображения</span>
						</div>
					<?php endif; ?>
					<div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent opacity-0 group-hover:opacity-100 transition-opacity flex items-end p-6">
						<span class="text-white font-medium"><?php echo esc_html( $projects[3]['title'] ); ?></span>
					</div>
				</div>

				<!-- Project 5 -->
				<div class="overflow-hidden group relative h-64">
					<?php if ( $projects[4]['image'] && is_array( $projects[4]['image'] ) ) : ?>
						<img src="<?php echo esc_url( $projects[4]['image']['url'] ); ?>" alt="<?php echo esc_attr( $projects[4]['title'] ); ?>" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
					<?php else : ?>
						<div class="w-full h-full bg-gray-200 flex items-center justify-center">
							<span class="text-gray-400">Нет изображения</span>
						</div>
					<?php endif; ?>
					<div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent opacity-0 group-hover:opacity-100 transition-opacity flex items-end p-6">
						<span class="text-white font-medium"><?php echo esc_html( $projects[4]['title'] ); ?></span>
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
