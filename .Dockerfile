# Imagem base
FROM php:7.4-apache

# Metadados da imagem
LABEL maintainer="Luiz Santos <luizcsdev@gmail.com"
LABEL description="Imagem Docker para o geradorQrCode"

# Variáveis de ambiente
ENV APACHE_DOCUMENT_ROOT /var/www/html/geradorQrCode/public
ENV PHP_INI_DIR /usr/local/etc/php
ENV COMPOSER_ALLOW_SUPERUSER 1

# Instalação de dependências
RUN apt-get update && \
    apt-get install -y --no-install-recommends \
        git \
        libpng-dev \
        libzip-dev \
    && rm -rf /var/lib/apt/lists/*

# Extensões PHP necessárias
RUN docker-php-ext-install -j$(nproc) \
    gd \
    zip

# Configurações personalizadas do PHP
COPY ./config/php.ini $PHP_INI_DIR/conf.d/zzz-custom.ini

# Instalação do Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Diretório de trabalho e cópia dos arquivos da aplicação
WORKDIR /var/www/html/geradorQrCode
COPY . .

# Instalação das dependências da aplicação
RUN composer install --no-interaction --prefer-dist --no-dev

# Permissões dos arquivos e diretórios da aplicação
RUN chown -R www-data:www-data /var/www/html/geradorQrCode/storage

# Exposição de porta
EXPOSE 80

# Comando para iniciar o servidor Apache
CMD ["apache2-foreground"]
