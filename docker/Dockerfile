FROM php:7.4-fpm

ARG USER

RUN apt-get update --fix-missing
RUN apt-get update && apt-get install -y \
    curl \
    gettext \
    git \
    openssl \
    zip \
    net-tools \
    nano \
    build-essential \
    libssl-dev \
    zlib1g-dev \
    libpng-dev \
    libpq-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libzip-dev \
    libmagickwand-dev --no-install-recommends \
    libxml2-dev

RUN docker-php-ext-configure gd --with-freetype=/usr/include/ --with-jpeg=/usr/include/

RUN docker-php-ext-install bcmath exif gd gettext pdo_pgsql pgsql zip opcache soap simplexml pcntl

RUN { \
		echo 'opcache.memory_consumption=128'; \
		echo 'opcache.interned_strings_buffer=8'; \
		echo 'opcache.max_accelerated_files=8000'; \
		echo 'opcache.revalidate_freq=2'; \
		echo 'opcache.fast_shutdown=1'; \
		echo 'opcache.enable_cli=1'; \
	} > /usr/local/etc/php/conf.d/opcache-recommended.ini

RUN echo 'memory_limit = 1024M' >> /usr/local/etc/php/conf.d/docker-php-memlimit.ini

RUN pecl install imagick && docker-php-ext-enable imagick

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer \
    && ln -s $(composer config --global home) /root/composer
ENV PATH=$PATH:/root/composer/vendor/bin COMPOSER_ALLOW_SUPERUSER=1

# Add GitHub to known hosts
RUN cd; mkdir .ssh; chmod 0700 .ssh; touch /root/.ssh/known_hosts

RUN useradd -G www-data,root -u 1000 -d /home/$USER $USER
RUN mkdir -p /home/$USER/.composer \
    && chown -R $USER:$USER /home/$USER

USER $USER

WORKDIR /www
