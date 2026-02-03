# Use PHP 8.2 with Apache
FROM php:8.2-apache

# Enable mod_rewrite (needed for Laravel routing)
RUN a2enmod rewrite

# Install PHP extensions needed for Laravel
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    curl \
    libzip-dev \
    libonig-dev \
    libpng-dev \
    libxml2-dev \
    && docker-php-ext-install pdo pdo_mysql zip mbstring exif pcntl bcmath gd

# Set working directory
WORKDIR /var/www/html

# Copy all files from project
COPY --chown=www-data:www-data . .

# Apache should serve /public folder
ENV APACHE_DOCUMENT_ROOT /var/www/html/public
RUN sed -ri 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' \
    /etc/apache2/sites-available/*.conf \
    /etc/apache2/apache2.conf

# Set permissions for Laravel storage & cache
RUN chown -R www-data:www-data storage bootstrap/cache \
    && chmod -R 755 storage bootstrap/cache

# Expose Apache port
EXPOSE 80

# Start Apache
CMD ["apache2-foreground"]
