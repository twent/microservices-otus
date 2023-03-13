<?php

declare(strict_types=1);

namespace App\Services;

use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Http;

final class CommentsApiClient
{
    /**
     * @throws GuzzleException
     */
    public function get(string $entityType, int $entityId): Collection
    {
        $response = Http::get('http://comments-app/api/v1/comments', [
            'entityType' => $entityType,
            'entityId' => $entityId,
        ]);

        return collect($response->json());
    }
}
