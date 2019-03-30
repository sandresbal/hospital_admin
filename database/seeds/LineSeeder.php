<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;


class LineSeeder extends Seeder
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
            DB::table('lines')->insert(array(
            'id_historial' => random_int(1,50),
            'data'=> $faker->text($maxNbChars = 200),
           'created_at' => $faker->dateTimeBetween($startDate = '-5 years', $endDate = 'now'),
           'updated_at' => $faker->dateTimeBetween($startDate = '-5 years', $endDate = 'now'),

    ));


    }
}
}
