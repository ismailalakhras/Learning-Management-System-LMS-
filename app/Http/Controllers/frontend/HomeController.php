<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Course;
use App\Models\Review;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $categories = Category::latest('created_at')
            ->take(4)
            ->get();

        $courses = Course::with('instructor')
            ->withAvg('reviews', 'rating')
            ->orderByDesc('reviews_avg_rating')
            ->paginate(4);



        $instructors = User::with('courses') // نحمل الكورسات
            ->with(['courses' => function ($q) {
                $q->withAvg('reviews', 'rating'); // لكل كورس نحسب متوسط تقييمه
            }])
            ->has('courses') // فقط المدرسين الذين لديهم كورسات
            ->get()
            ->map(function ($user) {
                // نحسب متوسط تقييم كل كورسات المدرس
                $user->average_rating = $user->courses->avg('reviews_avg_rating');
                return $user;
            })
            ->sortByDesc('average_rating') // الترتيب من الأعلى للأقل
            ->take(5);
        return view('frontend.pages.home.index', compact('categories', 'courses', 'instructors'));
    }


    public function loadMoreCourses(Request $request)
    {
        $perPage = 6;

        $courses = Course::with('instructor')
            ->withAvg('reviews', 'rating')
            ->orderByDesc('reviews_avg_rating')
            ->paginate($perPage);

        $html = view('frontend.pages.home.partials.section-partials.top-courses', compact('courses'))->render();

        return response()->json([
            'html'    => $html,
            'hasMore' => $courses->hasMorePages()
        ]);
    }




    public function allCategories()
    {
        $categories = Category::latest('created_at')
            ->get();

        $courses = Course::with('instructor')
            ->withAvg('reviews', 'rating')
            ->orderByDesc('reviews_avg_rating')
            ->paginate(4);



        $instructors = User::with('courses') // نحمل الكورسات
            ->with(['courses' => function ($q) {
                $q->withAvg('reviews', 'rating'); // لكل كورس نحسب متوسط تقييمه
            }])
            ->has('courses') // فقط المدرسين الذين لديهم كورسات
            ->get()
            ->map(function ($user) {
                // نحسب متوسط تقييم كل كورسات المدرس
                $user->average_rating = $user->courses->avg('reviews_avg_rating');
                return $user;
            })
            ->sortByDesc('average_rating') // الترتيب من الأعلى للأقل
            ->take(5);

        return view('frontend.pages.home.index', compact('categories', 'courses', 'instructors'));
    }
}
