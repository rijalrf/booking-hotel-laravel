<x-layout>
    <x-slot:breadcrumb>
        <li class="breadcrumb-item"><a href="{{ route('home.index') }}">
                <i class="icon-sm" data-feather="home"></i> Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">
            <i class="icon-sm" data-feather="gift"></i> Room Service Type
        </li>
    </x-slot:breadcrumb>
    <x-slot:title>
        Room Service Type List
    </x-slot:title>
    <x-slot:action>

    </x-slot:action>

    {{-- Modal add Room service type --}}
    <x-modal>
        <x-slot:modalTitle>Add Room Service Type</x-slot:modalTitle>
        <x-slot:modalContent>
            <x-room-service-type />
        </x-slot:modalContent>
        <x-slot:modalFooter>
        </x-slot:modalFooter>
    </x-modal>

    <div class="row">
        <div class="col-4">
            <div class="card">
                <div class="card-body">
                    <x-room-service-type></x-room-service-type>
                </div>
            </div>
        </div>
        <div class="col-8">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <tbody>
                                @foreach ($roomServiceTypes as $roomServiceType)
                                    <tr>
                                        <td>{{ $roomServiceType->name }}</td>
                                        <td class="d-flex justify-content-end">
                                            <div class="d-flex gap-3">
                                                <a href="#" class="btn btn-sm btn-outline-primary"
                                                    class="dropdown-item">
                                                    <i data-feather="edit" class="icon-sm"></i>
                                                    Edit
                                                </a>
                                                <a href="#" class="btn btn-sm btn-outline-danger"
                                                    class="dropdown-item">
                                                    <i data-feather="trash" class="icon-sm"></i>
                                                    Delete
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{ $roomServiceTypes->links() }}
                </div>
            </div>
        </div>
    </div>
</x-layout>
