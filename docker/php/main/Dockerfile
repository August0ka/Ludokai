FROM php:8.3-fpm

# Copia os arquivos de dependência
COPY composer.lock composer.json /var/www/

WORKDIR /var/www

# Configura o PHP para uploads maiores
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
    curl \
    nginx \
    libpq-dev \
    && docker-php-ext-install pdo_pgsql \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

# Instala o NodeJS
RUN curl -fsSL https://deb.nodesource.com/setup_18.x | bash - && \
    apt-get install -y nodejs

# Instala o Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Cria usuário e grupo para a aplicação
RUN groupadd -g 1000 www \
    && useradd -u 1000 -ms /bin/bash -g www www

# Copia os arquivos da aplicação e ajusta a propriedade
COPY --chown=www:www . /var/www/

# Configura o Nginx
COPY docker/nginx/main/conf.d /etc/nginx/conf.d/default.conf

# Cria o script de start e o torna executável
RUN echo '#!/bin/bash
composer install --no-dev --optimize-autoloader --no-interaction
npm install && npm run build
chmod -R 775 /var/www/storage /var/www/bootstrap/cache
php artisan config:cache
php artisan route:cache
php artisan view:cache
php artisan storage:link
# Remover o link criado automaticamente e recriar para apontar para /var/data
rm -rf public/storage
ln -sfn /var/data public/storage
php artisan migrate --force
php artisan db:seed --force
php-fpm -D
sed -i "s/80/$PORT/g" /etc/nginx/conf.d/default.conf
nginx -g "daemon off;"' > /start.sh && chmod +x /start.sh

# Cria os diretórios e ajusta permissões
RUN mkdir -p /var/www/storage /var/data && \
    chown -R www-data:www-data /var/www && \
    chmod -R 775 /var/www/storage /var/www/bootstrap/cache && \
    chown -R www-data:www-data /var/data && \
    chmod -R 775 /var/data

EXPOSE 8080
ENV PORT=8080

CMD ["/start.sh"]
