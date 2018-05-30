<?php

use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $inst = \App\Institution::first();
         $user = [
            'name' => 'Andrew',
            'institution_id' => $inst->id,
            'staff_id' => 'asdfaeee',
            'email' => 'andrew@mail.com',
            'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
            'remember_token' => str_random(10),
        ];

         \App\User::create($user);
    }
}
