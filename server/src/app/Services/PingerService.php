<?php

namespace app\Services;

use GRPC\Pinger\PingerInterface;
use GRPC\Pinger\PingRequest;
use GRPC\Pinger\PingResponse;
use Spiral\RoadRunner\GRPC;

class PingerService implements PingerInterface
{
    public function __construct(
        private readonly HttpClientInterface $httpClient
    ) {
    }

    public function ping(GRPC\ContextInterface $ctx, PingRequest $in): PingResponse
    {
        $statusCode = $this->httpClient->get($in->getUrl())->getStatusCode();

        return new PingResponse([
            'status_code' => $statusCode
        ]);
    }
}
