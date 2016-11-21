<?php

use Illuminate\Database\Seeder;

class MembershipsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Membership::class, 1)->create()->each(function($membership){
            $membership->group()->save(factory(App\Group::class)->make());
        });
    }
}
