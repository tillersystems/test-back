FROM debian:jessie

MAINTAINER Vincent Oliveira <vincent@tillersystems.com>

RUN apt-get update && apt-get install -y curl php5-common php5-cli \
php5-fpm php5-mcrypt php5-mysql \
php5-apcu php5-gd php5-imagick php5-curl php5-intl

COPY tiller-test.ini /etc/php5/fpm/conf.d/
COPY tiller-test.ini /etc/php5/cli/conf.d/

COPY tiller-test.pool.conf /etc/php5/fpm/pool.d/

RUN usermod -u 1000 www-data
RUN mkdir -p app/cache/
RUN mkdir -p app/logs/
RUN chmod -R 777 app/cache
RUN chmod -R 777 app/logs

#COMPOSER
RUN curl -sS https://getcomposer.org/installer | php
RUN mv composer.phar /usr/local/bin/composer

#PHPUNIT
RUN composer global require "phpunit/phpunit"
ENV PATH /root/.composer/vendor/bin:$PATH
RUN ln -s /root/.composer/vendor/bin/phpunit /usr/bin/phpunit

ENTRYPOINT ["php5-fpm"]
CMD ["-F"]

EXPOSE 9000
