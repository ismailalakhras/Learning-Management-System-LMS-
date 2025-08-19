<?php

namespace App\Http\Controllers\Backend;

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

            return view('backend.pages.course.course', compact('courses' , 'categoryId'));
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'title'   => 'Failed!',
                'message' => 'Something went wrong when fetching data',
                'error'   => $e->getMessage()
            ], 500);
        }
    }
}
