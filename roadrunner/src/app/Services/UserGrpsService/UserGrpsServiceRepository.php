<?php

namespace App\Services\UserGrpsService;
use Spiral\RoadRunner\GRPC\ServiceInterface;

interface UserGrpsServiceRepository extends ServiceInterface
{
    const NAME = 'services.UserGrpsService';

}
