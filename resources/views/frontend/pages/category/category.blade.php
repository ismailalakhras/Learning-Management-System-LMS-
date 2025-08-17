@extends('frontend.layout.master')


@push('css')
    @vite(['resources/css/frontend/category/category.css'])
@endpush


@section('content')
    {{-- @dd($courses[0]->title) --}}
    {{-- @dd($courses[0]->instructor->firstName) --}}
    {{-- @dd($courses[0]->average_rating) --}}
    {{-- @dd(intval($courses[0]->total_duration / 60)) --}}
    {{-- @dd($courses[0]->lessons->count()) --}}
    {{-- @dd($courses[0]->price) --}}




    {{-- @dd($instructors[1]->firstName) --}}
    {{-- @dd($instructors[1]->avatar) --}}
    {{-- @dd(number_format($instructors[1]->average_rating, 1)) --}}


    <input type="hidden" id="category-id" value="{{ $courses[0]->category->id }}">

    <div class="container">
        <div class="main-header">
            <h1>{{ $courses[0]->category->title }}</h1>
        </div>
        <h3 style="font-size: 24px">you have {{ $courses[0]->category->number_of_courses }} course in this category</h3>


        <div class="main-header d-flex align-items-center">
            <span style="color: black; margin-left:auto">Sort by</span>
            <select class="sort-select form-select ms-2" style="width: 150px;">
                <option value="price_asc">Price: Low to High</option>
                <option value="price_desc">Price: High to Low</option>
            </select>
        </div>



        <span style="display: flex;gap:1rem">

            <!-- Sidebar -->
            <div class="sidebar">
                <h3 style="display: flex;border-bottom:1px solid rgba(0, 0, 0, 0.24);padding-bottom:1rem">
                    <span>Rating</span>
                    <img src="{{ asset('images/icons/upArrow.svg') }}" alt="" style="margin-left: auto">
                </h3>
                <div class="filter-item filter-by-rating" data-id="5"><label><span class="rating">★★★★★</span></label>
                </div>
                <div class="filter-item filter-by-rating" data-id="4"><label><span class="rating">★★★★☆</span></label>
                </div>
                <div class="filter-item filter-by-rating" data-id="3"><label><span class="rating">★★★☆☆</span></label>
                </div>


                <h3 style="display: flex;border-bottom:1px solid rgba(0, 0, 0, 0.24);padding-bottom:1rem">
                    <span>Number of Chapters</span>
                    <img src="{{ asset('images/icons/upArrow.svg') }}" alt="" style="margin-left: auto">
                </h3>

                <div class="filter-item filter-by-lessons" data-min="1" data-max="10">
                    <label><input type="checkbox"> 1–10</label>
                </div>
                <div class="filter-item filter-by-lessons" data-min="10" data-max="15">
                    <label><input type="checkbox"> 10–15</label>
                </div>
                <div class="filter-item filter-by-lessons" data-min="15" data-max="20">
                    <label><input type="checkbox"> 15–20</label>
                </div>
                <div class="filter-item filter-by-lessons" data-min="20" data-max="25">
                    <label><input type="checkbox"> 20–25</label>
                </div>


                <h3 style="display: flex;border-bottom:1px solid rgba(0, 0, 0, 0.24);padding-bottom:1rem"><span>Price
                    </span> <img src="{{ asset('images/icons/upArrow.svg') }}" alt="" style="margin-left: auto">
                </h3>

                <div class="filter-item"><label><input type="checkbox" class="filter-by-price" data-min="0"
                            data-max="50"> $0–50</label></div>
                <div class="filter-item"><label><input type="checkbox" class="filter-by-price" data-min="50"
                            data-max="100"> $50–100</label></div>
                <div class="filter-item"><label><input type="checkbox" class="filter-by-price" data-min="100"
                            data-max="150"> $100-150</label></div>

                <h3 style="display: flex;border-bottom:1px solid rgba(0, 0, 0, 0.24);padding-bottom:1rem"><span>Category
                    </span> <img src="{{ asset('images/icons/upArrow.svg') }}" alt="" style="margin-left: auto">
                </h3>
                <div class="filter-item"><label><input type="checkbox"> category 1</label></div>
                <div class="filter-item"><label><input type="checkbox"> category 2</label></div>
                <div class="filter-item"><label><input type="checkbox"> category 3</label></div>
                <div class="filter-item"><label><input type="checkbox"> category 4</label></div>
            </div>

            <!-- Main Content -->
            <div class="main">

                <!-- courses-container -->

                <div id="courses-container">
                    @include('frontend.pages.category.partials.courses_partial')
                </div>
            </div>
        </span>


    </div>
    <!-- instructor-container -->

    <div id="instructor-container" style="margin-top: 1rem;background: #F8FAFC;">
        <div class="main-header">
            <h1 style="font-size: 24px">Popular Mentors</h1>
        </div>

        <div class="grid instructor-container-grid " style="">
            @foreach ($instructors as $instructor)
                <div class="card" style="width: 100%;">
                    <div style="padding: 1rem">
                        <img src="{{ $instructor->avatar }}" alt="Course Image"
                            style="width: 100%; height: 200px; object-fit: cover; border-radius: 10px;">
                    </div>
                    <div class="card-body">
                        <h4>{{ $instructor->firstName }}</h4>
                        <p>web development</p>
                        <div class="rating" style="display: flex">
                            ★ <span style="color:#0a0a0a;">4.9</span><span style="margin-left: auto ; color:#0a0a0a">2400
                                students</span>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>


    <!-- features course -->

    <div id="instructor-container" style="margin-top: 1rem;">
        <div class="main-header">
            <h1 style="font-size: 24px">Featured Courses</h1>
        </div>

        <div class="grid instructor-container-grid " style="">
            @foreach ($instructors as $instructor)
                <div class="card" style="width: 100%;">
                    <div style="padding: 1rem">
                        <img src="{{ $instructor->avatar }}" alt="Course Image"
                            style="width: 100%; height: 200px; object-fit: cover; border-radius: 10px;">
                    </div>
                    <div class="card-body">
                        <h4>{{ $instructor->firstName }}</h4>
                        <p>web development</p>
                        <div class="rating" style="display: flex">
                            ★ <span style="color:#0a0a0a;">4.9</span><span style="margin-left: auto ; color:#0a0a0a">2400
                                students</span>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection


@push('scripts')
    @vite(['resources/js/frontend/category/category.js'])
@endpush
