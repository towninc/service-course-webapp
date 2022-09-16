FROM php:7.2-apache

RUN set -x \
    && apt-get update \
    && apt-get install -y vim git unzip \
      locales gettext fontconfig xvfb wget poppler-utils \
      libicu-dev libxml2-dev libfreetype6-dev libjpeg62-turbo-dev libmcrypt-dev libpng-dev libgd-dev \
    && rm -rf /var/cache/apk/* \
    && echo "export LANG='ja_JP.UTF-8'" >> /root/.bashrc \
    && echo "ja_JP UTF-8" > /etc/locale.gen \
    && locale-gen \
    && a2enmod rewrite \
    && docker-php-ext-configure intl \
    && docker-php-ext-install mbstring gettext intl pdo_mysql \
    && docker-php-ext-install -j$(nproc) iconv \
    && docker-php-ext-configure gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/ \
    && docker-php-ext-install -j$(nproc) gd \
    && docker-php-ext-install soap \
    && docker-php-ext-install bcmath \
    && pecl install xdebug \
    && curl -sS https://getcomposer.org/installer | php \
    && mv composer.phar /usr/local/bin/composer

ENV CAKEPHP_ENV development

CMD ["/usr/sbin/apache2ctl", "-D", "FOREGROUND"]
EXPOSE 8765