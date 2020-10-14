<?php

use Illuminate\Database\Seeder;
use App\User;
use Illuminate\Support\Facades\Hash;

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
            'name' => 'Elvis',
            'lastname' => 'Sylejmani',
            'email' => 'elvissylejmani1323@gmail.com',
            'type' => 'Admin',
            'password' => Hash::make(12345678),
        ]);

    }
}
