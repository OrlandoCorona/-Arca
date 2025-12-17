FROM php:8.2-cli

# 1. Instalar dependencias del sistema necesarias para Composer
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    libzip-dev \
    && docker-php-ext-install zip \
    && rm -rf /var/lib/apt/lists/*

# 2. Directorio de trabajo
WORKDIR /app

# 3. Copiar el proyecto
COPY . .

# 4. Instalar Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# 5. Instalar dependencias PHP
RUN composer install --no-dev --optimize-autoloader

# 6. Puerto para Render
EXPOSE 10000

# 7. Arrancar servidor PHP
CMD ["php", "-S", "0.0.0.0:10000", "-t", "public"]

