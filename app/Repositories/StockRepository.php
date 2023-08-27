<?php

namespace App\Repositories;

use App\Models\Stock;

class StockRepository
{
    public function addStocks(array $stocks): void
    {
        Stock::insert($stocks);
    }
}
