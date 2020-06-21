#
# Proxy
#
FROM traefik:alpine as proxy

WORKDIR /code

COPY conf/traefik.toml /etc/traefik

#
# Frontend
#
FROM nginx:alpine as frontend

WORKDIR /code

COPY conf/default.conf /etc/nginx/conf.d

#
# Backend
#
FROM php:fpm-alpine as backend

WORKDIR /code

RUN docker-php-ext-install bcmath opcache pdo_mysql

RUN pecl install redis
RUN docker-php-ext-enable redis

COPY conf/php.ini /usr/local/etc/php
COPY conf/opcache.ini /usr/local/etc/php/conf.d

#
# Artisan
#
FROM php:cli-alpine as artisan

WORKDIR /code

COPY scheduler /usr/local/bin

RUN docker-php-ext-install bcmath pdo_mysql

RUN pecl install redis
RUN docker-php-ext-enable redis

RUN apk del .build-deps
