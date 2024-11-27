<x-layout>
    <x-slot:breadcrumb>
        <li class="breadcrumb-item"><a href="{{ route('home.index') }}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{ route('room.index') }}">Room List</a></li>
        <li class="breadcrumb-item active" aria-current="page">New Room</li>
    </x-slot:breadcrumb>
    <x-slot:title>
        Add New Room
    </x-slot:title>
    <x-slot:action>

    </x-slot:action>

    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{ route('room.create') }}">
                        @csrf
                        @method('POST')
                        <div class="mb-3">
                            <label for="roomNumber" class="form-label">Room Number</label>
                            <input type="number" name="roomNumber"
                                class="form-control @error('roomNumber') is-invalid @enderror" id="roomNumber"
                                value="{{ $room->roomNumber }}">
                            @error('roomNumber')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="childrenCapacity" class="form-label">Children Capacity</label>
                            <input type="number" name="childrenCapacity"
                                class="form-control @error('childrenCapacity') is-invalid @enderror"
                                id="childrenCapacity" value="{{ $room->childrenCapacity }}">
                            @error('childrenCapacity')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="adultCapacity" class="form-label">Adult Capacity</label>
                            <input type="number" name="adultCapacity"
                                class="form-control @error('adultCapacity') is-invalid @enderror" id="adultCapacity"
                                value="{{ $room->adultCapacity }}">
                            @error('adultCapacity')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="price" class="form-label">Price</label>
                            <input type="number" name="price"
                                class="form-control @error('price') is-invalid @enderror" id="price"
                                value="{{ $room->price }}">
                            @error('price')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <a href="{{ route('room.index') }}" class="btn btn-outline-primary">Back</a>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </form>

                </div>
            </div>
        </div>
        <div class="col">
            @if (isset($room))
                <x-room-amenity :amenityList="$amenities" :roomamenities="$roomamenities ?? []" :roomId="$room->id" />
            @endif
        </div>
    </div>
</x-layout>
