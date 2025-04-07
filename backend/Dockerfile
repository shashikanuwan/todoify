FROM php:8.2-fpm

# Install system dependencies
RUN apt-get update && apt-get install -y libpng-dev libjpeg-dev libfreetype6-dev zip git libxml2-dev libssl-dev

# Install PHP extensions
RUN docker-php-ext-configure gd --with-freetype --with-jpeg
RUN docker-php-ext-install gd pdo pdo_mysql bcmath xml

# Install Composer (PHP package manager)
COPY --from=composer:2.6 /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www

# Copy Laravel project files into the container
COPY backend/ .

# Install Laravel dependencies
RUN composer install

# Set up the environment
RUN cp .env.example .env
RUN php artisan key:generate

# ADD THIS
COPY backend/docker-entrypoint.sh /usr/local/bin/docker-entrypoint.sh
RUN chmod +x /usr/local/bin/docker-entrypoint.sh


# Expose the container port
EXPOSE 8000

# Start PHP-FPM (do not use php artisan serve in production)
CMD ["php-fpm"]

CMD ["docker-entrypoint.sh"]
