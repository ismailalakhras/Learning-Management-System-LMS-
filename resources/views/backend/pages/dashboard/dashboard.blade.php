@extends('backend.layout.master')

@section('content')
    @if (auth()->check())
        <div class="container text-center mt-5"
            style="max-width: calc(100vw - 22rem); margin-left : 20rem ;    height: 80vh;
                   padding: 12rem 0; ">
            <h1 class="animate__animated animate__fadeInDown text-secondary fw-bold">
                👋 Welcome back, {{ auth()->user()->name }}!
            </h1>
            <p class="animate__animated animate__fadeInUp text-muted">
                We're happy to see you again 😊
            </p>
        </div>

        </h1>
    @endif
@endsection
