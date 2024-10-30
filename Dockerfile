# Gunakan image PHP yang sesuai dengan versi PHP yang digunakan oleh CodeIgniter Anda
FROM php:7.4-fpm

# Install dependensi PHP
RUN apt-get update && apt-get install -y \
	libzip-dev \
	zip \
	unzip \
	&& docker-php-ext-install zip

# Copy file aplikasi ke dalam container
COPY . /var/www/html

# Set working directory
WORKDIR /var/www/html

# Install dependensi Composer
COPY composer.json composer.lock /var/www/html/
RUN composer install --no-dev

# Expose port 80
EXPOSE 80

# Command untuk menjalankan aplikasi
CMD ["php-fpm"]
