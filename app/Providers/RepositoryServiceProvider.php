<?php

namespace App\Providers;

use App\Repositories\Interfaces\EmployeeRepositoryInterface;
use App\Repositories\EmployeeRepository;
use App\Repositories\Interfaces\PositionRepositoryInterface;
use App\Repositories\PositionRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(EmployeeRepositoryInterface::class, EmployeeRepository::class);
        $this->app->bind(PositionRepositoryInterface::class, PositionRepository::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
