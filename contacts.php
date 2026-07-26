<?php

/**
 * Template Name: Contacts
 * Template Post Type: page
 *
 * @package BelSKS
 */

get_header();

$contact_hero_title = get_field('contact_hero_title') ?: 'Контакты';
$contact_page_bg = get_field('contact_page_bg');
$contact_page_bg_url = is_array($contact_page_bg) ? $contact_page_bg['url'] ?? '' : '';
$contact_breadcrumb = get_field('contact_breadcrumb_home') ?: 'Главная';

$contact_address_title = get_field('contact_address_title') ?: 'Адрес офиса';
$contact_address = get_field('contact_address');
$contact_address_lines = $contact_address
    ? array_filter(explode("\n", $contact_address))
    : array('220073, Беларусь, г. Минск,', 'ул. Бирюзова, 4/5, офис 4004А');

$contact_hours_title = get_field('contact_hours_title') ?: 'Время работы';
$contact_hours = get_field('contact_hours');
$contact_hours_lines = $contact_hours
    ? array_filter(explode("\n", $contact_hours))
    : array('Пн-Пт: 9:00 – 18:00', 'Сб-Вс: Выходной');

$contact_phones_title = get_field('contact_phones_title') ?: 'Телефоны';
$contact_phones = get_field('contact_phones');

$contact_email_title = get_field('contact_email_title') ?: 'Электронная почта';
$contact_emails = get_field('contact_emails');

$contact_social_label = get_field('contact_social_label') ?: 'Мы в соц сетях';
$contact_socials = get_field('contact_socials');

$contact_map_embed = get_field('contact_map_embed');
?>

<?php

$contact_page_style = $contact_page_bg_url
    ? ' style="background-image:url(\''
    . esc_url($contact_page_bg_url)
    . '\');background-size:cover;background-position:center;"'
    : '';
?>

<main class="relative bg-white"<?php echo $contact_page_style; ?>>

  <!-- Hero / Intro -->
  <section class="relative overflow-hidden py-4 lg:py-16 bg-[#F5F5F9]/70">
    <div class="">
        <div class="relative flex flex-col lg:gap-8 mx-auto w-full max-w-[1200px] px-2.5 lg:px-5 md:mt-10">
          <nav class="mb-6 text-[14px] leading-none text-slate-500 sm:mb-8">
            <a href="<?php echo esc_url(home_url('/')); ?>" class="transition-colors hover:text-slate-700"><?php echo
                esc_html($contact_breadcrumb)
            ; ?></a>
            <span class="mx-1 text-slate-400">/</span>
            <span class="text-[#294F78]"><?php echo esc_html($contact_hero_title); ?></span>
          </nav>

          <h2 class="mb-4 !text-[26px] lg:!text-[44px] font-bold text-[#222222] sm:mb-5">
            <?php echo esc_html($contact_hero_title); ?>
          </h2>
        </div>
    </div>
  </section>

  <!-- Contacts section -->
    <section class="relative overflow-hidden">

        <div class="relative max-w-[1200px] mx-auto px-2.5 lg:px-5 py-18">

            <!-- Info cards -->
            <div class="flex flex-col lg:flex-row justify-between mb-10 lg:gap-18 gap-8">
                <!-- Address -->
                <div class="flex items-start lg:w-[276px]">
                    <div class="flex-shrink-0 w-14 h-14 border border-gray-300 rounded flex items-center justify-center mr-4">
                        <img src="<?php echo get_template_directory_uri(); ?>/img/pin.svg" />
                    </div>
                    <div>
                        <h3 class="font-semibold text-[#294F78] text-lg mb-1"><?php echo
                            esc_html($contact_address_title)
                        ; ?></h3>
                        <p class="text-[#3D3D3D] font-light text-base leading-[1.2]">
                            <?php echo implode('<br>', array_map('esc_html', $contact_address_lines)); ?>
                        </p>
                    </div>
                </div>

                <!-- Working hours -->
                <div class="flex items-start lg:w-[276px]">
                    <div class="flex-shrink-0 w-14 h-14 border border-gray-300 rounded flex items-center justify-center mr-4">
                        <img src="<?php echo get_template_directory_uri(); ?>/img/clock.svg" />
                    </div>
                    <div>
                        <h3 class="font-semibold text-[#294F78] text-lg mb-1"><?php echo
                            esc_html($contact_hours_title)
                        ; ?></h3>
                        <p class="text-[#3D3D3D] font-light text-base leading-[1.5]">
                            <?php echo implode('<br>', array_map('esc_html', $contact_hours_lines)); ?>
                        </p>
                    </div>
                </div>

                <!-- Phones -->
                <div class="flex items-start lg:w-[276px]">
                    <div class="flex-shrink-0 w-14 h-14 border border-gray-300 rounded flex items-center justify-center mr-4">
                        <img src="<?php echo get_template_directory_uri(); ?>/img/phone.svg" />
                    </div>
                    <div>
                        <h3 class="font-semibold text-lg text-[#294F78] mb-1"><?php echo
                            esc_html($contact_phones_title)
                        ; ?></h3>
                        <p class="text-gray-700 text-base leading-[1.5]">
                            <?php if (!empty($contact_phones)): ?>
                                <?php foreach ($contact_phones as $item): ?>
                                    <?php if (!empty($item['number'])): ?>
                                        <a href="tel:<?php echo
                                            esc_attr(preg_replace('/[^0-9+]/', '', $item['number']))
                                        ; ?>" class="hover:text-blue-700"><?php echo
                                            esc_html($item['number'])
                                        ; ?></a><br>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <a href="tel:+375172381717" class="hover:text-blue-700">+375 17 238 17 17</a><br>
                                <a href="tel:+375173748682" class="hover:text-blue-700">+375 17 374 86 82</a><br>
                                <a href="tel:+375447797030" class="hover:text-blue-700">+375 44 779 70 30</a>
                            <?php endif; ?>
                        </p>
                    </div>
                </div>

                <!-- Email -->
                <div class="flex items-start lg:w-[300px]">
                    <div class="flex-shrink-0 w-14 h-14 border border-gray-300 rounded flex items-center justify-center mr-4">
                        <img src="<?php echo get_template_directory_uri(); ?>/img/mail.svg" />
                    </div>
                    <div>
                        <h3 class="font-semibold text-[#294F78] text-lg mb-1"><?php echo
                            esc_html($contact_email_title)
                        ; ?></h3>
                        <p class="text-gray-700 text-base leading-relaxed">
                            <?php if (!empty($contact_emails)): ?>
                                <?php foreach ($contact_emails as $item): ?>
                                    <?php if (!empty($item['email'])): ?>
                                        <a href="mailto:<?php echo
                                            esc_attr($item['email'])
                                        ; ?>" class="hover:text-blue-700"><?php echo
                                            esc_html($item['email'])
                                        ; ?></a><br>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <a href="mailto:info@belsks.by" class="hover:text-blue-700">info@belsks.by</a>
                            <?php endif; ?>
                        </p>
                    </div>
                </div>
            </div>

            <!-- Social links -->
            <div class="flex items-center mb-6 lg:-mt-4">
                <p class="text-gray-700 text-lg font-semibold mr-7"><?php echo esc_html($contact_social_label); ?></p>
                <div class="flex gap-4">
                    <?php if (!empty($contact_socials)): ?>
                        <?php foreach ($contact_socials as $social): ?>
                            <?php if (!empty($social['url'])): ?>
                                <a href="<?php echo esc_url($social['url']); ?>" aria-label="<?php echo
                                    esc_attr($social['name'])
                                ; ?>" target="_blank" rel="noopener" class="w-8 h-8 bg-gray-800 hover:bg-blue-700 flex items-center justify-center rounded transition-colors">
                                    <?php if (!empty($social['icon'])): ?>
                                        <?php echo $social['icon']; ?>
                                    <?php else: ?>
                                        <span class="w-4 h-4 text-white text-[11px] flex items-center justify-center font-bold"><?php echo
                                            esc_html(mb_substr($social['name'] ?? '', 0, 1))
                                        ; ?></span>
                                    <?php endif; ?>
                                </a>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <a href="#" aria-label="Facebook" class="w-10 h-10 bg-[#4D6C8F] hover:bg-blue-700 flex items-center justify-center transition-colors">
                        <img src="<?php echo get_template_directory_uri(); ?>/img/fb.svg" alt="facebook" class="" />
                        </a>
                        <a href="#" aria-label="VK" class="w-10 h-10 bg-[#4D6C8F] hover:bg-blue-700 flex items-center justify-center transition-colors">
                        <img src="<?php echo get_template_directory_uri(); ?>/img/vk.svg" alt="vk" class="" />
                        </a>
                        <a href="#" aria-label="Telegram" class="w-10 bg-[#4D6C8F] h-10 hover:bg-blue-500 flex items-center justify-center transition-colors">
                        <img src="<?php echo get_template_directory_uri(); ?>/img/tg.svg" alt="tg" class="" />
                        </a>
                    <?php endif; ?>
                </div>
            </div>

            <!-- Map -->
            <div class="border border-gray-200 shadow-sm">
                <?php if ($contact_map_embed): ?>
                    <?php echo $contact_map_embed; ?>
                <?php else: ?>
                <iframe src="https://yandex.by/map-widget/v1/?lang=ru_RU&amp;ll=27.5766%2C53.9082&amp;z=16&amp;mode=search&amp;text=%D0%A0%D0%B5%D1%81%D0%BF%D1%83%D0%B1%D0%BB%D0%B8%D0%BA%D0%B0%20%D0%91%D0%B5%D0%BB%D0%B0%D1%80%D1%83%D1%81%D1%8C%2C%20%D0%B3%D0%BE%D1%80%D0%BE%D0%B4%D0%9C%D0%B8%D0%BD%D1%81%D0%BA%2C%20%D1%83%D0%BB%D0%B8%D1%86%D0%B0%20%D0%91%D0%B8%D1%80%D1%8E%D0%B7%D0%BE%D0%B2%D0%B0%D1%8F%2C%20%D0%B4%D0%BE%D0%BC%204%2F5&amp;pt=27.5766%2C53.9082%2Cpm2rdl"
                        class="w-full h-[400px] sm:h-[520px]"
                        allowfullscreen
                        style="border:0;">
                </iframe>
                <?php endif; ?>
            </div>
        </div>
    </section>
		<?php get_template_part('template-parts/contact-form', 'form'); ?>
</main>

<?php

get_footer();
