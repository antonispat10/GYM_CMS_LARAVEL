<?php namespace App\Traits;

use App\Day;
use App\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View;

trait Glob
{
    public function Glob()
    {
        $days = Day::all();

        View::share( 'days', $days);

        $us1 = User::all();
        View::share( 'us1', $us1);
    }

}

