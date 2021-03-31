<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class RootSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $root = [
            'name'=>'Root',
            'email'=> 'root@root.com',
            'email_verified_at'=>'2021-03-29 12:00:00',
            'password'=>'$2y$10$H8pgJ7HTjCLfv.68zRNpbeqLCUpDLUylfX0.zp01WwRGsxm/VDMSW', //secretpassword
            'remember_token' => null,
            'created_at'=>'2021-03-29 12:00:00',
            'updated_at'=>'2021-03-29 12:00:00',
            'role_id' => 1,
            'age' => 18,
            'gender' => 'M'
        ];

        \DB::table('users')->insert($root);
    }
}
