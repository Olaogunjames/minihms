<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        User::create([
            'name' => 'Main Admin',
            'email' => 'admin@admin.com',
            'role' => '1',
            'password' => bcrypt('123456'),
            'phone_number' => '08099999999'
        ]);        
    }
}
