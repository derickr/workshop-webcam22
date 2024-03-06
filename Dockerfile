FROM php:8.2.11-fpm-bookworm

RUN apt-get update && apt-get install -y lighttpd zlib1g-dev

RUN pecl config-set php_ini "${PHP_INI_DIR}/php.ini"
RUN pecl install xdebug-3.3.1

COPY docker/lighttpd/lighttpd.conf /etc/lighttpd/lighttpd.conf
COPY docker/lighttpd/vhost.conf /etc/lighttpd/conf-enabled/10-simple-vhost.conf

RUN lighty-enable-mod fastcgi
RUN lighty-enable-mod fastcgi-php

COPY docker/lighttpd/fastcgi.conf /etc/lighttpd/conf-enabled/15-fastcgi-php.conf

RUN mkdir -p /run/lighttpd/
RUN chown www-data. /run/lighttpd/

RUN mkdir /var/www/cache
RUN chown www-data. /var/www/cache

COPY docker/90-xdebug.ini "${PHP_INI_DIR}/conf.d"

EXPOSE 80

CMD php-fpm -D && lighttpd -D -f /etc/lighttpd/lighttpd.conf
