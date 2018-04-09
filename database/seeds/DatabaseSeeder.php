<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
        	'email' => 'admin@ad.com',
        	'name' => 'vollva4',
        	'password' => bcrypt('admin')
    ]);
    }
}
