<x-layout-home>
    <main class="main-content" id="main">
        <div class="container">
            <div class="row">
                <div class="col">
                    <x-booking-status :bookingStatus="$checkedOutBookings" :title="'Check Out'" />
                </div>
                <div class="col">
                    <x-booking-status :bookingStatus="$checkedInBookings" :title="'Check In'" />
                </div>
            </div>
        </div>
    </main>
</x-layout-home>
