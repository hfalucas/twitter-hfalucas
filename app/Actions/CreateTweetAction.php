<?php

namespace App\Actions;

use App\Models\User;
use App\Twitter\TwitterClient;

class CreateTweetAction
{
    /**
     * Handles the tweeting process.
     *
     * @param  User $user
     * @param  array  $input
     * @return bool
     */
    public function handle(User $user, array $input): bool
    {
        return (new TwitterClient($user))->tweet($input['body']);
    }
}
