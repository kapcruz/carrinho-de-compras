FROM php:8.2-fpm

ARG user=carrinho_compras
ARG uid=1000

# Install system dependencies
RUN apt-get update && apt-get install -y --fix-missing \
    apt-utils \
    git \
    curl \
    gnupg \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    vim \
    wamerican \
    procps \
    htop \
    ;

# install zip
RUN apt-get update && apt-get install -y \
    zlib1g-dev \
    libzip-dev \
    ;

RUN apt-get update && apt-get install -y \
		libfreetype-dev \
		libjpeg62-turbo-dev \
		libpng-dev \
	&& docker-php-ext-configure gd --with-freetype --with-jpeg \
	&& docker-php-ext-install -j$(nproc) gd

# Get latest Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Create system user to run Composer and Artisan Commands
RUN useradd -G www-data,root -u $uid -d /home/$user $user
