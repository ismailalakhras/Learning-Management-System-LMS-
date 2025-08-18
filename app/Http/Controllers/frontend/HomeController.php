<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Course;
use App\Models\Review;
use App\Models\ShoppingCart;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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


        $instructors = User::with('courses') 
            ->with(['courses' => function ($q) {
                $q->withAvg('reviews', 'rating');
            }])
            ->has('courses') 
            ->get()
            ->map(function ($user) {
                $user->average_rating = $user->courses->avg('reviews_avg_rating');
                return $user;
            })
            ->sortByDesc('average_rating') 
            ->take(5);
        return view('frontend.pages.home.index', compact('categories', 'courses', 'instructors' ));
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



        $instructors = User::with('courses') 
            ->with(['courses' => function ($q) {
                $q->withAvg('reviews', 'rating'); 
            }])
            ->has('courses')
            ->get()
            ->map(function ($user) {
                $user->average_rating = $user->courses->avg('reviews_avg_rating');
                return $user;
            })
            ->sortByDesc('average_rating') 
            ->take(5);

        return view('frontend.pages.home.index', compact('categories', 'courses', 'instructors'));
    }
}
