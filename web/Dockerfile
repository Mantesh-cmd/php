FROM php:7.2.2-apache

RUN docker-php-ext-install mysqli && docker-php-ext-enable mysqli

COPY index.php /var/www/html/index.php
