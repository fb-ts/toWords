FROM php:7.1-cli
COPY . /usr/src/to-words
WORKDIR /usr/src/to-words

RUN pecl install xdebug-2.5.0 && docker-php-ext-enable xdebug

RUN curl --silent --show-error https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN composer config -g github-oauth.github.com efb504d21982517e0a54adabafa37da0ad5c5cf8