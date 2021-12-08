<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User;
        $user -> name = "Rezha";
        $user -> email = "rezha@gmail.com";
        $user -> password = bcrypt('rahasia123');
        $user -> save();

    }
}
