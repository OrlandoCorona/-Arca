FROM php:8.2-cli

# Instalar extensiones necesarias para PostgreSQL
RUN apt-get update && apt-get install -y \
    libpq-dev \
    && docker-php-ext-install pdo pdo_pgsql

# Directorio de trabajo
WORKDIR /var/www/html

# Copiar todo el proyecto
COPY . .

# Exponer puerto Render
EXPOSE 10000

# Servir DESDE public/
CMD ["php", "-S", "0.0.0.0:10000", "-t", "public"]
