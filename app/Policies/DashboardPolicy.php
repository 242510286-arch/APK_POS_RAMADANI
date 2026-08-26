<?php

namespace App\Policies;

use App\Models\User;

class DashboardPolicy
{
    public function viewAny(User $user): bool
    {
        return in_array($user->role->name, ['admin', 'kasir']);
    }
}