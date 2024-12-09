<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Role extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public static function whereName(string $role)
    {
        return static::where('name', $role);
    }

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'user_has_role');
    }
}
