<?php

namespace Vendors\Providers;

use Illuminate\Support\Facades\File;
use Illuminate\Support\ServiceProvider;

class VendorServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $ds = DIRECTORY_SEPARATOR;
        //$moduleName = basename(dirname(__DIR__ ,1));

        $moduleName = 'vendors';
        config([
          $moduleName => File::getRequire(loadConfigFile('route', $moduleName))
        ]);
        //dd(config());
        $this->loadRoutesFrom(loadRoute('web',$moduleName));

        $this->loadViewsFrom(loadViews($moduleName),$moduleName);

        $this->loadTranslationsFrom(loadLang($moduleName),$moduleName);

        $this->loadMigrationsFrom(loadMigrations($moduleName));


    }
}
