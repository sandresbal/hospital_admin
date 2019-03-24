<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;


class AssignationDepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        for ($i=0; $i < 10; $i++) {
            DB::table('asignation_departments')->insert(array(
           'id_department' => random_int(1,50),
           'id_user' => random_int(1,50),
    ));
    }
    }
}
