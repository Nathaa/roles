<?php

use App\Estudiante;

use Illuminate\Database\Seeder;
use Caffeinated\Shinobi\Models\Permission;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        Permission::create( [
            'name' => 'Navegar usuarios',
            'slug' => 'usuarios.index',
            'description' => 'Lista y navega los usuarios',

        ]);

        Permission::create( [
            'name' => 'Ver la informacion de el usuario',
            'slug' => 'usuarios.show',
            'description' => 'Ver cada detalle del usuario del sistema',

        ]);

        Permission::create( [
            'name' => 'Editar cualquier dato del usuarios',
            'slug' => 'usuarios.edit',
            'description' => 'Edita cualquier dato del usuario del sistema',

        ]);

        Permission::create( [
            'name' => 'Eliminar un usuario',
            'slug' => 'usuarios.destroy',
            'description' => 'Eliminar un usuario del sistema',

        ]);

        //alumnas

        Permission::create( [
            'name' => 'Crear un nuevo usuario',
            'slug' => 'usuarios.create',
            'description' => 'Crear un nuevo usuario del sistema',

        ]);

        Permission::create( [
            'name' => 'Navegar Alumnas',
            'slug' => 'estudiantes.index',
            'description' => 'Lista y navega la alumnas',

        ]);

        Permission::create( [
            'name' => 'Ver informacion de las alumnas',
            'slug' => 'estudiantes.show',
            'description' => 'Ver cada detalle del expediente de la alumna',

        ]);

        Permission::create( [
            'name' => 'Editar cualquier dato de la alumna',
            'slug' => 'estudiantes.edit',
            'description' => 'Edita cualquier dato del expediente de la alumna',

        ]);

        Permission::create( [
            'name' => 'Eliminar una alumna',
            'slug' => 'estudiantes.destroy',
            'description' => 'Eliminar una alumna del sistema',

        ]);

        Permission::create( [
            'name' => 'Crear un nuevo expediente',
            'slug' => 'estudiantes.create',
            'description' => 'Crear expedientes para alumnas del sistema',

        ]);


        //Roles



        Permission::create( [
            'name' => 'Navegar roles',
            'slug' => 'roles.index',
            'description' => 'Lista y navega los roles',

        ]);

        Permission::create( [
            'name' => 'Ver la informacion de los roles',
            'slug' => 'roles.show',
            'description' => 'Ver cada detalle de los roles del sistema',

        ]);

        Permission::create( [
            'name' => 'Editar cualquier rol del sistema',
            'slug' => 'roles.edit',
            'description' => 'Edita cualquier rol del sistema',

        ]);

        Permission::create( [
            'name' => 'Eliminar un rol',
            'slug' => 'roles.destroy',
            'description' => 'Eliminar un rol del sistema',

        ]);

        Permission::create( [
            'name' => 'Crear un nuevo rol',
            'slug' => 'roles.create',
            'description' => 'Crear un nuevo rol para el sistema',

        ]);


    }
}
