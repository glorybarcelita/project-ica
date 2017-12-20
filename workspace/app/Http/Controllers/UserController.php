<?php

namespace App\Http\Controllers;

use App\User;
use App\Models\Role;
use App\Models\Course;
use Illuminate\Http\Request;
use Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // dd(User::all());
        $count = User::count();
        return view('users.index')
                ->with([
                    'users' => User::all()
                ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create')
                ->with([
                    'roles' => Role::all(),
                    'courses' => Course::all()
                    ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Puwede pa palinisin to pero dito muna kayo magsimula.
        // Pede ka gumawa ng request if same validation or paulet ulet
        // php artisan make:request Addrequest
        $request->validate([
            'firstname' => 'required',
            'middlename' => 'required',
            'lastname' => 'required',
            'email' => 'required|unique:users,email',
            'role_id' => 'required|integer|between:1,4',
            'stud_course' => 'required_if:role_id,3'
        ]);
        $user = new User;
        $user->firstname = $request->firstname;
        $user->middlename = $request->middlename;
        $user->lastname = $request->lastname;
        $user->email = $request->email;
        $user->password = '123';
        $user->role_id = $request->role_id;
        $user->course = $request->course_id ?: 0;
        $user->is_active = 1;
        $user->save();
        return back()->with('status','User added.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\AppUser  $appUser
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\AppUser  $appUser
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
         return view('users.update')
                ->with([
                    'user' => $user,
                    'roles' => Role::all(),
                    'courses' => Course::all()
                    ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\AppUser  $appUser
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'firstname' => 'required',
            'middlename' => 'required',
            'lastname' => 'required',
            'email' => 'required|unique:users,email,'.$user->id,
            'role_id' => 'required|integer|between:1,4',
            'stud_course' => 'required_if:role_id,3',
            'is_active' => 'required|integer|between:0,1'
        ]);
        $user->firstname = $request->firstname;
        $user->middlename = $request->middlename;
        $user->lastname = $request->lastname;
        $user->email = $request->email;
        $user->role_id = $request->role_id;
        $user->course = $request->stud_course ?: 0;
        $user->is_active = $request->is_active;
        $user->save();
        return back()->with('status','User updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\AppUser  $appUser
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
