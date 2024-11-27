<x-layout-base>
    <x-navbar></x-navbar>
    <main id="main">
        <div>
            <img class="w-100" src="{{ asset('img/room_banner1.jpg') }}" alt="">
        </div>
        <div class="mt-3">
            {{ $slot ?? '' }}
        </div>
    </main>
</x-layout-base>
