# Каждое нужно собрать
protoc protobuf/src/pinger.proto --plugin=protoc-gen-php-grpc --php_out=./protobuf/build --php-grpc_out=./protobuf/build

# CLI
# RUN ./vendor/bin/rr download-protoc-binary

