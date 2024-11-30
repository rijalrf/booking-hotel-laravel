@php
    $user = Auth::user();
@endphp
<div id="user-info" class="d-flex flex-row align-items-center gap-1">

    <!-- Profile Image -->
    {{-- <img src="{{ asset('img/user-nophoto.png') }}" alt="User Profile" class="rounded-circle me-3 border-2" width="30"
        height="30"> --}}
    <!-- User Details -->
    <div class="d-flex flex-column align-items-end">
        <h6 class="mb-0">{{ $user->name }}</h6>
        <small class="text-muted">{{ $user->email }}</small>
    </div>
    {{-- <div class="p-2">
        <div class="rounded-circle border border-white">
            <i data-feather="user" class="icon-l stroke-width-sm"></i>
        </div>
    </div> --}}

    <!-- Logout Button -->
    <div>
        <form action="{{ route('auth.logout') }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn">
                <i data-feather="log-out" class="text-primary"></i>
            </button>
        </form>
    </div>

</div>
