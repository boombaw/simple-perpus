# Gunakan image PHP yang sesuai dengan versi PHP yang digunakan oleh CodeIgniter Anda
FROM php:7.4-fpm-alpine

# Set working directory
WORKDIR /var/www/html

# Install Additional dependencies
RUN apk update && apk add --no-cache \
	build-base shadow vim curl \
	php7 \
	php7-fpm \
	php7-common \
	php7-pdo \
	php7-pdo_mysql \
	php7-mysqli \
	php7-mcrypt \
	php7-mbstring \
	php7-xml \
	php7-openssl \
	php7-json \
	php7-phar \
	php7-zip \
	php7-gd \
	php7-dom \
	php7-session \
	php7-zlib

# Add and Enable PHP-PDO Extenstions
RUN docker-php-ext-install pdo pdo_mysql
RUN docker-php-ext-install mysqli
RUN docker-php-ext-enable pdo_mysql

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer  


# Copy file aplikasi ke dalam container
COPY . /var/www/html

# Install dependensi Composer
COPY composer.json composer.lock ./
RUN composer install  --no-dev --ignore-platform-reqs


# Expose port 80
EXPOSE 80

# Command untuk menjalankan aplikasi
CMD ["php-fpm"]
