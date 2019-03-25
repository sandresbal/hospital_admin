<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;


class AssignationRolSeeder extends Seeder
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
            DB::table('asignation_roles')->insert(array(
           'id_user' => random_int(1,50),
           'id_rol' => random_int(1,3),
           'created_at' => $faker->dateTimeBetween($startDate = '-5 years', $endDate = 'now'),
           'updated_at' => $faker->dateTimeBetween($startDate = '-5 years', $endDate = 'now'),
    ));
    }
    }
}
