<?php

namespace App\Twitter;

use App\Models\User;

interface Twitter
{
    /**
     * Post a tweet on behalf of the authenticated user.
     *
     * @param  string $body
     * @return bool
     */
    public function tweet(string $body): bool;
}
