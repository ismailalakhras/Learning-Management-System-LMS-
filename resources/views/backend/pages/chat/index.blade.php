@extends('backend.layout.master')

@section('content')
    <!-- Chat Page -->
    <div class="page-content" id="chat-page">
        <div class="container-fluid">
            <div class="row mb-4">
                <div class="col-12">
                    <h1 class="h3 mb-0">Customer Chat</h1>
                    <p class="text-muted">Communicate with your customers</p>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4">
                    <div class="card border-0 shadow-sm">
                        <div class="card-header bg-white border-0">
                            <h5 class="card-title mb-0">Conversations</h5>
                        </div>
                        <div class="card-body p-0">
                            <div class="list-group list-group-flush">
                                <a href="#" class="list-group-item list-group-item-action active">
                                    <div class="d-flex align-items-center">
                                        <img src="{{ asset('images/1754571198.png') }}" class="rounded-circle me-3 avatar"
                                            alt="Avatar">
                                        <div class="flex-grow-1">
                                            <h6 class="mb-1">John Doe</h6>
                                            <p class="mb-0 text-muted small">Hello, I need help with my order...
                                            </p>
                                        </div>
                                        <small class="text-muted">2m</small>
                                    </div>
                                </a>
                                <a href="#" class="list-group-item list-group-item-action">
                                    <div class="d-flex align-items-center">
                                        <img src="{{ asset('images/1754571198.png') }}" class="rounded-circle me-3 avatar"
                                            alt="Avatar">
                                        <div class="flex-grow-1">
                                            <h6 class="mb-1">Jane Smith</h6>
                                            <p class="mb-0 text-muted small">When will my product be shipped?</p>
                                        </div>
                                        <small class="text-muted">1h</small>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-8">
                    <div class="card border-0 shadow-sm">
                        <div class="card-header bg-white border-0">
                            <div class="d-flex align-items-center">
                                <img src="{{ asset('images/1754571198.png') }}" class="rounded-circle me-3 avatar"
                                    alt="Avatar">
                                <div>
                                    <h6 class="mb-0">John Doe</h6>
                                    <small class="text-success">Online</small>
                                </div>
                            </div>
                        </div>
                        <div class="card-body chat-messages" style="height: 400px; overflow-y: auto;">
                            <div class="d-flex mb-3">
                                <img src="{{ asset('images/1754571198.png') }}" class="rounded-circle me-2 avatar"
                                    alt="Avatar">
                                <div class="flex-grow-1">
                                    <div class="bg-light rounded p-2">
                                        <p class="mb-0">Hello, I need help with my order #ORD-001</p>
                                    </div>
                                    <small class="text-muted">2 minutes ago</small>
                                </div>
                            </div>

                            <div class="d-flex mb-3 justify-content-end">
                                <div class="flex-grow-1 text-end">
                                    <div class="bg-primary text-white rounded p-2 d-inline-block">
                                        <p class="mb-0">Hi John! I'd be happy to help you with your order. Let me
                                            check the status for you.</p>
                                    </div>
                                    <div><small class="text-muted">1 minute ago</small></div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer bg-white border-0">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Type your message...">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-paper-plane"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
