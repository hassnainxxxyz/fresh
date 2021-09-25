<?php

use Illuminate\Database\Seeder;
use App\Role;
class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $one = Role::create(['name' => 'user', 'description' => 'This is the normal user']);
        $one = Role::create(['name' => 'Admin', 'description' => 'This is the Admin']);
    }
}
