FROM php:8.2-apache

ARG APP_ENV

ADD --chmod=0755 https://github.com/mlocati/docker-php-extension-installer/releases/latest/download/install-php-extensions /usr/local/bin/

# Install the OS packages we need to run PHP + extensions
RUN apt-get update
RUN apt-get install -y git 
RUN apt-get install -y wget 
RUN apt-get install -y curl
RUN apt-get install -y zip
RUN apt-get install -y unzip

# COPY cert/cert-key.pem /etc/apache2/ssl/cert-key.pem
# COPY cert/cert.pem /etc/apache2/ssl/cert.pem

# Configure Apache
COPY ./000-default.conf /etc/apache2/sites-available/000-default.conf
RUN a2enmod headers
RUN a2enmod rewrite
RUN a2enmod ssl

# Configure PHP settings
COPY ./ /temp/

RUN if [ "$APP_ENV" = "local" ]; then \
    cp /temp/php.ini "$PHP_INI_DIR/php.ini"; \
elif [ "$APP_ENV" = "production" ]; then \
    cp /temp/php.prod.ini "$PHP_INI_DIR/php.ini"; \
else \
    echo "No specific file to copy for APP_ENV=$APP_ENV"; \
fi

RUN rm -rf /temp/

# Extensions
RUN install-php-extensions xdebug intl zip mysqli opcache pdo soap pdo_mysql sockets

# Configure composer
RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
RUN php composer-setup.php
RUN mv composer.phar /usr/local/bin/composer
