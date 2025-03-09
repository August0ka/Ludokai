FROM php:8.3-fpm

COPY composer.lock composer.json /var/www/

WORKDIR /var/www

RUN echo "upload_max_filesize = 50M" > /usr/local/etc/php/conf.d/uploads.ini && \
    echo "post_max_size = 55M" >> /usr/local/etc/php/conf.d/uploads.ini

# Instala as dependências necessárias
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
    nano \
    curl \
    nginx \
    libpq-dev \
    && docker-php-ext-install pdo_pgsql \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

RUN curl -fsSL https://deb.nodesource.com/setup_18.x | bash - && \
    apt-get install -y nodejs

# Instala o Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Cria usuário para a aplicação
RUN groupadd -g 1000 www && \
    useradd -u 1000 -ms /bin/bash -g www www

# Copia os arquivos da aplicação e ajusta a propriedade
COPY --chown=www:www . /var/www/

# Configura o Nginx
COPY docker/nginx/main/conf.d /etc/nginx/conf.d/default.conf

# Cria os diretórios de armazenamento
RUN mkdir -p /var/www/storage /var/data && \
    chown -R www-data:www-data /var/www && \
    chmod -R 775 /var/www/storage /var/www/bootstrap/cache && \
    chown -R www-data:www-data /var/data && \
    chmod -R 775 /var/data && \
    mkdir -p /var/data/logs && \
    chown -R www-data:www-data /var/data/logs && \
    chmod -R 775 /var/data/logs && \
    mkdir -p /var/www/storage/logs && \
    chown -R www-data:www-data /var/www/storage/logs && \
    chmod -R 775 /var/www/storage/logs

# Cria o script de start
RUN echo '#!/bin/bash\n\
composer install --no-dev --optimize-autoloader --no-interaction\n\
npm install && npm run build\n\
chmod -R 775 /var/www/storage /var/www/bootstrap/cache\n\
php artisan config:cache\n\
php artisan route:cache\n\
php artisan view:cache\n\
php artisan storage:link\n\
# Remove o link criado automaticamente e recria para apontar para /var/data\n\
rm -rf public/storage\n\
ln -sfn /var/data public/storage\n\
php artisan migrate --force\n\
php artisan db:seed --force\n\
php-fpm -D\n\
sed -i "s/80/$PORT/g" /etc/nginx/conf.d/default.conf\n\
nginx -g "daemon off;"' > /start.sh

# Torna o script executável
RUN chmod +x /start.sh

EXPOSE 8080
ENV PORT=8080

CMD ["/start.sh"]
