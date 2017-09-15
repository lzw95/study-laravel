<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }
    /**
     * $currentUser 默认为当前登录用户实例
     * $user 进行授权的用户实例
     */
    public function update(User $currentUser, User $user)
    {
        return $currentUser->id === $user->id;
    }

    public function destroy(User $currentUser, User $user) 
    {
        return $currentUser->is_admin && $currentUser->id !== $user->id;
    }






}
