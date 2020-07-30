<?php

use Laminas\Diactoros\Response\JsonResponse;
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require 'vendor/autoload.php';

$app = new \Slim\App;

$app->get('/webhooks/answer', function (Request $request, Response $response) {
    $talk = new \Nexmo\Voice\NCCO\Action\Talk('Hi, welcome to this Nexmo conference call');
    $convo = new \Nexmo\Voice\NCCO\Action\Conversation('nexmo-conference-standard');

    $ncco = new \Nexmo\Voice\NCCO\NCCO();
    $ncco->addAction($talk);
    $ncco->addAction($convo);

    return new JsonResponse($ncco->toArray());
});

$app->run();
