<?php

namespace App\Providers;

use App\Constants;
use App\Repositories\IncomeRepository;
use App\Repositories\OrderRepository;
use App\Repositories\SaleRepository;
use App\Repositories\StockRepository;
use App\Services\ApiService;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Http::macro('dataSfera', function () {
            return Http::baseUrl(Constants::DATA_SFERA_URL)
                ->withQueryParameters(['key' => env('API_KEY')]);
        });
        $this->app->bind(ApiService::class, function () {
            return new ApiService();
        });
        $this->app->bind(StockRepository::class, function () {
            return new StockRepository();
        });
        $this->app->bind(OrderRepository::class, function () {
            return new OrderRepository();
        });
        $this->app->bind(IncomeRepository::class, function () {
            return new IncomeRepository();
        });
        $this->app->bind(SaleRepository::class, function () {
            return new SaleRepository();
        });
    }
}
