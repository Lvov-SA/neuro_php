FROM php
LABEL authors="lvov"
VOLUME /var/www/html
RUN apt-get update &&\
    apt-get install -qy libfann-dev &&\
    rm -r /var/lib/apt/lists/* &&\
    pecl install fann &&\
    docker-php-ext-enable fann \