FROM php:8.2-apache
RUN apt-get update && apt-get install -y git curl zip unzip libpng-dev libzip-dev libonig-dev libxml2-dev nodejs npm && docker-php-ext-install pdo_mysql mbstring gd zip bcmath xml && a2enmod rewrite
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
WORKDIR /var/www/html
COPY . .
ENV CACHE_DRIVER=file
ENV SESSION_DRIVER=file
RUN touch database/database.sqlite
RUN COMPOSER_ALLOW_SUPERUSER=1 composer install --optimize-autoloader --no-dev --no-scripts --no-interaction
RUN npm install && npm run build
RUN chown -R www-data:www-data storage bootstrap/cache
COPY docker/apache.conf /etc/apache2/sites-available/000-default.conf
EXPOSE 80
CMD php artisan package:discover --ansi; php artisan migrate --force && apache2-foreground
