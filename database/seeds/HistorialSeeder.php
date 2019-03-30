<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;


class HistorialSeeder extends Seeder
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
            DB::table('historials')->insert(array(
           'created_at' => $faker->dateTimeBetween($startDate = '-5 years', $endDate = 'now'),
           'updated_at' => $faker->dateTimeBetween($startDate = '-5 years', $endDate = 'now'),

    ));
}
}}

