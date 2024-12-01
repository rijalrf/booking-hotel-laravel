<x-layout>
    <x-slot:breadcrumb>
        <li class="breadcrumb-item"><a href="{{ route('home.index') }}">
                <i class="icon-sm" data-feather="home"></i> Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">
            <i class="icon-sm" data-feather="tag"></i> Room Amenity
        </li>
    </x-slot:breadcrumb>
    <x-slot:title>
        Room Amenity List
        <div class="fs-6 form-text">
            facilities provided in hotel rooms, making it easier to
            manage
            facility inventory and
            ensure service quality.
        </div>
    </x-slot:title>
    <x-slot:action>

    </x-slot:action>

    <div class="row">
        @can('hasManager')
            <div class="col-4">
                <div class="card">
                    <div class="card-body">
                        <form id="form-data">
                            @csrf
                            @method('POST')
                            <div class="mb-3">
                                <label for="" class="form-label">Name</label>
                                <input type="text" class="form-control" placeholder="e.g Safe" name="name"
                                    id="name-service-type" aria-describedby="helpId"
                                    @error('name')
                                        is-invalid
                                    @enderror>
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror

                            </div>
                            <div class="mt-3 text-end">
                                <button type="submit" class="btn btn-primary">
                                    <i data-feather="send" class="icon-sm"></i>
                                    Submit</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        @endcan
        <div class="col-8">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <tbody>
                                @foreach ($amenities as $amenity)
                                    <tr>
                                        <td>{{ $amenity->name }}</td>
                                        @can('hasManager')
                                            <td class="d-flex justify-content-end">
                                                <div class="d-flex gap-3">
                                                    <button class="btn btn-sm btn-outline-primary"
                                                        onclick="edit({{ $amenity->id }}, '{{ $amenity->name }}')">
                                                        <i data-feather="edit" class="icon-sm"></i>
                                                        Edit
                                                    </button>
                                                    <form action="{{ route('amenity.delete', $amenity->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-sm btn-outline-danger">
                                                            <i data-feather="trash" class="icon-sm"></i>
                                                            Delete
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        @endcan
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{ $amenities->links() }}
                    <div>
                        @if ($amenities->isEmpty())
                            <x-empty-section />
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>
<script>
    $(document).ready(function() {
        $('#form-data').attr('action', `/amenity/create`).attr('method', 'post');
    })

    function edit(id, name) {
        $('#name-service-type').val(name);
        $('#form-data').attr('action', `/amenity/edit/${id}`).attr('method', 'post');
    }
</script>
