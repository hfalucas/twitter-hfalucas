<?php

namespace App\Actions;

use App\Models\User;
use Laravel\Socialite\Contracts\User as SocialiteUser;

class SocialAuthenticator
{
    /**
     * Handles the authenticated user from the given social provider.
     *
     * @param  string $provider
     * @return \App\Models\User
     */
    public function handle(string $provider): User
    {
        $attributes = Socialite::driver($provider)->user();

        return User::updateOrCreate(
            $this->providerLookup($provider, $attributes),
            $this->mapUserDetails($attributes)
        );
    }

    /**
     * Matching fields to retrieve a record.
     *
     * @param  string $provider
     * @param  SocialiteUser $attributes
     * @return array
     */
    private function providerLookup(string $provider, SocialiteUser $attributes): array
    {
        return [
            'provider' => $provider,
            'provider_id' => $attributes->getId()
        ];
    }

    /**
     * Map user details to save in storage.
     *
     * @param  SocialiteUser $attributes
     * @return array
     */
    private function mapUserDetails(SocialiteUser $attributes): array
    {
        return [
            'name' => $attributes->getName(),
            'email' => $attributes->getEmail(),
            'provider_token' => $attributes->token,
            'provider_expires_in' => $attributes->expiresIn,
            'provider_refresh_token' => $attributes->refreshToken,
        ];
    }
}
