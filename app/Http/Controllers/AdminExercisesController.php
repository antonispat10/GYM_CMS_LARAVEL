<?php

namespace App\Http\Controllers;

use App\Day;
use App\Exercise;
use App\Exerciselist;
use Illuminate\Http\Request;

use App\User;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use App\Traits\Glob;


class AdminExercisesController extends Controller
{
    use Glob;

    public function __construct()
    {
        $this->glob();
    }


    public function index()
    {
//        $exercises = Exercise::all();
//
//        $z = $exercises[11]['day_id'];
//
//        $s = preg_split('/[] [\s,"]+/',
//        $z);
//
//        $k = array_filter($s);
//
//
//            dd($k);
//
//        return view('admin.exercises.index', compact('exercises'));



    }

    public function create()
    {
        $exerciselist = Exerciselist::pluck('name', 'id')->all();

        $days = Day::pluck('name', 'id')->all();

        $users = User::pluck('name', 'id')->toArray();

        return view('admin.exercises.create', compact
        ('exerciselist', 'days', 'users'));
    }


    public function store(Request $request)
    {

        $input = $request->all();


        $json = json_encode($input['day_id'], true);


        $z = $json;

        $s = preg_split('/[] [\s,"]+/',
            $z);

        $k = array_filter($s);


        $count = sizeof($k);
        $count_total= $count;
        $count2 = 0;

        for ($i = 1; $i <= $count; $i++) {
            if  (sizeof(Exercise::where('exerciselist_id', '=', Input::get
                ('exerciselist_id'))->where('day_id', '=',
                    $k[$i])->where('user_id', '=', Input::get('user_id'))->get()) >0 ){
                // user found


                $count2 = $count2 + 1;

                if($count2==$count_total){
                    if($count_total == 1){
                        Session::flash('failed', 'This exercise exists for this user and for this day.');
                    }else {
                        Session::flash('failed', 'This exercise exists for this user and for these days.');
                    }
                }

            } else {
                $exercise = New Exercise();
                $id = $request['id'];
                $exercise->day_id = $k[$i];
                $exercise->user_id = $request['user_id'];
                $exercise->exerciselist_id = $request['exerciselist_id'];
                $exercise->set = $request['set'];
                $exercise->reps = $request['reps'];



                $exercise->save();

                $ex = Exercise::find($exercise->id);
                $ex->days()->attach($exercise->day_id);
            }
        }


//        $user->posts()->create($input);

        return redirect()->back();
    }


    public function destroy($id)
    {

        $exercise = Exercise::findOrFail($id);

//        unlink(public_path()


        $exercise->delete();

        return redirect('/admin/exercises');
    }

    public function exercises_delete_array(Request $request)
    {


        if (isset($request->delete_single)) {


            $this->destroy($request->exercise);

            return redirect()->back();
        }

        if (isset($request->delete_all) && !empty($request->checkBoxArray)) {

            $exercises = Exercise::findOrFail($request->checkBoxArray);


            foreach ($exercises as $exercise) {

                $exercise->delete();
            }


        } else {

            return redirect()->back();

        }
        return redirect()->back();


    }

    public function admin_exercises_edit_per_user($id)
    {



        $days = Day::all();

        $user = User::findOrFail($id);

        $exercises = Exercise::where('user_id',$user->id)->get();


        return view('admin.exercises.index', compact('exercises', 'user','days'));
    }






}