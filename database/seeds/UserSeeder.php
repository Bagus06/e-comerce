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
    }
}
