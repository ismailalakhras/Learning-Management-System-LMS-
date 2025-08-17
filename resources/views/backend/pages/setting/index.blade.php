@extends('backend.layout.master')

@section('content')
        <div class="page-content" id="settings-page">
            <div class="container-fluid">
                <div class="row mb-4">
                    <div class="col-12">
                        <h1 class="h3 mb-0">Settings</h1>
                        <p class="text-muted">Configure your dashboard preferences</p>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-6">
                        <div class="card border-0 shadow-sm mb-4">
                            <div class="card-header bg-white border-0">
                                <h5 class="card-title mb-0">General Settings</h5>
                            </div>
                            <div class="card-body">
                                <form>
                                    <div class="mb-3">
                                        <label for="siteName" class="form-label">Site Name</label>
                                        <input type="text" class="form-control" id="siteName"
                                            value="Admin Dashboard">
                                    </div>
                                    <div class="mb-3">
                                        <label for="siteDescription" class="form-label">Description</label>
                                        <textarea class="form-control" id="siteDescription" rows="3">Professional admin dashboard for managing your business</textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label for="timezone" class="form-label">Timezone</label>
                                        <select class="form-select" id="timezone">
                                            <option>UTC</option>
                                            <option>America/New_York</option>
                                            <option>Europe/London</option>
                                            <option>Asia/Tokyo</option>
                                        </select>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Save Changes</button>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="card border-0 shadow-sm mb-4">
                            <div class="card-header bg-white border-0">
                                <h5 class="card-title mb-0">Appearance</h5>
                            </div>
                            <div class="card-body">
                                <div class="mb-3">
                                    <label class="form-label">Theme</label>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="theme"
                                            id="lightTheme" checked>
                                        <label class="form-check-label" for="lightTheme">
                                            Light Theme
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="theme"
                                            id="darkTheme">
                                        <label class="form-check-label" for="darkTheme">
                                            Dark Theme
                                        </label>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" id="sidebarCollapsed">
                                        <label class="form-check-label" for="sidebarCollapsed">
                                            Collapse sidebar by default
                                        </label>
                                    </div>
                                </div>
                                <button type="button" class="btn btn-primary">Apply Settings</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
