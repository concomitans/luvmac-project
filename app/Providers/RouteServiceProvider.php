<?php

namespace App\Providers;

use Illuminate\Routing\Router;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to the controller routes in your routes file.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Http\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @param  \Illuminate\Routing\Router  $router
     * @return void
     */
    public function boot()
{
    parent::boot();
}

    /**
     * Define the routes for the application.
     *
     * @param  \Illuminate\Routing\Router  $router
     * @return void
     */
    protected function mapWebRoutes()
{
    Route::middleware('web')
         ->namespace($this->namespace)
         ->group(base_path('routes/web.php'));
}

protected function mapApiRoutes()
{
    Route::prefix('api')
         ->middleware('api')
         ->namespace($this->namespace)
         ->group(base_path('routes/api.php'));
}
}
