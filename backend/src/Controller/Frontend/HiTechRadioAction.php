<?php

declare(strict_types=1);

namespace App\Controller\Frontend;

use App\Controller\SingleActionInterface;
use App\Environment;
use App\Http\Response;
use App\Http\ServerRequest;
use Psr\Http\Message\ResponseInterface;

final readonly class HiTechRadioAction implements SingleActionInterface
{
    public function __construct(
        private Environment $environment,
    ) {
    }

    public function __invoke(
        ServerRequest $request,
        Response $response,
        array $params
    ): ResponseInterface {
        $path = $this->environment->getBaseDirectory() . '/web/static/hitech-radio/index.html';

        return $response
            ->withHeader('Content-Type', 'text/html; charset=utf-8')
            ->write((string)file_get_contents($path));
    }
}
