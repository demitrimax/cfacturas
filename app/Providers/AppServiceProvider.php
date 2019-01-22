<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Carbon;
use App\Models\solicitudes;
use Illuminate\Support\Facades\View;
use Auth;
use App\User;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        Schema::defaultStringLength(191);
        //Carbon::setlocale(LC_ALL,'es_ES');
        setlocale(LC_ALL,"es_ES");

        view()->composer('*', function($view)
      {
          if (Auth::check()) {
              $CurrentUserId = Auth::user()->id;
              $solicitudess = solicitudes::where('atendidopor',$CurrentUserId)->get();
              $view->with(compact('solicitudess'));

              //View::share('solicitudess',solicitudes::all());
          }else {
              $view->with('solicitudess', null);
          }
      });
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
