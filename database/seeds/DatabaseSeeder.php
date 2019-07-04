<?php

use Illuminate\Database\Seeder;
use App\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        User::create([
            'name' => 'Main Admin',
            'email' => 'admin@admin.com',
            'role' => '1',
            'password' => bcrypt('123456'),
            'phone_number' => '08099999999'
        ]);   
    }
}
