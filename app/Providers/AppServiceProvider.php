<?php

namespace App\Providers;

use App\Models\Title;
use App\Repositories\OrderRepository;
use App\Repositories\OrderRepositoryInterface;
use App\Services\OrderService;
use App\Services\OrderServiceInterface;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(OrderRepositoryInterface::class, OrderRepository::class);
        $this->app->bind(OrderServiceInterface::class, OrderService::class);

        $this->app->singleton('websiteTitle', function () {
            $title = Title::value('name');

            return $title ?? config('app.name');
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Schema::defaultStringLength(125);
        Paginator::useBootstrapFive();
    }
}
