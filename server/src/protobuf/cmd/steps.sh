# https://hackmd.io/@tML6ejGhR7q68VfQ4kLDQg/By-WdVz_Y
# Не идет
sudo pecl install protobuf
sudo apt  install protobuf-compiler
sudo apt install protobuf-compiler-grpc

# Install google/protobuf to Laravel
composer require google/protobuf

# Создание папок для вызова процедур
#$ cd {laravel-project}
#$ mkdir protobuf
#$ mkdir protobuf/build
#$ mkdir protobuf/src

# Создание запроса

#syntax = "proto3";
#package mypackage;
#message UserRequest {
#    uint32 id=1;
#}
#message User {
#    uint32 id = 1;
#    string name = 2;
#    string email = 3;
#    string created_at = 4;
#    string updated_at = 5;
#}


# Компиляция
protoc --proto_path=protobuf --php_out=protobuf/build protobuf/src/user.proto

# Добавление в автозагрузку

#    "autoload": {
#        "psr-4": {
#            "App\\": "app/",
#            "Database\\Factories\\": "database/factories/",
#            "Database\\Seeders\\": "database/seeders/",
#            "Mypackage\\": "protobuf/build/Mypackage/",
#            "": "protobuf/build/"
#        }
#    },
