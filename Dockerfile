FROM php:8.1-fpm

# Install system dependencies required for Composer
RUN apt-get update && \
    apt-get install -y --no-install-recommends \
        git \
        zip \
        unzip \
        libzip-dev \
        default-mysql-client \
        nano \
        && rm -rf /var/lib/apt/lists/*

# Install PHP extensions for database access
RUN docker-php-ext-install pdo_mysql zip

# Download and install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Copy the PHP project files
COPY . /var/www/html

# Change the working directory
WORKDIR /var/www/html

# Install dependencies using Composer
RUN composer install --no-dev --no-scripts --no-autoloader

# Run Composer's autoloader
RUN composer dump-autoload --optimize

# Copy the phpunit script into the image
COPY ./scripts/phpunit /usr/local/bin/phpunit

# Set execute permissions on the phpunit script
RUN chmod +x /usr/local/bin/phpunit

# Command to run the PHP file using PHP's built-in web server
CMD ["php", "-S", "0.0.0.0:80", "-t", "/var/www/html"]