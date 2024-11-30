<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingSchoolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('settings')->delete();

        $data = [
            ['key' => 'current_session', 'value' => '2021-2022'],
            ['key' => 'school_title', 'value' => 'MU'],
            ['key' => 'school_name', 'value' => 'Mansoura University'],
            ['key' => 'end_first_term', 'value' => '01-12-2024'],
            ['key' => 'end_second_term', 'value' => '01-03-2025'],
            ['key' => 'phone', 'value' => '0123456789'],
            ['key' => 'address', 'value' => 'المنصورة'],
            ['key' => 'school_email', 'value' => 'abdallhelzayat194@gmail.com'],
            ['key' => 'logo', 'value' => 'logo.jpg'],
        ];

        DB::table('settings')->insert($data);
    }
}
