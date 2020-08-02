<?php

use Illuminate\Database\Seeder;

class productsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
        	'name'=>'Thám Tử Lừng Danh Conan Tập 97',
        	'instock'=>'14',
            'price'=>'155',
        ]);
        DB::table('products')->insert([
        	'name'=>'Thám Tử Lừng Danh Conan Tập 96',
        	'instock'=>'6',
            'price'=>'155',
        ]);
        DB::table('products')->insert([
        	'name'=>'Thám Tử Lừng Danh Conan Tập 95',
        	'instock'=>'4',
            'price'=>'155',
        ]);
    }
}
