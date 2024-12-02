<div>
    <div>
        <div>{{ $booking-> }}</div>
    </div>
    <div>
        <div>
            <h3>Room ${roomNumber} - ${guestName}</h3>
        </div>
        <div class="mt-4">
            <div class="row">
                <div class='w-auto'>Checked In On</div>
                <div class='w-auto'>
                    <h5>${booking.check_in_date}</h5>
                </div>
            </div>
            <div class="row">
                <div class='w-auto'>Checked Out On</div>
                <div class='w-auto'>
                    <h5>${booking.check_out_date}</h5>
                </div>
                <div class='w-auto fw-bold'>${nights} Night(s)</div>
            </div>
            <div class="d-flex justify-content-between mt-3">
                <div>Room Total</div>
                <div class='fw-bold'>$ ${roomTotal}</div>
            </div>
            ${roomServicesHTML}
        </div>
        <div>
            <div class='text-end fw-bold fs-4 mt-5'>
                Grand Total $ ${grandTotal}
            </div>
        </div>
    </div>
    <div>
        <div id="list_service"></div>
    </div>
</div>
