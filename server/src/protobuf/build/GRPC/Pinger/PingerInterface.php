<?php
# Generated by the protocol buffer compiler (roadrunner-server/grpc). DO NOT EDIT!
# source: protobuf/src/pinger.proto

namespace GRPC\Pinger;

use Spiral\RoadRunner\GRPC;

interface PingerInterface extends GRPC\ServiceInterface
{
    // GRPC specific service name.
    public const NAME = "pinger.Pinger";

    /**
    * @param GRPC\ContextInterface $ctx
    * @param PingRequest $in
    * @return PingResponse
    *
    * @throws GRPC\Exception\InvokeException
    */
    public function ping(GRPC\ContextInterface $ctx, PingRequest $in): PingResponse;
}
