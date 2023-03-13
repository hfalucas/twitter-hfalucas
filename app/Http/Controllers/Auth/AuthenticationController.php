<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;

class AuthenticationController extends Controller
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
     * Display the authentication form
     *
     * @return \Illuminate\Contracts\View\Factory
     */
    public function create()
    {
        return view('auth.login');
    }
}
