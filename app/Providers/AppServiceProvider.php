<?php

namespace App\Providers;

use App\Models\Title;
use App\Services\OrderService;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;
use App\Repositories\OrderRepository;
use Illuminate\Support\Facades\Schema;
use App\Services\OrderServiceInterface;
use Illuminate\Support\ServiceProvider;
use App\Repositories\OrderRepositoryInterface;

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
