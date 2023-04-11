FROM php:8.0-apache
WORKDIR /var/www/html

RUN apt-get update && apt-get install -y libssl-dev && rm -rf /var/lib/apt/lists/* \
    && docker-php-ext-install ftp

RUN echo "allow_url_include=On" > /usr/local/etc/php/conf.d/docker-php-ftp.ini
RUN a2enmod rewrite

RUN service apache2 restart

COPY www/ .
EXPOSE 80