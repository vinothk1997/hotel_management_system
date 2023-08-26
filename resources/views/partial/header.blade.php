<header>
    <div class="header-container">
        <nav class="header-nav-bar">
            <div class="header-nav-logo">
                {{-- <a href="/"> --}}
                    <p class="h1">RJ Mahaal Hotel</p>
                    {{-- <img src="https://res.cloudinary.com/joshuafolorunsho/image/upload/v1591615159/star_hotels_logo.png"
                        alt="star hotels logo"> --}}
                {{-- </a> --}}
            </div>
            <ul class="header-nav-lists">
                <li class="header-nav-list">
                    <a class="header-nav-link" href="{{route('guest.index')}}">Home</a>
                </li>
                <li class="header-nav-list">
                    <a class="header-nav-link" href="{{route('guest.rooms-and-suites')}}"
                        >Rooms and Suites</a
                    >
                </li>
                <li class="header-nav-list">
                    <a class="header-nav-link" href="{{route('guest.facilities')}}">Facilities</a>
                </li>
                <li class="header-nav-list">
                    <a class="header-nav-link header-active" href="{{route('guest.contact')}}"
                    >Contact Us</a
                    >
                </li>
                <li class="header-nav-list">
                    <a class="nav-link" href="{{route('customer.create')}}"
                        >Register</a
                    >
                </li>
                <li class="header-nav-list">
                    <a class="nav-link" href="{{route('auth.index')}}"
                        >Login</a
                    >
                </li>
                <li class="header-nav-list">
                    <a class="header-btn header-btn-custom" href="{{route('auth.index')}}">BOOK NOW</a>
                </li>
            </ul>

            <div class="header-hamburger-icon">
                <div class="header-hamburger-line-1"></div>
                <div class="header-hamburger-line-2"></div>
                <div class="header-hamburger-line-3"></div>
            </div>
        </nav>
    </div>
</header>