# Imagem base com o PHP 8.1
FROM php:8.1-apache

COPY 99-xdebug.ini "${PHP_INI_DIR}/conf.d"

# Instalar dependências
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    libzip-dev \
    && pecl install xdebug \
    && docker-php-ext-enable xdebug \
    && docker-php-ext-install zip


# Instalar o Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer


# Configurações do Xdebug
RUN echo "xdebug.mode=debug" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
    && echo "xdebug.client_host=host.docker.internal" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
    && echo "xdebug.client_port=9003" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
    && echo "xdebug.start_with_request=yes" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
    && echo "xdebug.discover_client_host=false" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini

# Copiar o código do projeto
COPY . /var/www/html

# Definir o diretório de trabalho
WORKDIR /var/www/html

# Configura o Apache para executar na porta 9003
RUN sed -i 's/80/9003/g' /etc/apache2/sites-available/000-default.conf /etc/apache2/ports.conf


# Instalar as dependências do projeto com o Composer
RUN composer install --no-interaction --no-plugins --no-scripts

# Expor a porta 9003
EXPOSE 9003

# Comando para iniciar o servidor web
CMD ["apache2-foreground"]
