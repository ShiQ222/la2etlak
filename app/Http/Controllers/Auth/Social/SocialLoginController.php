<?php

namespace App\Http\Controllers\Auth\Social;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Auth\Events\Registered; // Added to trigger the Registered event

class SocialLoginController extends Controller
{
    /**
     * Redirect the user to the social provider's authentication page.
     *
     * @param string $provider
     * @return \Illuminate\Http\RedirectResponse
     */
    public function redirect($provider)
    {
        // Ensure the provider exists in the configuration (to prevent invalid providers)
        if (!in_array($provider, ['google', 'facebook'])) {
            abort(404); // Throw a 404 error for invalid providers
        }

        if ($provider == 'google') {
            return Socialite::driver($provider)
                ->with(['prompt' => 'select_account'])
                ->redirect();
        } else {
            return Socialite::driver($provider)->redirect();
        }
    }

    /**
     * Handle the callback from the social provider.
     *
     * @param string $provider
     * @return \Illuminate\Http\RedirectResponse
     */
    public function callback($provider)
    {
        try {
            \Log::info('Callback initiated for provider: ' . $provider);

            // Retrieve user information from the provider
            $socialUser = Socialite::driver($provider)->stateless()->user();
            \Log::info('Social User Data:', (array) $socialUser);

            // Check if the user already exists in your database
            $user = User::where('email', $socialUser->getEmail())->first();

            if ($user) {
                \Log::info('User found in database: ' . $user->email);
            } else {
                // If user doesn't exist, create a new one
                $user = User::create([
                    'name'     => $socialUser->getName(),
                    'email'    => $socialUser->getEmail(),
                    'password' => Hash::make(Str::random(24)), // Generating a random password
                    // Add other necessary fields if any
                ]);
                \Log::info('New user created: ' . $user->email);
            }

            // Set email_verified_at to null to require email verification
            $user->email_verified_at = null;
            $user->save();

            // Trigger the registered event to send the verification email
            event(new Registered($user));

            // Log the user into your application
            Auth::login($user);
            \Log::info('User logged in: ' . $user->email);

            // Redirect to the email verification notice
            return redirect()->route('verification.notice');
        } catch (\Exception $e) {
            \Log::error('Error during callback:', ['message' => $e->getMessage()]);
            return redirect()->route('login')->with('error', 'Unable to authenticate with ' . ucfirst($provider));
        }
    }
}
