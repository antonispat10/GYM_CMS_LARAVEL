<?php

namespace App\Http\Controllers;

use App\Day;
use App\Exerciselist;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View;

class AdminExerciseListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     *
     *
     */

    public function __construct()
    {
        $days = Day::all();

        View::share( 'days', $days);

        $us1 = User::all();
        View::share( 'us1', $us1);
    }


    public function index()
    {

        $exerciselists = ExerciseList::all();

        return view('admin.exerciselist.index', compact('exerciselists'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('admin.exerciselist.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $exerciselist = new Exerciselist();

        $exerciselist->name = $request->name;


        $exerciselist->save();



        Session::flash('exercise_created', 'Exercise created');

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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
