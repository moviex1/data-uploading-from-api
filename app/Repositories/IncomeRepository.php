<?php

namespace App\Repositories;

use App\Models\Income;

class IncomeRepository
{
    public function addIncomes(array $incomes)
    {
       Income::insert($incomes);
    }
}
