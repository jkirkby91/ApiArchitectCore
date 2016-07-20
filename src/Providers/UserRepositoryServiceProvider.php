<?php

namespace ApiArchitect\Core\Providers;

use ApiArchitect\Core\Entities\User;
use Illuminate\Support\ServiceProvider;
use ApiArchitect\Core\Repositories\UserRepository;

/**
 * Class UserRepositoryServiceProvider
 *
 * @package ApiArchitect\Providers
 * @author James Kirkby <hello@jameskirkby.com>
 */
class UserRepositoryServiceProvider extends ServiceProvider
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
        $this->app->bind(
            UserRepository::class, function($app) {
            // This is what Doctrine's EntityRepository needs in its constructor.
            return new UserRepository(
                $app['em'],
                $app['em']->getClassMetaData(User::class)
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
        return ['ApiArchitect\Core\Repositories\UserRepository'];
    }
}