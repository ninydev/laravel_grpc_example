# Устанавливаем базовый образ PHP
FROM php:8.2-fpm

# Устанавливаем рабочую директорию
WORKDIR /var/www/html

# Установка базового набора утилит
RUN apt update && apt install -y unzip mc supervisor autoconf zlib1g-dev


# Установка PostgreSQL клиента и расширения PDO для PostgreSQL
RUN apt update && apt-get install -y postgresql-client libpq-dev
RUN docker-php-ext-configure pgsql -with-pgsql=/usr/local/pgsql \
    && docker-php-ext-install pdo pdo_pgsql

# Установка дополнительных расширений PHP для Redis
RUN pecl install redis && docker-php-ext-enable redis

# Утановка остальных разрешений php для проекта


# Добавление возможностей удаленного вызова процедур
RUN pecl install grpc && docker-php-ext-enable grpc
RUN pecl install protobuf && docker-php-ext-enable protobuf
RUN docker-php-ext-install sockets

# Копирование и установка Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Установка Road Runner
COPY --from=ghcr.io/roadrunner-server/roadrunner:2.12.3 /usr/bin/rr /usr/bin/rr
RUN apt install -y protobuf-compiler


# Копирование и установка зависимостей PHP
COPY ./src /var/www/html
RUN composer install

# Регистрация сервера (тут не нужно - конфигурация уже должна быть в проекте)
# RUN ./artisan vendor:publish --provider='Spiral\RoadRunnerLaravel\ServiceProvider' --tag=config


# Установить права на запись для файлов
RUN chmod -R 777 /var/www/html/storage
RUN chmod -R 777 /var/www/html/storage/logs
RUN chmod -R 777 /var/www/html/storage/framework/sessions/
RUN chmod -R 777 /var/www/html/bootstrap/cache




# Открываем порт для доступа к приложению
EXPOSE 80 9001



# Копирование конфигурационного файла supervisord для воркеров очереди
COPY supervisord.conf /etc/supervisor/conf.d/supervisord.conf

# Запуск сервисов контейнера
CMD ["supervisord", "-c", "/etc/supervisor/conf.d/supervisord.conf"]

EXPOSE 80 9001
