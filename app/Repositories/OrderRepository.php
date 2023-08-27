<?php

namespace App\Repositories;

use App\Models\Order;

class OrderRepository
{
    public function addOrders(array $orders)
    {
        Order::insert($orders);
    }
}
