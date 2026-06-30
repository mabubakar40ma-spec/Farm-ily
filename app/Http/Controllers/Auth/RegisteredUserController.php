<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('frontend.auth.user-auth.register-user');
    }


    public function FarmCreate(): View
    {
        return view('frontend.auth.farmer-auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        // Auth::login($user);
        toastr()->success('Registered Successfully!');
        return redirect(route('login', absolute: false));
    }

    public function FarmStore(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'phone' => ['nullable', 'string', 'max:15'],
            'production' => ['nullable', 'string'],
            'capacity' => ['nullable', 'string'],
            'farm_size' => ['nullable', 'string'],
            'crop_type' => ['nullable', 'string'],
            'location' => ['nullable', 'string'],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone' => $request->phone,
            'user_type' => 'farmer',
            'production' => $request->production,
            'capacity' => $request->capacity,
            'farm_size' => $request->farm_size,
            'crop_type' => $request->crop_type,
            'location' => $request->location,
        ]);

        $user->user_type = 'farmer';
        $user->save();

        event(new Registered($user));
        // Auth::login($user);
        toastr()->success('Registered Successfully!');
        return redirect(route('login', absolute: false));
    }
}