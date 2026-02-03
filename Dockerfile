FROM php:8.2-fpm

WORKDIR /var/www/html

# System deps
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    curl \
    libzip-dev \
    libonig-dev \
    libpng-dev \
    libxml2-dev \
    && docker-php-ext-install \
        zip pdo_mysql mbstring exif pcntl bcmath gd

# Composer
COPY --from=composer:2.6 /usr/bin/composer /usr/bin/composer

# Copy app
COPY . .

# Install dependencies
RUN composer install --no-dev --optimize-autoloader

# Permissions
RUN chown -R www-data:www-data storage bootstrap/cache \
    && chmod -R 775 storage bootstrap/cache

EXPOSE 9000

CMD ["php-fpm"]
