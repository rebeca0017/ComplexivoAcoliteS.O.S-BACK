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
     *
     * @return void
     */
    public function run()
    {
        /*      Roles
        Admin => ve todo
        Mecanico => ve solo lo de mecanico
        Cliente => Ve solo lo de cliente*/
        $admin = Role::create(['name' => 'admin']);
        $mecanico = Role::create(['name' => 'mecanico']);
        $cliente = Role::create(['name' => 'cliente']);

        /*     Permisos

        */
        Permission::create(['name' => 'editar-mecanico'])->syncRoles([$mecanico]);
        Permission::create(['name' => 'dashboard-admin'])->syncRoles([$admin]);
        Permission::create(['name' => 'editar-cliente'])->syncRoles([$cliente]);
        Permission::create(['name' => 'crear-vehiculo'])->syncRoles([$cliente]);
        Permission::create(['name' => 'LEER_VEHICULOS'])->syncRoles([$cliente]);
        Permission::create(['name' => 'LEER_PEDIDOS'])->syncRoles([$cliente,$mecanico]);
        Permission::create(['name' => 'ACEPTAR_PEDIDOS'])->syncRoles([$mecanico]);

        
        
        
        
    }
}
