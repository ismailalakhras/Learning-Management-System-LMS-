<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Faker\Factory as Faker;

class LmsSeeder extends Seeder
{
    public function run(): void
    {
        // إنشاء التصنيفات
        $categoryIds = [];
        for ($c = 1; $c <= 5; $c++) {
            $categoryIds[] = DB::table('categories')->insertGetId([
                'title'             => 'Category ' . $c,
                'image'             => '',
                'number_of_courses' => 0,
                'created_at'        => now(),
                'updated_at'        => now(),
            ]);
        }

        // لكل تصنيف نعمل عدد كورسات عشوائي بين 10 و 80
        foreach ($categoryIds as $categoryId) {
            $courseCount = rand(10, 80);
            $faker = Faker::create();

            for ($i = 1; $i <= $courseCount; $i++) {
                $courseId = DB::table('courses')->insertGetId([
                    'instructor_id'     => rand(1, 15),
                    'category_id'       => $categoryId,
                    'title'             => 'Course ' . $i . ' in Category ' . $categoryId,
                    'short_description' => $faker->sentence(10),
                    'long_description'  => $faker->paragraphs(5, true),
                    'thumbnail'         => '',
                    'price'             => rand(50, 200),
                    'created_at'        => now(),
                    'updated_at'        => now(),
                ]);

                // تحديث عدد الكورسات في الـ Category
                DB::table('categories')->where('id', $categoryId)->increment('number_of_courses');

                // عدد دروس عشوائي بين 3 و 10
                $lessonCount = rand(1, 25);
                for ($j = 1; $j <= $lessonCount; $j++) {
                    DB::table('lessons')->insert([
                        'course_id'        => $courseId,
                        'title'            => 'Lesson ' . $j . ' for Course ' . $i,
                        'content'          => 'Lesson content...',
                        'video_url'        => 'https://example.com/video/' . Str::random(8),
                        'duration_minutes' => rand(5, 60),
                        'order'            => $j,
                        'created_at'       => now(),
                        'updated_at'       => now(),
                    ]);
                }

                $count = rand(1, 15); // عدد الطلاب العشوائي

                // نجيب طلاب عشوائيين بدون تكرار
                $students = collect(range(1, 15))->random($count);

                // ندخل البيانات
                foreach ($students as $studentId) {
                    DB::table('enrollments')->insert([
                        'student_id' => $studentId,
                        'course_id'  => $courseId,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]);

                    DB::table('reviews')->insert([
                        'course_id'  => $courseId,
                        'user_id'    => $studentId,
                        'rating'     => rand(3, 5),
                        'comment'    => $faker->paragraphs(1, true),
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]);
                }
            }
        }
    }
}
