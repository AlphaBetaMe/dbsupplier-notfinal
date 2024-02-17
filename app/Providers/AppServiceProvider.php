<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Blade;

use Illuminate\Support\Facades\Schema;

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
        Schema::defaultStringLength(125);
        Paginator::useBootstrap();
        
        Blade::directive('displayUserRole', function () {
        return "<?php echo Auth::check() ? '<p>User Role: ' . (Auth::user()->hasRole('admin') ? 'Administrator' : 'Supplier') . '</p>' : ''; ?>";
    });
    }
}
