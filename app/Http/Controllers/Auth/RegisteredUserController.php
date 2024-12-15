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
        // Load the countries from the JSON file
        $countries = json_decode(file_get_contents(storage_path('app/countries.json')), true);

        // Abort if countries could not be loaded
        if (!$countries) {
            abort(500, 'Unable to load country data.');
        }

        // Pass countries to the view
        return view('auth.register', compact('countries'));
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        // Validate the incoming request
        $validatedData = $request->validate([
            'name'        => ['required', 'string', 'max:255'],
            'email'       => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone'       => ['required', 'digits_between:8,15', 'unique:users'],
            'address'     => ['required', 'string', 'max:255'],
            'dob_day'     => ['required', 'integer', 'between:1,31'],
            'dob_month'   => ['required', 'integer', 'between:1,12'],
            'dob_year'    => ['required', 'integer', 'digits:4', 'before_or_equal:' . date('Y')],
            'country'     => ['required', 'string', 'max:100'],
            'password'    => ['required', 'confirmed', Rules\Password::defaults()],
            'terms'       => ['accepted'],
        ]);

        // Combine the date of birth fields into a single date string
        $dob = sprintf(
            '%04d-%02d-%02d',
            $validatedData['dob_year'],
            $validatedData['dob_month'],
            $validatedData['dob_day']
        );

        // Validate the combined date
        if (!checkdate($validatedData['dob_month'], $validatedData['dob_day'], $validatedData['dob_year'])) {
            return back()->withErrors(['dob' => 'The date of birth is not a valid date.'])->withInput();
        }

        // Create a new user
        $user = User::create([
            'name'        => $validatedData['name'],
            'email'       => $validatedData['email'],
            'phone'       => $validatedData['phone'],
            'address'     => $validatedData['address'],
            'dob'         => $dob, // Use the combined date of birth
            'country'     => $validatedData['country'],
            'password'    => Hash::make($validatedData['password']),
        ]);

        // Trigger the registered event (sends the email verification email)
        event(new Registered($user));

        // Log in the newly registered user
        Auth::login($user);

        // Redirect to the email verification notice
        return redirect()->route('verification.notice');
    }
}
