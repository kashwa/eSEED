<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class EmployeeServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        # here i have to bind it ot work with laravel core.
//        $this->app->bind(
//            'App\Http\Interfaces\EmpRepoInterface',
//            'App\Http\Repository\EmployeeRepository'
//        );
    }
}
