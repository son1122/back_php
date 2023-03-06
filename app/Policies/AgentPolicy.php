<?php

namespace App\Policies;

use App\Models\Agent;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class AgentPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user): bool
    {

    }

    public function view(User $user, Agent $agent): bool
    {
    }

    public function create(User $user): bool
    {
    }

    public function update(User $user, Agent $agent): bool
    {
    }

    public function delete(User $user, Agent $agent): bool
    {
    }

    public function restore(User $user, Agent $agent): bool
    {
    }

    public function forceDelete(User $user, Agent $agent): bool
    {
    }
}
