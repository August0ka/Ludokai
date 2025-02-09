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
    nginx \
    libpq-dev \
    && docker-php-ext-install pdo_pgsql \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

RUN curl -fsSL https://deb.nodesource.com/setup_18.x | bash - && \
apt-get install -y nodejs

# install composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# add user for laravel
RUN groupadd -g 1000 www \
    && useradd -u 1000 -ms /bin/bash -g www www

# copy applications folder and set permissions
COPY --chown=www:www . /var/www/

# Configure Nginx
COPY docker/nginx/main/conf.d /etc/nginx/conf.d/default.conf

# Create start script
RUN echo '#!/bin/bash\n\
composer install --no-dev --optimize-autoloader --no-interaction\n\
npm install && npm run build\n\
chmod -R 775 /var/www/storage /var/www/bootstrap/cache\n\
php artisan config:cache\n\
php artisan route:cache\n\
php artisan view:cache\n\
php artisan migrate\n\
php artisan db:seed\n\
php-fpm -D\n\
sed -i "s/80/$PORT/g" /etc/nginx/conf.d/default.conf\n\
nginx -g "daemon off;"' > /start.sh \
    && chmod +x /start.sh

# Set permissions
RUN chown -R www-data:www-data /var/www && \
    chmod -R 755 /var/www/storage

EXPOSE 8080
ENV PORT=8080

CMD ["/start.sh"]