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
                            <td class="text-end"><button class="btn btn-outline-success">
                                    <i data-feather="log-out" class="icon-sm"></i>
                                    Check Out</button>
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
