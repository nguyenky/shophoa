<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Cats,Cart;
use App\Flowers;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

        View::share('urlPublic',url()->current().getenv('PUBLIC_URL'));
        View::share('urlAdmin',getenv('ADMIN_URL'));
        View::share('titlePublic','Kys Flowers');
        View::share('titleAdmin','Admin');
        View::share('catsPublic',Cats::all());
        View::share('flowersPublic',Flowers::orderBy('id','DESC')->where('type','=',4)->get());
        View::share('Cart',Cart::content());

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
