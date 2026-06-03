
    <section id="contact-form" class="relative overflow-hidden bg-[url('<?php the_field('contact-bg')?>')] bg-cover bg-center bg-no-repeat contact-form-section">
        <div class="relative max-w-[1200px] mx-auto px-4 sm:px-6 lg:px-8 sm:py-20">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-10 lg:gap-16 items-center">
                <!-- Left column: text (1/3) -->
                <div class="max-w-lg lg:col-span-1 md:min-w-[400px]">
                    <h2 class="text-3xl sm:text-4xl lg:text-5xl font-bold text-gray-900 leading-tight mb-6">
                        <?php the_field('contact-form-heading') ?>
                    </h2>
                    <p class="text-[#3D3D3D] text-lg leading-[1.2]">
                        <?php the_field('contact-form-description') ?>
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
                            <input type="tel" placeholder="+375 (__) ___-__-__" class="w-full px-4 py-2.5 border border-gray-300 rounded focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500 text-gray-700">
                        </div>
                        <!-- Email -->
                        <div class="sm:col-span-1">
                            <label class="block text-sm font-medium text-transparent mb-2 select-none">email</label>
                            <input type="email" placeholder="E-mail" class="w-full px-4 py-2.5 border border-gray-300 rounded focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500 text-gray-700">
                        </div>
                    </div>

                    <!-- Contact method -->
                    <div class="mb-2 sm:flex-col md:flex md:flex-row items-center">
                        <p class="text-sm font-semibold text-[#294F78] mr-2 mb-2 md:mb-0">Предпочтительный способ связи:</p>
                        <div class="flex flex-wrap items-center gap-x-6 gap-y-2">
                            <label class="flex items-center cursor-pointer">
                                <input type="radio" name="contact_method" value="phone" class="w-4 h-4 text-blue-600 contact-method-radio" checked>
                                <span class="ml-2 text-gray-700">Телефон</span>
                            </label>
                            <label class="flex items-center cursor-pointer">
                                <input type="radio" name="contact_method" value="viber" class="w-4 h-4 text-blue-600 contact-method-radio mr-2">
                                <img src="<?php the_field('icon1') ?>" alt="icon1" class="w-[28px] h-[28px]">
                            </label>
                            <label class="flex items-center cursor-pointer">
                                <input type="radio" name="contact_method" value="telegram" class="w-4 h-4 text-blue-600 contact-method-radio mr-2">
                                <img src="<?php the_field('icon2') ?>" alt="icon2" class="w-[28px] h-[28px]">
                            </label>
                            <label class="flex items-center cursor-pointer">
                                <input type="radio" name="contact_method" value="whatsapp" class="w-4 h-4 text-blue-600 contact-method-radio mr-2">
                                <img src="<?php the_field('icon3') ?>" alt="icon3" class="w-[28px] h-[28px]">
                            </label>
                        </div>
                    </div>

                    <!-- Comment -->
                    <div class="mb-6">
											<label class="text-sm font-semibold text-[#294F78]">Комментарий</label>
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
