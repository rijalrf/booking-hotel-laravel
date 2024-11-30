<x-layout-base>
    <x-navbar />
    <div style="height: 460px; overflow:hidden" class="mb-4">
        <img class="w-100" src="{{ asset('img/room_banner1.jpg') }}" alt="">

    </div>
    <main class="main-content" id="main">

        <div class="container">
            <div class="row">
                <div class="col">
                    <x-booking-check-out-today :bookingStatus="$checkedOutBookings" />
                </div>
                <div class="col">
                    <x-booking-check-in-today :bookingStatus="$checkedInBookings" />
                </div>
            </div>
            <div class="row mt-4">
                <div class="col">
                    <x-booking-status :bookingStatus="$checkedOutBookings" :title="'Check Out'" />
                </div>
                <div class="col">
                    <x-room-services :roomServices="$roomServices" :bookingSelected="$bookings ?? []" />
                </div>
            </div>
        </div>
        </div>
    </main>
</x-layout-base>
