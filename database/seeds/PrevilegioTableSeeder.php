<?php

use Illuminate\Database\Seeder;
use App\Previlegio;

class PrevilegioTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $previlegio = new Previlegio();
        $previlegio->nome = "root";
        $previlegio->descricao = "Administrar o Software";
        $previlegio->save();

        $previlegio = new Previlegio();
        $previlegio->nome = "admin";
        $previlegio->descricao = "Administrar do sistema";
        $previlegio->save();

        $previlegio = new Previlegio();
        $previlegio->nome = "criar empresa";
        $previlegio->descricao = "Administrar do sistema";
        $previlegio->save();

        $previlegio = new Previlegio();
        $previlegio->nome = "editar empresa";
        $previlegio->descricao = "Administrar do sistema";
        $previlegio->save();

        $previlegio = new Previlegio();
        $previlegio->nome = "remover empresa";
        $previlegio->descricao = "Administrar do sistema";
        $previlegio->save();

        $previlegio = new Previlegio();
        $previlegio->nome = "criar utiizador";
        $previlegio->descricao = "Administrar do sistema";
        $previlegio->save();

        $previlegio = new Previlegio();
        $previlegio->nome = "editar utilzador";
        $previlegio->descricao = "Administrar do sistema";
        $previlegio->save();

        $previlegio = new Previlegio();
        $previlegio->nome = "remover utilizador";
        $previlegio->descricao = "Administrar do sistema";
        $previlegio->save();

        $previlegio = new Previlegio();
        $previlegio->nome = "criar perfies";
        $previlegio->descricao = "Administrar do sistema";
        $previlegio->save();

        $previlegio = new Previlegio();
        $previlegio->nome = "editar perfies";
        $previlegio->descricao = "Administrar do sistema";
        $previlegio->save();

        $previlegio = new Previlegio();
        $previlegio->nome = "remover perfies";
        $previlegio->descricao = "Administrar do sistema";
        $previlegio->save();
    }
}
