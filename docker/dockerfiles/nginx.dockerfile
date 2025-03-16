FROM nginx:stable-alpine

ARG UID
ARG GID

ENV UID=${UID}
ENV GID=${GID}

RUN mkdir -p /var/www/html
WORKDIR /var/www/html

# MacOS staff group's gid is 20, so is the dialout group in alpine linux. We're not using it, let's just remove it.
RUN delgroup dialout

RUN addgroup -g ${GID} --system mpfit_test
RUN adduser -G mpfit_test --system -D -s /bin/sh -u ${UID} mpfit_test
RUN sed -i "s/user  nginx/user mpfit_test/g" /etc/nginx/nginx.conf
