FROM php:8.3-fpm

COPY composer.lock composer.json /var/www/

WORKDIR /var/www

RUN echo "upload_max_filesize = 50M" > /usr/local/etc/php/conf.d/uploads.ini && \
    echo "post_max_size = 55M" >> /usr/local/etc/php/conf.d/uploads.ini

# Installs the necessary dependencies
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    locales \
    zip \
    jpegoptim optipng pngquant gifsicle \
    vim \
    unzip \
    git \
    curl \
    libpq-dev \
    libmagickwand-dev \
    && docker-php-ext-install pdo_pgsql \
    && docker-php-ext-configure gd --with-freetype --with-jpeg --with-webp \
    && docker-php-ext-install gd \
    && pecl install imagick \
    && docker-php-ext-enable imagick \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

# install composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# add user for laravel
RUN groupadd -g 1000 www \
    && useradd -u 1000 -ms /bin/bash -g www www

# copy applications folder and set permissions
COPY --chown=www:www . /var/www/ 
RUN chown -R www-data:www-data /var/www

RUN mkdir -p /var/www/storage/logs \
    && touch /var/www/storage/logs/laravel.log \
    && chown -R www:www-data /var/www/storage \
    && chmod -R 775 /var/www/storage \
    && chmod -R 775 /var/www/bootstrap/cache \
    && chown -R www-data:www-data /var/www/storage/logs

# change current user to www
USER www

EXPOSE 8080

CMD ["php-fpm"]