# php-fpm 
FROM php:7.4-fpm

RUN mkdir /var/log/php

WORKDIR /var/www

# Copy files / Volumes
COPY . /var/www
COPY ./php.ini /usr/local/etc/php/conf.d/php.ini
COPY ./xdebug.ini /usr/local/etc/php/conf.d/xdebug.ini

# installing dependencies
RUN apt-get update && apt-get install -y --no-install-recommends \
    sqlite3 \
    libpq-dev \
    libzip-dev \
    && pecl install xdebug


# clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# installing extensions
RUN docker-php-ext-install pdo_mysql zip pgsql pdo_pgsql 

# enabled extensions
RUN docker-php-ext-enable xdebug

CMD ["php-fpm"]
EXPOSE 9000