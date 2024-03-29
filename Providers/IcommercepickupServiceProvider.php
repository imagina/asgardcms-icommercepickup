<?php

namespace Modules\Icommercepickup\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Core\Traits\CanPublishConfiguration;
use Modules\Core\Events\BuildingSidebar;
use Modules\Core\Events\LoadingBackendTranslations;
use Modules\Icommercepickup\Events\Handlers\RegisterIcommercepickupSidebar;

class IcommercepickupServiceProvider extends ServiceProvider
{
    use CanPublishConfiguration;
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->registerBindings();
        $this->app['events']->listen(BuildingSidebar::class, RegisterIcommercepickupSidebar::class);

        $this->app['events']->listen(LoadingBackendTranslations::class, function (LoadingBackendTranslations $event) {
            $event->load('icommercepickups', array_dot(trans('icommercepickup::icommercepickups')));
            // append translations

        });
    }

    public function boot()
    {
        $this->publishConfig('icommercepickup', 'permissions');
        $this->publishConfig('icommercepickup', 'config');
        
        $this->loadMigrationsFrom(__DIR__ . '/../Database/Migrations');
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return array();
    }

    private function registerBindings()
    {
        $this->app->bind(
            'Modules\Icommercepickup\Repositories\IcommercePickupRepository',
            function () {
                $repository = new \Modules\Icommercepickup\Repositories\Eloquent\EloquentIcommercePickupRepository(new \Modules\Icommercepickup\Entities\IcommercePickup());

                if (! config('app.cache')) {
                    return $repository;
                }

                return new \Modules\Icommercepickup\Repositories\Cache\CacheIcommercePickupDecorator($repository);
            }
        );
// add bindings

    }
}
