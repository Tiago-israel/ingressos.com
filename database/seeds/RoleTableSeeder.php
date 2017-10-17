<?php

use Illuminate\Database\Seeder;
use App\Model\Role;
class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roleAdmin = new Role();
        $roleAdmin->name = "admin";
        $roleAdmin->description = "administrador do site";
        $roleAdmin->save();

        $roleCliente = new Role();
        $roleCliente->name = "customer";
        $roleCliente->description = "cliente do site";
        $roleCliente->save();
    }
}
