<?php

namespace GMTCC\Search;

use Illuminate\Support\ServiceProvider;

class SearchServiceProvider extends ServiceProvider
{
    
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__.'/routes/web.php');
        $this->loadViewsFrom(__DIR__.'/views/','search_modal');
        $this->publishes([
            __DIR__.'/assets/' => public_path('SearchStyles'),
            __DIR__.'/config/search.php' => config_path('search.php'),]
                        , 'public');
        $this->mergeConfigFrom(__DIR__.'/config/search.php','search_modal');
    }
    
    public function register()
    {
        
    }
}