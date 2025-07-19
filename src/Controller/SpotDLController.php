<?php

declare(strict_types=1);

namespace Plugin\Spotnik\Controller;

use App\Controller\SingleActionInterface;
use App\Http\Response;
use App\Http\ServerRequest;
use Psr\Http\Message\ResponseInterface;

final class SpotDLController implements SingleActionInterface
{
    public function __invoke(ServerRequest $request, Response $response, array $params): ResponseInterface
    {
        return $request->getView()
            ->renderToResponse($response, 'spotnik::spotdl_dashboard', [
                'title' => 'Spotnik - Spotify Downloader',
                'message' => 'SpotDL integration coming soon!'
            ]);
    }
} 