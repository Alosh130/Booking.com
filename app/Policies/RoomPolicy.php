<?php

namespace App\Policies;

use App\Models\Room;
use App\Models\User;
use Illuminate\Auth\Access\Response;
use App\Models\Hotel;

class RoomPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return false;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Room $room): bool
    {
        return false;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user,Hotel $hotel): bool
    {
        return false;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Room $room): bool
    {
        return false;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Room $room): bool
    {
        return false;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Room $room): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Room $room): bool
    {
        return false;
    }

    public function createRoom(User $user, Hotel $hotel): bool
    {
        return optional($user->manager)->id === $hotel->manager_id;
    }
}
