<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserRolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = User::create([
            'username' => 'Admin',
            'password' => bcrypt('admin'),
        ]);

        $user = User::create([
            'username' => 'Kepala Tu',
            'password' => bcrypt('ktu'),
        ]);

        $user2 = User::create([
            'username' => 'Kepala Sekolah',
            'password' => bcrypt('kepsek'),
        ]);

        $role_admin = Role::create(['name' => 'admin']);
        $role_user = Role::create(['name' => 'user']);

        $create = Permission::create(['name' => 'create']);
        $store = Permission::create(['name' => 'store']);
        $read = Permission::create(['name' => 'read']);
        $update = Permission::create(['name' => 'update']);
        $delete = Permission::create(['name' => 'delete']);

        $role_admin->givePermissionTo($create,$store , $read , $update , $delete);
        $role_user->givePermissionTo($read);
        
        $admin->assignRole('admin');
        $user->assignRole('user');
        $user2->assignRole('user');
    }
}
