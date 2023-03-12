<?php

declare(strict_types=1);

namespace App\Services;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Support\Collection;

final class CommentsApiClient
{
    public function __construct(
        private readonly Client $httpClient = new Client()
    ) {
    }

    /**
     * @throws GuzzleException
     */
    public function get(string $entityType, int $entityId): Collection
    {
        $response = $this->httpClient->get('http://comments-app/api/v1/comments', [
            'query' => [
                'entityType' => $entityType,
                'entityId' => $entityId,
            ],
        ]);

        return collect(
            json_decode($response->getBody()->getContents(), true)
        );
    }
}
