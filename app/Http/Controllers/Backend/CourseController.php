<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\CourseDataTable;
use App\DataTables\ReviewsDataTable;
use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\User;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index($id)
    {
        try {
            $courses = Course::with(['lessons', 'instructor'])
                ->where('category_id', $id)
                ->paginate(3);


            $categoryId = $id;


            if (request()->ajax()) {

                $view = view('backend.pages.course.course_partials', compact('courses'))->render();
                return response()->json([
                    'success' => true,
                    'page' => $view,
                ]);
            }

            return view('backend.pages.course.course', compact('courses', 'categoryId'));
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'title'   => 'Failed!',
                'message' => 'Something went wrong when fetching data',
                'error'   => $e->getMessage()
            ], 500);
        }
    }



    public function show(CourseDataTable  $dataTable, $id)
    {
        // $shoppingCart = \App\Models\ShoppingCart::where('user_id', auth()->id())
        //     ->where('course_id', $id)
        //     ->exists();


        $course = Course::with(['instructor', 'lessons'])
            ->findOrFail($id);

        // $students = $course->students;

        // $reviews = $course->reviews()->latest()->paginate(2);

        // $reviewsCount = $c/ourse->reviews()->count();

        // $avg = number_format((float) $course->reviews()->avg('rating'), 1);

        // $dist = $course->reviews()
        //     ->selectRaw('rating, COUNT(*) as count')
        //     ->groupBy('rating')
        //     ->pluck('count', 'rating');


        return $dataTable->with('course_id', $id)->render('backend.pages.course.course_show', compact(
            'course',

        ));
    }



    public function reviewsOfCourse(ReviewsDataTable  $dataTable, $id)
    {

        $course = Course::with(['instructor', 'lessons'])
            ->findOrFail($id);

        $reviews = $course->reviews()->latest()->paginate(2);


        return $dataTable->with('course_id', $id)->render('backend.pages.course.course_reviews', compact(
            'course',
            'reviews'
        ));
    }
}
