<?php

namespace App\Models\Concerns;

use App\Enum\Roles;
use App\Models\Role;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

trait HasRoles
{
    public function roles(): BelongsToMany
    {
        return $this->belongsToMany(Role::class, 'user_has_role');
    }

    public function hasRole(string $role)
    {
        return $this->roles->contains('name', $role);
    }

    public function assignRole(string $role): void
    {
        $this->roles()->attach(Role::whereName($role)->firstOrFail());
    }

    public function removeRole(string $role): void
    {
        $this->roles()->detach(Role::whereName($role)->firstOrFail());
    }

    public function isAdmin(): bool
    {
       return $this->hasRole(Roles::Admin->value);
    }
}
