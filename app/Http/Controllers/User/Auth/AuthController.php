<?php

namespace App\Http\Controllers\User\Auth;

use App\Models\User;
use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreUserRequest;

class AuthController extends Controller
{

    public function showRegistrationForm()
    {
        return Inertia::render('User/Auth/Register');
    }


    public function showLoginForm()
    {
        return Inertia::render('User/Auth/Login');
    }


    public function registerUser(StoreUserRequest $request)
    {   
        $validatedData = $request->validated();
        $avatar = $request->file('avatar')->store('avatars', 'public');
        $avatarImageName = basename($avatar);
        $validatedData['avatar'] = $avatarImageName;//edit validated avatar 
        $user = User::create($validatedData);

        //create new wallet for user after register
        $user->wallet()->create();

       return redirect()->route('user.auth.showLoginForm');  
    }

    public function loginUser(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->route('home');
        }
        return back()->with('message', ['message' => 'Incorrect email or password', 'type' => 'error']);

    }

    public function logoutUser(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('home')->with('message', ['message' => 'good bay', 'type' => 'success']);
    }

}
