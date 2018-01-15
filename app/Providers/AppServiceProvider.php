<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Category,Cart;
use App\Flowers;
use App\Products;
use App\Brand;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $objCategory = new Category;
        $objProducts = new Products;
        $objBrands = new Brand;
        $cats=  $objCategory->cats_parrent();
        $slide = $objProducts->slide();
        $brands = $objBrands->count_brands();
        View::share('urlPublic',getenv('PUBLIC_URL'));
        View::share('urlAdmin',getenv('ADMIN_URL'));
        View::share('titlePublic','Kys Flowers');
        View::share('titleAdmin','Admin');
        View::share('catsPublic',$cats);
        View::share('slideProducts',$slide);
        View::share('brands',$brands);
        // View::share('flowersPublic',Flowers::orderBy('id','DESC')->where('type','=',4)->get());
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
