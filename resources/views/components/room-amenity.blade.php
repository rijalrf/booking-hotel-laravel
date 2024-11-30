<div class="card">
    <div class="card-body">
        <form method="POST" action="{{ route('roomAmenity.create') }}">
            @csrf
            @method('POST')
            <div class="mb-3">
                <label for="amenity" class="form-label">Amenity</label>
                <input type="hidden" name="room_id" value="{{ $roomId }}">
                <select name="amenity_id" id="amenity"
                    class="form-control @error('amenity_id') is-invalid @enderror ">
                    @foreach ($amenityList as $amenity)
                        <option value="{{ $amenity->id }}">{{ $amenity->name }}</option>
                    @endforeach
                </select>
                @error('amenity_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-outline-primary">
                <i data-feather="plus" class="icon-sm"></i>
                Add
            </button>
        </form>
    </div>
</div>


<div class="card mt-3">
    <div class="card-body">
        <div class="card-title">
            <h5>Amenities</h5>
        </div>
        @if ($roomamenities->isNotEmpty())
            <table class="table">
                <tbody>
                    @foreach ($roomamenities as $roomamenity)
                        <tr>
                            <td>{{ $roomamenity->Amenities->name }}</td>
                            <td class="text-end">
                                <form action="{{ route('roomAmenity.delete', $roomamenity->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger">
                                        <i data-feather="trash-2"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $roomamenities->links() }}
        @else
            <x-empty-section />
        @endif
    </div>
</div>
