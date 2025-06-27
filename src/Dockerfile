FROM php:8.0-fpm

RUN apt-get update \
  && apt-get install -y libpng-dev libjpeg-dev libfreetype6-dev zip git unzip curl libonig-dev libxml2-dev libpq-dev \
  && docker-php-ext-configure gd --with-freetype --with-jpeg \
  && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd pdo_pgsql

COPY --from=composer:2.7 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www

COPY . /var/www

RUN chown -R www-data:www-data /var/www \
  && chmod -R 755 /var/www/storage /var/www/bootstrap/cache

RUN composer install --no-dev --optimize-autoloader --no-interaction

EXPOSE 8000

CMD ["sh", "-c", "php artisan serve --host=0.0.0.0 --port=${PORT:-8000}"]