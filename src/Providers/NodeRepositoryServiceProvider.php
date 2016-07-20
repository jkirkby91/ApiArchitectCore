<?php

namespace ApiArchitect\Core\Providers;

use ApiArchitect\Core\Entities\Node;
use Illuminate\Support\ServiceProvider;
use ApiArchitect\Core\Repositories\NodeRepository;

/**
 * Class NodeServiceProvider
 *
 * @package ApiArchitect\Providers
 * @author James Kirkby <hello@jameskirkby.com>
 */
class NodeRepositoryServiceProvider extends ServiceProvider
{

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
        $this->app->bind(NodeRepository::class, function($app) {
            // This is what Doctrine's EntityRepository needs in its constructor.
            return new NodeRepository(
                $app['em'],
                $app['em']->getClassMetaData(Node::class)
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
        return ['ApiArchitect\Core\Repositories\NodeRepository'];
    }
}