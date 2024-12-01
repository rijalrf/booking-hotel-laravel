<x-layout>
    <x-slot:breadcrumb>
        <li class="breadcrumb-item">
            <a href="{{ route('home.index') }}">
                <i class="icon-sm" data-feather="home"></i>
                Home
            </a>
        </li>
        <li class="breadcrumb-item">
            <a href="{{ route('room.index') }}">
                <i class="icon-sm" data-feather="align-right"></i>
                Room List
            </a>
        </li>
        <li class="breadcrumb-item active" aria-current="page">
            <i class="icon-sm" data-feather="umbrella"></i>
            Room Information
        </li>
    </x-slot:breadcrumb>
    <x-slot:title>
        Room {{ $room->roomNumber }} Information
    </x-slot:title>

    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-4">
                    <div class="mt-3">
                        <label class="mb-2">Adults Capacity</label>
                        <h3>{{ $room->adultCapacity }}</h3>
                    </div>

                </div>
                <div class="col-4">
                    <div class="mt-3">
                        <label class="mb-2">Children Capacity</label>
                        <h3>{{ $room->childrenCapacity }}</h3>
                    </div>
                </div>
                <div class="col-4">
                    <div class="mt-3">
                        <label class="mb-2">Room Price</label>
                        <h3>{{ $room->price }}</h3>
                    </div>

                </div>
            </div>



        </div>
    </div>

    {{-- Room Ameity --}}
    <div class="my-3">
        <h3>Room Amenity</h3>
    </div>
    <div class="table-responsive">
        <div class="card">
            <div class="card-body">
                <table class="table">
                    <tbody>
                        @foreach ($roomAmenities as $roomAmenity)
                            <tr>
                                <td>{{ $roomAmenity->Amenities->name }}</td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
                <div>
                    @if ($roomAmenities->isEmpty())
                        <x-empty-section></x-empty-section>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-layout>
