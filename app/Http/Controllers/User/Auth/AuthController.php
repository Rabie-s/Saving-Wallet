<?php

namespace App\Http\Controllers\User\Auth;

use App\Models\User;
use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\LoginUserRequest;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdatePasswordRequest;

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

    public function loginUser(LoginUserRequest $request)
    {

        if (Auth::attempt($request->validated())) {
            $request->session()->regenerate();

            if($request->user()->role === 'admin'){//if user has admin role redirect to admin panel
                return redirect()->route('admin.index');
            }

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

    public function changePassword(UpdatePasswordRequest $request)
    {
        
        $checkPassword = Hash::check($request->validated()['currentPassword'], $request->user()->password);
        
        if ($checkPassword) {
            $request->user()->password = $request->newPassword;
            $request->user()->save();
            return redirect()->back()->with('message', ['message' => 'Password Change Successful', 'type' => 'success']);
        }
        return redirect()->back()->with('message', ['message' => 'Incorrect Password', 'type' => 'error']);
    }

}
