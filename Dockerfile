# 1. Usamos PHP oficial con servidor embebido
FROM php:8.2-cli

# 2. Directorio de trabajo dentro del contenedor
WORKDIR /app

# 3. Copiamos todo el proyecto
COPY . .

# 4. Instalamos Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# 5. Instalamos dependencias PHP (sin vendor en Git)
RUN composer install --no-dev --optimize-autoloader

# 6. Exponemos el puerto que Render usa
EXPOSE 10000

# 7. Comando para arrancar la app
CMD ["php", "-S", "0.0.0.0:10000", "-t", "public"]
