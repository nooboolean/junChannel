FROM php:7.4-fpm

# composer インストール
RUN cd /usr/bin && \
curl -s http://getcomposer.org/installer | \
php && \
ln -s /usr/bin/composer.phar /usr/bin/composer

# Node.js インストール
RUN curl -sL https://deb.nodesource.com/setup_12.x | bash -
RUN apt-get update && apt-get install -y nodejs

RUN apt-get update && apt-get install -y \
git \
zip \
unzip \
vim \
nodejs

RUN apt-get update && \
apt-get install -y libpq-dev && \
docker-php-ext-install \
pdo_mysql \
pdo_pgsql

WORKDIR /var/www/html
