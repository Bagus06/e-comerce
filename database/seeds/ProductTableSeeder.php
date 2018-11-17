<?php

use Illuminate\Database\Seeder;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $product = new \App\Product([
        	'imagePath' => 'https://i2.wp.com/ibnudin.net/wp-content/uploads/2018/01/gambar-kartun-muslimah-menangis.png?resize=720%2C720&ssl=1',
        	'title' => 'Hijab',
            'description' => 'jlfvndfvefjveavjer vejv eojnk',
            'type_id' => 2,
            'qty' => 10,
        	'price' => 10

        ]);
        $product->save();
        $product1 = new \App\Product([
            'imagePath' => 'https://i2.wp.com/ibnudin.net/wp-content/uploads/2018/01/gambar-kartun-muslimah-menangis.png?resize=720%2C720&ssl=1',
            'title' => 'Hijab2',
            'description' => 'jlfvndfvefjveavjer vejv eojnk',
            'type_id' => 2,
            'qty' => 10,
            'price' => 10
        ]);
        $product1->save();
    }
}
