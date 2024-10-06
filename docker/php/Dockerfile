FROM php:8.3-fpm

RUN apt-get update && apt-get install -y \
        git \
        curl \
        wget \
        sudo \
        zip unzip \
        libfreetype6-dev \
        libjpeg62-turbo-dev \
        libpng-dev \
        zlib1g-dev \
        libicu-dev \
        g++ \
        libxml2-dev \
        libzip-dev \
        libwebp-dev \
        libfreetype6-dev \
        graphviz \
        nano \
    && apt-get autoremove -y && rm -rf /var/cache/apt

RUN docker-php-ext-install mysqli pdo pdo_mysql

# Загружаем актуальную версию Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN chown -R www-data:www-data /var/www
RUN groupadd -g 1000 shaman
RUN useradd -u 1000 -ms /bin/bash -g shaman shaman
RUN echo 'shaman ALL=(ALL) NOPASSWD:ALL' >> /etc/sudoers

USER shaman

RUN mkdir guess-address

CMD ["php-fpm"]
