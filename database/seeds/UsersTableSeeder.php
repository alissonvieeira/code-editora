<?php

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
        factory(\CodePub\Models\User::class, 1)->create([
            'email' => 'admin@editora.com'
        ]);

        factory(\CodePub\Models\User::class, 1)->create([
            'email' => 'admin1@editora.com'
        ]);
    }
}
