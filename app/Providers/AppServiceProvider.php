<?php

namespace App\Providers;

use App\Models\Complain;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request;
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

    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $complains = Complain::where('seen','0')->latest()->take(5)->get();
          $count_complains  = DB::scalar(
            "select count(case when seen = '0' then 1 end) as count from complains"
             );
             view()->share(['count_complains'=> $count_complains,'complains'=>$complains]);

    }
}
