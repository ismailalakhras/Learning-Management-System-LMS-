<header class="header" style="position: sticky ; top:0; z-index:200000">
    <div class="header-left">
        <div class="logo">
            <img src="{{ asset('images/icons/logo.svg') }}" alt="Byway">
            <span>Byway</span>
        </div>
        <nav>
            <a href="{{ route('home') }}">Categories</a>

        </nav>
    </div>

    <div class="header-search">
        <i class="fas fa-search"></i>
        <input type="text" placeholder="Search courses">
    </div>

    <a class="teachOnByway" href="#">Teach on Byway</a>


    @if (auth()->check())
        <div class="header-right">
            <a href="#" class="cart"><img src="{{ asset('images/icons/heart.svg') }}" alt=""></a>
            <a href="#" class="cart"><img src="{{ asset('images/icons/cart.svg') }}" alt=""></a>
            <a href="#" class="cart"><img src="{{ asset('images/icons/notifaction.svg') }}" alt=""></a>
            <div id="profileIcon">
                {{ substr(auth()->user()->firstName, 0, 1) }}
            </div>
            <ul class="list-group" id="list-group">
                <li class="list-group-item">
                    <a href="#" class="text-decoration-none text-dark">My Profile</a>
                </li>
                <form id="logoutForm" action="{{ route('logout') }}" method="POST">
                    @csrf
                    <li class="list-group-item"
                        onclick="event.preventDefault(); document.getElementById('logoutForm').submit();">
                        <a href="#" class="text-decoration-none text-dark">
                            Logout
                        </a>
                    </li>
                </form>
            </ul>


        </div>
    @else
        <div class="header-right">
            <a href="#" class="cart"><img src="{{ asset('images/icons/cart.svg') }}" alt=""></a>
            <button class="btn-outline" style="color: #334155" onclick="window.location.href='{{ route('login') }}'">Log
                In</button>
            <button class="btn-dark" onclick="window.location.href='{{ route('register') }}'">Sign Up</button>
        </div>
    @endif








</header>
