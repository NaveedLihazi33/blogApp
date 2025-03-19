<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function register(Request $request)
    {
        $validatedData = $request->validate([
            'username' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:6',
            'image' => 'nullable|image'
        ]);
        $profileImageURL = null;
        if ($request->hasFile('image')) {
            $profileImageURL = $request->file('image')->store('profile_images', 'public');
            
        }


        // A user instance is being created
        $user = User::create([
            'name' => $validatedData['username'],
            'email' => $validatedData['email'],
            'password' => $validatedData['password'],
            'profileImageURL' => $profileImageURL
        ]);
        // dd($user->profileImageURL);
        // dd($user);
        Auth::login($user);

        return redirect('/')->with('success', 'Registration Successfull');
    }
}
