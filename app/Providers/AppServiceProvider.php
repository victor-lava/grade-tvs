<?php

namespace App\Providers;

use DB;
use Event;
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
      if (env('APP_ENV') === 'local') {
      DB::connection()->enableQueryLog();
      Event::listen('kernel.handled', function ($request, $response) {
          if ( $request->has('sql-debug') ) {
              $queries = DB::getQueryLog();
              dd($queries);
          }
      });
      }
    }
}
