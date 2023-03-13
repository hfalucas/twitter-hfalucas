<?php

namespace App\Twitter;

use App\Models\User;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

class TwitterClient implements Twitter
{
    /**
     * Authenticated user
     *
     * @var App\Models\User
     */
    protected $user;

    /**
     * Guzzle Client
     *
     * @var GuzzleHttp\Client
     */
    protected $client;

    /**
     * Create a new twitter client instance.
     *
     * @param User $user
     */
    public function __construct(User $user)
    {
        $this->user = $user;
        $this->client = new Client([
            'base_uri' => config('services.twitter.endpoint'),
            'headers' => [
                'Authorization' => "Bearer {$user->provider_token}",
                'Content-Type' => 'application/json'
            ]
        ]);
    }

    /**
     * Post a tweet on behalf of the authenticated user.
     *
     * @param  string $body
     * @return bool
     */
    public function tweet(string $body): bool
    {
        try {
            $this->client->post("users/{$this->user->provider_id}/tweets", [
                'json' => ['text' => $body]
            ]);

            return true;
        } catch (RequestException $e) {
            return false;
        }
    }
}
