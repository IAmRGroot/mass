<?php

namespace App\Library\Media\Requests\Radarr;

use App\Library\Http\ResponseInterface;
use App\Library\Media\Requests\RadarrRequest;
use App\Library\Media\Responses\Radarr\MovieResponse;
use GuzzleHttp\Psr7\Response;
use Illuminate\Http\Request;

class AddMovieRequest extends RadarrRequest
{
    private array $json;

    public function __construct(array $json)
    {
        $this->json = $json;
    }

    public function getRoute(): string
    {
        return 'api/movie';
    }

    public function getMethod(): string
    {
        return Request::METHOD_POST;
    }

    public function getJson(): array
    {
        return $this->json;
    }

    public function getResponseData(Response $response): ResponseInterface
    {
        return new MovieResponse($response);
    }
}
