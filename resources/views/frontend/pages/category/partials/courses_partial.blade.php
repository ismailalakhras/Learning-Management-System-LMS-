<div class="grid">
    @foreach ($courses as $course)
        <div class="card card-course-click" data-id="{{ $course->id }}">
            @if ($course->thumbnail)
                <img src="{{ asset($course->thumbnail) }}" style="width:100%; height:200px; object-fit:cover; alt="">
            @else
                <img src="{{ asset('images/bookshelf-svgrepo-com.svg') }}"
                    style="width:100%; height:200px; object-fit:cover;" alt="">
            @endif

            <div class="card-body">
                <div>
                    <h4>{{ $course->title }}</h4>
                    <p>by {{ $course->instructor->firstName }}</p>
                    <div style="position: relative; display: inline-block; font-size: 18px; line-height: 1;">
                        <div
                            style="position: absolute; top: 0; left: 0; color: gold; overflow: hidden; white-space: nowrap; width: {{ $course->average_rating * 20 }}%">
                            ★★★★★
                        </div>
                        <div style="color: #ccc;">
                            ★★★★★
                        </div>
                    </div>
                    <span style="color:#666; margin-left: 5px;">({{ $course->average_rating }} reviews)</span>

                    <p>{{ $course->total_duration }} Total Minutes. {{ $course->lessons->count() }} Lectures. Beginner
                    </p>
                </div>
                <div class="price">$ {{ $course->price }}</div>
            </div>
        </div>
    @endforeach
</div>

<div class="d-flex justify-content-center mt-4" id="pagination-links">
    {{ $courses->links('pagination::bootstrap-5') }}
</div>
