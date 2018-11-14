<?php

use App\Curir;
use App\Method;
use App\Type;
use Illuminate\Database\Seeder;

class CartsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		// Sample Curir
		$curir1 = Curir::create(['curir'=>'jne','delivery'=>10]);
		$curir2 = Curir::create(['curir'=>'j&t','delivery'=>11]);
		$curir3 = Curir::create(['curir'=>'gojek','delivery'=>9]);

		// Sample Payment
		$pay1 = Method::create(['method'=>'transfer','pay'=>'BRI','description'=>'no des']);
		$pay2 = Method::create(['method'=>'transfer','pay'=>'BNI','description'=>'no des']);
		$pay3 = Method::create(['method'=>'transfer','pay'=>'BCA','description'=>'no des']);
		$pay4 = Method::create(['method'=>'Kredit','pay'=>'BRI Kredit','description'=>'no des']);
		$pay5 = Method::create(['method'=>'Kredit','pay'=>'BNI Kredit','description'=>'no des']);
		$pay6 = Method::create(['method'=>'Kredit','pay'=>'BCA Kredit','description'=>'no des']);
		$pay7 = Method::create(['method'=>'Kredit','pay'=>'Akulaku','description'=>'no des']);
		$pay8 = Method::create(['method'=>'Kredit','pay'=>'Kardivo','description'=>'no des']);
		$pay9 = Method::create(['method'=>'OnDelivery','pay'=>'JNE','description'=>'no des']);
		$pay10 = Method::create(['method'=>'OnDelivery','pay'=>'J&T','description'=>'no des']);
		$pay11 = Method::create(['method'=>'OnDelivery','pay'=>'GoJek','description'=>'no des']);

		// Sample Payment
		$type1 = Type::create(['type'=>'Electronik']);
		$type2 = Type::create(['type'=>'Clothes']);
		$type3 = Type::create(['type'=>'Baby Accessories']);
    }
}
