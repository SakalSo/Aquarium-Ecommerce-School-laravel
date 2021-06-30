<?php

namespace App\Providers;

use App\Category;
use Illuminate\Support\Collection;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Pagination\LengthAwarePaginator;

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
        Schema::defaultStringLength(191);  
        
        //main navbar
        view()->composer(
            'layout.app',
            function ($view) {
                $view->with('categories', Category::all());
            }
        );

        //product sidebar
        view()->composer(
            'product.partials.filter-sidebar', 
            function ($view) {
                $view->with('categories', Category::all());
            }
        );

        //dashboard sidebar
        view()->composer(
            'dashboard.partials.sidebar', 
            function ($view) {
                $view->with('categories', Category::all());
            }
        );

        Collection::macro('paginate', function($perPage, $total = null, $page = null, $pageName = 'page') {
            $page = $page ?: LengthAwarePaginator::resolveCurrentPage($pageName);

            return new LengthAwarePaginator(
                $this->forPage($page, $perPage),
                $total ?: $this->count(),
                $perPage,
                $page,
                [
                    'path' => LengthAwarePaginator::resolveCurrentPath(),
                    'pageName' => $pageName,
                ]
            );
        });
    }
}
