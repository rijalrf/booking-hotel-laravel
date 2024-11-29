<nav id="navbar" class="navbar navbar-expand-lg fixed-top  bg-white dark:bg-dark shadow-sm">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">
            <x-app-title />
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link {{ request()->path() == '/' ? 'active' : '' }}" aria-current="page"
                        href="{{ route('home.index') }}">
                        <i class="icon-sm" data-feather="home"></i>
                        Home</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle {{ request()->path() == 'bookings' ? 'active' : '' }}"
                        href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="icon-sm" data-feather="book"></i>
                        Booking
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ route('booking.new') }}">
                                <i class="icon-sm" data-feather="plus"></i>
                                New Booking</a></li>
                        <li><a class="dropdown-item" href="{{ route('booking.index') }}">
                                <i class="icon-sm" data-feather="align-right"></i>
                                Booking List</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle {{ request()->path() == 'rooms' ? 'active' : '' }}"
                        href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="icon-sm" data-feather="umbrella"></i>
                        Room
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ route('room.add') }}">
                                <i class="icon-sm" data-feather="plus"></i>
                                New Room</a></li>
                        <li>
                            <a class="dropdown-item" href="{{ route('room.index') }}">
                                <i class="icon-sm" data-feather="align-right"></i>
                                Room List
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="{{ route('room.index') }}">
                                <i class="icon-sm" data-feather="tag"></i>
                                Room Amenity
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="{{ route('roomServiceType.index') }}">
                                <i class="icon-sm" data-feather="gift"></i>
                                Room Service Type
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
            {{-- Theme --}}
            <div class="me-xl-3">
                <x-theme />
            </div>
            <div role="userInfo">
                <x-userinfo />
            </div>
        </div>
    </div>
</nav>
