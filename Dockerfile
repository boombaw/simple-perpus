FROM php:7.4-fpm-alpine

RUN apk add --no-cache \
	freetype-dev \
	libjpeg-turbo-dev \
	libpng-dev \
	libzip-dev \
	&& docker-php-ext-configure gd --with-freetype --with-jpeg \
	&& docker-php-ext-install gd mysqli pdo_mysql zip


# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer  


WORKDIR /app

COPY composer.json composer.lock ./
RUN composer install --no-dev --ignore-platform-reqs

COPY . .

CMD ["php-fpm"]
