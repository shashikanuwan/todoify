FROM php:8.3-fpm

# Install system dependencies
RUN apt-get update && apt-get install -y \
    libpng-dev libjpeg-dev libfreetype6-dev zip git \
    libxml2-dev libssl-dev unzip curl \
    default-mysql-client

# PHP extensions
RUN docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd pdo pdo_mysql bcmath xml

# Composer
COPY --from=composer:2.6 /usr/bin/composer /usr/bin/composer

# Workdir
WORKDIR /var/www

# Copy app
COPY backend/ .

# Composer install
RUN composer install --no-interaction --prefer-dist --optimize-autoloader

# Copy entrypoint
COPY backend/docker-entrypoint.sh /usr/local/bin/docker-entrypoint.sh
RUN chmod +x /usr/local/bin/docker-entrypoint.sh

# Expose port
EXPOSE 8000

# Run entrypoint
ENTRYPOINT ["docker-entrypoint.sh"]
