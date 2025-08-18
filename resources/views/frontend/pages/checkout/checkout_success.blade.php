@extends('frontend.layout.master')

@push('css')
    @vite(['resources\css\frontend\checkout\checkout.css'])
@endpush

@section('content')
    <section style="display: flex; flex-direction :column ;justify-content : center;align-items : center  ; height :500px">

        <img src="{{ asset('images/success.svg') }}" style="width: 200px;height:200px" alt="">
        <p style="font-size:40px;font-weight:700">Order Complete</p>
        <p style="font-size:24px;font-weight:600">You Will Receive a confirmation email soon! </p>
    </section>
@endsection

@push('scripts')
@endpush
