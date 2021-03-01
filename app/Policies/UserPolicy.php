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

    public function update(User $connectedUser, User $updatedUser)
    {
        return $connectedUser->can('update-other-profile') || $connectedUser->id == $updatedUser->id;
    }

    public function changePassword(User $connectedUser, User $updatedUser)
    {
        return $connectedUser->id == $updatedUser->id;
    }

    public function manageToken(User $connectedUser, User $updatedUser)
    {
        return $connectedUser->can('manage-other-api-token') 
            || ($connectedUser->can('manage-api-token') && $connectedUser->id == $updatedUser->id);
    }

    public function seePhoneNumber(User $connectedUser, User $updatedUser)
    {
        return $connectedUser->can('see-other-phone') || $connectedUser->id == $updatedUser->id;
    }

    public function delete(User $connectedUser, User $updatedUser) 
    {
        return $connectedUser->can('delete-profile') || $connectedUser->id == $updatedUser->id;
    }

}
