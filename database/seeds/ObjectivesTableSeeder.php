<?php

use GetShitDone\Objective;
use GetShitDone\User;
use Illuminate\Database\Seeder;

class ObjectivesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = User::all();

        foreach ($users as $user) {
            factory(Objective::class, 3)->create(['user_id' => $user->id]);
        }
    }
}
