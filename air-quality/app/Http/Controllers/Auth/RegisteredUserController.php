<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        if (!empty($request->city)) {
            $request->validate([
                'city' => ['string', 'max:255'],
            ]);
        }
        $request->validate(
            [
                'first_name' => ['required', 'string', 'max:255'],
                'last_name' => ['required', 'string', 'max:255'],

                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password' => ['required', 'confirmed', Rules\Password::defaults()],
            ],
            [
                'first_name.required' => 'First Name is mandatory',
                'first_name.string' => 'First Name has to be a string',
                'first_name.max' => 'First Name cannot be longer than 255 characters',
                'last_name.required' => 'Last Name is mandatory',
                'last_name.string' => 'Last Name has to be a string',
                'last_name.max' => 'Last Name cannot be longer than 255 characters',
                'email.required' => 'Email is mandatory',
                'email.string' => 'Email has to be a string',
                'email.email' => 'Please enter a valid email adress',
                'email.max' => 'Email cannot be longer than 255 characters',
                'email.unique' => 'Email already exists in Database',
                'password.required' => 'A password is mandatory',
                'password.confirmed' => 'The confirmation of the password doesn\'t match'
            ]
        );

        $user = User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'city' => $request->city,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
