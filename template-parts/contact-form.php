
    <section class="relative bg-gradient-to-br from-gray-50 to-white overflow-hidden">
        <!-- Decorative background shapes -->
        <div class="absolute top-0 right-0 w-1/2 h-full pointer-events-none">
            <div class="absolute top-0 right-0 w-96 h-96 bg-gray-100 transform rotate-45 opacity-60"></div>
        </div>
        <div class="absolute bottom-0 right-20 w-3/4 h-40 bg-gray-100 transform -skew-x-12 opacity-70"></div>
        <div class="absolute top-20 left-0 w-48 h-48 bg-white border border-gray-200 opacity-50"></div>

        <div class="relative max-w-[1200px] mx-auto px-4 sm:px-6 lg:px-8 py-16 sm:py-20">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-10 lg:gap-16 items-center">
                <!-- Left column: text -->
                <div class="max-w-lg">
                    <h2 class="text-3xl sm:text-4xl lg:text-5xl font-bold text-gray-900 leading-tight mb-6">
                        Обсудим вашу задачу?
                    </h2>
                    <p class="text-gray-700 text-base leading-relaxed">
                        Свяжитесь с нами, чтобы получить консультацию, подобрать решение и запросить коммерческое предложение.
                    </p>
                </div>

                <!-- Right column: form -->
                <form class="bg-white shadow-lg rounded-sm border border-gray-100 p-6 sm:p-8" onsubmit="event.preventDefault(); alert('Спасибо!");">
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
                    <div class="mb-6">
                        <p class="text-sm font-medium text-gray-700 mb-3">Предпочтительный способ связи:</p>
                        <div class="flex flex-wrap items-center gap-x-6 gap-y-2">
                            <label class="flex items-center cursor-pointer">
                                <input type="radio" name="contact" class="w-4 h-4 text-blue-600" checked>
                                <span class="ml-2 text-gray-700">Телефон</span>
                            </label>
                            <label class="flex items-center cursor-pointer">
                                <input type="radio" name="contact" class="w-4 h-4">
                                <span class="ml-2 inline-flex items-center justify-center w-8 h-8 rounded-full bg-purple-600 text-white text-sm font-bold">V</span>
                            </label>
                            <label class="flex items-center cursor-pointer">
                                <input type="radio" name="contact" class="w-4 h-4">
                                <span class="ml-2 inline-flex items-center justify-center w-8 h-8 rounded-full bg-blue-500 text-white text-sm font-bold">T</span>
                            </label>
                            <label class="flex items-center cursor-pointer">
                                <input type="radio" name="contact" class="w-4 h-4">
                                <span class="ml-2 inline-flex items-center justify-center w-8 h-8 rounded-full bg-green-500 text-white text-sm font-bold">W</span>
                            </label>
                        </div>
                    </div>

                    <!-- Comment -->
                    <div class="mb-6">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Комментарий</label>
                        <textarea rows="3" placeholder="Опишите вашу задачу" class="w-full px-4 py-3 border border-gray-300 rounded focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500 text-gray-700 resize-none"></textarea>
                    </div>

                    <!-- Checkbox + Button -->
                    <div class="flex flex-col sm:flex-row sm:items-center gap-4">
                        <label class="flex items-start cursor-pointer">
                            <input type="checkbox" checked class="w-4 h-4 mt-1 text-blue-600 rounded">
                            <span class="ml-2 text-sm text-gray-700">
                                Соглашаюсь с <a href="#" class="underline hover:text-blue-600">политикой обработки персональных данных</a>
                            </span>
                        </label>
                    </div>

                    <button type="submit" class="mt-4 sm:mt-6 inline-flex items-center justify-center px-8 py-3 bg-blue-900 hover:bg-blue-800 text-white font-medium rounded shadow-md transition-colors">
                        Отправить заявку
                    </button>
                </form>
            </div>
        </div>
    </section>
