FROM php:8.2-fpm-alpine

RUN apk add --no-cache nginx supervisor bash git unzip icu-dev oniguruma-dev     libzip-dev libpng-dev libjpeg-turbo-dev freetype-dev

RUN docker-php-ext-configure gd --with-freetype --with-jpeg  && docker-php-ext-install pdo pdo_mysql mbstring exif pcntl bcmath opcache intl zip gd

COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html
COPY . /var/www/html

RUN composer install --no-dev --no-interaction --prefer-dist --optimize-autoloader || true

RUN chown -R www-data:www-data storage bootstrap/cache  && chmod -R 775 storage bootstrap/cache

COPY .docker/nginx.conf /etc/nginx/nginx.conf
COPY .docker/supervisord.conf /etc/supervisord.conf

EXPOSE 80
CMD ["/usr/bin/supervisord","-c","/etc/supervisord.conf"]
