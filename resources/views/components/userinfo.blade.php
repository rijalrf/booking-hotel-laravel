@php
    $user = Auth::user();
@endphp
<div id="user-info" class="d-flex flex-row align-items-center gap-1">


    <!-- User Details -->
    <div class="d-flex flex-column align-items-end cursor-pointer">
        <div class="dropdown-center text-center">
            <div class="dropdown dropdown-toggle" data-bs-toggle="dropdown">
                <h6 class="mb-0">{{ $user->name }}</h6>
                <small class="text-muted">{{ $user->email }}</small>
            </div>
            <ul class="dropdown-menu">
                <li>
                    <a class="dropdown-item" href="#">
                        <i data-feather="user" class="icon-sm"></i>
                        Profile
                    </a>
                </li>
                <li>
                    <form action="{{ route('auth.logout') }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn">
                            <i data-feather="log-out" class="icon-sm"></i>
                            Logout
                        </button>
                    </form>
                </li>
            </ul>
        </div>

    </div>

    {{-- <div class="p-2">
        <div class="rounded-circle border border-white">
            <i data-feather="user" class="icon-l stroke-width-sm"></i>
        </div>
    </div> --}}
    <!-- Profile Image -->
    <img src="{{ asset('img/user-nophoto.png') }}" alt="User Profile" class="rounded-circle me-3 border-2"
        width="30" height="30">
    <!-- Logout Button -->
    {{-- <div>
        <form action="{{ route('auth.logout') }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn">
                <i data-feather="log-out" class="text-primary"></i>
            </button>
        </form>
    </div> --}}

</div>
