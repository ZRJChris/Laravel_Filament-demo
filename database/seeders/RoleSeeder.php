<?php

namespace Database\Seeders;

use App\Enum\Roles;
use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach (Roles::getValues() as $role) {
            Role::create(['name' => $role]);
        }
    }
}
