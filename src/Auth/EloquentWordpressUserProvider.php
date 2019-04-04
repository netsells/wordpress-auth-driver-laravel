<?php

namespace MrShan0\WordpressAuth\Auth;

use Illuminate\Auth\EloquentUserProvider;
use Illuminate\Support\Str;
use Illuminate\Contracts\Auth\Authenticatable as UserContract;

class EloquentWordpressUserProvider extends EloquentUserProvider
{
    /**
     * Retrieve a user by the given credentials.
     *
     * @param  array  $credentials
     * @return \Illuminate\Contracts\Auth\Authenticatable|null
     */
    public function retrieveByCredentials(array $credentials)
    {
        if (empty($credentials)) {
            return;
        }

        // First we will add each credential element to the query as a where clause unless we are in email only mode.
        // In email only we search specifically for the specified email.
        // Then we can execute the query and, if we found a user, return it in a
        // Eloquent User "model" that will be utilized by the Guard instances.
        $query = $this->createModel()->newQuery();

        if (!config('wordpress-auth.credentials.email_only', false)) {
            foreach ($credentials as $key => $value) {
                if (! Str::contains($key, config('wordpress-auth.credentials.password', 'user_pass'))) {
                    $query->where($key, $value);
                }
            }
        } else {
            $query->where(
                config('wordpress-auth.credentials.email_column'),
                $credentials[config('wordpress-auth.credentials.email')]
            );
        }

        return $query->first();
    }

    /**
     * Validate a user against the given credentials.
     *
     * @param  \Illuminate\Contracts\Auth\Authenticatable  $user
     * @param  array  $credentials
     * @return bool
     */
    public function validateCredentials(UserContract $user, array $credentials)
    {
        $plain = $credentials[config('wordpress-auth.credentials.password', 'user_pass')];

        return $this->hasher->check($plain, $user->getAuthPassword());
    }
}
