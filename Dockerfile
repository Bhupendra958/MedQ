# MedQueue - PHP app for Render / any Docker host
FROM php:8.2-cli

RUN docker-php-ext-install mysqli

WORKDIR /app
COPY . /app

# Render provides PORT; default 8080 for local runs
EXPOSE 8080
CMD ["sh", "-c", "php -S 0.0.0.0:${PORT:-8080} -t /app router.php"]
