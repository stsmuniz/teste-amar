FROM php:7.2.2-fpm
WORKDIR /var/www
RUN apt-get update && apt-get install -y mysql-client \
 && docker-php-ext-install pdo_mysql
ADD . /var/www
sudo chmod 777 storage/ storage/*
