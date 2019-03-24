<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;


class RolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()

    {
        $array_roles = array('admin','doctor','patient');

        $faker = Faker::create();
        for ($i=0; $i < 3; $i++) {
            DB::table('roles')->insert(array(            
            'rol' => $array_roles[$i]
    ));
    }

}


}