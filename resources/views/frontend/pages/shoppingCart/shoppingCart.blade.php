@extends('frontend.layout.master')

@push('css')
    @vite(['resources\css\frontend\home\course.css'])
@endpush

@section('content')
    {{-- @dd($cartItems[1]->course->average_rating) --}}


    <section style="display: flex;justify-content : center;">

        <div class="row mb-10" style="width: 1200px;">
            <!-- Cart Items -->
            <div class="col-lg-8">
                <h3 class="mb-10 mt-10" style="font-size: 32px;font-weight:600">Shopping Cart</h3>


                @foreach ($cartItems as $item)
                    <div class="card mb-3">
                        <div class="row g-0">
                            <div class="col-md-3">

                                @if ($item->course->thumbnail)
                                    <img src="{{ asset($item->course->thumbnail) }}"
                                        class="rounded-circle me-2 instructor-avatar" alt="Instructor">
                                @else
                                    <img src="{{ asset('images/bookshelf-svgrepo-com.svg') }}"
                                        class="rounded-circle me-2 instructor-avatar" alt="Instructor">
                                @endif



                            </div>
                            <div class="col-md-9">
                                <div class="card-body d-flex justify-content-between align-items-start"
                                    style="position: relative">
                                    <div>
                                        <h5 class="card-title" style="font-size: 18px;font-weight:600">
                                            {{ $item->course->title }}</h5>
                                        <p class="mb-1 text-muted">{{ $item->course->instructor->firstName }}
                                            {{ $item->course->instructor->lastName }}</p>
                                        <p class="small text-muted"> {{ $item->course->average_rating }} <span
                                                style="color: gold">★</span> (250 ratings) ·
                                            {{ number_format($item->course->total_duration / 60, 1) }}
                                            h · {{ $item->course->lessons->count() }} Lectures · All levels
                                            {{-- </p>@dd($item->course->lessons) --}}
                                        <div style="margin-bottom: auto">

                                            <a href="#" class="text-decoration-none me-3"
                                                style=" font-size : 14px">Save for later</a>










                                            <a href="#" data-id="{{ $item->course->id }}"
                                                class="text-danger text-decoration-none removeFromCartBtn-shoppingCart"
                                                style="color:#DC2626 ; font-size : 14px">Remove</a>








                                        </div>
                                    </div>
                                    <h5 class="text-end text-dark"
                                        style="position: absolute; top:15px;right:15px;font-size:24px;font-weight:600">
                                        $ {{ $item->price }}</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach



            </div>

            <!-- Order Summary -->
            <div class="col-lg-4" style="margin-top: 2.5rem">
                <h5 class="card-title mb-1" style="font-size:20px;font-weight:600">Order Details</h5>
                <div class="card shadow-sm">
                    <div class="card-body" style="background: #E2E8F0">
                        <ul class="list-group list-group-flush ">
                            <li class="list-group-item bg-transparent d-flex justify-content-between">
                                <span>Price</span> <strong class="cart-total">$ {{ $totalPrice }}</strong>
                            </li>
                            <li class="list-group-item bg-transparent d-flex justify-content-between">
                                <span>Discount</span> <strong class="text-success">0.00</strong>
                            </li>
                            <li class="list-group-item bg-transparent d-flex justify-content-between">
                                <span>Tax</span> <strong>0.00</strong>
                            </li>
                            <li class="list-group-item bg-transparent d-flex justify-content-between align-items-center"
                                style="font-size: 20px;font-weight:600">
                                <span>Total</span> <strong class="fs-5 cart-total" >$ {{ $totalPrice }}</strong>
                            </li>



                        </ul>
                    </div>
                </div>
                <button  onclick="window.location.href='{{ route('checkout.create') }}'" class="btn btn-dark w-100 mt-2" style="height: 48px">Proceed to Checkout</button>
            </div>

        </div>
    </section>
@endsection

@push('scripts')
    @vite(['resources\js\frontend\shoppingCart\shoppingCart.js'])
@endpush
