<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index() {
        $users = User::all();

        return view('admin.users.index', compact('users'));
    }

    public function create() {
    
        return view('admin.users.create');
    }

    public function store(Request $request) {
       $request->validate([
           'name' => 'required',
           'email' => 'required',
           'password' => 'required',
           'role' => 'required'
       ]);

        User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'role' => $request['role'],
            'password' => Hash::make($request['password']),
        ]);

       return redirect('/admin/users')->with('success', 'User created!');
    }

    public function show($id) {
        $user = User::find($id);

        return view('admin.users.show', compact('user'));
    }

    public function edit($id) {
        $user = User::find($id);

        return view('admin.users.edit', compact('user'));
    }

    public function update(Request $request, $id) {
        //return response()->json('Route ok');

        $user = User::find($id);

        if($request['name'] != null && $request['name'] != '') {
            $user->name = $request['name'];
        }

        if($request['email'] != null && $request['email'] != '') {
            $user->email = $request['email'];
        }

        if($request['password'] != null && $request['password'] != '') {
            $user->password = Hash::make($request['password']);
        }

        if($request['role'] != null && $request['role'] != '') {
            $user->role = $request['role'];
        }
        
        $user->save();

        return redirect("/admin/users")->with('success', 'User updated!');
    }

    public function softDelete($id) {
        //To do
        return response()->json("Route ok!");
    }

    public function destroy($id) {
        User::destroy($id);
        
        return redirect('/admin/users')->with('success', 'User deleted!');
    }
}
