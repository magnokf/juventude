<?php

namespace App\Providers;

use App\Charts\AgesChart;
use App\Charts\SampleChart;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use ConsoleTVs\Charts\Registrar as Charts;

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
    public function boot(Charts $charts)
    {
        Schema::defaultStringLength(191);
        $charts->register([
            AgesChart::class,
            SampleChart::class
        ]);

    }
}
