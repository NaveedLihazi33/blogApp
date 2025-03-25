<?php

namespace App\Http\Controllers;

use App\Exports\UsersExport;
use App\Imports\UsersImport;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

class UserController extends Controller
{

    public function export()
    {
        return Excel::download(new UsersExport,'users.xlsx');
    
    }

    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls',
        ]);

        Excel::import(new UsersImport,$request->file('file'));
        return redirect('/')->with('success','All good');
    }
    public function login(Request $request)
    {
         $request->validate([
            'emailLogin' => 'required|email',
            'passwordLogin' => 'required|string|min:6'
        ]);
        $credentials = [
            'email' => $request->emailLogin,
            'password'=> $request->passwordLogin
        ];

        if(Auth::attempt($credentials))
        {
            $request->session()->regenerate(); // Regenerate session to prevent session fixation
            return redirect('/')->with('success', 'Login successful!');
        }
        return redirect()->back()
            ->withErrors(['emailLogin' => 'The provided credentials do not match our records.'])
            ->withInput($request->except('password')); // Return old input except password


    }
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

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate(); // Invalidate the current session
        $request->session()->regenerateToken(); // Regenerate CSRF token

        return redirect('/login')->with('success', 'You have been logged out successfully!');
    }

}
