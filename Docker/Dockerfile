#apacheのインストール
FROM php:8.1-apache
COPY ./php/php.ini /usr/local/etc/php/
COPY ./apache/*.conf /etc/apache2/sites-enabled/

#composerのインストール
COPY --from=composer:2.2.5 /usr/bin/composer /usr/bin/composer

#nodeのインストール
COPY --from=node:16.13 /usr/local/bin /usr/local/bin
COPY --from=node:16.13 /usr/local/lib /usr/local/lib

RUN apt-get update && apt-get install -y \
    libicu-dev \
    zip \
    unzip \
    && docker-php-ext-install -j$(nproc) intl \
    && docker-php-ext-install -j$(nproc) pdo_mysql

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
ENV COMPOSER_ALLOW_SUPERUSER 1
ENV COMPOSER_HOME /composer
ENV PATH $PATH:/composer/vendor/bin

WORKDIR /var/www/html

#laravelのインストール
RUN composer create-project laravel/laravel:^9.0

RUN mv /etc/apache2/mods-available/rewrite.load /etc/apache2/mods-enabled
RUN /bin/sh -c a2enmod rewrite