<?php

use Illuminate\Database\Seeder;
use App\User;
class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = new User();
        $admin->name = "tiago";
        $admin->email = "tiagoisrael77@hotmail.com";
        $admin->password = bcrypt("123456");
        $admin->role_id = 1;
        $admin->save();
    }
}
