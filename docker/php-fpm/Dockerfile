FROM php:7.4.3-fpm-buster

# Arguments defined in docker-compose.yml
ARG user
ARG uid

# Install system dependencies
RUN apt-get update && apt-get install -y --no-install-recommends \
    apt-utils \
    git \
    curl \
    libfreetype6-dev \
    libjpeg62-turbo-dev \
    libpng-dev \
    libxpm-dev \
    libvpx-dev \
    libonig-dev \
    zip \
    unzip

# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# GD configuration
RUN docker-php-ext-configure gd --with-freetype --with-jpeg

# Install PHP extensions
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath -j$(nproc) gd

# Get latest Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Create system user to run Composer and Artisan Commands
RUN useradd -G www-data,root -u $uid -d /home/$user $user
RUN mkdir -p /home/$user/.composer && \
    chown -R $user:$user /home/$user

# Set working directory
WORKDIR /var/www

USER $user
