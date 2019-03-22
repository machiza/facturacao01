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
    }
}
