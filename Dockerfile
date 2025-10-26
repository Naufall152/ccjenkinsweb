# Gunakan image PHP 8.2 resmi
FROM php:8.2-fpm

# Install dependency yang dibutuhkan Laravel 10
RUN apt-get update && apt-get install -y \
    git unzip libpq-dev libzip-dev zip curl \
    && docker-php-ext-install pdo pdo_mysql zip

# Set workdir di dalam container
WORKDIR /var/www/html

# Copy semua file Laravel ke container
COPY . .

# Install composer (langsung dari image composer)
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Install dependency Laravel
RUN composer install --no-dev --optimize-autoloader

# Ubah permission agar storage & cache bisa diakses
RUN chown -R www-data:www-data storage bootstrap/cache

# Expose port PHP-FPM
EXPOSE 9000

CMD ["php-fpm"]
