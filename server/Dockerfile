# Устанавливаем базовый образ PHP
FROM php:8.2-fpm

# Установка утилиты unzip
RUN apt-get update && apt-get install -y unzip


# Установка PostgreSQL клиента и расширения PDO для PostgreSQL
RUN apt install -y postgresql-client libpq-dev

# Устанавливаем необходимые расширения PHP, включая pdo_pgsql
RUN docker-php-ext-configure pgsql -with-pgsql=/usr/local/pgsql \
    && docker-php-ext-install pdo pdo_pgsql

# Установка дополнительных расширений PHP для Redis
RUN pecl install redis && docker-php-ext-enable redis

# Установка зависимостей gRPC и Protobuf
RUN apt install -y git autoconf build-essential libtool curl automake libprotobuf-dev
RUN apt install -y protobuf-compiler
RUN apt install -y protobuf-compiler-grpc

# Установка библиотеки gRPC для PHP
RUN pecl install grpc && docker-php-ext-enable grpc
RUN pecl install protobuf && docker-php-ext-enable protobuf

# ext-sockets
RUN docker-php-ext-install sockets

# Устанавливаем рабочую директорию
WORKDIR /var/www/html

# Копирование и установка Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Копирование и установка зависимостей PHP
COPY ./src /var/www/html
RUN composer install

# Скачать необходимые зависимости для gRPC
RUN ./vendor/bin/rr download-protoc-binary



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

# Запуск сервисов контейнера
CMD ["supervisord", "-c", "/etc/supervisor/conf.d/supervisord.conf"]
