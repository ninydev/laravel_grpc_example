<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response as HttpResponse;
use OpenApi\Attributes as OAT;


class TestController
{
    #[OAT\Post(
        tags: ['auth'],
        path: '/api/signup',
        summary: 'Signup a user',
        operationId: 'AuthController.signup',
        requestBody: new OAT\RequestBody(
            required: true,

        ),
        responses: [
            new OAT\Response(
                response: HttpResponse::HTTP_CREATED,
                description: 'Created',
            ),
            new OAT\Response(
                response: HttpResponse::HTTP_UNPROCESSABLE_ENTITY,
                description: 'Unprocessable entity',
            ),
        ]
    )]
    public function test(){

    }

    /**
     * @OA\Get(
     *     path="/projects",
     *     @OA\Response(response="200", description="Display a listing of projects.")
     * )
     */
    public function t2(){

    }
}
