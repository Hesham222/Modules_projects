<?php

namespace Admins\Providers;

use Illuminate\Support\Facades\File;
use Illuminate\Support\ServiceProvider;

class AdminServiceProvider extends ServiceProvider
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

        $moduleName = 'admins';
        config([
          $moduleName => File::getRequire(loadConfigFile('route', $moduleName))
        ]);
        //dd(config());
        $this->loadRoutesFrom(loadRoute('web',$moduleName));

        $this->loadViewsFrom(loadViews($moduleName),$moduleName);

        $this->loadTranslationsFrom(loadLang($moduleName),$moduleName);

        $this->loadMigrationsFrom(loadMigrations($moduleName));


//        $moduleName = 'admins';
//        config([
//          $moduleName => File::getRequire(__DIR__.$ds.'..'.$ds.'config'.$ds.'route.php')
//        ]);
//        //dd(config());
//        $this->loadRoutesFrom(__DIR__.$ds.'..'.$ds.'routes'.$ds.'web.php');
//
//        $this->loadViewsFrom(__DIR__.$ds.'..'.$ds.'resources'.$ds.'views',$moduleName);
//
//        $this->loadMigrationsFrom(__DIR__.$ds.'..'.$ds.'database'.$ds.'migrations');
//
//        $this->loadTranslationsFrom(__DIR__.$ds.'..'.$ds.'resources'.$ds.'lang',$moduleName);
    }
}
