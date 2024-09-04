FROM php:8.2-fpm

EXPOSE 9000

USER root

RUN apt-get update \
  && apt-get install -y \
             apt-utils \
             icu-devtools \
             libicu-dev \
             libjpeg62-turbo-dev \
             libpng-dev \
             libxml2-dev \
             libzip-dev \
             libpq-dev \
             libfreetype6-dev \
             procps \
    && docker-php-ext-configure intl --enable-intl && \
    docker-php-ext-configure gd --with-freetype --with-jpeg && \
    docker-php-ext-install -j$(nproc) gd && \
    docker-php-ext-install \
        mysqli pdo_mysql \
        intl \
        zip pcntl \
        exif opcache \
        sockets \
    && docker-php-source delete

COPY . /var/www/php

RUN chown -R www-data:www-data /var/www
RUN useradd -G www-data,root -u 1000 -d /home/dev dev
ENV COMPOSER_ALLOW_SUPERUSER=1
COPY --from=composer /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/php
CMD ["php-fpm"]


