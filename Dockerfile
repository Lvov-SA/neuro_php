FROM php
LABEL authors="lvov"
VOLUME /var/www/html
RUN apt-get update &&\
    apt-get install -qy libfann-dev &&\
    rm -r /var/lib/apt/lists/* &&\
    pecl install fann &&\
    docker-php-ext-enable fann
RUN apt-get update && apt-get install -y libmcrypt-dev libxml2-dev libfreetype6-dev \
        libjpeg-dev \
        libpng-dev \
        libgd-dev \
    && docker-php-ext-configure gd --with-jpeg\
    && docker-php-ext-install gd exif