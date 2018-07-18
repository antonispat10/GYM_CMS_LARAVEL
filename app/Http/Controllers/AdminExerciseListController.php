<?php

namespace App\Http\Controllers;

use App\Models\ExerciseList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AdminExerciseListController extends Controller {

    public function __construct() {

        parent::__construct();
    }

    public function index() {

        $exerciselists = ExerciseList::all();

        return view('admin.exerciselist.index', compact('exerciselists'));
    }

    public function create() {

        return view('admin.exerciselist.create');
    }

    public function store(Request $request) {

        $exerciselist = new ExerciseList();

        $exerciselist->name = $request->name;

        $exerciselist->save();

        Session::flash('exercise_created', 'Exercise created');

        return redirect()->back();
    }

    public function destroy($id) {

        $exerciselist = ExerciseList::findOrFail($id);

        $exerciselist->delete();

        return redirect('/admin/exerciselist');
    }

    public function exerciselist_delete_array(Request $request) {

        if(isset($request->delete_single)) {

            $this->destroy($request->exerciselist);

            return redirect()->back();
        }

        if(isset($request->delete_all) && !empty($request->checkBoxArray)) {

            $exerciselists = ExerciseList::findOrFail($request->checkBoxArray);

            foreach($exerciselists as $exerciselist) {

                $exerciselist->delete();

                return redirect()->back();
            }
        } else {

            return redirect()->back();
        }
    }

}
