#!/bin/bash

# Wait until MySQL is ready
echo "Waiting for MySQL to be ready..."
until php -r "new PDO('mysql:host=${DB_HOST};port=${DB_PORT};dbname=${DB_DATABASE}', '${DB_USERNAME}', '${DB_PASSWORD}');" > /dev/null 2>&1; do
  sleep 2
  echo "Waiting for MySQL..."
done

echo "MySQL is ready!"

# Run migrations and seed
php artisan migrate:fresh --seed

# Start PHP-FPM
exec php-fpm
