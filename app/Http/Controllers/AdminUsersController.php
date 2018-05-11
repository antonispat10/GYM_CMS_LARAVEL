<?php

namespace App\Http\Controllers;

use App\Day;
use App\Exercise;
use App\Http\Requests\UsersEditRequest;
use App\Role;
use App\User;
use App\Weight;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View;

class AdminUsersController extends Controller
{

    public function __construct()
    {
        $days = Day::all();

        View::share( 'days', $days);

        $us1 = User::all();
        View::share( 'us1', $us1);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();

        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::pluck('name','id')->all();


        return view('admin.users.create',compact('roles'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'age' => 'nullable',
            'name' => 'string',
            'password'=> 'required',
            'email'=>'required|email|unique:users',
            'address'=>'required',
            'telephone'=>'required',
            'weight'=>'required'
        ]);


//        $input['role_id'] = 2;

//        if($photo = $request->file('photo')){
//
//            $name = time() . $photo->getClientOriginalName();
//
//           $d=  $photo->move('images\users', $name);
//
//            $input['photo'] = $d;
//
//        }
//        $input['password'] = bcrypt($request->password);
//
        $user = new User;

        $user->name = $request->name;
        $user->password= bcrypt($request->password);
        $user->email = $request->email;
        $user->surname = $request->surname;
        $user->age = $request->age;
        $user->telephone = $request->age;
        $user->address = $request->email;
        $user->save();

        Weight::create([
            'user_id' => $user->id,
            'count' => $request->weight,
        ]);

        Auth::user()->roles()->attach(Role::where('name','Admin')
            ->first());

//        User::create($input);
        $user->save();

        Session::flash('user_created', 'User Created Succesfully');

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
//        $day = Day::findOrFail($id);
//        $user = Auth::user()->id;
//        $exercises = Exercise::where('user_id', $user)
//            ->where('day_id', 'LIKE' ,'%'. $day .'%')->get();
//        return view('admin.Users.show',compact('day','exercises'));

        $days = Day::all();
        return view ('admin.users.show',compact('days'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $roles = Role::pluck('name','id')->all();

        $user = User::findOrFail($id);

        if (Gate::allows('update-post', $user)) {
            return view('admin.Users.edit',compact('user','roles'));
        }

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
        $user = User::findOrFail($id);
//
        $input = $request->all();


//
//        if($photo = $request->file('photo')){
//
//            $name = time() . $photo->getClientOriginalName();
//
//            $photo->move('images/users', $name);
//
//
//            $input['photo'] = $photo;
//
//        }


        $input['password'] = bcrypt($request->password);






        $user->update($input);

        $count['count'] = $request->weight;
        Weight::where('user_id', $user->id)->update($count);


        Session::flash('user_created', 'User Updated Succesfully');


        return redirect('/admin/users');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $photo = $user->photo;

        unlink(public_path() . '/images/users/$user');

        $user->delete();

        return redirect('/admin/user');
    }

    public function weight()
    {

        $logged_user = Auth::user()->id;
        $users = User::all();


        $weights = Weight::all();
        foreach($weights as $index=>$weight){
            if ($logged_user == $weight->user->id){


                $user_weights[] = $weight->count;

            }

        }

        $len = count($user_weights);

        foreach ($user_weights as $index=>$user_weight){
            if ($len - $index <= 3 )
                $three_weights[] = $user_weight;

        }

        return view('admin.weight',compact('weights','three_weights'));

    }

    public function program($id)
    {
        $user = Auth::user()->id;
        $exercises = Exercise::find($user)->get();


        return view('admin.Users.program', compact('exercises'));

    }

    public function postAdminAssignRoles(Request $request) {

        $id = $request->id;

        $user = User::find($id);



        $user->roles()->detach();
        if($request['role_user']){
            $user->roles()->attach(Role::where('name','User')
                ->first());
        }
        if($request['role_author']){
            $user->roles()->attach(Role::where('name','Author')
                ->first());
        }
        if($request['role_admin']){
            $user->roles()->attach(Role::where('name','Admin')
                ->first());
        }
        return redirect()->back();

    }

}
