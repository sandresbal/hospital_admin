<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class AppointmentSeeder extends Seeder
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
            DB::table('appointments')->insert(array(
            'user_id' => random_int(1,50),
            'id_med' => random_int(1,50),
            'date_start' => $faker->dateTimeBetween($startDate = 'now', $endDate = '+1 year'),
            'date_end' => $faker->dateTimeBetween($startDate = 'now', $endDate = '+1 year'),
           'created_at' => $faker->dateTimeBetween($startDate = '-5 years', $endDate = 'now'),
           'updated_at' => $faker->dateTimeBetween($startDate = '-5 years', $endDate = 'now'),

    ));
    }
}
}
