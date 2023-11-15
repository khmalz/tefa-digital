<?php

namespace App\Providers;

use App\Models\Title;
use App\Services\OrderService;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
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
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Schema::defaultStringLength(125);
        $websiteTitle = Title::value('name');
        View::share('websiteTitle', $websiteTitle);
        Paginator::useBootstrapFive();
    }
}
