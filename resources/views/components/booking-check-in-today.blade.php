<div class="card" style="height: 30rem">
    <div class="card-body">
        <h3 class="card-title my-1">
            <i data-feather="log-in"></i>
            Check In Today
        </h3>
        <hr>
        <div class="table-responsive">
            <table class="table">
                <tbody>
                    @foreach ($bookingStatus as $booking)
                        <tr class="">
                            <td scope="row">
                                {{ $booking->guest_lastname }}, {{ $booking->guest_firstname }}
                                <div class="fw-light" style="font-size: 14px">Arrived
                                    {{ \Carbon\Carbon::parse($booking->check_in_date)->format('d M Y') }}
                                </div>
                            </td>
                            <td>{{ $booking->room->roomNumber }}</td>
                            <td class="text-end">
                                <form
                                    action="{{ route('booking.setStatus', ['status' => 'checked_in', 'id' => $booking->id, 'stay' => true]) }}"
                                    method="POST">
                                    @csrf
                                    @method('POST')
                                    <button type="submit" class="btn btn-outline-primary">
                                        <i data-feather="log-in" class="icon-sm"></i>
                                        Check In
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div> {{ $bookingStatus->links() }}</div>
        <div>
            @if ($bookingStatus->isEmpty())
                <x-empty-section />
            @endif
        </div>
    </div>
</div>
