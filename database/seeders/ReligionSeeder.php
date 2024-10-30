<?php

namespace Database\Seeders;

use App\Models\Religion;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReligionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {

        DB::table('religions')->delete();

        $religions = [
            [
                'en' => 'Muslim',
                'ar' => 'مسلم'
            ],
            [
                'en' => 'Christian',
                'ar' => 'مسيحي'
            ],
            [
                'en' => 'Other',
                'ar' => 'غيرذلك'
            ],
        ];

        foreach ($religions as $R) {

            $religion = json_encode($R);

            Religion::create(['Name' => $religion]);
        }
    }
}