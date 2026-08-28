<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Pagination\Paginator;
use Carbon\Carbon;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Schema;
use App\Models\Penjualan;
use App\Models\Produk;
use App\Models\Jenis;
use App\Models\ItemPenjualan;
use App\Policies\ItemPenjualanPolicy;
use App\Policies\PenjualanPolicy;
use App\Policies\ProdukPolicy;

class AppServiceProvider extends ServiceProvider
{
    protected $policies = [
        Produk::class => ProdukPolicy::class,
        Penjualan::class => PenjualanPolicy::class,
        ItemPenjualan::class => ItemPenjualanPolicy::class
    ];

    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrapFive();
        Carbon::setLocale('id');
        $this->registerPolicies();

        if (Schema::hasTable('jenis_produks')) {
            View::share('jenis', Jenis::all());
        }
    }
}
