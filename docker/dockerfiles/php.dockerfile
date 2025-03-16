FROM php:8.2-fpm-alpine

ARG UID
ARG GID

ENV UID=${UID}
ENV GID=${GID}

RUN mkdir -p /var/www/html
WORKDIR /var/www/html

COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer

# MacOS staff group's gid is 20, so is the dialout group in alpine linux. We're not using it, let's just remove it.
RUN delgroup dialout

RUN addgroup -g ${GID} --system mpfit_test
RUN adduser -G mpfit_test --system -D -s /bin/sh -u ${UID} mpfit_test

RUN sed -i "s/user = www-data/user = mpfit_test/g" /usr/local/etc/php-fpm.d/www.conf
RUN sed -i "s/group = www-data/group = mpfit_test/g" /usr/local/etc/php-fpm.d/www.conf
RUN echo "php_admin_flag[log_errors] = on" >> /usr/local/etc/php-fpm.d/www.conf

RUN docker-php-ext-install pdo pdo_mysql

RUN echo "memory_limit = 1024M" >> /usr/local/etc/php/conf.d/docker-fpm.ini
RUN echo "max_input_vars = 10000" >> /usr/local/etc/php/conf.d/docker-fpm.ini
RUN echo "max_multipart_body_parts = 10000" >> /usr/local/etc/php/conf.d/docker-fpm.ini
RUN echo "upload_max_filesize = 100M" >> /usr/local/etc/php/conf.d/docker-fpm.ini
RUN echo "post_max_size = 100M" >> /usr/local/etc/php/conf.d/docker-fpm.ini


#XDebug
RUN apk update && \
    apk upgrade && \
    apk add --no-cache linux-headers && \
    apk add --no-cache --virtual .xdebug $PHPIZE_DEPS && \
    pecl install xdebug && \
    docker-php-ext-enable xdebug && \
    apk del .xdebug

USER mpfit_test

CMD ["php-fpm", "-y", "/usr/local/etc/php-fpm.conf", "-R"]
