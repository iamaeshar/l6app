<?php

namespace App\Http\Controllers;

use App\Country;
use App\Role;
use App\User;
use App\UserProfile;
use finfo;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::with(['roles', 'profile'])->get();
        return view('dashboard.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all();
        $countries = Country::all();
        return view('dashboard.users.create', compact('roles', 'countries'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = [
            'username' => $request->username,
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ];
        $user = User::create($user);

        $filename = sprintf('thumnail_%s.jpg', random_int(1, 1000));
        if ($request->hasFile('photo')) {
            $filename = $request->file('photo')->storeAs('profiles', $filename, 'public');
        } else {
            $filename = 'profiles/dummy.jpg';
        }

        $userProfile = new UserProfile([
            'user_id' => $user->id,
            'city' => $request->city,
            'country_id' => $request->country,
            'photo' => $filename,
            'phone' => $request->phone,
        ]);
        $user->profile()->save($userProfile);

        $user->roles()->attach($request->roles);

        return redirect()->route('users.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::with(['profile', 'roles'])->where('id', $id)->first();
        return view('dashboard.users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::with(['profile', 'roles'])->where('id', $id)->first();
        $countries = Country::all();
        $roles = Role::all();

        return view('dashboard.users.edit', compact('user', 'countries', 'roles'));
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
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $user->email;

        $filename = sprintf('thumbnail_%s.jpg', random_int(1, 1000));
        if ($request->hasFile('photo')) {
            $filename = $request->file('photo')->storeAs('profiles', $filename, 'public');
        } else {
            $filename = $user->profile->photo;
        }

        if ($user->save()) {
            $userProfile = [
                'city' => $request->city,
                'country_id' => $request->country,
                'photo' => $filename,
                'phone' => $request->phone,
            ];
            $user->profile()->update($userProfile);
            $user->roles()->sync($request->roles);
        }

        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->profile()->delete();
        $user->roles()->detach();
        $user->delete();

        return redirect()->route('users.index');
    }
}
