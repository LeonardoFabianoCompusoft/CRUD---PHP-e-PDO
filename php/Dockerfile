FROM php:8.3-fpm-alpine

WORKDIR /php

# Instalar dependências necessárias
RUN apk add --update icu-dev \
    && apk add libzip-dev postgresql-dev \
    libpng-dev jpeg-dev freetype-dev \
    && apk --no-cache add pcre-dev ${PHPIZE_DEPS} \
    && apk add --update linux-headers \
    && pecl install xdebug \
    && docker-php-ext-enable xdebug \
    && docker-php-ext-configure gd --with-jpeg --with-freetype \
    && docker-php-ext-install zip intl pdo pdo_mysql gd pdo_pgsql mysqli pgsql \
    && docker-php-ext-enable zip intl pdo pdo_mysql gd pdo_pgsql mysqli pgsql \
    && apk del pcre-dev ${PHPIZE_DEPS}

# Instalar o Composer
RUN curl -sS https://getcomposer.org/installer | php; \
    mv composer.phar /usr/local/bin/composer;
