@extends('frontend.layout.master')

@push('css')
    @vite(['resources\css\frontend\home\course.css'])

@endpush

@section('content')
   


@endsection

@push('scripts')
    @vite(['resources\js\frontend\shoppingCart\shoppingCart.js'])
@endpush
