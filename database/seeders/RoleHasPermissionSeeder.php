<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleHasPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Admin
        $admin_permissions = Permission::all();
        Role::findOrFail(1)->permissions()->sync($admin_permissions->pluck('id'));

        $user_permissions = $admin_permissions->filter(function ($permission){
            return substr($permission->name,0,6) != 'users_' && 
            substr($permission->name, 0, 6) != 'roles_' && 
            substr($permission->name,0,12) != 'permissions_';
        });

        Role::findOrFail(2)->permissions()->sync($user_permissions);
    }
}
