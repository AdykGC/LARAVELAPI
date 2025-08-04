# Используем официальный образ PHP
FROM php:8.1-fpm

# Устанавливаем необходимые зависимости
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

# Копируем файлы проекта в контейнер
COPY . /var/www/html

# Устанавливаем зависимости Laravel
WORKDIR /var/www/html
RUN composer install --no-interaction

# Копируем переменные окружения
COPY .env.example .env

# Настроим владельца файлов
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# Открываем порт 80
EXPOSE 80

# Запускаем PHP FPM сервер
CMD ["php-fpm"]
