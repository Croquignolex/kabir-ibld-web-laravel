<?php

namespace App\Traits;

use App\Models\Role;
use App\Models\User;

trait ResetPasswordUserTrait
{
    /**
     * @param array $credentials
     * @return null
     */
    protected function getUser(array $credentials)
    {
        $user = User::where(['email' => $credentials['email']])->first();
        if($user !== null) if($user->role->type === Role::USER) return $user;
        return null;
    }
}
