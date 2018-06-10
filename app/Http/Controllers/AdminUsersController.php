<?php

namespace App\Http\Controllers;

use App\Day;
use App\Exercise;
use App\Role;
use App\User;
use App\Weight;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View;
use App\Traits\Glob;

class AdminUsersController extends Controller
{
    use Glob;
    public function __construct()
    {
        $this->glob();
    }

    public function index()
    {
        $users = User::all();

        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        $roles = Role::pluck('name','id')->all();


        return view('admin.users.create',compact('roles'));

    }


    public function store(Request $request)
    {

        $request->validate([
            'name' => 'string',
            'password'=> 'required',
            'email'=>'required|email|unique:users',
            'address'=>'required',
            'telephone'=>'required',
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
        $user->telephone = $request->telephone;
        $user->address = $request->email;

        $user->save();

        $user->roles()->attach(Role::where('name','User')
            ->first());

        $user->weight()->create(['user_id' => $user->id,
            'count' => $request->weight,]);







        Session::flash('user_created', 'User Created Succesfully');

        return redirect()->back();

    }


    public function show($id)
    {

        $days = Day::all();
        return view ('admin.users.show',compact('days'));

    }


    public function edit($id)
    {
        $roles = Role::pluck('name','id')->all();

        $user = User::findOrFail($id);

        $auth = Auth::user()->id;

        if (Gate::allows('update-post', $user,$auth)) {
            return view('admin.Users.edit',compact('user','roles'));
        }



    }


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
        Weight::where('user_id', $user->id)->update($count);


        Session::flash('user_created', 'User Updated Succesfully');


        return redirect('/admin/users');
    }


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
