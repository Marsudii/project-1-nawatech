<?php

namespace App\Http\Controllers\Auth;

//Import Package From Laravel
use App\Http\Controllers\Controller;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
//Import File Created Developer
use App\Http\Requests\LoginRequest;


class LoginController extends Controller
{
    /**
     * Create Method View Login
     */
    public function login(): View
    {
        return view('auth.login');
    }

    /**
     * Create Method View Login
     */
    public function postLogin(LoginRequest $loginRequest): RedirectResponse
    {
        $dataChecking = $loginRequest->validated(); // Retrieve the validated data

        $credentials = $loginRequest->only('email', 'password'); // Use $loginRequest to access validated data
        if (Auth::attempt($credentials)) {
            return redirect()->route('fe-home')->with('message', 'You have Successfully loggedin');
        }

        return redirect("login")->with('message', 'Oppes! You have entered invalid credentials');
    }

    /**
     * Create Method View Login
     */

    public function dashboard(): RedirectResponse
    {
        if (Auth::check()) {
            return redirect()->route('fe-home');
        }

        return redirect("login")->with('message', 'Opps! You do not have access');
    }


    /**
     * Create Method View Login
     */
    public function logout(): RedirectResponse
    {
        Session::flush();
        Auth::logout();

        return redirect()->route('fe-home')->with('message', 'You have Successfully loggedin');
    }
}
