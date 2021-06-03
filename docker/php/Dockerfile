FROM php:7.4-fpm

RUN apt-get update \
    && apt-get install -y wget git unzip libpq-dev libicu-dev libpng-dev libzip-dev libjpeg-dev libfreetype6-dev\
    && pecl install xdebug-2.9.1 \
    && docker-php-ext-enable xdebug \
    && docker-php-ext-install pdo_pgsql \
    && docker-php-ext-install pgsql \
    && docker-php-ext-install zip \
    && docker-php-ext-install gd \
    && docker-php-ext-enable pgsql

ENV ACCEPT_EULA=Y

# Install php xdebug extension
ADD https://pecl.php.net/get/xdebug-2.9.4 /tmp/xdebug.tar.gz
RUN mkdir -p /usr/src/php/ext/xdebug\
    && tar xf /tmp/xdebug.tar.gz -C /usr/src/php/ext/xdebug --strip-components=1\
    && docker-php-ext-configure xdebug\
    && docker-php-ext-install xdebug\
    && rm /tmp/xdebug.tar.gz

ADD ./php.ini /usr/local/etc/php/php.ini

ENV COMPOSER_ALLOW_SUPERUSER 1
# Install composer
RUN php -r "readfile('https://getcomposer.org/installer');" | php\
    && chmod +x composer.phar\
    && mv composer.phar /usr/local/bin/composer

RUN apt-get clean

# Permission fix
RUN usermod -u 1000 www-data

WORKDIR /var/www
