<?php

namespace App\Services;

use Generator;
use Illuminate\Support\Facades\Http;

class StockService
{
    private const API_ENDPOINT = '/api/stocks';

    public function getStocks(int $limit = 500): Generator
    {
        $current = 1;
        do {
            $response = Http::dataSfera()
                ->withQueryParameters([
                    'dateFrom' => date('Y-m-d'),
                    'limit' => $limit,
                    'page' => $current
                ])
                ->get(self::API_ENDPOINT)
                ->json();

            yield $response['data'];

            sleep(1);

            $current++;
        } while ($current <= $response['meta']['last_page']);
    }
}
