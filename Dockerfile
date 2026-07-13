FROM php:8.4-cli

RUN apt-get update && apt-get install -y \
    git \
    unzip \
    zip \
    curl \
    nodejs \
    npm \
    libpq-dev \
    libzip-dev \
    libicu-dev \
    && docker-php-ext-install \
    pdo_pgsql \
    zip \
    intl

COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www

COPY . .

RUN composer install --no-dev --optimize-autoloader

RUN npm install
RUN npm run build

EXPOSE 10000

CMD php artisan serve --host=0.0.0.0 --port=10000