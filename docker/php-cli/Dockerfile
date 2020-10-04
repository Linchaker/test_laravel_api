# php-cli
FROM php:7.4-cli

WORKDIR /var/www

# Copy files / Volumes
COPY . /var/www

RUN mkdir /var/log/php

RUN docker-php-ext-install \
        pdo_mysql


CMD ["php-cli"]
EXPOSE 9000