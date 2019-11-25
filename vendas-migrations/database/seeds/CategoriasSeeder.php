<?php

use Illuminate\Database\Seeder;

class CategoriasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categorias')->insert([
          'nome'=>'roupas'
        ]);
        DB::table('categorias')->insert([
          'nome'=>'electronicos'
        ]);
        DB::table('categorias')->insert([
          'nome'=>'perfumes'
        ]);
        DB::table('categorias')->insert([
          'nome'=>'moveis'
        ]);
        //DB é classe pra ir buscar os dados da tabela
    }
}
