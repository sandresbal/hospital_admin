<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class AssignationPatientSeeder extends Seeder
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
            DB::table('patient_assignations')->insert(array(
           'id_user_med' => random_int(1,50),
           'user_id' => random_int(1,50),
           'created_at' => $faker->dateTimeBetween($startDate = '-5 years', $endDate = 'now'),
           'updated_at' => $faker->dateTimeBetween($startDate = '-5 years', $endDate = 'now'),
    ));
    }
}
}