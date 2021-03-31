<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $roles = array(
            ['id' => 1, 'rol' => 'admin'],
            ['id' => 2, 'rol' => 'user']
        );
        \DB::table('roles')->insert($roles);
    }
}
