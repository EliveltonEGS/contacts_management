<?php

namespace App\Providers;

use App\Domain\Person\Repository\Contracts\PersonRepositoryInterface;
use App\Domain\Person\Repository\PersonRepository;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(PersonRepositoryInterface::class, PersonRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrap();
    }
}
