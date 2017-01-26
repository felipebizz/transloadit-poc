FROM php:7-fpm

RUN apt-get update && \
    apt-get install -y \
        zlib1g-dev \
    libfreetype6-dev \
        libjpeg62-turbo-dev \
        libmcrypt-dev \
        libpng12-dev \
        libxml2-dev

RUN pecl install xdebug \
    && docker-php-ext-enable xdebug

RUN docker-php-ext-install pdo pdo_mysql zip mcrypt bcmath xml xmlwriter

RUN apt-get install -y unzip git

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

WORKDIR /var/www