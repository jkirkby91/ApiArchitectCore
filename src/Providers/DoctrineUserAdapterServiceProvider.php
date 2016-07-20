<?php

namespace ApiArchitect\Core\Providers;

use Illuminate\Support\ServiceProvider;
use ApiArchitect\Core\Adapters\DoctrineUserAdapter;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * Class DoctrineUserAdapterServiceProvider
 *
 * @package ApiArchitect\Providers
 * @author James Kirkby <hello@jameskirkby.com>
 */
class DoctrineUserAdapterServiceProvider extends ServiceProvider
{

    /**
     * @var bool
     */
    protected $defer = true;

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
        $this->app->bind(DoctrineUserAdapter::class, function($app) {
            // This is what Doctrine's EntityRepository needs in its constructor.
            return new DoctrineUserAdapter(
                $app['em']
            );
        });
    }

    /**
     * Get the services provided by the provider since we are deferring load.
     *
     * @return array
     */
    public function provides()
    {
        return ['ApiArchitect\Core\Adapters\DoctrineUserAdapter'];
    }
}
