FROM php:8.2-fpm

# Install PHP extensions and necessary dependencies
RUN apt-get update && apt-get install -y \
    git curl unzip libzip-dev libxml2-dev supervisor lsof net-tools \
    && docker-php-ext-install zip pdo_mysql soap sockets pcntl

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
