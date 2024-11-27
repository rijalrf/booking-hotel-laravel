<div class="card" style="height: 450px">
    <div class="card-body">
        <h3 class="card-title my-1">
            @if ($title == 'Check In')
                <i data-feather="log-in"></i>
            @else
                <i data-feather="log-out"></i>
            @endif

            {{ $title }} Today
        </h3>
        <hr>
        <div class="table-responsive">
            <table class="table">
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
                            <td class="text-end"><button class="btn btn-primary btn-sm">{{ $title }}</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div> {{ $bookingStatus->links() }}</div>
    </div>
</div>
