# Базовый образ PHP и Nginx
FROM php:8.1-fpm

COPY --from=mlocati/php-extension-installer /usr/bin/install-php-extensions /usr/local/bin/

RUN apt-get update && \
    apt-get install -y git curl zip unzip nano && \
    apt-get install -y libpq-dev libjpeg-dev libpng-dev libfreetype6-dev libxml2-dev libzip-dev

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN install-php-extensions pdo_pgsql pgsql gd soap zip

COPY . .

COPY ./_docker/app/php.ini /usr/local/etc/php/conf.d/php.ini

RUN composer install

COPY .env.example .env

RUN composer dump-autoload

RUN chmod -R 777 /var/www/html/storage && \
    chmod -R 775 /var/www/html/bootstrap/cache

RUN php artisan key:generate

RUN php artisan optimize