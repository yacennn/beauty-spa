FROM php:8.2-fpm-alpine

# Install system dependencies
RUN apk add --no-cache nginx wget nodejs npm curl libpng-dev libjpeg-turbo-dev freetype-dev git unzip zip

# Install PHP extensions
RUN docker-php-ext-install pdo pdo_mysql gd

# Get latest Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www

# Copy project files
COPY . .

# Install PHP and Node dependencies
RUN composer install --no-dev --optimize-autoloader
RUN npm install && npm run build

# Script bch y-gadd port d Nginx 3la hsab chno bgha Render l-wa9t d l-start
RUN echo '#!/bin/sh\n\
sed -i "s/listen 80;/listen ${PORT:-80};/g" /etc/nginx/http.d/default.conf\n\
php-fpm -D && nginx -g "daemon off;"' > /entrypoint.sh && chmod +x /entrypoint.sh

# Configure Nginx entry configuration
RUN echo 'server { \n\
    listen 80; \n\
    root /var/www/public; \n\
    index index.php index.html; \n\
    location / { \n\
        try_files $uri $uri/ /index.php?$query_string; \n\
    } \n\
    location ~ \.php$ { \n\
        try_files $uri =404; \n\
        fastcgi_split_path_info ^(.+\.php)(/.+)$; \n\
        fastcgi_pass 127.0.0.1:9000; \n\
        fastcgi_index index.php; \n\
        include fastcgi_params; \n\
        fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name; \n\
        fastcgi_param PATH_INFO $fastcgi_path_info; \n\
    } \n\
}' > /etc/nginx/http.d/default.conf

CMD ["/entrypoint.sh"]