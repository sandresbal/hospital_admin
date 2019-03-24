<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);

        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        $this->call('UserSeeder');
        $this->call(HistorialSeeder::class);
        $this->call(RolSeeder::class);
        $this->call(AppointmentSeeder::class);
        $this->call(HistorialSeeder::class);
        $this->call(DepartmentSeeder::class);
        $this->call(LineSeeder::class);
        $this->call(AssignationDepartmentSeeder::class);
        $this->call(AssignationPatientSeeder::class);
        $this->call(AssignationRolSeeder::class);

    }
}
