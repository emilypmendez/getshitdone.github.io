<?php

use GetShitDone\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(User::class)->create(['username' => 'example']);

        factory(User::class, 5)->create();
    }
}
