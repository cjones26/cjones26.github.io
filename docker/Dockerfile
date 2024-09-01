FROM php:8.2-apache
USER root
WORKDIR /var/www/html
ARG USERNAME=corte
ARG USER_UID=1000
ARG USER_GID=$USER_UID

# Copy Apache configuration
COPY apache-config.conf /etc/apache2/sites-available/000-default.conf

RUN apt-get update && \
    apt-get install -y nano wget git unzip libzip-dev sudo

RUN docker-php-ext-install zip pdo_mysql

RUN a2enmod rewrite

# Install composer
RUN wget https://getcomposer.org/installer -O - -q | php -- --install-dir=/usr/local/bin --filename=composer

# Change the owner of the container document root
RUN chown -R www-data:www-data /var/www/html

# Start Apache in foreground
RUN service apache2 restart

# Create the user
RUN groupadd --gid $USER_GID $USERNAME \
    && useradd --uid $USER_UID --gid $USER_GID -m $USERNAME \
    && echo $USERNAME ALL=\(root\) NOPASSWD:ALL > /etc/sudoers.d/$USERNAME \
    && chmod 0440 /etc/sudoers.d/$USERNAME

# # Rename php.ini-production to php.ini
# RUN mv /usr/local/etc/php/php.ini-production /usr/local/etc/php/php.ini

# # Enable Apache modules and configure AllowOverride
# RUN a2enmod rewrite


# RUN sed -i 's/;extension=mysqli/extension=mysqli/' /usr/local/etc/php/php.ini && \
#     sed -i 's/;extension=pdo_mysql/extension=pdo_mysql/' /usr/local/etc/php/php.ini