<?php

use App\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'cho.chief',
            'email' => 'chief@cho.today',
            'password' => bcrypt('asdfqaz069xcc'),
            'api_token' => str_random(60),
            'remember_token' => str_random(10),
        ]);

        factory(User::class, 5)->create();

    }
}
