<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class UserController extends Controller
{
    public function login(Request $request){
        $request->validate([
            'name' => ['required'],
            'password' => ['required'],
        ]);


        // Attempt to authenticate the user
        $credentials = $request->only('name', 'password');

        if (Auth::attempt($credentials)) {
            // Authentication successful
            return redirect()->intended('userdashboard'); // Redirect to the intended URL after login
        }

        // Authentication failed
        return redirect()->back()->withErrors(['loginError' => 'Invalid username or password.']); // Redirect back with an error message
    
    }

    public function userdashboard(){
        $userdashboard = User::all();
        return view ('userdashboard', ['userdashboard' => $userdashboard]);
    }

    public function store(Request $request){
        $data = $request->validate([
            'name' => ['required', 'min:4', 'max:100'],
            'email' => 'nullable',
            'password' => ['required', 'min:4', 'max:100']
        ]);

        $newUser = User::create($data);

        return redirect(route('userdashboard.index'));
    }

    public function edit(User $userdashboard){
        return view('edit', ['userdashboard' => $userdashboard]);
    }
    
    public function update(User $userdashboard, Request $request){
        $data = $request->validate([
            'name' => ['required', 'min:4', 'max:100'],
            'email' => 'nullable',
            'password' => ['required', 'min:4', 'max:100']
        ]);

        $userdashboard->update($data);
        return redirect(route('userdashboard.index'))->with('success', 'User Account updated successfully');
    }

    public function delete(User $userdashboard){
        $userdashboard->delete();
        return redirect(route('userdashboard.index'))->with('success', 'User Account deleted successfully');
    }

}