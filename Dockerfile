FROM php:8.2-fpm

# Install PHP extensions and necessary dependencies
RUN apt-get update && apt-get install -y \
    git curl unzip libzip-dev libxml2-dev supervisor lsof net-tools \
    && docker-php-ext-install zip pdo_mysql soap sockets pcntl

# PHP upload limits — allow up to 40MB for video uploads
RUN printf "upload_max_filesize = 40M\npost_max_size = 45M\nmax_execution_time = 300\nmax_input_time = 300\nmemory_limit = 256M\n" \
    > /usr/local/etc/php/conf.d/uploads.ini

# Set the working directory
WORKDIR /var/www/html

# Copy application files into the container
# COPY . /var/www/html
COPY . .

# Run Composer install during the build
# Install Composer globally
RUN curl -sS https://getcomposer.org/installer | php && mv composer.phar /usr/bin/composer
RUN composer install --no-dev --optimize-autoloader


# Expose the application port
EXPOSE 80
