<header class="header" style="position: sticky ; top:0; z-index:200000">
    <div class="header-left">
        <div class="logo">
            <img src="{{ asset('images/icons/logo.svg') }}" alt="Byway">
            <a style="text-decoration: none; color:#334155" href="{{ route('home') }}">Byway</a>
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
        <div class="header-right" style="position: relative">

            {{-- fav icon --}}
            <a href="#" class="cart">
                <img src="{{ asset('images/icons/heart.svg') }}" alt="">
                <span id="cart-icon"></span>
            </a>

            {{-- cart icon --}}
            <a href="{{ route('cart.index') }}" class="cart">
                <img src="{{ asset('images/icons/cart.svg') }}" alt="">
                <span class="cart-count"
                    style="    width: 20px; height: 20px; position: absolute; background: red; display: flex; align-items: center; justify-content: center; border-radius: 50%; color: #ffffff; top: 6px; right: 105px; font-size: 13px;">
                    {{ Auth::check() ? \App\Models\ShoppingCart::where('user_id', Auth::id())->count() : 0 }}
                </span>
            </a>





            {{-- notification icon --}}
            <a href="#" class="cart">
                <img src="{{ asset('images/icons/notifaction.svg') }}" alt="">
            </a>


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
            <a href="{{ route('cart.index') }}" class="cart"><img src="{{ asset('images/icons/cart.svg') }}"
                    alt=""></a>
            <button class="btn-outline" style="color: #334155"
                onclick="window.location.href='{{ route('login') }}'">Log
                In</button>
            <button class="btn-dark" onclick="window.location.href='{{ route('register') }}'">Sign Up</button>
        </div>
    @endif








</header>
