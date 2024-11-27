<div id="user-info" class="d-flex flex-row align-items-center gap-1">
    <!-- Profile Image -->
    {{-- <img src="{{ asset('img/user-nophoto.png') }}" alt="User Profile" class="rounded-circle me-3 border-2" width="30"
        height="30"> --}}
    @php
        $user = Auth::user();
    @endphp
    <!-- User Details -->
    <div class="flex-grow-1 lh-1 justify-content-end">
        <h6 class="mb-0">{{ $user->name }}</h6>
        <small class="text-muted">{{ $user->email }}</small>
    </div>

    <!-- Logout Button -->
    <div class="p-1">
        <form action="{{ route('auth.logout') }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn"><i data-feather="log-out" class="text-primary"></i></button>
        </form>
    </div>
</div>
