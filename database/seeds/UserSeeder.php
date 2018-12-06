<?php

use App\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Membuat sample admin
		$admin = new User();
		$admin->name = 'Admin Larapus';
		$admin->email = 'admin@gmail.com';
		$admin->password = bcrypt('rahasia');
		$admin->save();
		
		// Membuat sample member
		$member = new User();
		$member->name = "Sample Member";
		$member->email = 'member@gmail.com';
		$member->password = bcrypt('rahasia');
		$member->save();

		// Membuat sample member
		$member = new User();
		$member->name = "Vera Graha";
		$member->email = 'veragraha1@gmail.com';
		$member->password = bcrypt('rahasia');
		$member->save();
		
		// Membuat sample member
		$member = new User();
		$member->name = "XIAOMI";
		$member->email = 'XIAOMI@gmail.com';
		$member->password = bcrypt('rahasia');
		$member->save();

		// Membuat sample member
		$member = new User();
		$member->name = "SAMSUNG";
		$member->email = 'SAMSUNG@gmail.com';
		$member->password = bcrypt('rahasia');
		$member->save();

		// Membuat sample member
		$member = new User();
		$member->name = "Sprime";
		$member->email = 'Sprime@gmail.com';
		$member->password = bcrypt('rahasia');
		$member->save();

		// Membuat sample member
		$member = new User();
		$member->name = "ADIDAS";
		$member->email = 'ADIDAS@gmail.com';
		$member->password = bcrypt('rahasia');
		$member->save();

		// Membuat sample member
		$member = new User();
		$member->name = "Cussons";
		$member->email = 'Cussons@gmail.com';
		$member->password = bcrypt('rahasia');
		$member->save();

		// Membuat sample member
		$member = new User();
		$member->name = "NIKE";
		$member->email = 'NIKE@gmail.com';
		$member->password = bcrypt('rahasia');
		$member->save();

    }
}
