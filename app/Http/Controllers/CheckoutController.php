<?php

namespace App\Http\Controllers;

use App\Models\Checkout;
use App\Models\ShoppingCart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function create()
    {
        $cartItems = ShoppingCart::with('course')
            ->where('user_id', Auth::id())
            ->get();

        $totalPrice = $cartItems->sum(function ($item) {
            return $item->course->price;
        });


        return view('frontend.pages.checkout.checkout', compact('cartItems', 'totalPrice'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'country'   => 'required|string',
            'state'     => 'required|string',
        ]);

        $checkout = Checkout::create([
            'user_id'      => Auth::id(),
            'country'      => $request->country,
            'state'        => $request->state,
            'total_price'  => $request->total_price,
        ]);

        ShoppingCart::where('user_id', Auth::id())->delete();
        
        return redirect()->route('checkout.success', $checkout->id)
            ->with('success', 'Checkout completed successfully.');
    }

    public function success($id)
    {
        $checkout = Checkout::findOrFail($id);
        return view('frontend.pages.checkout.checkout_success', compact('checkout'));
    }
}
