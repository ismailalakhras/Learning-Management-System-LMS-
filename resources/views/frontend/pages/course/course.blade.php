@extends('frontend.layout.master')

@push('css')
    @vite(['resources/css/frontend/course/course.css'])
@endpush

@section('content')
    <div>
        <div class="course-wrapper">

            <div class="course-page-container">
                <!-- Breadcrumb -->
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Categories</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ $course->title }}</li>
                    </ol>
                </nav>


                <!-- Course Title -->
                <h2 class="fw-bold">{{ $course->title }}</h2>

                <!-- Course Description -->
                <p class="text-muted course-description">
                    {{ $course->long_description }}
                </p>

                <!-- Course Info -->
                <div class="d-flex align-items-center flex-wrap mb-3">
                    <span class="text-warning fw-bold me-2">{{ number_format($course->average_rating, 1) }}</span>

                    <div
                        style="position: relative; display: inline-block; font-size: 1rem; line-height: 1; margin-right: .5rem;">
                        <div style="color: #ccc;">★★★★★</div>
                        <div
                            style="color: #f6c700; position: absolute; top: 0; left: 0; white-space: nowrap; overflow: hidden; width: {{ ($course->average_rating / 5) * 100 }}%;">
                            ★★★★★</div>
                    </div>

                    <span class="mx-3">|</span>
                    <span class="text-muted">
                        {{ intval($course->total_duration / 60) }} Total Hours ·
                        {{ $course->lessons->count() }} Lectures · All levels
                    </span>
                </div>


                <!-- Instructor -->
                <div class="d-flex align-items-center mb-3">

                    @if ($course->instructor->avatar)
                        <img src="{{ asset($course->instructor->avatar) }}" class="rounded-circle me-2 instructor-avatar"
                            alt="Instructor">
                    @else
                        <img src="{{ asset('images/figure-svgrepo-com.svg') }}"
                            class="rounded-circle me-2 instructor-avatar" alt="Instructor">
                    @endif



                    <div>
                        <span>Created by <a href="#" class="fw-semibold">{{ $course->instructor->firstName }}
                                {{ $course->instructor->lastName }}</a></span>
                    </div>
                </div>

                <!-- Languages -->
                <div class="d-flex align-items-center">
                    <i class="fas fa-globe me-2 text-muted"></i>
                    <span class="text-muted">English, Spanish, Italian, German</span>
                </div>

                {{-- add to cart --}}
                <div class="grid add-to-cart-card">
                    <div class="card">


                        @if ($course->thumbnail)
                            <img src="{{ asset($course->thumbnail) }}" alt="Course Image" class="cart-img">
                        @else
                            <img src="{{ asset('images/bookshelf-svgrepo-com.svg') }}" alt="Course Image" class="cart-img">
                        @endif

                        <div class="card-body">
                            <div>
                                <div class="price">$ {{ $course->price }} <span
                                        style="margin: 1rem;font-size:20px;color:#16A34A;font-weight:600"> 50% Off</span>
                                </div>
                                <button class="btn-cart-primary add-to-cart" data-id="{{ $course->id }}">Add To
                                    Cart</button>
                                <button class="btn-cart-secondary">By Now</button>
                            </div>
                        </div>
                        <div style="width: 100%;padding: 15px; border-top: 1px solid #00000026;height: 121px;">

                            <img src="{{ asset('images/socialIcon.svg') }}" alt="" style="width:304px;height:82px">
                        </div>
                    </div>
                </div>
            </div>

            <div class="container my-5">
                <!-- Tabs -->
                <ul class="nav nav-tabs" id="courseTabs" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="desc-tab" data-bs-toggle="tab" data-bs-target="#desc"
                            type="button" role="tab">Description</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="inst-tab" data-bs-toggle="tab" data-bs-target="#inst" type="button"
                            role="tab">Instructor</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="syllabus-tab" data-bs-toggle="tab" data-bs-target="#syllabus"
                            type="button" role="tab">Syllabus</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="reviews-tab" data-bs-toggle="tab" data-bs-target="#reviews"
                            type="button" role="tab">Reviews</button>
                    </li>
                </ul>

                <!-- Tabs Content -->
                <div class="tab-content p-4 border border-top-0 rounded-bottom" id="courseTabsContent">

                    <!-- Description -->
                    <div class="tab-pane fade show active" id="desc" role="tabpanel" style="width: 700px;">
                        <h5 class="fw-bold mb-3"> Course Description</h5>
                        <p>{{ $course->long_description }}</p>

                        <h6 class="fw-bold">Certification</h6>
                        <p>At Byway, we understand the significance of formal recognition...</p>
                    </div>

                    <!-- Instructor -->
                    <div class="tab-pane fade" id="inst" role="tabpanel" style="width: 700px;">
                        <h5 class="fw-bold">Instructor</h5>
                        <div class="d-flex align-items-center my-3">
                            <div class="mt-2 text-muted instructor-box">
                                <div>
                                    <h6 class="mb-0">
                                        <a href="#" class="text-decoration-none fw-semibold">
                                            {{ $course->instructor->firstName }} {{ $course->instructor->lastName }}
                                        </a>
                                    </h6>
                                    <small class="text-muted">UI/UX Designer</small>
                                </div>

                                <span class="instructor-row">

                                    @if ($course->instructor->avatar)
                                        <img src="{{ asset($course->instructor->avatar) }}"
                                            class="rounded-circle me-3 instructor-avatar-lg" alt="Instructor">
                                    @else
                                        <img src="{{ asset('images/figure-svgrepo-com.svg') }}"
                                            class="rounded-circle me-3 instructor-avatar-lg" alt="Instructor">
                                    @endif


                                    <span class="instructor-stats">
                                        <span class="stat-line">
                                            <i class="fas fa-star text-warning"></i>
                                            {{ $course->average_rating }} Rating
                                        </span>
                                        <span class="stat-line">
                                            <i class="fas fa-user-graduate"></i>
                                            {{ $course->lessons->count() }} Courses
                                        </span>
                                        <span class="stat-line">
                                            <i class="fas fa-clock"></i>
                                            {{ intval($course->total_duration / 60) }} Total Hours
                                        </span>
                                    </span>
                                </span>
                            </div>
                        </div>
                        <p>With over a decade of industry experience, Ronald brings a wealth of practical knowledge...</p>
                    </div>

                    <!-- Syllabus -->
                    <div class="tab-pane fade" id="syllabus" role="tabpanel" style="width: 700px;">
                        <h5 class="fw-bold mb-3">Syllabus</h5>
                        <div class="accordion" id="syllabusAccordion">
                            @foreach ($course->instructor->courses as $instructorCourse)
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingOne">
                                        <button data-id="{{ $instructorCourse->id }}" class="accordion-button"
                                            type="button">
                                            <img src="{{ asset('images/icons/upArrow.svg') }}" alt=""
                                                class="accordion-icon">
                                            {{ $instructorCourse->title }}
                                            <div class="count-lessons">
                                                {{ $instructorCourse->lessons->count() }} Lessons ·
                                                {{ intval($instructorCourse->total_duration / 60) }} hour
                                            </div>
                                        </button>
                                    </h2>
                                    <div class="lessons" data-bs-parent="#syllabusAccordion">
                                        @foreach ($instructorCourse->lessons as $lesson)
                                            <div class="accordion-body">
                                                {{ $lesson->title }} | {{ $lesson->duration_minutes }} minutes
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <!-- Reviews -->
                    <div class="tab-pane fade" id="reviews" role="tabpanel" style="width: 700px;">
                        <div class="container my-5">
                            <div class="row">
                                <!-- Rating Summary -->
                                <div class="col-md-4">
                                    <h5 class="mb-3">Learner Reviews</h5>

                                    <div class="d-flex align-items-center mb-2">
                                        <h4 class="mb-0 me-2 text-warning">
                                            ★ <span class="rating-summary-number">{{ $avg }}</span>
                                        </h4>
                                        <span class="reviews-count">{{ $reviewsCount }} reviews</span>
                                    </div>

                                    @for ($stars = 5; $stars >= 1; $stars--)
                                        @php
                                            $count = $dist[$stars] ?? 0;
                                            $percentage = $reviewsCount ? round(($count / $reviewsCount) * 100) : 0;
                                            $starsText = str_repeat('★', $stars) . str_repeat('☆', 5 - $stars);
                                        @endphp
                                        <div class="mb-2 d-flex align-items-center">
                                            <span class="text-warning me-2 stars-legend">{{ $starsText }}</span>
                                            <span class="ms-2 rating-percentage">{{ $percentage }}%
                                                ({{ $count }})</span>
                                        </div>
                                    @endfor
                                </div>



                                <!-- Reviews -->
                                <div class="col-md-8">
                                    @include('frontend.pages.course.partials.reviews')
                                </div>

                                <div class="reviews-cta">
                                    @if ($reviews->hasMorePages())
                                        <button id="loadMore" data-next-page="{{ $reviews->currentPage() + 1 }}"
                                            data-url="{{ url('courses/' . $course->id . '/reviews') }}"
                                            class="btn btn-outline-primary mt-3 btn-view-more">
                                            View more Reviews
                                        </button>
                                    @endif
                                </div>

                            </div>
                        </div>

                    </div>

                </div>
            </div>

            @include('frontend.pages.home.partials.about-us')

        </div>
    </div>
@endsection

@push('scripts')
    @vite(['resources/js/frontend/course/course.js'])
@endpush
