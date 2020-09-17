<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $this->call(UsersTableSeeder::class);
        $this->call(TurnosTableSeeder::class);
        $this->call(PermissionsTableSeeder::class);
        $this->call(PlanEstudioTableSeeder::class);
        $this->call(AniosTableSeeder::class);
        $this->call(DocentesTableSeeder::class);
        $this->call(GradosTableSeeder::class);
        $this->call(MateriasTableSeeder::class);
        $this->call(PeriodosTableSeeder::class);
        //$this->call(EstudiantesTableSeeder::class);

    }
}
