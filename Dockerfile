FROM composer:2.8 AS build

COPY . /app

RUN composer install --prefer-dist --optimize-autoloader --no-interaction --ignore-platform-reqs --no-progress --no-dev

FROM node:23-alpine AS assets

WORKDIR /app

# Copy package files for npm dependencies
COPY package.json ./
COPY package-lock.json ./

RUN npm ci

COPY --from=build /app ./

RUN npm run build


FROM trafex/php-nginx:3.8.0 AS production

ARG PHP_VERSION=php84

USER root
RUN apk add --no-cache \
  ${PHP_VERSION}-pdo \
  ${PHP_VERSION}-pdo_mysql \
  ${PHP_VERSION}-pdo_sqlite
USER nobody

# Configure nginx
COPY --from=assets /app/docker/nginx/ /etc/nginx/

# Copy project
COPY --chown=nobody --from=assets /app /var/www/html
