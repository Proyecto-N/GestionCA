<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $adminRole = Role::create(['name' => 'administrador']);
        $editorRole = Role::create(['name' => 'editor']);
        $viewerRole = Role::create(['name' => 'visualizador']);

        $createPermission = Permission::create(['name' => 'crear']);
        $readPermission = Permission::create(['name' => 'leer']);
        $updatePermission = Permission::create(['name' => 'actualizar']);
        $deletePermission = Permission::create(['name' => 'eliminar']);
        $createUserPermission = Permission::create(['name' => 'crear usuario']);

        $adminRole->givePermissionTo(
            $createPermission,
            $readPermission,
            $updatePermission,
            $deletePermission,
            $createUserPermission
        );
        $editorRole->givePermissionTo($createPermission, $readPermission);
        $viewerRole->givePermissionTo($readPermission);
    }
}
