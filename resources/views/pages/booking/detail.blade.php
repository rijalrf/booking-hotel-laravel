<x-layout>
    <x-slot:breadcrumb>
        <li class="breadcrumb-item"><a href="{{ route('home.index') }}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{ route('booking.index') }}">Booking List</a></li>
        <li class="breadcrumb-item active" aria-current="page">Add New Booking</li>
    </x-slot:breadcrumb>
    <x-slot:title>

        {{ $page_meta['title'] }}
    </x-slot:title>
    <div class="card w-50">
        <div class="card-body">
            <form action="{{ $page_meta['url'] }}" method="POST">
                @csrf
                @method('POST')
                <div class="mb-3">
                    <label for="guest_lastname" class="form-label">Guest Last Name</label>
                    <input type="text" name="guest_lastname" class="form-control" id="guest_lastname"
                        @if ($booking->status != '') disabled @endif
                        value="{{ old('guest_lastname', $booking->guest_lastname) }} ">
                    @error('guest_lastname')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="guest_firstname" class="form-label">Guest First Name</label>
                    <input type="text" name="guest_firstname" class="form-control" id="guest_firstname"
                        @if ($booking->status != '') disabled @endif
                        value="{{ old('guest_firstname', $booking->guest_firstname) }}">
                    @error('guest_firstname')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="check_in_date" class="form-label">Check-In Date</label>
                    <input type="date" name="check_in_date" class="form-control" id="check_in_date"
                        @if ($booking->status != '') disabled @endif
                        value="{{ old('check_in_date', $booking->check_in_date) }}">
                    @error('check_in_date')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="check_out_date" class="form-label">Check-Out Date</label>
                    <input type="date" name="check_out_date" class="form-control" id="check_out_date"
                        @if ($booking->status != '') disabled @endif
                        value="{{ old('check_out_date', $booking->check_out_date) }}">
                    @error('check_out_date')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="adult_capacity" class="form-label">Adult Capacity</label>
                    <input type="number" name="adult_capacity" class="form-control" id="adult_capacity"
                        @if ($booking->status != '') disabled @endif
                        value="{{ old('adult_capacity', $booking->adult_capacity) }}">
                    @error('adult_capacity')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="children_capacity" class="form-label">Children Capacity</label>
                    <input type="number" name="children_capacity" class="form-control" id="children_capacity"
                        @if ($booking->status != '') disabled @endif
                        value="{{ old('children_capacity', $booking->children_capacity) }}">
                    @error('children_capacity')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="room_number" class="form-label">Room Number</label>
                    <input type="number" name="room_number" class="form-control" id="room_number" disabled
                        value="{{ $booking->room->roomNumber ?? ($availableRooms->room_number ?? '') }}">

                    <input type="hidden" name="room_id" class="form-control" id="room_id"
                        value="{{ $booking->room->id ?? ($availableRooms->room_id ?? '') }}">
                    <input type="hidden" name="created_by" value="{{ auth()->user()->id }}">
                </div>
                @if ($booking->status == '')
                    <div class="w-50">
                        <button class="btn btn-primary"
                            type="submit">{{ isset($availableRooms) ? 'Book Room' : 'Find Rooms' }}
                        </button>
                    </div>
                @endif
            </form>
            @if ($booking->status == 'booked')
                <div class="gap-3 d-flex">
                    <form action="{{ route('booking.setStatus', ['status' => 'checked_in', 'id' => $booking->id]) }}"
                        method="POST">
                        @csrf
                        @method('POST')
                        <button type="submit" class="btn btn-success">Check In</button>
                    </form>
                    <form action="{{ route('booking.setStatus', ['status' => 'cancelled', 'id' => $booking->id]) }}"
                        method="POST">
                        @csrf
                        @method('POST')
                        <button type="submit" class="btn btn-secondary">Canceled</button>
                    </form>
                </div>
            @endif
            @if ($booking->status == 'checked_in')
                <div class="w-50">
                    <form action="{{ route('booking.setStatus', ['status' => 'checked_out', 'id' => $booking->id]) }}"
                        method="POST">
                        @csrf
                        @method('POST')
                        <button type="submit" class="btn btn-danger">Check Out</button>
                    </form>
                </div>
            @endif
        </div>
    </div>
</x-layout>
