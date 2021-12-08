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
        
        $roles = [
            'Admin',
            'Gerencia',
            'Administracion',
            'Tecnico'
        ];
        
        foreach ($roles as $role){
            Role::create([
                'name' => $role
            ]);
        }        
        
        
        /*
        
        $role1 = Role::create(['name'=>'Admin']);
        $role2 = Role::create(['name'=>'Gerencia']);
        $role3 = Role::create(['name'=>'Administracion']);
        $role4 = Role::create(['name'=>'Tecnico']); 
        

        Permission::create(['name' => 'home'])->syncRoles([$role1,$role2,$role3,$role4]);

        Permission::create(['name' => 'informes.index'])->syncRoles([$role1,$role2,$role3,$role4]);
        Permission::create(['name' => 'informes.create'])->syncRoles([$role1,$role2,$role3,$role4]);
        Permission::create(['name' => 'informes.edit'])->syncRoles([$role1,$role2,$role3,$role4]);
        Permission::create(['name' => 'informes.destroy'])->syncRoles([$role1,$role2,$role3,$role4]);

        Permission::create(['name' => 'inventaris.index'])->syncRoles([$role1,$role2,$role3,$role4]);
        Permission::create(['name' => 'inventaris.create'])->syncRoles([$role1,$role2,$role3,$role4]);
        Permission::create(['name' => 'inventaris.edit'])->syncRoles([$role1,$role2,$role3,$role4]);
        Permission::create(['name' => 'inventaris.destroy'])->syncRoles([$role1,$role2,$role3,$role4]);

        Permission::create(['name' => 'descargos.index'])->syncRoles([$role1,$role2,$role3,$role4]);
        Permission::create(['name' => 'descargos.create'])->syncRoles([$role1,$role2,$role3,$role4]);
        Permission::create(['name' => 'descargos.edit'])->syncRoles([$role1,$role2,$role3,$role4]);
        Permission::create(['name' => 'descargos.destroy'])->syncRoles([$role1,$role2,$role3,$role4]);
        */

        
    }
}
