<?php

namespace App\Providers;

use Illuminate\Database\Eloquent\Builder as EloquentBuilder;
use Illuminate\Database\Query\Builder as QueryBuilder;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
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
        EloquentBuilder::macro('search', function($field, $string){
            return $string ? $this->where($field, 'like', '%'.$string.'%'):$this;
        }); 
        QueryBuilder::macro('search', function($field, $string){
            return $string ? $this->where($field, 'like', '%'.$string.'%'):$this;
        });
        EloquentBuilder::macro('orsearch', function($field, $string){
            return $string ? $this->orwhere($field, 'like', '%'.$string.'%'):$this;
        }); 
        QueryBuilder::macro('orsearch', function($field, $string){
            return $string ? $this->orwhere($field, 'like', '%'.$string.'%'):$this;
        });
    }
}
