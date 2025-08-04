#!/bin/sh
# Ждём пока база данных будет доступна (необязательно, но полезно)
until php artisan migrate:status > /dev/null 2>&1; do
  echo "Waiting for database..."
  sleep 3
done

# Запускаем миграции
php artisan migrate --force

# Запускаем сервер
php artisan serve --host=0.0.0.0 --port=8000
