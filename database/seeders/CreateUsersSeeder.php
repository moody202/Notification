<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CreateUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Mahmoud',
            'email' => 'mahmoud@gmail.com',
            'phone_number' => '+201156468893',
            'password' => bcrypt('moody8101988')
        ]);
    }
}
