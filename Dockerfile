# syntax=docker/dockerfile:experimental

FROM composer:latest as build

FROM php:8.0-fpm-alpine as base
RUN echo http://dl-2.alpinelinux.org/alpine/edge/community/ >> /etc/apk/repositories
RUN apk update && apk upgrade
RUN apk --no-cache add shadow \
                        freetype \
                        libpng \
                        libjpeg-turbo \
                        freetype-dev \
                        libpng-dev \
                        libjpeg-turbo-dev \
                        libwebp-dev \
                        zip \
                        libzip-dev \
                        && docker-php-ext-configure zip \
                        && NPROC=$(grep -c ^processor /proc/cpuinfo 2>/dev/null || 1) && \
                        docker-php-ext-install -j${NPROC} gd

RUN mv "$PHP_INI_DIR/php.ini-development" "$PHP_INI_DIR/php.ini"
RUN wget -P /etc/ssl/certs https://curl.haxx.se/ca/cacert.pem

RUN sed -n 's/^;date\.timezone[[:space:]]=.*$/date.timezone="UTC"/' "$PHP_INI_DIR/php.ini"
RUN sed -n "s/^;curl\.cainfo[[:space:]]=.*$/curl.cainfo=\/etc\/ssl\/certs\/cacert.pem/" "$PHP_INI_DIR/php.ini"
RUN sed -n "s/^;openssl\.cafile=.*$/openssl.cafile=\/etc\/ssl\/certs\/cacert.pem/" "$PHP_INI_DIR/php.ini"

RUN docker-php-ext-configure gd \
        --with-webp \
        --with-freetype \
        --with-jpeg

RUN docker-php-ext-install gd
RUN docker-php-ext-install pdo_mysql zip exif pcntl

RUN apk del --no-cache freetype-dev libpng-dev libjpeg-turbo-dev

RUN export COMPOSER_ALLOW_SUPERUSER=1
COPY --from=composer /usr/bin/composer /usr/bin/composer

EXPOSE 9000

FROM base
RUN mkdir -m 777 /var/www/stewartmarsh.test
WORKDIR /var/www/stewartmarsh.test
COPY --chown=www-data:www-data . .
CMD ["php-fpm"]
