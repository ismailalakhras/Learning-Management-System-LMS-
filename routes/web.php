<?php

use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\frontend\CourseController;
use App\Http\Controllers\frontend\HomeController;
use App\Http\Controllers\frontend\ShoppingCartController;
use App\Http\Controllers\ProfileController;
use App\Models\Category;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. 
| These routes are loaded by the RouteServiceProvider and all of them 
| will be assigned to the "web" middleware group.
|
*/

// --------------------
// Home Routes
// --------------------
Route::get('/', [HomeController::class, 'index'])->name('home');

// --------------------
// Category Routes
// --------------------
Route::get('/category', function () {
    return view('frontend.pages.category.category');
});
Route::get('/category/{id}/courses', [CourseController::class, 'courseByCategoryId'])->name('category.courses');

// --------------------
// Course Routes
// --------------------
Route::get('/course/{id}', [CourseController::class, 'show'])->name('course.show');


// --------------------
// Shopping Cart Routes
// --------------------
Route::middleware('auth:web')->group(function () {
    //! cart
    Route::get('/cart', [ShoppingCartController::class, 'index'])->name('cart.index');
    Route::post('/cart/{id}', [ShoppingCartController::class, 'store'])->name('cart.store');
    Route::delete('/cart/{id}', [ShoppingCartController::class, 'destroy'])->name('cart.destroy');


   

    //! orders 
    // Route::get('/order', [OrderController::class, 'index'])->name('order.index');
    // Route::post('/order', [OrderController::class, 'store'])->name('order.store');

    //! orders 
    // Route::put('/coupon', [FrontendCouponController::class, 'update'])->name('coupon');
});




// Filter & Sort Courses
Route::get('/courses/filter', [CourseController::class, 'filterByRating'])->name('courses.filter');
Route::get('/courses/filter-lessons', [CourseController::class, 'filterByLessons'])->name('courses.filter.lessons');
Route::get('/courses/filter-price', [CourseController::class, 'filterByPrice'])->name('courses.filter.price');
Route::get('/courses/sort', [CourseController::class, 'sortCourses'])->name('courses.sort');

// Load all courses & categories
Route::get('/courses', [HomeController::class, 'loadMoreCourses'])->name('courses.all');
Route::get('/categories', [HomeController::class, 'allCategories'])->name('categories.all');

// Load reviews via AJAX
Route::get('courses/{id}/reviews', [CourseController::class, 'loadReviews']);

// --------------------
// Admin Routes (requires admin auth & role)
// --------------------
Route::middleware(['auth:admin', 'role:admin'])->group(function () {
    Route::get('admin/dashboard', function () {
        return view('backend.pages.dashboard.dashboard');
    })->name('admin.dashboard');

    Route::get('admin/user', [UserController::class, 'index'])->name('admin.user.index');
});

// --------------------
// Authenticated User Routes
// --------------------
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// --------------------
// Authentication Routes (Laravel Breeze / Jetstream / Fortify)
// --------------------
require __DIR__ . '/auth.php';
