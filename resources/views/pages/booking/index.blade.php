<x-layout>
    <x-slot:breadcrumb>
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Booking List</li>
    </x-slot:breadcrumb>
    <x-slot:title>
        Booking List
    </x-slot:title>
    <x-slot:action>
        <a href="{{ route('booking.new') }}" class="btn btn-primary"><i data-feather="plus"></i>Add Booking</a>
    </x-slot:action>
    <div class="card">
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>Guest Name</th>
                        <th>Check-In Date</th>
                        <th>Check-Out Date</th>
                        <th>Adult Capacity</th>
                        <th>Children Capacity</th>
                        <th>Room Number</th>
                        <th>Status</th>
                        <th class="text-end">#</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($bookings as $booking)
                        <tr>
                            <td>

                                {{ $booking->guest_firstname }},
                                {{ $booking->guest_lastname }}
                            </td>
                            <td>{{ \Carbon\Carbon::parse($booking->check_in_date)->format('d M Y') }}</td>
                            <td>{{ \Carbon\Carbon::parse($booking->check_out_date)->format('d M Y') }}</td>
                            <td>{{ $booking->adult_capacity }}</td>
                            <td>{{ $booking->children_capacity }}</td>
                            <td>{{ $booking->room->roomNumber }}</td>
                            <td><x-tags :status="$booking->status"></x-tags></td>
                            <td class="text-end">
                                <a href="{{ route('booking.detail', $booking->id) }}">
                                    <i data-feather="arrow-right"></i>
                                </a>
                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div>
                {{ $bookings->links() }}
            </div>
            @if ($bookings->isEmpty())
                <x-emptysection></x-emptysection>
            @endif

        </div>
    </div>
</x-layout>
