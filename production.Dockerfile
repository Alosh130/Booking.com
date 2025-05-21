# Use the official PHP 8.3 image with Alpine (smaller size)
FROM php:8.3-cli-alpine

# Install Laravel Vapor required extensions
RUN apk add --no-cache \
    nginx \
    supervisor \
    curl \
    git \
    unzip \
    oniguruma-dev \
    postgresql-dev \
    libzip-dev \
    && docker-php-ext-install \
    bcmath \
    ctype \
    fileinfo \
    mbstring \
    pdo_mysql \
    pdo_pgsql \
    tokenizer \
    zip

# Install Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Set up working directory
WORKDIR /var/task

# Copy only necessary files (optimized for layer caching)
COPY composer.json composer.lock ./
RUN composer install --no-dev --no-interaction --optimize-autoloader

# Copy the rest of the application
COPY . .

# Build frontend assets (if using Vite)
RUN if [ -f package.json ]; then \
    npm ci && npm run build && rm -rf node_modules; \
    fi

# Configure runtime
COPY vapor/docker/nginx.conf /etc/nginx/nginx.conf
COPY vapor/docker/supervisord.conf /etc/supervisor/conf.d/supervisord.conf

# Set permissions
RUN chmod -R 755 storage bootstrap/cache

# Expose port 8080 (AWS Lambda requirement)
EXPOSE 8080

# Start services via Supervisor
CMD ["/usr/bin/supervisord", "-c", "/etc/supervisor/conf.d/supervisord.conf"]