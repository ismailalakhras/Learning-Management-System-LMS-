<section class="categories">
    <div class="category-header">
        <h2>Top Categories</h2>
        <a href="{{ route('categories.all') }}" class="see-all">See All</a>
    </div>
    <div class="category-grid">
        @if ($categories->isNotEmpty())
            @foreach ($categories as $category)
                <div data-id="{{ $category->id }}" class="category category-card-click">
                    <div class="icon">
                        @if ($category->image)
                            <img src="{{ asset($category->image) }}" alt="">
                        @else
                            <img src="{{ asset('images/icons/briefcase-02.svg') }}" alt="">
                        @endif
                    </div>
                    <div class="category-name">{{ $category->title }}</div>
                    <div class="count">{{ $category->number_of_courses }} course</div>
                </div>
            @endforeach
        @endif
    </div>
</section>
