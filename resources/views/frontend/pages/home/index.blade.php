@extends('frontend.layout.master')


@push('css')
    @vite(['resources/css/frontend/home/home.css'])
@endpush



@section('content')
    <!-- Banner Section -->

    <div class="home-content">

        @include('frontend.pages.home.partials.banner.index')

        <!-- Stats Section -->
        @include('frontend.pages.home.partials.status')

        -- <!-- Top Categories -->
        @include('frontend.pages.home.partials.category')

        <!-- Top Courses -->
        @include('frontend.pages.home.partials.course')

        <!-- Top Instructors -->
        @include('frontend.pages.home.partials.instructor')

        <!-- Top About Us -->
        @include('frontend.pages.home.partials.about-us')

    </div>
@endsection
