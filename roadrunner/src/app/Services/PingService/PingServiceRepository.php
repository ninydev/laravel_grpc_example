<?php

namespace App\Services\PingService;
use Spiral\RoadRunner\GRPC\ServiceInterface;

interface PingServiceRepository extends ServiceInterface
{
    const NAME = 'services.PingService';

}
