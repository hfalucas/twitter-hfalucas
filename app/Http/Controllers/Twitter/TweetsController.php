<?php

namespace App\Http\Controllers\Twitter;

use App\Actions\CreateTweetAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\Twitter\CreateTweetRequest;

class TweetsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Display the page to create a tweet.
     *
     * @return \Illuminate\Contracts\View\Factory
     */
    public function create()
    {
        return view('tweets.create');
    }

    /**
     * Post the tweet in the authenticted user twitter account.
     *
     * @param  CreateTweetRequest $request
     * @param  CreateTweetAction $create
     * @return \Illuminate\Http\Response
     */
    public function store(CreateTweetRequest $request, CreateTweetAction $create)
    {
        if (!$create->handle(auth()->user(), $request->validated())) {
            return back()->withErrors('error', 'Whoops!');
        }

        return redirect()->route('tweets.create')->with('success', 'Tweet successfully sent.');
    }
}
