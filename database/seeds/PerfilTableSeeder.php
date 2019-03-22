<?php

use Illuminate\Database\Seeder;
use App\Previlegio;
use App\Perfil;

class PerfilTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $previlegio_root = Previlegio::where('nome','root')->first();
        $previlegio_admin = Previlegio::where('nome','admin')->first();

        $perfil = new Perfil();
        $perfil->nome = "root";
        $perfil->descricao = "Responsavel pelo Software";
        $perfil->save();
        $perfil->previlegios()->attach($previlegio_root);

        $perfil = new Perfil();
        $perfil->nome = "Admin";
        $perfil->descricao = "Administrador";
        $perfil->save();
        $perfil->previlegios()->attach($previlegio_admin);
    }
}
