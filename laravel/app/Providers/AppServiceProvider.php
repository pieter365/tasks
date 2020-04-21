<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Task\Infrastructure\Persistence\Eloquent\Repository\TaskRepository;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            'Task\Domain\Repository\TaskRepositoryInterface',
            TaskRepository::class
        );
    }
}
