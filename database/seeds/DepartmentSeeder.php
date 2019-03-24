<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;


class DepartmentSeeder extends Seeder
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
            DB::table('departments')->insert(array(
            'name' => $faker->word,
            'director_id' => random_int(1,50)));
    }
}
}
