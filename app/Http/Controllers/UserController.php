<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Role;
use Validator;
use App\Http\Requests\UserRequest;
use Auth;
use Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     

    public function index(Request $request)
    {
        //

         
        $query = User::where('id', '>', '0');
        if(!empty($request->input('name'))) {
            $query->where('name', 'like', '%'. $request->input('name'). '%');
        }

        if(!empty($request->input('mobile'))) {
            $query->where('mobile', 'like', '%'. $request->input('mobile'). '%');
        }

        if(!empty($request->input('email'))) {
            $query->where('email', 'like', '%'. $request->input('email'). '%');
        }

        if(!empty($request->input('is_locked'))) {
                $query->where('is_locked', $request->input('is_locked'));
        }

        $users = $query->with('roles')->paginate(10);




        return view('user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $roles= Role::all();
        return view('user.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        $user  = User::create($request->all());
        $roles = $request->input('roles');
        if(!is_null($roles)) {
            $user->roles()->sync($roles);
        }

        return redirect('/users')->with('status', 'User Successfully added');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
        $user->load('roles');
        $roles= Role::all();
        return view('user.edit', compact('user', 'roles'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\User                $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
        $user->fill($request->all())->save();
         $roles = $request->input('roles');
        if(!is_null($roles)) {
            $user->roles()->sync($roles);
        }

        $redirects_to = $request->get('redirects_to');

        if(is_null($redirects_to)) {
            $redirects_to ='/users';
        }

        return redirect($redirects_to)->with('status', 'User Successfully Updated');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }

    public function block_user(Request $request, User $user)
    {
        $user->block();
        return redirect()->back()->with('status', 'User Blcoked Successfully');
    }
    public function unblock_user(Request $request, User $user)
    {
        $user->unblock();
        return redirect()->back()->with('status', 'User Unblcoked Successfully');
    }

    public function showchangepassword()
    {
        return view('user.change-password');
    }
    public function updatepassword(Request $request)
    {
        $user = Auth::user();
        $validator =  Validator::make(
            $request->all(), [
            'exiting-password'=>'required|',
            'password' => 'required|min:6|confirmed',

            ]
        );

        if ($validator->fails()) {
            return redirect()->back()
                      ->withErrors($validator);
        }
       
     
        
        if (!(Hash::check($request->input('exiting-password'), $user->password))) {  
                return redirect()->back()->withErrors(['Please enter Correct Old Password']);
        }

        
        $user->fill(
            [
            'password' => Hash::make($request->input('password'))
            ]
        )->save();


         return redirect()->back()->with(['status'=>'Password Updated Successfully']);   

    }
}
