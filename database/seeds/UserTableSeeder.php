<?php

use Illuminate\Database\Seeder;
use App\Perfil;
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
        $perfil_root = Perfil::where('nome','root')->first();

        $user = new User();
        $user->name = "Demo";
        $user->email = "demo@n3.co.mz";
        $user->type = "root";
        $user->photo = "profile.png";
        $user->password = bcrypt('demo');
        $user->save();
        $user->perfies()->attach($perfil_root);
    }
}
