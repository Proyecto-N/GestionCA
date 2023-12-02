<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\User;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $adminRole = Role::where('name', 'administrador')->first();

        $user = User::create([
            'name' => 'administrador',
            'surnames' => 'gestión ca',
            'email' => 'admin@localhost',
            'phone' => '0000000000',
            'password' => env('DEFAULT_ADMIN_PASSWORD', 'admin')
        ]);

        $user->assignRole($adminRole);
    }
}
