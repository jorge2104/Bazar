<?php

use Illuminate\Database\Seeder;
use App\User;
use App\roles;
use App\sexos;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

      $role = new roles();
      $role->name_role = 'Encargado';
      $role->save();

      $role = new roles();
      $role->name_role = 'Cliente';
      $role->save();

      $role = new sexos();
      $role->sexo_name = 'Masculino';
      $role->save();


      $role = new sexos();
      $role->sexo_name = 'Femenino';
      $role->save();



        $user = new User();
        $user->name = 'root';
        $user->email = 'root@bazar.com';
        $user->lastname = 'Admin';
        $user->second_lastname = 'Bazar';
        $user->sexo = '1'; //masculino,
        $user->id_role = '1';//admin,
        $user->email_verified_at = now();
        $user->password  = bcrypt('secret');
        $user->save();

    }
}
