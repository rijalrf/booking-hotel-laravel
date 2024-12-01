    {{-- Modal --}}
    <x-modal>
        <x-slot:modalTitle>
            <div id="co_title"></div>
        </x-slot:modalTitle>
        <x-slot:modalContent>
            <div id="co_content"></div>
        </x-slot:modalContent>
        <x-slot:modalFooter>
            <div id="co_footer"></div>
        </x-slot:modalFooter>
    </x-modal>

    <div class="card" style="height: 30rem">
        <div class="card-body">
            <h3 class="card-title my-1">
                <i data-feather="log-out"></i>
                Check Out Today
            </h3>
            <hr>
            <div class="table-responsive">
                <table class="table">
                    <tbody>
                        @foreach ($bookingStatus as $booking)
                            <tr class="">
                                <td scope="row">{{ $booking->guest_lastname }}, {{ $booking->guest_firstname }}
                                    <div class="fw-light" style="font-size: 14px">Leaved
                                        {{ \Carbon\Carbon::parse($booking->check_out_date)->format('d M Y') }}
                                    </div>
                                </td>
                                <td>{{ $booking->room->roomNumber }}</td>
                                <td class="text-end">
                                    <button class="btn btn-outline-success" onclick="checkout({{ $booking->id }})"
                                        data-bs-toggle="modal" data-bs-target="#modal">
                                        <i data-feather="log-out" class="icon-sm"></i>
                                        Check Out
                                    </button>
                                </td>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div> {{ $bookingStatus->appends(['checked_out_page' => request('checked_out_page')])->links() }}</div>
            <div>
                @if ($bookingStatus->isEmpty())
                    <x-empty-section />
                @endif
            </div>
        </div>
    </div>

    <script>
        function checkout(id) {
            $.get(`bookings/checkedout_info/${id}`, function(data) {
                // console.log('data', data);

                const booking = data.booking;
                const guestName = `${booking.guest_lastname} ${booking.guest_firstname}`;
                const roomNumber = booking.room.roomNumber;
                const nights = diffDate(booking.check_out_date, booking.check_in_date);
                const roomTotal = nights * booking.room.price;
                const roomServices = data.roomService;

                // Hitung total room service
                const roomServiceTotal = roomServices.reduce((total, service) => total + service.price, 0);

                const grandTotal = roomServiceTotal + roomTotal

                const roomServicesHTML = roomServices.map(service => `
            <div class="d-flex justify-content-between">
                <div>${service.room_service_type.name}</div>
                <div class='fw-bold'>$ ${service.price}</div>
            </div>
        `).join('');

                $('#co_title').html('Check out Information');
                $('#co_content').html(`
            <div>
                <h3>Room ${roomNumber} - ${guestName}</h3>
            </div>
            <div class="mt-4">
                <div class="row">
                    <div class='w-auto'>Checked In On</div>
                    <div class='w-auto'><h5>${booking.check_in_date}</h5></div>
                </div>
                <div class="row">
                    <div class='w-auto'>Checked Out On</div>
                    <div class='w-auto'><h5>${booking.check_out_date}</h5></div>
                    <div class='w-auto fw-bold'>${nights} Night(s)</div>
                </div>
                <div class="d-flex justify-content-between mt-3">
                    <div>Room Total</div>
                    <div class='fw-bold'>$ ${roomTotal}</div>
                </div>
                ${roomServicesHTML}
            </div>
            <div>
                <div class='text-end fw-bold fs-4 mt-3'>
                    Grand Total $ ${grandTotal}
                </div>
            </div>
        `);
                $('#co_footer').html(`
        <form method="post" action="${data.page_meta.url}">
            @csrf
                            @method('POST')
            <button type='submit' class="btn btn-success">
                Confirm Check Out
            </button>
            </form>
        `);
            });
        }
    </script>
