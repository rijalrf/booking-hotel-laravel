<div class="card" style="height: 300px">
    <div class="card-body">
        <h3 class="card-title my-2">

            @if ($title == 'Check In')
                <i data-feather="log-in"></i>
            @else
                <i data-feather="log-out"></i>
            @endif

            {{ $title }} Today
        </h3>
        <div class="table-responsive">
            <table class="table">

                <thead>
                    <tr>
                        <th scope="col">Guest Name</th>
                        <th scope="col">{{ $title }} Date</th>
                        <th scope="col">Room</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($bookingStatus as $booking)
                        <tr class="">
                            <td scope="row">{{ $booking->guest_lastname }}, {{ $booking->guest_firstname }}</td>
                            @if ($title == 'Check In')
                                <td> {{ $booking->check_in_date }}</td>
                            @endif
                            @if ($title == 'Check Out')
                                <td> {{ $booking->check_out_date }}</td>
                            @endif
                            <td>{{ $booking->room->roomNumber }}</td>
                            <th><button class="btn btn-primary">{{ $title }}</button></th>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
</div>
