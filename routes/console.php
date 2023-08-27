<?php

use App\Constants;
use App\Repositories\IncomeRepository;
use App\Repositories\OrderRepository;
use App\Repositories\SaleRepository;
use App\Repositories\StockRepository;
use App\Services\ApiService;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of your Closure based console
| commands. Each Closure is bound to a command instance allowing a
| simple approach to interacting with each command's IO methods.
|
*/

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

Artisan::command('get_stocks', function (ApiService $apiService, StockRepository $stockRepository) {
    $this->comment('Getting data...');
    $batchOfStocks = $apiService->getDataFromEndpoint(Constants::STOCKS_ENDPOINT, [
        'dateFrom' => date('Y-m-d'),
    ]);
    foreach ($batchOfStocks as $stocks) {
        $stockRepository->addStocks($stocks);
        $this->comment('batch loaded');
    }
    $this->comment('Done!');
});

Artisan::command('get_orders', function (ApiService $apiService, OrderRepository $orderRepository) {
    $this->comment('Getting data...');
    $batchOfOrders = $apiService->getDataFromEndpoint(Constants::ORDERS_ENDPOINT, [
        'dateFrom' => '2000-01-01',
        'dateTo' => date('Y-m-d')
    ]);
    foreach($batchOfOrders as $orders){
        $orderRepository->addOrders($orders);
        $this->comment('batch loaded');
    }
    $this->comment('Done!');
});

Artisan::command('get_incomes', function (ApiService $apiService, IncomeRepository $incomeRepository) {
    $this->comment('Getting data...');
    $batchOfIncomes = $apiService->getDataFromEndpoint(Constants::INCOMES_ENDPOINT, [
        'dateFrom' => '2000-01-01',
        'dateTo' => date('Y-m-d')
    ]);
    foreach($batchOfIncomes as $incomes){
        $incomeRepository->addIncomes($incomes);
        $this->comment('batch loaded');
    }
    $this->comment('Done!');
});

Artisan::command('get_sales', function (ApiService $apiService, SaleRepository $saleRepository) {
    $this->comment('Getting data...');
    $batchOfSales = $apiService->getDataFromEndpoint(Constants::SALES_ENDPOINT, [
        'dateFrom' => '2000-01-01',
        'dateTo' => date('Y-m-d')
    ]);
    foreach($batchOfSales as $sales){
        $saleRepository->addSales($sales);
        $this->comment('batch loaded');
    }
    $this->comment('Done!');
});
