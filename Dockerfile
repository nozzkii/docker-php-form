FROM php:7.4-apache

LABEL Anh Tai Thai <anhtai.thai@hotmail.de>

#RUN a2enmod rewrite
#RUN docker-php-ext-install mysqli && docker-php-ext-enable mysqli

ADD . /var/www/html