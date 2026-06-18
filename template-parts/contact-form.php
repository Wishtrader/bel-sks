<?php
/**
 * Contact Form Section — reads data from the Front Page ACF fields.
 *
 * Usage: get_template_part( 'template-parts/contact-form', 'form' );
 *
 * @package BelSKS
 */

$front_page_id = function_exists( 'belsks_get_front_page_id' ) ? belsks_get_front_page_id() : 0;

// --- Heading & description ---
$cf_heading = $front_page_id ? get_field( 'cf_heading', $front_page_id ) : '';
$cf_desc    = $front_page_id ? get_field( 'cf_desc', $front_page_id ) : '';

if ( ! $cf_heading ) {
	$cf_heading = 'Обсудим вашу задачу?';
}
if ( ! $cf_desc ) {
	$cf_desc = 'Свяжитесь с нами, чтобы получить консультацию, подобрать решение и запросить коммерческое предложение.';
}

// --- Background image ---
$cf_bg      = $front_page_id ? get_field( 'cf_bg', $front_page_id ) : '';
$cf_bg_url  = '';
if ( is_array( $cf_bg ) && ! empty( $cf_bg['url'] ) ) {
	$cf_bg_url = $cf_bg['url'];
} elseif ( is_string( $cf_bg ) && $cf_bg ) {
	$cf_bg_url = $cf_bg;
}
if ( ! $cf_bg_url ) {
	$cf_bg_url = get_template_directory_uri() . '/img/bg-7.png';
}

// --- Icons ---
$cf_viber_icon     = $front_page_id ? get_field( 'cf_viber_icon', $front_page_id ) : '';
$cf_telegram_icon  = $front_page_id ? get_field( 'cf_telegram_icon', $front_page_id ) : '';
$cf_whatsapp_icon  = $front_page_id ? get_field( 'cf_whatsapp_icon', $front_page_id ) : '';

$cf_viber_url     = '';
$cf_telegram_url  = '';
$cf_whatsapp_url  = '';

if ( is_array( $cf_viber_icon ) && ! empty( $cf_viber_icon['url'] ) ) {
	$cf_viber_url = $cf_viber_icon['url'];
} elseif ( is_string( $cf_viber_icon ) && $cf_viber_icon ) {
	$cf_viber_url = $cf_viber_icon;
}

if ( is_array( $cf_telegram_icon ) && ! empty( $cf_telegram_icon['url'] ) ) {
	$cf_telegram_url = $cf_telegram_icon['url'];
} elseif ( is_string( $cf_telegram_icon ) && $cf_telegram_icon ) {
	$cf_telegram_url = $cf_telegram_icon;
}

if ( is_array( $cf_whatsapp_icon ) && ! empty( $cf_whatsapp_icon['url'] ) ) {
	$cf_whatsapp_url = $cf_whatsapp_icon['url'];
} elseif ( is_string( $cf_whatsapp_icon ) && $cf_whatsapp_icon ) {
	$cf_whatsapp_url = $cf_whatsapp_icon;
}

$theme_uri = get_template_directory_uri();
?>
    <section id="contact-form" class="relative overflow-hidden bg-[url('<?php echo esc_url( $cf_bg_url ); ?>')] bg-cover bg-center bg-no-repeat contact-form-section">
        <div class="relative max-w-[1200px] mx-auto px-4 sm:px-6 lg:px-8 sm:py-20">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-10 lg:gap-16 items-center">
                <!-- Left column: text (1/3) -->
                <div class="max-w-lg lg:col-span-1 md:min-w-[400px]">
                    <h2 class="text-3xl sm:text-4xl lg:text-[40px] font-bold text-[#222222] leading-tight mb-6">
                        <?php echo esc_html( $cf_heading ); ?>
                    </h2>
                    <p class="text-[#3D3D3D] text-lg leading-[1.2]">
                        <?php echo esc_html( $cf_desc ); ?>
                    </p>
                </div>

                <!-- Right column: form (2/3) -->
                <form class="bg-white md:min-w-[700px] shadow-lg rounded-sm border border-gray-100 p-6 sm:p-8 lg:col-span-2">
                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 mb-6">
                        <!-- Name -->
                        <div class="sm:col-span-1">
                            <label class="block text-sm font-medium text-gray-700 mb-2">Ваше имя <span class="text-red-500">*</span></label>
                            <input type="text" placeholder="Ваше имя" class="w-full px-4 py-2.5 border border-gray-300 rounded focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500 text-gray-700">
                        </div>
                        <!-- Phone -->
                        <div class="sm:col-span-1">
                            <label class="block text-sm font-medium text-gray-700 mb-2">Укажите телефон или e-mail <span class="text-red-500">*</span></label>
                            <input type="tel" name="contact_phone" placeholder="+375 (XX) XXX-XX-XX" class="w-full px-4 py-2.5 border border-gray-300 rounded focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500 text-gray-700">
                        </div>
                        <!-- Email -->
                        <div class="sm:col-span-1">
                            <label class="block text-sm font-medium text-transparent mb-2 select-none">email</label>
                            <input type="email" placeholder="E-mail" class="w-full px-4 py-2.5 border border-gray-300 rounded focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500 text-gray-700">
                        </div>
                    </div>

                    <!-- Contact method -->
                    <div class="mb-2 sm:flex-col md:flex md:flex-row items-center">
                        <p class="text-sm font-medium text-[#294F78] mr-2 mb-2 md:mb-0">Предпочтительный способ связи:</p>
                        <div class="flex flex-wrap items-center gap-x-6 gap-y-2">
                            <label class="flex items-center cursor-pointer">
                                <input type="radio" name="contact_method" value="phone" class="w-4 h-4 text-blue-600 contact-method-radio" checked>
                                <span class="ml-2 text-gray-700">Телефон</span>
                            </label>
                            <label class="flex items-center cursor-pointer">
                                <input type="radio" name="contact_method" value="viber" class="w-4 h-4 text-blue-600 contact-method-radio mr-2">
                                <?php if ( $cf_viber_url ) : ?>
                                    <img src="<?php echo esc_url( $cf_viber_url ); ?>" alt="viber" class="w-[28px] h-[28px]">
                                <?php else : ?>
                                    <img src="<?php echo esc_url( $theme_uri . '/img/viber.svg' ); ?>" alt="viber" class="w-[28px] h-[28px]">
                                <?php endif; ?>
                            </label>
                            <label class="flex items-center cursor-pointer">
                                <input type="radio" name="contact_method" value="telegram" class="w-4 h-4 text-blue-600 contact-method-radio mr-2">
                                <?php if ( $cf_telegram_url ) : ?>
                                    <img src="<?php echo esc_url( $cf_telegram_url ); ?>" alt="telegram" class="w-[28px] h-[28px]">
                                <?php else : ?>
                                    <img src="<?php echo esc_url( $theme_uri . '/img/telegram.svg' ); ?>" alt="telegram" class="w-[28px] h-[28px]">
                                <?php endif; ?>
                            </label>
                            <label class="flex items-center cursor-pointer">
                                <input type="radio" name="contact_method" value="whatsapp" class="w-4 h-4 text-blue-600 contact-method-radio mr-2">
                                <?php if ( $cf_whatsapp_url ) : ?>
                                    <img src="<?php echo esc_url( $cf_whatsapp_url ); ?>" alt="whatsup" class="w-[28px] h-[28px]">
                                <?php else : ?>
                                    <img src="<?php echo esc_url( $theme_uri . '/img/wu.svg' ); ?>" alt="whatsup" class="w-[28px] h-[28px]">
                                <?php endif; ?>
                            </label>
                        </div>
                    </div>

                    <!-- Comment -->
                    <div class="mb-6">
											<label class="text-sm font-medium text-[#294F78]">Комментарий</label>
											<textarea rows="1" placeholder="Опишите вашу задачу" class="w-full px-4 py-3 border border-gray-300 rounded focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500 resize-none"></textarea>
                    </div>

                    <!-- Checkbox + Button -->
                    <div class="flex flex-col items-center sm:flex-row sm:items-center gap-4">
                        <label class="flex items-start cursor-pointer">
                            <input type="checkbox" checked class="w-[20px] h-[20px] text-[#294F78] rounded" style="accent-color: #294F78;">
                            <span class="ml-2 text-sm text-gray-700">
                                Соглашаюсь с <a href="#" class="underline hover:text-blue-600">политикой обработки персональных данных</a>
                            </span>
                        </label>
                    </div>

                    <button type="submit" class="mt-4 sm:mt-6 inline-flex items-center justify-center px-8 py-3 bg-[#294F78] hover:bg-blue-800 text-white font-medium rounded shadow-md transition-colors">
                        Отправить заявку
                    </button>
                </form>
            </div>
        </div>
    </section>
