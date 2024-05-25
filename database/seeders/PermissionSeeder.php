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
            'users_indexJefe',

            'alojamiento_index',
            'alojamiento_create',
            'alojamiento_edit',
            'alojamiento_destroy',
            'alojamiento_indexEmpleado',

            'inventario_index',
            'inventario_create',
            'inventario_edit',
            'inventario_destroy',
            'inventario_entrada',
            'inventario_salida',

            'encargados_index',
            'encargados_create',
            'encargados_edit',
            'encargados_destroy',

            'reservas_index',
            'reservas_create',
            'reservas_edit',
            'reservas_destroy',
            'reservas_show',
            'reservas_ventas',
            'reservas_hora',
            'reservas_pago',


            'ventas_index',
            'ventas_create',
            'ventas_edit',
            'ventas_destroy',

            'productos_index',
            'productos_create',
            'productos_edit',
            'productos_destroy',

            'productoInventario_index',
            'productoInventario_create',
            'productoInventario_edit',
            'productoInventario_destroy',

            'habitaciones_index',
            'habitaciones_create',
            'habitaciones_edit',
            'habitaciones_destroy',

            'productoVenta_index',
            'productoVenta_create',
            'productoVenta_destroy',

            'serviciosBasicos_index',
            'serviciosBasicos_create',
            'serviciosBasicos_edit',
            'serviciosBasicos_destroy',

            'control_index',
        ];

        foreach($permissions as $permission){
            Permission::create([
                'name' => $permission
            ]);
        }

    }
}
