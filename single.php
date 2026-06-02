<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package BelSKS
 */

get_header();
?>

<main class="max-w-[1200px] mx-auto px-4 py-8 md:py-12">
	<?php
	while ( have_posts() ) :
		the_post();
		?>
		<!-- Breadcrumbs -->
		<nav class="flex items-center text-sm text-gray-500 mb-8 overflow-x-auto whitespace-nowrap">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="hover:text-blue-600 transition-colors">Главная</a>
			<span class="mx-2">/</span>
			<a href="<?php echo esc_url( get_post_type_archive_link( 'post' ) ); ?>" class="hover:text-blue-600 transition-colors">Новости</a>
			<span class="mx-2">/</span>
			<span class="text-gray-400"><?php the_title(); ?></span>
		</nav>

		<!-- Article Header -->
		<header class="mb-10">
			<h1 class="text-3xl md:text-4xl lg:text-5xl font-bold leading-tight mb-6 max-w-4xl text-[#222222] dark:text-gray-100">
				<?php the_title(); ?>
			</h1>
			<div class="flex items-center text-gray-500 text-sm dark:text-gray-400">
				<svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
					<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
				</svg>
				<span><?php echo esc_html( get_the_date( 'd F Y' ) ); ?></span>
			</div>
		</header>

		<!-- Hero Image -->
		<?php if ( has_post_thumbnail() ) : ?>
			<div class="mb-12 rounded-sm overflow-hidden shadow-sm">
				<?php the_post_thumbnail( 'large', array( 'class' => 'w-full h-auto object-cover max-h-[600px]' ) ); ?>
			</div>
		<?php endif; ?>

		<!-- Article Content -->
		<article class="max-w-4xl text-black dark:text-gray-100 leading-relaxed space-y-6 text-base md:text-lg mb-20">
			<?php the_content(); ?>
		</article>

		<!-- Related Section -->
		<section class="mb-16">
			<h2 class="text-2xl md:text-3xl font-bold mb-8 text-[#222222] dark:text-gray-100">Читайте также</h2>
			<div class="grid grid-cols-1 md:grid-cols-2 gap-6">
				<?php
				$related_query = new WP_Query( array(
					'post_type'      => 'post',
					'posts_per_page' => 2,
					'post__not_in'   => array( get_the_ID() ),
					'orderby'        => 'date',
					'order'          => 'DESC',
				) );

				if ( $related_query->have_posts() ) :
					while ( $related_query->have_posts() ) :
						$related_query->the_post();
						?>
						<a href="<?php the_permalink(); ?>" class="group bg-white dark:bg-gray-800 flex flex-col sm:flex-row overflow-hidden shadow-sm hover:shadow-md transition-shadow duration-300">
							<div class="sm:w-2/5 h-48 sm:h-auto overflow-hidden">
								<?php if ( has_post_thumbnail() ) : ?>
									<?php the_post_thumbnail( 'medium', array( 'class' => 'w-full h-full object-cover group-hover:scale-105 transition-transform duration-500' ) ); ?>
								<?php else : ?>
									<div class="w-full h-full bg-gray-200 dark:bg-gray-700"></div>
								<?php endif; ?>
							</div>
							<div class="p-6 sm:w-3/5 flex flex-col justify-center">
								<div class="flex items-center text-gray-400 dark:text-gray-500 text-xs mb-3">
									<svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
										<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
									</svg>
									<span><?php echo esc_html( get_the_date( 'd F Y' ) ); ?></span>
								</div>
								<h3 class="font-bold text-lg leading-snug group-hover:text-blue-700 dark:group-hover:text-blue-400 transition-colors text-[#222222] dark:text-gray-100">
									<?php the_title(); ?>
								</h3>
							</div>
						</a>
						<?php
					endwhile;
					wp_reset_postdata();
				endif;
				?>
			</div>
		</section>
		<?php
	endwhile;
	?>
</main>

<?php
get_footer();