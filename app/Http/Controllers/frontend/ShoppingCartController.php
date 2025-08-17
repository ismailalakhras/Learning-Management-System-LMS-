<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\ShoppingCart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ShoppingCartController extends Controller
{
    public function index()
    {
        $cartItems = ShoppingCart::with('courses')
            ->where('user_id', Auth::id())
            ->get();

        return view('frontend.pages.shoppingCart.shoppingCart', compact('cartItems'));
    }

    public function store($courseId)
    {
        try {
            $course = Course::findOrFail($courseId);
            $price = $course->price;

            $cartItem = ShoppingCart::where('course_id', $courseId)
                ->where('user_id', auth()->id())
                ->first();

            $shoppingCartCount = ShoppingCart::where('user_id', auth()->id())->count();

            if ($cartItem) {
                $cartItem->update([
                    'quantity' => $cartItem->quantity + 1,
                    'total' => $cartItem->total + $cartItem->price,
                ]);

                $total = ShoppingCart::where('user_id', auth()->id())->sum('total');

                return response()->json([
                    'success' => true,
                    'isExists' => true,
                    'title' => 'Success!',
                    'message' => 'Quantity updated successfully',
                    'course' => $course,
                    'cart_count' => $shoppingCartCount,
                    'quantity' => $cartItem->quantity,
                    'price' => $cartItem->price,
                    'total' => $total // ✅ 
                ]);
            } else {
                $shoppingCartCount += 1;

                ShoppingCart::create([
                    'user_id' => auth()->id(),
                    'course_id' => $courseId,
                    'price' => $price,
                    'total' => $price,
                ]);

                $total = ShoppingCart::where('user_id', auth()->id())->sum('total');

                return response()->json([
                    'success' => true,
                    'isExists' => false,
                    'title' => 'Success!',
                    'message' => 'Course added to cart successfully',
                    'course' => $course,
                    'cart_count' => $shoppingCartCount,
                    'price' => $price,
                    'total' => $total,
                    'quantity' => 1
                ]);
            }
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'title' => 'Failed!',
                'message' => 'Something went wrong when adding course to cart',
                'error' => $e->getMessage()
            ], 500);
        }
    }




    public function destroy($course)
    {
        try {
            $cartItem = ShoppingCart::where('course_id', $course)
                ->where('user_id', auth()->id())
                ->first();

            if (!$cartItem) {
                return response()->json([
                    'success' => false,
                    'title' => 'Not Found!',
                    'message' => 'Course not found in cart.',

                ], 404);
            }

            $cartItem->delete();

            $shoppingCartCount = ShoppingCart::where('user_id', auth()->id())->count();

            $total = ShoppingCart::where('user_id', auth()->id())->sum('total');


            return response()->json([
                'success' => true,
                'title' => 'Deleted!',
                'message' => 'Course removed from cart successfully.',
                'cart_count' => $shoppingCartCount,
                'course' => $course,
                'total' => $total

            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'title' => 'Failed!',
                'message' => 'Something went wrong when deleting course from cart',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function clear()
    {
        try {
            ShoppingCart::where('user_id', Auth::id())->delete();

            return response()->json([
                'success' => true,
                'title' => 'Cart Cleared!',
                'message' => 'All courses have been removed from cart',
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'title' => 'Clear Failed!',
                'message' => 'Something went wrong while clearing the cart.',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
