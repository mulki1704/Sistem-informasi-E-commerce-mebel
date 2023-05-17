<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class adminseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //admin
        $admin = new \App\Models\User();
        $admin->name = "mulki";
        $admin->username = "M U L K A Y";
        $admin->email = "mulki1704@gmail.com";
        $admin->password = bcrypt('12345678');
        $admin->role = "admin";
        $admin->image = "{{asset('ASET/x1/profile.png')}}";
        $admin->save();

    }
}
