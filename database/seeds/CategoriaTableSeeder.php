<?php

use Illuminate\Database\Seeder;

class CategoriaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $status = array(
				  array('id' => '1','name' => 'JOYERIA'),
		          array('id' => '2','name' => 'ROPA Y CALZADO'),
		          array('id' => '3','name' => 'JUGUETERIA'),
		          array('id' => '4','name' => 'BISUTERIA'),
		          array('id' => '5','name' => 'TRAJES DE BAÑO')
						);
        //insert manual a una base de datos con array
        \DB::table('categorias')->insert($status);
    }
}
