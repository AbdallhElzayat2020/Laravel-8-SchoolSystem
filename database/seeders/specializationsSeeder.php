<?php

namespace Database\Seeders;

use App\Models\Specializations\Specialization;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class specializationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('specializations')->delete();
        $specializations = [
            ['en' => 'Arabic', 'ar' => 'عربي'],
            ['en' => 'English', 'ar' => 'انجليزي'],
            ['en' => 'Math', 'ar' => 'رياضيات'],
            ['en' => 'Chemistry', 'ar' => 'كيمياء'],
            ['en' => 'Physics', 'ar' => 'فيزياء'],
            ['en' => 'Physical Education', 'ar' => 'التربية البدنية'],
            ['en' => 'Philosophy', 'ar' => 'الفلسفة'],
            ['en' => 'Psychology', 'ar' => 'علم النفس'],
            ['en' => 'Sociology', 'ar' => 'علم الاجتماع'],
            ['en' => 'Islamic Studies', 'ar' => 'التربية الإسلامية'],
            ['en' => 'Social Studies', 'ar' => 'الدراسات الاجتماعية'],
            ['en' => 'Biology', 'ar' => 'بيولوجيا'],
            ['en' => 'Geography', 'ar' => 'جغرافيا'],
            ['en' => 'History', 'ar' => 'تاريخ'],
            ['en' => 'Geology', 'ar' => 'جيولوجيا'],
            ['en' => 'Computer', 'ar' => 'علوم الحاسب'],
            ['en' => 'Science', 'ar' => 'علوم'],
            ['en' => 'Art', 'ar' => 'فن'],
            ['en' => 'Biology', 'ar' => 'احياء']
        ];


        // foreach ($specializations as $specializations) {
        //     // استخدام التنسيق 'en: name, ar: name' لتخزينها في عمود string
        //     $name = json_encode($specializations); // تحويل المصفوفة إلى سلسلة JSON
        //     Specialization::create(['Name' => $name]); // تخزينها كقيمة نصية
        // }

        foreach ($specializations as $specialization) {
            Specialization::create(['Name' => $specialization]);
        }
    }
}