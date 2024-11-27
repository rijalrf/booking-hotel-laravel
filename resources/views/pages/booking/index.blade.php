@php
    if (empty($search)) {
        $search = [
            'query' => '',
            'status' => '',
        ];
    }
@endphp
<x-layout>
    <x-slot:breadcrumb>
        <li class="breadcrumb-item"><a href="{{ route('home.index') }}">
                <i class="icon-sm" data-feather="home"></i>
                Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">
            <i class="icon-sm" data-feather="align-right"></i>
            Booking List
        </li>
    </x-slot:breadcrumb>
    <x-slot:title>
        <span>Booking List</span>
    </x-slot:title>
    <x-slot:action>
        <a href="{{ route('booking.new') }}" class="btn btn-primary"><i class="icon-sm" data-feather="plus"></i>Add
            Booking</a>
    </x-slot:action>
    <div class="my-3">
        <form action="{{ route('booking.search') }}">
            <div class="form-group d-flex gap-3">
                <div class="w-25">
                    <input type="text" class="form-control" id="search" name="guest_lastname"
                        value="{{ $search['query'] ?? '' }}" placeholder="Search by Guest Name">
                </div>
                <div class="w-25">
                    <select class="form-select" name="status">
                        <option @if ($search['status'] == '') selected @endif value="">All</option>
                        <option @if ($search['status'] == 'checked_in') selected @endif value="checked_in">Checked In</option>
                        <option @if ($search['status'] == 'checked_out') selected @endif value="checked_out">Checked Out
                        </option>
                        <option @if ($search['status'] == 'cancelled') selected @endif value="cancelled">Cancelled</option>
                        <option @if ($search['status'] == 'booked') selected @endif value="booked">Booked</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">
                    <i class="icon-sm" data-feather="search"></i>Search</button>
                <a href="{{ route('booking.index') }}" class="btn btn-outline-primary">
                    <i class="icon-sm" data-feather="refresh-cw"></i>Reset</a>
            </div>
        </form>
    </div>
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
