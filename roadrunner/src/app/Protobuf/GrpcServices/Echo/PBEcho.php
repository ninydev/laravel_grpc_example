<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: echo.proto

namespace GrpcServices\Echo;

class PBEcho
{
    public static $is_initialized = false;

    public static function initOnce() {
        $pool = \Google\Protobuf\Internal\DescriptorPool::getGeneratedPool();

        if (static::$is_initialized == true) {
          return;
        }
        $pool->internalAddGeneratedFile(
            '
�

echo.protoservices"
PingMessage
msg (	2>
Echo6
Ping.services.PingMessage.services.PingMessage" B1�GrpcServices\\Echo\\Messages�GrpcServices\\Echobproto3'
        , true);

        static::$is_initialized = true;
    }
}

