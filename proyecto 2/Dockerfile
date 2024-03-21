FROM php:8.2-apache
# Activar los modulo de apache
RUN a2enmod rewrite
# Instalacion de extensiones
RUN docker-php-ext-install mysqli pdo pdo_mysql
# Directorio de trabajo /var/www/html
WORKDIR /var/www/html
# Copia del index en Apache
COPY ../www .