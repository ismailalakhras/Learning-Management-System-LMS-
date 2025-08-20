@extends('backend.layout.master')

@push('css')
    @vite(['resources\css\backend\course_show.css'])
@endpush

@section('content')
    <div class="seller-course">

        <div class="frame-2">
            <div class="frame-3">
                <p class="text-wrapper-2">Reviews Of {{ $course->title }} </p>
                <img class="img-2" src="https://c.animaapp.com/meiu9pz58PCSh9/img/icon-horizontal-dots.svg" />
            </div>
            <div class="backend-tabs">


                <div class="orders-wrapper">
                    <div class="orders-2" onclick="window.location='{{ route('admin.course.show', $course->id) }}'"
                        style="cursor: pointer">Students
                    </div>
                </div>


                <div class="orders-wrapper" style="border-bottom:3px solid #3B82F6;color:#3B82F6;padding-bottom:8px">
                    <div class="orders-2" onclick="window.location='{{ route('admin.course.reviews', $course->id) }}'"
                        style="cursor: pointer ; ">Reviews</div>
                </div>

                <div class="orders-wrapper">
                    <div class="orders-2">Chapters</div>
                </div>

                <div class="orders-wrapper">
                    <div class="orders-2">Detail</div>
                </div>
                <div class="orders-wrapper">
                    <div class="orders-2">Settings</div>
                </div>
            </div>
       

            <div class="table-responsive" style="width:100%; max-width:1100px;height:100vh; margin:auto; over-flow:auto">
                {{ $dataTable->table(['class' => 'table   dt-responsive nowrap course-table ', 'style' => 'width:100%']) }}
            </div>


        </div>

    </div>
@endsection


@push('scripts')
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
@endpush
