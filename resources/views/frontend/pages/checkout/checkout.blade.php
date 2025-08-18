@extends('frontend.layout.master')

@push('css')
    @vite(['resources\css\frontend\checkout\checkout.css'])
@endpush

@section('content')
    <div class="checkout-container">

        <form action="{{ route('checkout.store') }}" method="POST">
            @csrf

            <!-- Left: Form -->
            <h4>Checkout Page</h4>
            <div class="checkout-form">
                <div style="display:grid; grid-template-columns: 50% 50%; gap:1rem;">
                    <input type="hidden" name="total_price" value="{{ $totalPrice }}">

                    <div>

                        <label style="font-size: 18px ; font-weight :600 ; margin-bottom : 10px">Country</label>
                        <input name="country" type="text" placeholder="Enter Country">
                    </div>

                    <div>
                        <label style="font-size: 18px ; font-weight :600;margin-bottom : 10px">State/Union Territory</label>
                        <input name="state" type="text" placeholder="Enter State">
                    </div>
                </div>

                <h4>Payment Method</h4>

                <div style="background-color: #E2E8F0;padding:10px  ">

                    <div class="payment-method active">
                        <span>Credit/Debit Card</span>
                        <img src="{{ asset('') }}" alt="visa" height="24">
                    </div>
                    <input type="text" placeholder="Name of card">
                    <input type="text" placeholder="Card Number">
                    <div style="display:flex;gap:10px;">
                        <input type="text" placeholder="Expiry Date">
                        <input type="text" placeholder="CVC/CVV">
                    </div>
                    <div class="payment-method">
                        <span>PayPal</span>
                        <img src="paypal.png" alt="paypal" height="24">
                    </div>

                </div>

            </div>

            <!-- Right: Order Summary -->
            <div class="order-summary">
                <h4>Order Details</h4>
                <div class="order-item">
                    <img src="{{ asset('images/figure-svgrepo-com.svg') }}" alt="Course">
                    <div class="order-details">
                        <p><strong>Introduction to UX Design</strong></p>
                        <p>165 Lectures · 22h</p>
                        <p>$45.00</p>
                    </div>
                </div>

                <div class="price-info">
                    <div><span>Price</span><span>$ {{ $totalPrice }}</span></div>
                    <div><span>Discount</span><span>- $10.00</span></div>
                    <div><span>Tax</span><span>$20.00</span></div>
                    <div class="total"><span>Total</span><span>$ {{ $totalPrice }}</span></div>
                </div>

                <button type="submit" class="btn-checkout">Proceed to Checkout</button>
            </div>
        </form>
    </div>
@endsection


@push('scripts')
@endpush
