<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();
        User::create([
            'name' => 'Abdallh Elzayat',
            'email' => 'abdallhelzayat194@gmail.com',
            'password' => bcrypt('abdallhelzayat194'),
        ]);
    }
}