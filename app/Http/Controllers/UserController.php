<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Hash;
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
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        return view('user.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        return view('user.edit', compact('user'));
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
        $validateData = $request->validate([
            'email' => 'max:255',
            'name' => 'max:255',
            'password' => 'max:255'
        ]);
//        dd($request);

        $user = User::find($id);

        $user->email = $request->email ?? $user->email;
        $user->name = $request->name ?? $user->name;
//        $user->password = $request->password ?? $user->password;

        if((password_verify($request->currentpassword, $user->password))){
            $user->save();
            $request->session()->flash('alert-success', 'Profile updated successfully.');
            return redirect()->route('user.show', $user->id);
        } else {
            $request->session()->flash('alert-danger', 'Invalid password.');
            return redirect()->route('user.show', $user->id);
        }
    }

    public function changePassword(Request $request, $id)
    {
        $validateData = $request->validate([
            'password' => 'max:255'
        ]);

        $user = User::find($id);

        if((password_verify($request->currentpassword, $user->password))){
            $user->password = Hash::make($request->password);
            $user->save();
            $request->session()->flash('alert-success', 'Profile updated successfully.');
            return redirect()->route('user.show', $user->id);
        } else {
            $request->session()->flash('alert-danger', 'Invalid password.');
            return redirect()->route('user.show', $user->id);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
