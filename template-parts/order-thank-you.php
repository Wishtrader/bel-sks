<?php
/**
 * Order confirmation / thank-you page
 *
 * Rendered by [belsks_order_thank_you] shortcode on the
 * "Заказ оформлен" page.
 *
 * @package BelSKS
 */
?>

<section class="relative overflow-hidden bg-[#f7f7fb] py-10 sm:py-14 lg:py-16">
	<div class="pointer-events-none absolute inset-0">
		<div class="absolute left-0 top-0 h-px w-full bg-white/70"></div>
		<div class="absolute -left-40 top-24 h-[2px] w-[130%] rotate-[-45deg] bg-gradient-to-r from-transparent via-slate-200/50 to-transparent"></div>
		<div class="absolute left-[38%] top-0 h-[2px] w-[70%] rotate-[-45deg] bg-gradient-to-r from-transparent via-slate-200/40 to-transparent"></div>
		<div class="absolute right-0 top-[22%] h-px w-[55%] bg-slate-200/50"></div>
	</div>

	<div class="relative mx-auto w-full max-w-[1200px] px-4 sm:px-6 lg:px-0">
		<nav class="mb-8 text-[15px] leading-none text-slate-500 sm:mb-10 md:mt-12">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="transition-colors hover:text-slate-700">Главная</a>
			<span class="mx-2 text-slate-400">/</span>
			<?php
			$cart_page = get_page_by_path( 'cart' );
			if ( ! $cart_page ) {
				$cart_q = new WP_Query( array(
					'post_type'      => 'page',
					'title'          => 'Корзина',
					'posts_per_page' => 1,
					'fields'         => 'ids',
				) );
				$cart_page = ! empty( $cart_q->posts ) ? $cart_q->posts[0] : 0;
			}
			$cart_url = $cart_page ? get_permalink( $cart_page ) : home_url( '/cart/' );
			?>
			<a href="<?php echo esc_url( $cart_url ); ?>" class="transition-colors hover:text-slate-700">Корзина</a>
			<span class="mx-2 text-slate-400">/</span>
			<span class="text-slate-600">Заказ оформлен</span>
		</nav>

		<h1 class="mb-8 text-[40px] font-extrabold leading-none text-slate-900 sm:mb-10 sm:text-[54px]">
			Заказ оформлен
		</h1>

		<div class="mt-2 flex flex-col items-start gap-6 sm:flex-row sm:items-start sm:gap-8">
			<div class="flex h-20 w-20 flex-shrink-0 items-center justify-center rounded-full border-[3px] border-emerald-500 bg-white sm:h-24 sm:w-24">
				<svg class="h-10 w-10 text-emerald-500 sm:h-12 sm:w-12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
					<polyline points="20 6 9 17 4 12"></polyline>
				</svg>
			</div>

			<div class="max-w-[640px] flex-1">
				<p class="text-[16px] font-semibold leading-relaxed text-slate-900 sm:text-[17px]">
					Ваш заказ поступил в обработку, в ближайшее время с Вами свяжется менеджер для уточнения деталей!
				</p>

				<?php
				$order_id = isset( $_GET['order'] ) ? absint( $_GET['order'] ) : 0;
				if ( $order_id ) :
					$order = wc_get_order( $order_id );
					if ( $order ) :
						?>
						<p class="mt-3 text-[15px] text-slate-600">
							Номер заказа: <span class="font-semibold text-slate-900">#<?php echo esc_html( $order->get_order_number() ); ?></span>
						</p>
					<?php endif; ?>
				<?php endif; ?>

				<p class="mt-5 text-[15px] text-slate-600">
					При возникновении вопросов вы можете связаться с нами по телефонам:
				</p>

				<div class="mt-3 flex flex-col gap-3 text-[15px] sm:flex-row sm:flex-wrap sm:gap-x-8 sm:gap-y-3">
					<?php
					$phone_icon = file_get_contents( get_template_directory() . '/img/phone-icon.svg' );
					$phone_icon = str_replace( '<svg', '<svg class="phone-icon h-4 w-4 flex-shrink-0 text-[#1e3a5f]"', $phone_icon );
					?>
					<a href="tel:+375172381717" class="inline-flex items-center gap-2 font-semibold text-slate-900 hover:text-[#1e3a5f]">
						<?php echo $phone_icon; ?>
						<span>+375 17 238 17 17</span>
					</a>
					<a href="tel:+375173748682" class="inline-flex items-center gap-2 font-semibold text-slate-900 hover:text-[#1e3a5f]">
						<?php echo $phone_icon; ?>
						<span>+375 17 374 86 82</span>
					</a>
					<a href="tel:+375447797030" class="inline-flex items-center gap-2 font-semibold text-slate-900 hover:text-[#1e3a5f]">
						<?php echo $phone_icon; ?>
						<span>+375 44 779 70 30</span>
					</a>
				</div>
			</div>
		</div>

		<div class="mt-10 sm:mt-12">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="inline-flex items-center justify-center bg-[#1e3a5f] px-12 py-4 text-[15px] font-semibold uppercase tracking-wide text-white transition hover:bg-[#142d4a]">
				На главную
			</a>
		</div>
	</div>
</section>

<?php get_template_part( 'template-parts/contact-form', 'form' ); ?>
