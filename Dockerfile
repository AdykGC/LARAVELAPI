# Используем официальный образ PHP с FPM
FROM php:8.1-fpm

# Устанавливаем зависимости для работы с Laravel
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    zip \
    git \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd

# Устанавливаем Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Копируем проект в контейнер
COPY . /var/www/html

# Устанавливаем рабочую директорию
WORKDIR /var/www/html

# Устанавливаем зависимости через Composer
RUN composer install --no-interaction

# Выполняем миграции базы данных
RUN php artisan migrate --force

# Открываем порт 80
EXPOSE 80

# Запускаем PHP-FPM сервер
CMD ["php-fpm"]
