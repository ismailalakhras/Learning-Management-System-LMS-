<section class="courses">
    <div class="course-header">
        <h2>Top Courses</h2>

        @if ($courses->hasMorePages())
            <button id="loadMoreCourses" 
                data-next-page="{{ $courses->currentPage() + 1 }}"
                data-url="{{ url('/courses') }}" 
                class="btn see-all-btn">
                See all
            </button>
        @endif
    </div>

    <div class="course-grid" id="coursesContainer">
        @include('frontend.pages.home.partials.section-partials.top-courses')
    </div>

    @if ($courses->hasMorePages())
        <button id="loadMoreCourses"  
            data-next-page="{{ $courses->currentPage() + 1 }}" 
            data-url="{{ url('/courses') }}"
            class="btn loadMoreCourses-secondBtn">
            Show more ...
        </button>
    @endif
</section>
    