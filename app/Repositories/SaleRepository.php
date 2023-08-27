<?php

namespace App\Repositories;

use App\Models\Sale;

class SaleRepository
{
    public function addSales(array $sales)
    {
        Sale::insert($sales);
    }
}
