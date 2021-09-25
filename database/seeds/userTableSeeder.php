<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;
class userTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
           'name' => 'Admin',
           'email' => 'admin@example.com',
           'password' => bcrypt('admin'),
             'role_id' => 2,
        ]);
        User::create([
            'name' => 'Hassnain',
            'email' => 'hass@gmail.com',
            'password' => bcrypt('ffffff'),
        ]);

        factory(User::class, 50)->create();
    }

}
