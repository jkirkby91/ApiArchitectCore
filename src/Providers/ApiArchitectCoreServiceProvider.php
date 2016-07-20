<?php

namespace ApiArchitect\Core\Providers;


use ApiArchitect\Core\Entities\Node;
use Illuminate\Foundation\Application;
use Illuminate\Support\ServiceProvider;
use ApiArchitect\Core\Repositories\NodeRepository;

/**
 * Class AppServiceProvider
 *
 * @package ApiArchitect\Providers
 * @author James Kirkby <hello@jameskirkby.com>
 */
class ApiArchitectCoreServiceProvider extends ServiceProvider
{

    /**
     * Bootstrap any application services.
     *
     */
    public function boot()
    {
//        $this->publishes([
//            base_path(__DIR__.'/../Config/ApiArchitect.php') => config_path('ApiArchitect.php'),
//        ]);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom( '/var/www/api-jameskirkby/app/DevPackages/ApiArchitectCore/config/doctrine.php', 'doctrine');
    }
}
