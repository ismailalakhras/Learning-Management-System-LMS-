@extends('backend.layout.master')

@push('css')
    @vite('resources/css/backend/content.css')
@endpush

@section('content')
    <main class="flex-grow-1 p-3">
        <div class="content-page">
            <div class="content-page-header">

                <h2 class="content-page-header-title">Users List</h2>

                <button class="content-page-header-insertBtn">INSERT NEW USER</button>
            </div>

            <div class="table-responsive">
                {{ $dataTable->table(['class' => 'table table-striped table-bordered dt-responsive nowrap']) }}
            </div>


        </div>
    </main>
@endsection

@push('scripts')
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
@endpush
