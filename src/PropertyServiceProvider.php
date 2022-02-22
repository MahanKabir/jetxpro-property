<?php

namespace JetXPro\Property;

use Illuminate\Support\ServiceProvider;

class PropertyServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind('property', function(){
           return new Property; 
        });
    }

    public function boot()
    {
        require __DIR__.'/Http/routes.php';

        $this->loadViewsFrom(__DIR__.'/Views', 'property');
        $this->publishes([
            __DIR__.'/Config/main.php' => config_path('property.php'),
            __DIR__.'/Http/Controllers' => base_path('app/Http/Controllers'),
            __DIR__.'/Routes' => base_path('routes/'),
            __DIR__.'/Views' => base_path('resources/views/'),
            __DIR__.'/Migrations' => database_path('/migrations'),
        ]);
    }
}