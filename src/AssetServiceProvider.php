<?php

namespace Formfeed\ThemingClasses;

use Illuminate\Support\ServiceProvider;
use Laravel\Nova\Events\ServingNova;
use Laravel\Nova\Nova;

class AssetServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Nova::serving(function (ServingNova $event) {
            Nova::script('theming-classes', __DIR__ . '/../dist/js/asset.js');

            Nova::provideToScript([
                'theming' => [
                    'component' => config('nova.theming.component', true),
                    'field' => config('nova.theming.field', true),
                    'resource' => config('nova.theming.resource', true),
                    'flexGroup' => config('nova.theming.flex_group', true),
                    'panel' => config('nova.theming.panel', true),
                    'prefix' => [
                        'component' => config('nova.theming.prefix.component', 'component-'),
                        'field' => config('nova.theming.prefix.field', 'field-'),
                        'resource' => config('nova.theming.prefix.resource', 'resource-'),
                        'flexGroup' => config('nova.theming.prefix.flex_group', 'flex-group-'),
                        'panel' => config('nova.theming.prefix.panel', 'panel-'),
                    ],
                ],
            ]);
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
