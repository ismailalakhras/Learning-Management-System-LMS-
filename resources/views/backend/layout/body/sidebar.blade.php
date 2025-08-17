

<div class="d-flex flex-column flex-shrink-0 p-3 bg-dark text-white" style="width: 20rem; height: 100vh;position: fixed;
    top: 4.8rem;
    left: 0; " id="sidebar">
  

    <ul class="nav nav-pills flex-column mb-auto sidebar-nav">
        <li class="nav-item">
            <a href="{{ route('admin.dashboard') }}" class="nav-link text-white active" data-page="dashboard">
                <i class="fas fa-tachometer-alt me-2"></i>
                Dashboard
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('admin.user.index') }}" class="nav-link text-white" data-page="user">
                <i class="fas fa-users me-2"></i>
                Users
            </a>
        </li>
    </ul>
</div>
