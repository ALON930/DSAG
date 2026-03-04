############################
# LARAVEL + NGINX
############################
FROM php:8.4-fpm

WORKDIR /app

# 1. Installation des dépendances système
RUN apt-get update && apt-get install -y \
    nginx \
    supervisor \
    git \
    curl \
    unzip \
    pkg-config \
    build-essential \
    libpng-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    libzip-dev \
    zlib1g-dev \
    libmariadb-dev \
    libonig-dev \
    libxml2-dev \
    libicu-dev \
    netcat-openbsd \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j$(nproc) \
        pdo_mysql \
        bcmath \
        gd \
        zip \
        opcache \
        intl \
        mbstring \
    && rm -rf /var/lib/apt/lists/*
# Note : 'xml' a été retiré de la liste car il est déjà présent par défaut dans l'image PHP 8.4

# 2. AJOUT CRUCIAL : Installer Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# 3. Configuration PHP
RUN mv "$PHP_INI_DIR/php.ini-production" "$PHP_INI_DIR/php.ini"

# 4. Gestion des dépendances PHP (Layer Caching)
COPY composer.json composer.lock ./
RUN composer install --no-dev --no-scripts --no-autoloader

# 5. Copie du code source
COPY . .

# 6. Finalisation Composer
RUN composer dump-autoload --optimize --no-dev

# 7. Permissions
RUN mkdir -p storage bootstrap/cache && \
    chown -R www-data:www-data /app && \
    chmod -R 775 storage bootstrap/cache

# 8. Nginx & Supervisor
COPY docker/nginx.conf /etc/nginx/sites-available/default
RUN ln -sf /etc/nginx/sites-available/default /etc/nginx/sites-enabled/default
COPY docker/supervisord.conf /etc/supervisor/conf.d/supervisord.conf

# 9. Entrypoint
COPY docker/entrypoint.sh /usr/local/bin/entrypoint.sh
RUN chmod +x /usr/local/bin/entrypoint.sh

EXPOSE 80

ENTRYPOINT ["/usr/local/bin/entrypoint.sh"]