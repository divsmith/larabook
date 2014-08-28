<?php namespace Larabook\Providers; 

use Illuminate\Support\ServiceProvider;

class EventServiceProvider extends ServiceProvider{

    /**
     * Register Larabook event listeners.
     */
    public function register()
    {
        $this->app['events']->listen('Larabook.Registration.Events.UserHasRegistered', 'Larabook\Handlers\EmailNotifier');
    }
}