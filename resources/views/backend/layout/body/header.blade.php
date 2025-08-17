<header class="main-header">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm px-3 ">
        <a class="navbar-brand me-auto" href="#" >
            <span class="brand-highlight">A</span>dmin Panel
        </a>

        <form class="d-none d-md-flex ms-auto me-3">
            <input class="form-control form-control-sm bg-light border-0 rounded-pill px-3" type="search" placeholder="Search..." aria-label="Search">
        </form>

        <ul class="navbar-nav align-items-center">
            <li class="nav-item dropdown me-3">
                <a class="nav-link position-relative" href="#" role="button" data-bs-toggle="dropdown">
                    <i class="fas fa-bell"></i>
                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                        3
                    </span>
                </a>
                <ul class="dropdown-menu dropdown-menu-end">
                    <li><a class="dropdown-item" href="#">New user registered</a></li>
                    <li><a class="dropdown-item" href="#">Server down alert</a></li>
                    <li><a class="dropdown-item" href="#">New order received</a></li>
                </ul>
            </li>

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown">
                    <img src="{{ asset('images/1754571198.png') }}" class="rounded-circle me-2" width="32" height="32" alt="User Avatar">
                    <span class="d-none d-md-inline">{{ auth()->user()->name }}</span>
                </a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                    <li><a class="dropdown-item" href="#">Profile</a></li>
                    <li><a class="dropdown-item" href="#">Settings</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="#">Logout</a></li>
                </ul>
            </li>
        </ul>
    </nav>
</header>
