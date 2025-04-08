#!/bin/bash

# Wait for MySQL to be ready
echo "⏳ Waiting for MySQL to be ready at $DB_HOST:$DB_PORT..."
until mysql -h"$DB_HOST" -P"$DB_PORT" -u"$DB_USERNAME" -p"$DB_PASSWORD" -e "SHOW DATABASES;" > /dev/null 2>&1; do
  sleep 2
  echo "❗ Still waiting for MySQL..."
done

echo "✅ MySQL is ready!"

# Composer install
composer install --no-interaction --prefer-dist --optimize-autoloader

# Copy .env
cp .env.example .env

# Generate application key
php artisan key:generate

# Run migrations and seeds
php artisan migrate:fresh --seed

# Start Laravel dev server
php artisan serve --host=0.0.0.0 --port=8000
