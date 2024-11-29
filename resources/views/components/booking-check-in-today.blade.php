<div class="card" style="height: 450px">
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
                            <td scope="row">{{ $booking->guest_lastname }}, {{ $booking->guest_firstname }}</td>
                            <td> {{ $booking->check_out_date }}</td>
                            <td>{{ $booking->room->roomNumber }}</td>
                            <td class="text-end"><button class="btn btn-primary btn-sm">Check Out</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div> {{ $bookingStatus->links() }}</div>
    </div>
</div>
