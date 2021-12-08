<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            'permissions_index',
            'permissions_create',
            'permissions_edit',
            'permissions_destroy',
            
            'roles_index',
            'roles_create',
            'roles_edit',
            'roles_destroy',

            'users_index',
            'users_create',
            'users_edit',
            'users_destroy',

            'informes_index',
            'informes_create',
            'informes_edit',
            'informes_destroy',

            'hdds_index',
            'hdds_create',
            'hdds_edit',
            'hdds_destroy',

            'inventarioCctv_index',
            'inventarioCctv_create',
            'inventarioCctv_edit',
            'inventarioCctv_destroy',

            'inventarioAlarmas_index',
            'inventarioAlarmas_create',
            'inventarioAlarmas_edit',
            'inventarioAlarmas_destroy',

            'numeros_index',
            'numeros_create',
            'numeros_edit',
            'numeros_destroy',

            'planos_index',
            'planos_create',
            'planos_edit',
            'planos_destroy',

            'simbolos_index',
            'simbolos_create',
            'simbolos_edit',
            'simbolos_destroy',

            'trabajosRealizados_index',
            'trabajosRealizados_create',
            'trabajosRealizados_edit',
            'trabajosRealizados_destroy',

            'usuariosAlarma_index',
            'usuariosAlarma_create',
            'usuariosAlarma_edit',
            'usuariosAlarma_destroy',

            'zonificaciones_index',
            'zonificaciones_create',
            'zonificaciones_edit',
            'zonificaciones_destroy',

            'inventaris_index',
            'inventaris_create',
            'inventaris_edit',
            'inventaris_destroy',

            'entradas_index',
            'entradas_create',
            'entradas_edit',
            'entradas_destroy',

            'existentes_index',
            'existentes_create',
            'existentes_edit',
            'existentes_destroy',

            'salidas_index',
            'salidas_create',
            'salidas_edit',
            'salidas_destroy',

            'descargos_index',
            'descargos_create',
            'descargos_edit',
            'descargos_destroy',   
            
            'gastos_index',
            'gastos_create',
            'gastos_edit',
            'gastos_destroy',

            'pasajes_index',
            'pasajes_create',
            'pasajes_edit',
            'pasajes_destroy',

            'viaticos_index',
            'viaticos_create',
            'viaticos_edit',
            'viaticos_destroy',

            'cajaChica_index',
            'cajaChica_create',
            'cajaChica_edit',
            'cajaChica_destroy',
        ];

        foreach($permissions as $permission){
            Permission::create([
                'name' => $permission
            ]);
        }

    }
}
