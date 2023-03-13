<?php

namespace App\Http\Controllers\Auth;

use App\Actions\SocialAuthenticator;
use App\Http\Controllers\Controller;
use Laravel\Socialite\Facades\Socialite;

class SocialiteController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Redirect the user to the provider authentication page.
     *
     * @param  string $provider [description]
     * @return \Illuminate\Http\Response
     */
    public function login(string $provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    /**
     * Gets the user information from the given provider.
     *
     * @param  string $provider
     * @param  SocialAuthenticator $social
     * @return \Illuminate\Http\Response
     */
    public function callback(string $provider, SocialAuthenticator $social)
    {
        auth()->login($social->handle($provider), true);

        return redirect()->intended();
    }
}
