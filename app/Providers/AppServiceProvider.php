<?php
namespace App\Providers;
use Illuminate\Support\ServiceProvider;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Color;
use App\Models\Size;
use App\Models\Product;
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
        
        view()->composer('*', function ($view) 
        {
            $cart = new Cart();
            $view->with([
                'name' => "Demo name global",
                'carts' => $cart,
                'categories' => Category::where('status',1)->orderBy('name','ASC')->get(),
                'brands' => Brand::where('status',1)->orderBy('name','ASC')->get(),
                'colors' => Color::orderBy('name','ASC')->get(),
                'sizes' => Size::orderBy('name','ASC')->get(),
            ]);    
        }); 
    }
}
