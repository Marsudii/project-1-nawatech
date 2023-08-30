<?php

namespace App\Http\Controllers\Auth;
//Import Packages From Laravel
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
//Import File Created Developer
use App\Http\Requests\RegisterRequest;
use App\Jobs\RegistrationEmailJob;
use App\Models\User;
use App\Models\UserVerify;

class RegisterController extends Controller
{
    /**
     * Write code on Method
     */
    public function registration(): View
    {
        return view('auth.registration');
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function postRegistration(RegisterRequest $registerRequest): RedirectResponse
    {
        $data = $registerRequest->validated(); // Retrieve the validated data
        $createUser = $this->create($data);
        $token = Str::random(64);
        // Associate the created user with the UserVerify record
        UserVerify::create([
            'user_id' => $createUser->id, // Assign the user_id
            'token' => $token,
        ]);

        dispatch(new RegistrationEmailJob($data['email'], $token));

        // Mail::send('emails.emailVerificationEmail', ['token' => $token], function ($message) use ($data) {
        //     $message->to($data['email']);
        //     $message->subject('Email Verification Mail');
        // });

        return redirect()
            ->route('login')
            ->withSuccess('Great! You have Successfully logged in');
    }

    public function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'role' => 'User',
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }

    public function verifyAccount($token): RedirectResponse
    {
        $verifyUser = UserVerify::where('token', $token)->first();

        $message = 'Sorry your email cannot be identified.';

        if (!is_null($verifyUser)) {
            $user = $verifyUser->user;

            if (!$user->is_email_verified) {
                $verifyUser->user->is_email_verified = 1;
                $verifyUser->user->save();
                $message = 'Your e-mail is verified. You can now login.';
            } else {
                $message = 'Your e-mail is already verified. You can now login.';
            }
        }

        return redirect()
            ->route('login')
            ->with('message', $message);
    }
}
