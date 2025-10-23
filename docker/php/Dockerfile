FROM php:8.4-fpm

# Install dependencies
RUN apt-get update && apt-get install -y \
    libfreetype6-dev \
    libjpeg62-turbo-dev \
    libpng-dev \
    libzip-dev \
    zlib1g-dev \
    unzip \
    vim  \
    libjpeg-dev \
    libfreetype6-dev \
    libonig-dev \
    libpq-dev  # PostgreSQL development files

# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Install extensions
RUN docker-php-ext-install pdo_mysql mysqli mbstring gd exif zip pdo_pgsql bcmath \
    && docker-php-ext-configure gd --with-freetype=usr/include/ --with-jpeg=/usr/include/ \
    && docker-php-ext-install -j$(nproc) gd

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Install nodeJS
RUN curl -sL https://deb.nodesource.com/setup_20.x | bash
RUN apt-get install -y nodejs

# Install git
RUN apt-get update
RUN apt-get install -y git
