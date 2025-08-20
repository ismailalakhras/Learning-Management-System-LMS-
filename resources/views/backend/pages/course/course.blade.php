@extends('backend.layout.master')

@push('css')
    @vite(['resources\css\backend\courses.css'])
@endpush

@section('content')

    <div class="seller-courses">
        <div class="frame-3" >
            <div class="frame-4">
                <div class="lable-3">Courses</div>
                <div class="frame-5">
                    <button class="button">
                        <div class="label">Add Course</div>
                    </button>
                    <img class="img" src="https://c.animaapp.com/meilzjuc7hm2I8/img/icon-horizontal-dots.svg" />
                </div>
            </div>
            {{-- course pagination --}}
            <div class="frame-6" id="courses-container" >
                @include('backend.pages.course.course_partials')

            </div>
            {{-- end course pagination --}}


        </div>
    </div>
@endsection
