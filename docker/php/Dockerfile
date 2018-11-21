FROM php:7.2-fpm

RUN docker-php-ext-install pdo_mysql
RUN apt-get update && apt-get install -y zlib1g-dev \
    && docker-php-ext-install zip

WORKDIR /usr/share/nginx/html