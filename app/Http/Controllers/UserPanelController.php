<?php

namespace App\Http\Controllers;

use App\Day;
use App\Exercise;
use App\User;
use App\Weight;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

class UserPanelController extends Controller
{

    public function __construct()
    {
        $days = Day::all();

        View::share( 'days', $days);

        $us1 = User::all();
        View::share( 'us1', $us1);
    }

    public function index()
    {

        $days = Day::all();

        $user = Auth::user();

        $weights_all[] = Weight::where('id',Auth::user()->id)->orderBy('id',
            'desc')->take(3)->orderBy('id','desc')->get();


        foreach($weights_all as $weight ){
            foreach($weight as $index=>$w){
            $weights[$index] = $w->count;
            $dates[$index] = $w->created_at;
            }
        }

        return view('userpanel.index',compact('days','weights','dates','user'));

    }

    public function program_per_user_per_day($id)
    {
        $day = Day::find($id);

        $auth_user = Auth::user();

        $exercises = Exercise::where('user_id',$auth_user->id)->where
        ('day_id', $day->id)->get();

        $exercisew = Exercise::find(2);
        return view('userpanel.program',compact('day',
            'exercises','exercisew'));
    }


    public function edit_profile_per_user($id)
    {

        $user = Auth::user();

        return view('userpanel.edit',compact('user'));
    }

    public function update_profile_per_user(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $input = $request->all();
        $user->update($input);



        $weight[] = isset($_POST['weight']);

        Weight::create([
            'user_id' => $user->id,
            'count' => $input['weight'],
        ]);





        return redirect('/');
    }

}
