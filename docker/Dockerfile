FROM php:7.3-apache

COPY . /srv/app
COPY .docker/vhost.conf /etc/apache2/sites-available/000-default.conf

WORKDIR /srv/app

RUN docker-php-ext-install mbstring pdo pdo_mysql php-redis \
    && apk add --update --no-cache autoconf g++ make \
    && pecl install redis \
    && docker-php-ext-enable redis \
    && chown -R www-data:www-data /srv/app \
    && a2enmod rewrite

RUN pecl install redis-5.1.1 \
    && pecl install xdebug-2.8.1 \
    && docker-php-ext-enable redis xdebug
