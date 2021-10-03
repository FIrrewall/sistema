<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role1 = Role::create(['name'=>'AdminSis']);
        $role2 = Role::create(['name'=>'Gerencia']);
        $role3 = Role::create(['name'=>'Administracion']);
        $role4 = Role::create(['name'=>'Tecnico']); 

        
    }
}
