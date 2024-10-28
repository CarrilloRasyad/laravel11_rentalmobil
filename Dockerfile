# Gunakan official PHP image dengan versi yang dibutuhkan
# FROM php:8.2-fpm

# Install dependencies
# RUN apt-get update && apt-get install -y \
#     git \
#     unzip \
#     libpq-dev \
#     libzip-dev \
#     && docker-php-ext-install pdo pdo_pgsql

# RUN apt-get install -y libpq-dev \
#     && docker-php-ext-configure pgsql -with-pgsql=/usr/local/pgsql \
#     && docker-php-ext-install pdo pdo_pgsql pgsql

# Install Composer
# COPY --from=composer:2.7.4 /usr/bin/composer /usr/bin/composer

# Copy project Laravel ke dalam container
# COPY . /var/www

# Set working directory
# WORKDIR /var/www

# Memberikan permission pada storage dan bootstrap/cache
# RUN chown -R www-data:www-data /var/www \
#     && chmod -R 755 /var/www/storage \
#     && chmod -R 755 /var/www/bootstrap/cache

# Expose port 8118 dan jalankan PHP Built-in Server
# EXPOSE 8118
# CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8118"]

