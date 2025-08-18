<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\User;
use Illuminate\Http\Request;

class CourseController extends Controller
{

    public function courseByCategoryId($id)
    {
        try {
            $courses = Course::with(['lessons', 'instructor'])
                ->where('category_id', $id)
                ->orderBy('price', 'asc')
                ->paginate(6);


            $featuresCourses = Course::where('category_id', $id)
                ->withAvg('reviews', 'rating')
                ->orderByDesc('reviews_avg_rating')
                ->take(4)
                ->get();


            $instructors = User::take(5)->get();

            if (request()->ajax()) {
                
                $view = view('frontend.pages.category.partials.courses_partial', compact('courses'))->render();
                return response()->json([
                    'success' => true,
                    'page' => $view,
                ]);
            }

            return view('frontend.pages.category.category', compact('courses', 'instructors', 'id', 'featuresCourses'));
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'title'   => 'Failed!',
                'message' => 'Something went wrong when fetching data',
                'error'   => $e->getMessage()
            ], 500);
        }
    }


    public function filterByRating(Request $request)
    {
        $rating      = $request->input('rating', 0);
        $categoryId  = $request->input('category_id');

        $courses = Course::with('instructor')
            ->withAvg('reviews', 'rating')
            ->when($categoryId, fn($q) => $q->where('category_id', $categoryId))
            ->having('reviews_avg_rating', '>=', $rating)
            ->having('reviews_avg_rating', '<', $rating + 1)
            ->orderByDesc('reviews_avg_rating')
            ->paginate(6);

        $view = view('frontend.pages.category.partials.courses_partial', compact('courses'))->render();

        return response()->json([
            'success' => true,
            'page'    => $view,
        ]);
    }


    public function filterByPrice(Request $request)
    {
        $min         = $request->input('min', 0);
        $max         = $request->input('max', 10000);
        $categoryId  = $request->input('category_id');

        $courses = Course::with('instructor')
            ->when($categoryId, fn($q) => $q->where('category_id', $categoryId))
            ->whereBetween('price', [$min, $max])
            ->orderBy('price', 'asc')
            ->paginate(6);

        $view = view('frontend.pages.category.partials.courses_partial', compact('courses'))->render();

        return response()->json([
            'success' => true,
            'page'    => $view,
        ]);
    }


    public function sortCourses(Request $request)
    {
        $sort        = $request->input('sort', 'relevance');
        $categoryId  = $request->input('category_id');

        $courses = Course::with('instructor')
            ->when($categoryId, fn($q) => $q->where('category_id', $categoryId));

        if ($sort === 'price_asc') {
            $courses->orderBy('price', 'asc');
        } elseif ($sort === 'price_desc') {
            $courses->orderBy('price', 'desc');
        } else {
            $courses->latest();
        }

        $courses = $courses->paginate(6);

        $view = view('frontend.pages.category.partials.courses_partial', compact('courses'))->render();

        return response()->json([
            'success' => true,
            'page'    => $view,
        ]);
    }


    public function filterByLessons(Request $request)
    {
        $min         = $request->input('min_lessons', 0);
        $max         = $request->input('max_lessons', 1000);
        $categoryId  = $request->input('category_id');

        $courses = Course::with(['lessons', 'instructor'])
            ->withCount('lessons')
            ->when($categoryId, fn($q) => $q->where('category_id', $categoryId))
            ->having('lessons_count', '>=', $min)
            ->having('lessons_count', '<=', $max)
            ->orderBy('lessons_count', 'desc')
            ->paginate(6);

        $view = view('frontend.pages.category.partials.courses_partial', compact('courses'))->render();

        return response()->json([
            'success' => true,
            'page'    => $view,
        ]);
    }


    public function show($id)
    {
        $shoppingCart = \App\Models\ShoppingCart::where('user_id', auth()->id())
            ->where('course_id', $id)
            ->exists();


        $course = Course::with(['instructor', 'lessons'])
            ->findOrFail($id);

        $reviews = $course->reviews()->latest()->paginate(2);

        $reviewsCount = $course->reviews()->count();

        $avg = number_format((float) $course->reviews()->avg('rating'), 1);

        $dist = $course->reviews()
            ->selectRaw('rating, COUNT(*) as count')
            ->groupBy('rating')
            ->pluck('count', 'rating');

        return view('frontend.pages.course.course', compact(
            'course',
            'reviews',
            'reviewsCount',
            'avg',
            'dist',
            'shoppingCart'
        ));
    }

    public function loadReviews($id)
    {
        $course  = Course::findOrFail($id);
        $reviews = $course->reviews()->paginate(2);

        $html = view('frontend.pages.course.partials.reviews', compact('reviews'))->render();

        return response()->json([
            'html'    => $html,
            'hasMore' => $reviews->hasMorePages()
        ]);
    }
}
