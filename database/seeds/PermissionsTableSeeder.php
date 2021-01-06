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

        //periodos
        Permission::create( [
            'name' => 'Navegar periodos',
            'slug' => 'periodos.index',
            'description' => 'Lista y navega los periodos',

        ]);

        Permission::create( [
            'name' => 'Ver la informacion de los periodos',
            'slug' => 'periodos.show',
            'description' => 'Ver cada detalle de los periodos del sistema',

        ]);

        Permission::create( [
            'name' => 'Editar cualquier periodo del sistema',
            'slug' => 'periodos.edit',
            'description' => 'Edita cualquier periodo del sistema',

        ]);

        Permission::create( [
            'name' => 'Eliminar un periodo',
            'slug' => 'periodos.destroy',
            'description' => 'Eliminar un periodo del sistema',

        ]);

        Permission::create( [
            'name' => 'Crear un nuevo periodo',
            'slug' => 'periodos.create',
            'description' => 'Crear un nuevo periodo para el sistema',

        ]);

        //docentes
        Permission::create( [
            'name' => 'Navegar docentes',
            'slug' => 'docentes.index',
            'description' => 'Lista y navega los docentes',

        ]);

        Permission::create( [
            'name' => 'Ver la informacion de los docentes',
            'slug' => 'docentes.show',
            'description' => 'Ver cada detalle de los docentes del sistema',

        ]);

        Permission::create( [
            'name' => 'Editar cualquier docente del sistema',
            'slug' => 'docentes.edit',
            'description' => 'Edita cualquier docente del sistema',

        ]);

        Permission::create( [
            'name' => 'Eliminar un docente',
            'slug' => 'docentes.destroy',
            'description' => 'Eliminar un docente del sistema',

        ]);

        Permission::create( [
            'name' => 'Crear un nuevo docente',
            'slug' => 'docentes.create',
            'description' => 'Crear un nuevo docente para el sistema',

        ]);

        //Años

        Permission::create( [
            'name' => 'Navegar Años',
            'slug' => 'anios.index',
            'description' => 'Lista y navega los años',

        ]);

        Permission::create( [
            'name' => 'Ver la informacion de los Años',
            'slug' => 'anios.show',
            'description' => 'Ver cada detalle de los años del sistema',

        ]);

        Permission::create( [
            'name' => 'Editar cualquier año del sistema',
            'slug' => 'anios.edit',
            'description' => 'Edita cualquier año del sistema',

        ]);

        Permission::create( [
            'name' => 'Eliminar un año',
            'slug' => 'anios.destroy',
            'description' => 'Eliminar un año del sistema',

        ]);

        Permission::create( [
            'name' => 'Crear un nuevo año',
            'slug' => 'anios.create',
            'description' => 'Crear un nuevo año para el sistema',

        ]);

        //grado

        Permission::create( [
            'name' => 'Navegar grados',
            'slug' => 'grados.index',
            'description' => 'Lista y navega los grados',

        ]);

        Permission::create( [
            'name' => 'Ver la informacion de los grados',
            'slug' => 'grados.show',
            'description' => 'Ver cada detalle de los grados del sistema',

        ]);

        Permission::create( [
            'name' => 'Editar cualquier grado del sistema',
            'slug' => 'grados.edit',
            'description' => 'Edita cualquier grado del sistema',

        ]);

        Permission::create( [
            'name' => 'Eliminar un grado',
            'slug' => 'grados.destroy',
            'description' => 'Eliminar un grado del sistema',

        ]);

        Permission::create( [
            'name' => 'Crear un nuevo grado',
            'slug' => 'grados.create',
            'description' => 'Crear un nuevo grado para el sistema',

        ]);

        //Materias

        Permission::create( [
            'name' => 'Navegar materias',
            'slug' => 'materias.index',
            'description' => 'Lista y navega los materias',

        ]);

        Permission::create( [
            'name' => 'Ver la informacion de los materias',
            'slug' => 'materias.show',
            'description' => 'Ver cada detalle de los materias del sistema',

        ]);

        Permission::create( [
            'name' => 'Editar cualquier materia del sistema',
            'slug' => 'materias.edit',
            'description' => 'Edita cualquier materia del sistema',

        ]);

        Permission::create( [
            'name' => 'Eliminar un materia',
            'slug' => 'materias.destroy',
            'description' => 'Eliminar un materia del sistema',

        ]);

        Permission::create( [
            'name' => 'Crear un nuevo materia',
            'slug' => 'materias.create',
            'description' => 'Crear un nuevo materia para el sistema',

        ]);

        //Turnos

        Permission::create( [
            'name' => 'Navegar turnos',
            'slug' => 'turnos.index',
            'description' => 'Lista y navega los turnos',

        ]);

        Permission::create( [
            'name' => 'Ver la informacion de los turnos',
            'slug' => 'turnos.show',
            'description' => 'Ver cada detalle de los turnos del sistema',

        ]);

        Permission::create( [
            'name' => 'Editar cualquier turno del sistema',
            'slug' => 'turnos.edit',
            'description' => 'Edita cualquier turno del sistema',

        ]);

        Permission::create( [
            'name' => 'Eliminar un turno',
            'slug' => 'turnos.destroy',
            'description' => 'Eliminar un turno del sistema',

        ]);

        Permission::create( [
            'name' => 'Crear un nuevo turno',
            'slug' => 'turnos.create',
            'description' => 'Crear un nuevo turno para el sistema',

        ]);

        // Planes de Estudio
        Permission::create( [
            'name' => 'Navegar planes de Estudio',
            'slug' => 'planesEstudio.index',
            'description' => 'Lista y navega los planes de Estudio',

        ]);

        Permission::create( [
            'name' => 'Ver la informacion de los planes de Estudio',
            'slug' => 'planesEstudio.show',
            'description' => 'Ver cada detalle de los planes de Estudio del sistema',

        ]);

        Permission::create( [
            'name' => 'Editar cualquier planes de Estudio del sistema',
            'slug' => 'planesEstudio.edit',
            'description' => 'Edita cualquier planes de Estudio del sistema',

        ]);

        Permission::create( [
            'name' => 'Eliminar un plan de Estudio',
            'slug' => 'planesEstudio.destroy',
            'description' => 'Eliminar un plan de  Estudio del sistema',

        ]);

        Permission::create( [
            'name' => 'Crear un nuevo plan de Estudio',
            'slug' => 'planesEstudio.create',
            'description' => 'Crear un nuevo plane Estudio para el sistema',

        ]);

        //Matricula
        Permission::create( [
            'name' => 'Navegar Matricula',
            'slug' => 'matriculas.index',
            'description' => 'Lista y navega los Matricula',

        ]);

        Permission::create( [
            'name' => 'Ver la informacion de los Matricula',
            'slug' => 'matriculas.show',
            'description' => 'Ver cada detalle de la Matricula del sistema',

        ]);

        Permission::create( [
            'name' => 'Editar cualquier Matricula del sistema',
            'slug' => 'matriculas.edit',
            'description' => 'Edita cualquier Matricula del sistema',

        ]);

        Permission::create( [
            'name' => 'Eliminar una matricula',
            'slug' => 'matriculas.destroy',
            'description' => 'Eliminar una matricula del sistema',

        ]);

        Permission::create( [
            'name' => 'Crear una nuevo matricula',
            'slug' => 'matriculas.create',
            'description' => 'Crear una nueva matricula para el sistema',

        ]);

        //Asignacion academica

        Permission::create( [
            'name' => 'Navegar asignaciones academicas',
            'slug' => 'asignaciones.index',
            'description' => 'Lista y navega las asignaciones academicas',

        ]);

        Permission::create( [
            'name' => 'Ver la informacion de los asignaciones academicas',
            'slug' => 'asignaciones.show',
            'description' => 'Ver cada detalle de la asignaciones academicas del sistema',

        ]);

        Permission::create( [
            'name' => 'Editar cualquier asignacion academica del sistema',
            'slug' => 'asignaciones.edit',
            'description' => 'Edita cualquier asignacion academica del sistema',

        ]);

        Permission::create( [
            'name' => 'Eliminar una asignacion academica',
            'slug' => 'asignaciones.destroy',
            'description' => 'Eliminar una asignacion academica del sistema',

        ]);

        Permission::create( [
            'name' => 'Crear una nueva asignacion academica',
            'slug' => 'asignaciones.create',
            'description' => 'Crear una nueva asignacion academica para el sistema',

        ]);

        //Asignacion Docentes
        Permission::create( [
            'name' => 'Navegar asignacion de docentes',
            'slug' => 'docentegrados.index',
            'description' => 'Lista y navega la asignacion de docentes',

        ]);

        Permission::create( [
            'name' => 'Ver la informacion de la asignacion de docentes',
            'slug' => 'docentegrados.show',
            'description' => 'Ver cada detalle de la asignacion de docentes del sistema',

        ]);

        Permission::create( [
            'name' => 'Editar cualquier asignacion de docentes',
            'slug' => 'docentegrados.edit',
            'description' => 'Edita cualquier asignacion de docentes',

        ]);

        Permission::create( [
            'name' => 'Eliminar una asignacion de docente',
            'slug' => 'docentegrados.destroy',
            'description' => 'Eliminar una asignacion de docentes',

        ]);

        Permission::create( [
            'name' => 'Crear una nueva asignacion de docente',
            'slug' => 'docentegrados.create',
            'description' => 'Crear una nueva asignacion de docente para el sistema',

        ]);

    }
}
