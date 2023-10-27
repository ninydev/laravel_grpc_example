# Устанавливаем базовый образ PHP
FROM php:8.2-fpm

# Установка утилиты unzip
RUN apt-get update && apt-get install -y unzip


# Установка PostgreSQL клиента и расширения PDO для PostgreSQL
RUN apt-get update && apt-get install -y postgresql-client libpq-dev

# Устанавливаем необходимые расширения PHP, включая pdo_pgsql
RUN docker-php-ext-configure pgsql -with-pgsql=/usr/local/pgsql \
    && docker-php-ext-install pdo pdo_pgsql

# Установка дополнительных расширений PHP для Redis
RUN pecl install redis && docker-php-ext-enable redis

# Установка зависимостей gRPC и Protobuf
RUN apt-get update && apt-get install -y git autoconf build-essential libtool curl automake libprotobuf-dev  protobuf-compiler

# Установка библиотеки gRPC для PHP
RUN pecl install grpc && docker-php-ext-enable grpc

# Устанавливаем рабочую директорию
WORKDIR /var/www/html

# Копирование и установка Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Копирование и установка зависимостей PHP
COPY ./src /var/www/html
RUN composer install

# Установить права на запись для файлов
RUN chmod -R 777 /var/www/html/storage
RUN chmod -R 777 /var/www/html/storage/logs
RUN chmod -R 777 /var/www/html/storage/framework/sessions/

RUN chmod -R 777 /var/www/html/vendor
RUN chmod -R 777 /var/www/html/bootstrap/cache

# Установка Nginx
RUN apt-get update && apt-get install -y nginx

# Утсановка mc
RUN apt install mc -y

# Копирование конфигурационных файлов Nginx
COPY nginx.laravel.conf /etc/nginx/nginx.conf

# Открываем порт для доступа к приложению
EXPOSE 80

# Установка supervisord
RUN apt-get install -y supervisor

# Копирование конфигурационного файла supervisord для воркеров очереди
COPY supervisord.conf /etc/supervisor/conf.d/supervisord.conf

#
COPY cron.conf /etc/cron.d

# Запуск сервисов контейнера
CMD ["supervisord", "-c", "/etc/supervisor/conf.d/supervisord.conf"]
