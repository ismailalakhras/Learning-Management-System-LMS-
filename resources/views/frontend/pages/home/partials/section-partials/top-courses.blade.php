@foreach ($courses as $course)
    <div class="card card-course-click" data-id="{{ $course->id }}">


        @if ($course->thumbnail)
            <img src="{{ asset($course->thumbnail) }}" alt="">
        @else
            <img src="{{ asset('images/bookshelf-svgrepo-com.svg') }}" alt="">
        @endif


        <div class="card-body">
            <div>
                <h4>{{ $course->title }}</h4>
                <p>by {{ $course->instructor->firstName }}</p>

                <div class="star-rating">
                    <div class="star-rating-filled" style="width: {{ $course->average_rating * 20 }}%">
                        ★★★★★
                    </div>
                    <div class="star-rating-empty">
                        ★★★★★
                    </div>
                </div>
                <span class="review-text">({{ $course->average_rating }} reviews)</span>

                <p>
                    {{ $course->total_duration }} Total Minutes.
                    {{ $course->lessons->count() }} Lectures. Beginner
                </p>
            </div>
            <div class="price">$ {{ $course->price }}</div>
        </div>
    </div>
@endforeach
