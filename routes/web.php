<?php

use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\frontend\CourseController;
use App\Http\Controllers\frontend\HomeController;
use App\Http\Controllers\ProfileController;
use App\Models\Category;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



Route::get('/', [HomeController::class, 'index'])->name('home');


Route::get('/category', function () {
    return view('frontend.pages.category.category');
});

Route::get('/category/{id}/courses', [CourseController::class, 'courseByCategoryId'])->name('category.courses');
Route::get('/course/{id}', [CourseController::class, 'show'])->name('course.show');


Route::get('/courses/filter', [CourseController::class, 'filterByRating'])->name('courses.filter');
Route::get('/courses/filter-lessons', [CourseController::class, 'filterByLessons'])->name('courses.filter.lessons');
Route::get('/courses/filter-price', [CourseController::class, 'filterByPrice'])->name('courses.filter.price');

Route::get('/courses/sort', [CourseController::class, 'sortCourses'])->name('courses.sort');





Route::get('/courses', [HomeController::class, 'loadMoreCourses'])->name('courses.all');
Route::get('/categories', [HomeController::class, 'allCategories'])->name('categories.all');



Route::get('courses/{id}/reviews', [CourseController::class, 'loadReviews']);









Route::middleware('auth:admin', 'role:admin')->group(function () {
    Route::get('admin/dashboard', function () {
        return view('backend.pages.dashboard.dashboard');
    })->name('admin.dashboard');


    Route::get('admin/user', [UserController::class, 'index'])->name('admin.user.index');
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
