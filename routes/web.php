<?php

use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\CourseController as BackendCourseController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\CheckoutController;
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


    //! checkout
    Route::get('/checkout', [CheckoutController::class, 'create'])->name('checkout.create');
    Route::post('/checkout', [CheckoutController::class, 'store'])->name('checkout.store');
    Route::get('/checkout/success/{id}', [CheckoutController::class, 'success'])->name('checkout.success');
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








//! backend Routes

Route::middleware('auth:admin', 'role:admin')->group(function () {

    Route::get('admin/user', [UserController::class, 'index'])->name('admin.user.index');

    //!category
    Route::get('admin/category/{id}/courses', [BackendCourseController::class, 'index'])->name('admin.courses.index');
    // Route::get('admin/course-create', [CategoryController::class, 'create'])->name('admin.course.create');
    // Route::post('admin/course-store', [CategoryController::class, 'store'])->name('admin.course.store');

    // Route::get('admin/course-edit/{course}', [CategoryController::class, 'edit'])->name('admin.course.edit');
    // Route::put('admin/course-update/{course}', [CategoryController::class, 'update'])->name('admin.course.update');
    // Route::delete('admin/course-delete/{course}', [CategoryController::class, 'destroy'])->name('admin.course.delete');
});
