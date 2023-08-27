<?php

namespace App\Services;

use App\Constants;
use Generator;
use Illuminate\Support\Facades\Http;

class ApiService
{
    public function getDataFromEndpoint(string $endpoint, array $params, int $limit = 500): Generator
    {
        $current = 1;
        do {
            $response = Http::dataSfera()
                ->withQueryParameters([
                    ...$params,
                    'limit' => $limit,
                    'page' => $current
                ])
                ->get($endpoint)
                ->json();

            yield $response['data'];

            sleep(1);

            $current++;
        } while ($current <= $response['meta']['last_page']);
    }
}
