<?php

use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory('App\Model\Role', 1)->create([
        	'name' => 'Admin',
            'slug' => 'admin'
        ]);
    }
}
