<?php

namespace App\Policies;

use App\Track;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class TrackPolicy
{
    public function access(User $user, Track $track)
    {
        return $track->project->user->id === $user->id;
    }
}
