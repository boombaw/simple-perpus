FROM php:7.4-fpm-alpine

RUN apk add --no-cache \
	freetype \
	libjpeg-turbo \
	libpng \
	libzip \
	&& docker-php-ext-install mysqli pdo_mysql zip

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer  


WORKDIR /app

COPY composer.json composer.lock ./
RUN composer install --no-dev --ignore-platform-reqs

COPY . .

CMD ["php-fpm"]
