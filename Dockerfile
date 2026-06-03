FROM php:7.4-apache

ENV APACHE_DOCUMENT_ROOT=/var/www/html/public \
    COMPOSER_ALLOW_SUPERUSER=1

RUN apt-get update \
    && apt-get install -y --no-install-recommends \
        default-mysql-client \
        git \
        libfreetype6-dev \
        libjpeg62-turbo-dev \
        libonig-dev \
        libpng-dev \
        libzip-dev \
        unzip \
        zip \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd mbstring pdo_mysql zip \
    && a2enmod rewrite \
    && rm -rf /var/lib/apt/lists/*

COPY --from=composer:2.2 /usr/bin/composer /usr/bin/composer
COPY docker/apache/000-default.conf /etc/apache2/sites-available/000-default.conf

WORKDIR /var/www/html

COPY composer.json composer.lock ./
COPY app ./app
COPY artisan ./
COPY bootstrap ./bootstrap
COPY config ./config
COPY database ./database
COPY public ./public
COPY resources ./resources
COPY routes ./routes
COPY tests ./tests
COPY phpunit.xml server.php webpack.mix.js package.json package-lock.json ./
COPY jpgraph-4.2.6 ./jpgraph-4.2.6
COPY jpgraph-4.2.6 ./public/jpgraph-4.2.6

RUN composer install --no-interaction --prefer-dist --optimize-autoloader \
    && mkdir -p storage/app storage/framework/cache storage/framework/sessions storage/framework/views storage/logs bootstrap/cache \
    && chown -R www-data:www-data storage bootstrap/cache

COPY docker/entrypoint.sh /usr/local/bin/pollvot-entrypoint
RUN chmod +x /usr/local/bin/pollvot-entrypoint

EXPOSE 80

ENTRYPOINT ["pollvot-entrypoint"]
CMD ["apache2-foreground"]
