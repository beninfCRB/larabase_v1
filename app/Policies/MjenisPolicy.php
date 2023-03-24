<?php

namespace App\Policies;

use App\Models\Mjenis;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class MjenisPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Mjenis  $mjenis
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Mjenis $mjenis)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Mjenis  $mjenis
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Mjenis $mjenis)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Mjenis  $mjenis
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Mjenis $mjenis)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Mjenis  $mjenis
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Mjenis $mjenis)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Mjenis  $mjenis
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Mjenis $mjenis)
    {
        //
    }
}
