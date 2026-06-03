<?php
/**
 * WooCommerce Cart Template Override
 *
 * Custom 2-column layout: items + checkout form (left) | order summary + info (right).
 *
 * @package BelSKS
 */

defined( 'ABSPATH' ) || exit;

get_header();

$cart           = WC()->cart;
$items          = $cart->get_cart();
$cart_count     = (int) $cart->get_cart_contents_count();
$cart_subtotal  = (float) $cart->get_cart_contents_total();
$cart_url       = wc_get_cart_url();
$empty_cart_url = add_query_arg( 'empty_cart', 'yes', $cart_url );

$catalog_page = get_page_by_path( 'katalog' );
if ( ! $catalog_page ) {
	$catalog_q = new WP_Query( array(
		'post_type'      => 'page',
		'title'          => 'Каталог',
		'posts_per_page' => 1,
		'fields'         => 'ids',
	) );
	$catalog_page = ! empty( $catalog_q->posts ) ? $catalog_q->posts[0] : 0;
}
$catalog_url = $catalog_page ? get_permalink( $catalog_page ) : home_url( '/' );
?>

<main class="bg-[#f7f7fb]">

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
				<span class="text-slate-600">Корзина</span>
			</nav>

			<h1 class="mb-8 text-[40px] font-extrabold leading-none text-slate-900 sm:mb-10 sm:text-[54px]">
				Корзина
			</h1>

			<?php if ( ! empty( $items ) ) : ?>

				<div class="grid gap-8 lg:grid-cols-[minmax(0,1fr)_380px] lg:items-start">

					<div>

						<form class="woocommerce-cart-form" action="<?php echo esc_url( $cart_url ); ?>" method="post">
							<?php do_action( 'woocommerce_before_cart_contents' ); ?>

							<div class="space-y-4" data-cart-items>
								<?php foreach ( $items as $cart_key => $item ) :
									$_product = apply_filters( 'woocommerce_cart_item_product', $item['data'], $item, $cart_key );
									if ( ! $_product || ! $_product->exists() || $item['quantity'] <= 0 ) {
										continue;
									}
									$product_id = $_product->get_id();
									$sku        = $_product->get_sku();
									$price      = (float) $_product->get_price();
									$qty        = (int) $item['quantity'];
									$line_total = $price * $qty;
									$image_id   = $_product->get_image_id();
									$image_url  = $image_id ? wp_get_attachment_image_url( $image_id, 'medium' ) : wc_placeholder_img_src();
									$remove_url = wc_get_cart_remove_url( $cart_key );
									?>
									<div class="flex items-center gap-4 bg-white p-4 shadow-[0_2px_12px_rgba(15,23,42,0.08)] sm:gap-6 sm:p-6" data-cart-item-key="<?php echo esc_attr( $cart_key ); ?>">
										<a href="<?php echo esc_url( $_product->get_permalink() ); ?>" class="block h-[88px] w-[88px] flex-shrink-0 overflow-hidden bg-slate-50 sm:h-[120px] sm:w-[120px]">
											<img src="<?php echo esc_url( $image_url ); ?>" alt="<?php echo esc_attr( $_product->get_name() ); ?>" class="h-full w-full object-contain">
										</a>

										<div class="min-w-0 flex-1">
											<a href="<?php echo esc_url( $_product->get_permalink() ); ?>" class="block text-[15px] font-semibold leading-snug text-slate-900 hover:text-[#1e3a5f] sm:text-[16px]">
												<?php echo esc_html( $_product->get_name() ); ?>
											</a>
											<?php if ( $sku ) : ?>
												<div class="mt-2 text-[13px] text-slate-400">Арт. <?php echo esc_html( $sku ); ?></div>
											<?php endif; ?>
										</div>

										<div class="flex items-center gap-2 rounded-sm border border-slate-200 px-2 py-1 sm:gap-3" data-qty-stepper>
											<button type="button" data-qty-minus class="flex h-7 w-7 items-center justify-center text-[18px] font-semibold text-slate-500 hover:text-slate-900" aria-label="Уменьшить">−</button>
											<input type="number" name="cart[<?php echo esc_attr( $cart_key ); ?>][qty]" value="<?php echo esc_attr( $qty ); ?>" min="1" step="1" inputmode="numeric" data-qty-input class="w-10 border-x border-slate-200 bg-transparent text-center text-[15px] font-semibold text-slate-900 focus:outline-none">
											<button type="button" data-qty-plus class="flex h-7 w-7 items-center justify-center text-[18px] font-semibold text-slate-500 hover:text-slate-900" aria-label="Увеличить">+</button>
										</div>

										<div class="hidden text-right text-[18px] font-bold text-[#1e3a5f] sm:block sm:w-[120px]" data-line-total data-price="<?php echo esc_attr( $price ); ?>">
											<?php echo esc_html( number_format( $line_total, 0, '.', ' ' ) ); ?> руб
										</div>

										<a href="<?php echo esc_url( $remove_url ); ?>" class="flex h-7 w-7 flex-shrink-0 items-center justify-center text-slate-300 transition-colors hover:text-red-500" aria-label="Удалить" data-cart-remove>
											<svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
										</a>
									</div>
								<?php endforeach; ?>
							</div>

							<button type="submit" class="woocommerce-cart-update hidden" name="update_cart" value="1" data-cart-update>Обновить</button>
							<?php do_action( 'woocommerce_cart_actions' ); ?>
							<?php wp_nonce_field( 'woocommerce-cart', 'woocommerce-cart-nonce' ); ?>
						</form>

						<div class="mt-4">
							<a href="<?php echo esc_url( $empty_cart_url ); ?>" class="inline-flex items-center gap-2 border border-slate-200 bg-white px-4 py-2 text-[14px] font-medium text-slate-700 transition-colors hover:border-red-300 hover:text-red-500" data-cart-empty>
								<svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6l-1 14a2 2 0 0 1-2 2H8a2 2 0 0 1-2-2L5 6"></path><path d="M10 11v6"></path><path d="M14 11v6"></path><path d="M9 6V4a2 2 0 0 1 2-2h2a2 2 0 0 1 2 2v2"></path></svg>
								Очистить корзину
							</a>
						</div>

						<!-- Checkout form -->
						<div class="mt-10 bg-white p-6 shadow-[0_2px_12px_rgba(15,23,42,0.08)] sm:mt-12 sm:p-8" data-checkout-tabs>
							<h2 class="mb-6 text-[22px] font-bold text-[#1e3a5f] sm:text-[26px]">Оформление заказа</h2>

							<div role="tablist" class="-mb-px flex gap-2 border-b border-slate-200 sm:gap-0">
								<button type="button" role="tab" id="tab-legal" aria-controls="panel-legal" aria-selected="true" data-checkout-trigger="legal" class="border-b-[3px] border-[#1e3a5f] px-4 py-3 text-[14px] font-bold uppercase tracking-wide text-[#1e3a5f] sm:px-8">
									Юридическое лицо
								</button>
								<button type="button" role="tab" id="tab-individual" aria-controls="panel-individual" aria-selected="false" data-checkout-trigger="individual" class="border-b-[3px] border-transparent px-4 py-3 text-[14px] font-bold uppercase tracking-wide text-slate-400 transition-colors hover:text-slate-700 sm:px-8">
									Физическое лицо
								</button>
							</div>

							<form class="mt-6 space-y-6" data-checkout-form="legal">
								<div class="grid gap-4 sm:grid-cols-2">
									<div>
										<label class="mb-2 block text-[14px] font-semibold text-[#1e3a5f]">Ваше имя <span class="text-red-500">*</span></label>
										<input type="text" name="billing_first_name" placeholder="Ваше имя" required class="w-full border border-slate-200 bg-white px-4 py-3 text-[15px] focus:border-[#1e3a5f] focus:outline-none focus:ring-1 focus:ring-[#1e3a5f]">
									</div>
									<div>
										<label class="mb-2 block text-[14px] font-semibold text-[#1e3a5f]">УНП <span class="text-red-500">*</span></label>
										<input type="text" name="billing_company_id" placeholder="УНП" required class="w-full border border-slate-200 bg-white px-4 py-3 text-[15px] focus:border-[#1e3a5f] focus:outline-none focus:ring-1 focus:ring-[#1e3a5f]">
									</div>
									<div class="sm:col-span-2">
										<label class="mb-2 block text-[14px] font-semibold text-[#1e3a5f]">Название компании</label>
										<input type="text" name="billing_company" placeholder="Название" class="w-full border border-slate-200 bg-white px-4 py-3 text-[15px] focus:border-[#1e3a5f] focus:outline-none focus:ring-1 focus:ring-[#1e3a5f]">
									</div>
								</div>

								<div class="grid gap-4 sm:grid-cols-2">
									<div>
										<label class="mb-2 block text-[14px] font-semibold text-[#1e3a5f]">Телефон <span class="text-red-500">*</span></label>
										<input type="tel" name="billing_phone" placeholder="+375 (__) ___-__-__" required class="w-full border border-slate-200 bg-white px-4 py-3 text-[15px] focus:border-[#1e3a5f] focus:outline-none focus:ring-1 focus:ring-[#1e3a5f]">
									</div>
									<div>
										<label class="mb-2 block text-[14px] font-semibold text-[#1e3a5f]">E-mail <span class="text-red-500">*</span></label>
										<input type="email" name="billing_email" placeholder="E-mail" required class="w-full border border-slate-200 bg-white px-4 py-3 text-[15px] focus:border-[#1e3a5f] focus:outline-none focus:ring-1 focus:ring-[#1e3a5f]">
									</div>
								</div>

								<button type="button" class="inline-flex items-center gap-2 text-[14px] font-semibold text-[#1e3a5f] hover:underline">
									<svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21.44 11.05l-9.19 9.19a6 6 0 0 1-8.49-8.49l9.19-9.19a4 4 0 0 1 5.66 5.66l-9.2 9.19a2 2 0 0 1-2.83-2.83l8.49-8.48"></path></svg>
									Прикрепить реквизиты
								</button>

								<div>
									<div class="mb-3 text-[15px] font-bold text-slate-900">Способ получения</div>
									<div class="space-y-2">
										<label class="flex items-start gap-2 text-[15px] text-slate-700">
											<input type="radio" name="shipping_method" value="delivery" checked class="mt-1">
											<span>Доставка</span>
										</label>
										<label class="flex items-start gap-2 text-[15px] text-slate-700">
											<input type="radio" name="shipping_method" value="pickup" class="mt-1">
											<span>Самовывоз (г. Минск, ул. Бирюзова, 4/5, офис 4004А)</span>
										</label>
									</div>
								</div>

								<div>
									<label class="mb-2 block text-[14px] font-semibold text-[#1e3a5f]">Адрес доставки</label>
									<input type="text" name="shipping_address" placeholder="Адрес" class="w-full border border-slate-200 bg-white px-4 py-3 text-[15px] focus:border-[#1e3a5f] focus:outline-none focus:ring-1 focus:ring-[#1e3a5f]">
								</div>

								<div>
									<div class="mb-3 text-[15px] font-bold text-slate-900">Способ оплаты</div>
									<div class="space-y-2">
										<label class="flex items-start gap-2 text-[15px] text-slate-700">
											<input type="radio" name="payment_method" value="invoice" class="mt-1">
											<span>Оплата по счёту</span>
										</label>
										<label class="flex items-start gap-2 text-[15px] text-slate-700">
											<input type="radio" name="payment_method" value="manager" checked class="mt-1">
											<span>Уточнить с менеджером</span>
										</label>
									</div>
								</div>

								<div>
									<label class="mb-2 block text-[14px] font-semibold text-[#1e3a5f]">Комментарий к заказу</label>
									<textarea name="order_comments" rows="3" placeholder="Комментарий" class="w-full border border-slate-200 bg-white px-4 py-3 text-[15px] focus:border-[#1e3a5f] focus:outline-none focus:ring-1 focus:ring-[#1e3a5f]"></textarea>
								</div>
							</form>

							<form class="mt-6 hidden space-y-6" data-checkout-form="individual">
								<div class="grid gap-4 sm:grid-cols-2 lg:grid-cols-3">
									<div>
										<label class="mb-2 block text-[14px] font-semibold text-[#1e3a5f]">Ваше имя <span class="text-red-500">*</span></label>
										<input type="text" name="billing_first_name_i" placeholder="Ваше имя" required class="w-full border border-slate-200 bg-white px-4 py-3 text-[15px] focus:border-[#1e3a5f] focus:outline-none focus:ring-1 focus:ring-[#1e3a5f]">
									</div>
									<div>
										<label class="mb-2 block text-[14px] font-semibold text-[#1e3a5f]">Телефон <span class="text-red-500">*</span></label>
										<input type="tel" name="billing_phone_i" placeholder="+375 (__) ___-__-__" required class="w-full border border-slate-200 bg-white px-4 py-3 text-[15px] focus:border-[#1e3a5f] focus:outline-none focus:ring-1 focus:ring-[#1e3a5f]">
									</div>
									<div>
										<label class="mb-2 block text-[14px] font-semibold text-[#1e3a5f]">E-mail <span class="text-red-500">*</span></label>
										<input type="email" name="billing_email_i" placeholder="E-mail" required class="w-full border border-slate-200 bg-white px-4 py-3 text-[15px] focus:border-[#1e3a5f] focus:outline-none focus:ring-1 focus:ring-[#1e3a5f]">
									</div>
								</div>

								<div>
									<div class="mb-3 text-[15px] font-bold text-slate-900">Способ получения</div>
									<div class="space-y-2">
										<label class="flex items-start gap-2 text-[15px] text-slate-700">
											<input type="radio" name="shipping_method_i" value="delivery" checked class="mt-1">
											<span>Доставка</span>
										</label>
										<label class="flex items-start gap-2 text-[15px] text-slate-700">
											<input type="radio" name="shipping_method_i" value="pickup" class="mt-1">
											<span>Самовывоз (г. Минск, ул. Бирюзова, 4/5, офис 4004А)</span>
										</label>
									</div>
								</div>

								<div>
									<label class="mb-2 block text-[14px] font-semibold text-[#1e3a5f]">Адрес доставки</label>
									<input type="text" name="shipping_address_i" placeholder="Адрес" class="w-full border border-slate-200 bg-white px-4 py-3 text-[15px] focus:border-[#1e3a5f] focus:outline-none focus:ring-1 focus:ring-[#1e3a5f]">
								</div>

								<div>
									<div class="mb-3 text-[15px] font-bold text-slate-900">Способ оплаты</div>
									<div class="space-y-2">
										<label class="flex items-start gap-2 text-[15px] text-slate-700">
											<input type="radio" name="payment_method_i" value="internet_banking" class="mt-1">
											<span>Оплата через интернет-банкинг</span>
										</label>
										<label class="flex items-start gap-2 text-[15px] text-slate-700">
											<input type="radio" name="payment_method_i" value="manager" checked class="mt-1">
											<span>Уточнить с менеджером</span>
										</label>
									</div>
								</div>

								<div>
									<label class="mb-2 block text-[14px] font-semibold text-[#1e3a5f]">Комментарий к заказу</label>
									<textarea name="order_comments_i" rows="3" placeholder="Комментарий" class="w-full border border-slate-200 bg-white px-4 py-3 text-[15px] focus:border-[#1e3a5f] focus:outline-none focus:ring-1 focus:ring-[#1e3a5f]"></textarea>
								</div>
							</form>
						</div>

					</div>

					<aside class="space-y-6 lg:sticky lg:top-32">
						<div class="bg-white p-6 shadow-[0_2px_12px_rgba(15,23,42,0.08)] sm:p-8">
							<h2 class="mb-5 text-[20px] font-bold text-slate-900">Ваш заказ</h2>
							<dl class="mb-6 space-y-2 text-[15px]">
								<div class="flex items-baseline justify-between">
									<dt class="text-slate-500">Товаров</dt>
									<dd class="font-semibold text-slate-900" data-cart-summary-count><?php echo esc_html( $cart_count ); ?></dd>
								</div>
								<div class="flex items-baseline justify-between">
									<dt class="text-slate-500">Стоимость</dt>
									<dd class="font-semibold text-slate-900" data-cart-summary-total><?php echo esc_html( number_format( $cart_subtotal, 0, '.', ' ' ) ); ?> руб</dd>
								</div>
							</dl>
							<button type="button" data-checkout-submit class="mb-3 w-full bg-[#1e3a5f] py-4 text-[15px] font-semibold uppercase tracking-wide text-white transition hover:bg-[#142d4a] disabled:bg-slate-400 disabled:cursor-not-allowed">
								Оформить заказ
							</button>
							<div data-checkout-error class="hidden mb-3 rounded-sm border border-red-200 bg-red-50 px-3 py-2 text-[13px] text-red-700"></div>
							<a href="<?php echo esc_url( $catalog_url ); ?>" class="block w-full border border-slate-200 bg-white py-3 text-center text-[15px] font-semibold text-slate-700 transition hover:bg-slate-50">
								Продолжить выбор
							</a>
						</div>

						<div class="bg-white p-6 shadow-[0_2px_12px_rgba(15,23,42,0.08)] sm:p-8">
							<div class="mb-4 flex items-start gap-3">
								<svg class="mt-0.5 h-5 w-5 flex-shrink-0 text-[#1e3a5f]" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="16" x2="12" y2="12"></line><line x1="12" y1="8" x2="12.01" y2="8"></line></svg>
								<h3 class="text-[15px] font-bold text-slate-900">Как будет происходить оформление</h3>
							</div>
							<ul class="space-y-3 text-[14px] leading-relaxed text-slate-600">
								<li class="flex gap-2"><span class="text-slate-400">•</span><span>Физическим лицам — подтверждение заказа и инструкция по оплате</span></li>
								<li class="flex gap-2"><span class="text-slate-400">•</span><span>Юридическим лицам — выставление счёта после обработки заявки</span></li>
								<li class="flex gap-2"><span class="text-slate-400">•</span><span>Условия доставки и самовывоза согласовываются с менеджером после оформления заказа на сайте</span></li>
							</ul>
						</div>
					</aside>

				</div>

			<?php else : ?>

				<div class="bg-white p-10 text-center shadow-[0_2px_12px_rgba(15,23,42,0.08)] sm:p-16">
					<p class="mb-6 text-[18px] text-slate-600">Ваша корзина пуста.</p>
					<a href="<?php echo esc_url( $catalog_url ); ?>" class="inline-flex items-center justify-center bg-[#1e3a5f] px-8 py-3 text-[15px] font-semibold text-white transition hover:bg-[#142d4a]">
						Перейти в каталог
					</a>
				</div>

			<?php endif; ?>
		</div>
	</section>

	<?php get_template_part( 'template-parts/contact-form', 'form' ); ?>
</main>

<?php if ( ! empty( $items ) ) : ?>
<script>
(function() {
	function syncQty(input, delta) {
		var v = parseInt(input.value, 10) || 1;
		v = Math.max(1, v + delta);
		input.value = v;
		input.dispatchEvent(new Event('change', { bubbles: true }));
	}
	function submitUpdate() {
		var btn = document.querySelector('[data-cart-update]');
		if (btn) btn.click();
	}
	document.querySelectorAll('[data-qty-stepper]').forEach(function(stepper) {
		var minus = stepper.querySelector('[data-qty-minus]');
		var plus  = stepper.querySelector('[data-qty-plus]');
		var input = stepper.querySelector('[data-qty-input]');
		if (minus) minus.addEventListener('click', function(e) { e.preventDefault(); syncQty(input, -1); submitUpdate(); });
		if (plus)  plus.addEventListener('click',  function(e) { e.preventDefault(); syncQty(input, +1); submitUpdate(); });
		if (input) input.addEventListener('change', function() { submitUpdate(); });
	});

	var root = document.querySelector('[data-checkout-tabs]');
	if (root) {
		var triggers = root.querySelectorAll('[data-checkout-trigger]');
		var forms    = root.querySelectorAll('[data-checkout-form]');
		triggers.forEach(function(btn) {
			btn.addEventListener('click', function() {
				var name = btn.getAttribute('data-checkout-trigger');
				triggers.forEach(function(b) {
					var active = b === btn;
					b.setAttribute('aria-selected', active ? 'true' : 'false');
					b.classList.toggle('border-[#1e3a5f]', active);
					b.classList.toggle('text-[#1e3a5f]', active);
					b.classList.toggle('border-transparent', !active);
					b.classList.toggle('text-slate-400', !active);
				});
				forms.forEach(function(f) {
					f.classList.toggle('hidden', f.getAttribute('data-checkout-form') !== name);
				});
			});
		});
	}

	// Submit handler — send the visible form to the custom AJAX endpoint
	// and redirect to the order confirmation page on success.
	var submitBtn = document.querySelector('[data-checkout-submit]');
	var errorBox  = document.querySelector('[data-checkout-error]');

	function activeCustomerType() {
		var active = document.querySelector('[data-checkout-trigger][aria-selected="true"]');
		return active ? active.getAttribute('data-checkout-trigger') : 'legal';
	}

	function collectFormData() {
		var type = activeCustomerType();
		var form = document.querySelector('[data-checkout-form="' + type + '"]');
		var fd = new FormData();
		fd.append('action', 'belsks_create_order');
		fd.append('nonce', (window.belsksCart && window.belsksCart.createNonce) || '');
		fd.append('customer_type', type);
		if (form) {
			form.querySelectorAll('input, textarea, select').forEach(function(el) {
				if (!el.name) return;
				if (el.type === 'radio') {
					if (el.checked) fd.append(el.name, el.value);
				} else {
					fd.append(el.name, el.value);
				}
			});
		}
		return fd;
	}

	function showError(msg) {
		if (!errorBox) return;
		errorBox.textContent = msg;
		errorBox.classList.remove('hidden');
	}

	function clearError() {
		if (!errorBox) return;
		errorBox.textContent = '';
		errorBox.classList.add('hidden');
	}

	if (submitBtn) {
		submitBtn.addEventListener('click', function(e) {
			e.preventDefault();
			clearError();
			submitBtn.disabled = true;
			var oldText = submitBtn.textContent;
			submitBtn.textContent = 'Оформляем...';

			fetch((window.belsksCart && window.belsksCart.ajaxUrl) || '/wp-admin/admin-ajax.php', {
				method: 'POST',
				body:   collectFormData(),
				credentials: 'same-origin'
			})
			.then(function(r) { return r.json(); })
			.then(function(json) {
				if (json && json.success && json.data && json.data.redirect) {
					window.location.href = json.data.redirect;
					return;
				}
				var msg = (json && json.data && json.data.message) ? json.data.message : 'Не удалось оформить заказ. Попробуйте ещё раз.';
				showError(msg);
				submitBtn.disabled = false;
				submitBtn.textContent = oldText;
			})
			.catch(function() {
				showError('Ошибка сети. Попробуйте ещё раз.');
				submitBtn.disabled = false;
				submitBtn.textContent = oldText;
			});
		});
	}
})();
</script>
<?php endif; ?>

<?php
get_footer();
