<?php

use Illuminate\Database\Seeder;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory('App\Model\Admin', 20)->create([
        	'password' => bcrypt('111111')
        ]);
    }
}
