<div class="card">
    <div class="card-body">
        <h3 class="card-title my-1">
            <i data-feather="gift" class="icon-m"></i>
            Room service
        </h3>
        <hr>
        <form action="{{ route('roomService.create') }}" method="POST">
            @csrf
            @method('POST')
            <div class="mb-3">
                <div class="row">
                    <label for="room_number" class="form-label">Room Number</label>
                    <div class="col-6">

                        <input type="text" class="form-control" name="room_number" id="room-number"
                            aria-describedby="helpId" placeholder="Room Number" />
                    </div>
                    <div class="col-6">
                        <span id="guest_name">Type room number</span>
                        <input type="hidden" name="booking_id" id="booking_id">
                    </div>
                </div>
            </div>
            <div class="mt-3">
                <label for="room-service" class="form-label">Room Service</label>
                <select class="form-select cursor-pointer" name="room_service_type_id" id="roomservice">
                    @foreach ($roomServices as $roomService)
                        <option value="{{ $roomService->id }}">{{ $roomService->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mt-3">
                <label for="price" class="form-label">Price</label>
                <input type="number" class="form-control" id="price" name="price"
                    placeholder="price of service" />
            </div>
            <div class="mt-3">
                <button type="submit" class="btn btn-outline-primary">
                    <i data-feather="send" class="icon-sm"></i>
                    Request
                </button>
            </div>
        </form>
    </div>
</div>

<script>
    $(document).ready(function() {

        $('#room-number').keyup(function() {
            var roomNumber = $(this).val();

            $.get('{{ route('room.searchBooking') }}', {
                room_number: roomNumber
            }, function(data) {
                console.log(data);
                if (data.booking === null) {
                    $('#guest_name').html('Type room number')
                } else {
                    $('#guest_name').html(data.booking.guest_lastname + ', ' + data.booking
                        .guest_firstname);
                    $('#booking_id').val(data.booking.id);
                }

            }).fail(function(data) {
                console.log(data);
            })

        });
    })
</script>
