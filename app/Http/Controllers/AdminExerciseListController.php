<?php

namespace App\Http\Controllers;

use App\Day;
use App\Exerciselist;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View;
use App\Traits\Glob;


class AdminExerciseListController extends Controller
{
    use Glob;

    public function __construct()
    {
        $this->glob();
    }


    public function index()
    {

        $exerciselists = ExerciseList::all();

        return view('admin.exerciselist.index', compact('exerciselists'));
    }

    public function create()
    {

        return view('admin.exerciselist.create');

    }

    public function store(Request $request)
    {

        $exerciselist = new Exerciselist();

        $exerciselist->name = $request->name;


        $exerciselist->save();



        Session::flash('exercise_created', 'Exercise created');

        return redirect()->back();
    }


    public function destroy($id)
    {

        $exerciselist = Exerciselist::findOrFail($id);

//        unlink(public_path()


        $exerciselist->delete();

        return redirect('/admin/exerciselist');
    }

    public function exerciselist_delete_array(Request $request)
    {


        if (isset($request->delete_single)) {


            $this->destroy($request->exerciselist);

            return redirect()->back();
        }

        if (isset($request->delete_all) && !empty($request->checkBoxArray)) {

            $exerciselists = Exerciselist::findOrFail($request->checkBoxArray);



            foreach ($exerciselists as $exerciselist) {

                $exerciselist->delete();
                return redirect()->back();
            }


        } else {

            return redirect()->back();

        }


    }


}
