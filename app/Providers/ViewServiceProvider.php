<?php

namespace App\Providers;

use App\Models\abonnement;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Auth;
use App\Models\service;
use App\Models\serviceAbonnement;

class ViewServiceProvider extends ServiceProvider
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

        View::composer('pages.*', function ($view) {
            //     if(!Auth::guest()){
            //         $m = Auth::user()->abonnement;
            //         $mines = $m->filter(function ($value, $key) {
            //             return $value->pivot->etat == "Payer";
            //         });
            //         $view->with('mesService',$mines);
            //     }
            //    $service=service::all();
            // //   

            //    $acte=service::with('acte')->get();
            //    $abonnement=abonnement::with('service')->get();



            //    $avocatBy = $abonnement->groupBy(function ($member) {
            //            return $member;
            //        })->all();

            //     $c=collect($avocatBy);

            //    $view->with('abonnement',$avocatBy);
            //    $view->with('service',$service);

        });
    }
}
