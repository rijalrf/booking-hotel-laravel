@php
    if (empty($search)) {
        $search = [
            'last_name' => '',
            'role' => '',
        ];
    }
@endphp
<x-layout>
    <x-slot:breadcrumb>
        <li class="breadcrumb-item"><a href="{{ route('home.index') }}">
                <i class="icon-sm" data-feather="home"></i>
                Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">
            <i class="icon-sm" data-feather="user-check"></i>
            Employee List
        </li>
    </x-slot:breadcrumb>
    <x-slot:title>
        <span>Employee List</span>
    </x-slot:title>
    <x-slot:action>
        <a href="{{ route('employee.new') }}" class="btn btn-primary">
            <i class="icon-sm" data-feather="plus"></i>
            Add Employee
        </a>
    </x-slot:action>

    {{-- Modal Confim --}}
    <x-modal-confirm>
        <x-slot:title>
            Confirm Delete
        </x-slot:title>
        <x-slot:content>
            Are you sure you want to delete employee <span id="name-employee"></span>?
        </x-slot:content>
        <x-slot:footer>
            <form id="formDelete">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">
                    <i data-feather="trash" class="icon-sm"></i>
                    Delete
                </button>
            </form>
        </x-slot:footer>
    </x-modal-confirm>

    {{-- Form Search --}}
    <div class="my-3">
        <form action="{{ route('employee.search') }}">
            <div class="form-group d-flex gap-3">
                <div class="w-25">
                    <input type="text" class="form-control" id="search" name="last_name"
                        value="{{ $search['last_name'] ?? '' }}" placeholder="Search by Last Name">
                </div>
                <div class="w-25">
                    <select class="form-select cursor-pointer" name="role">
                        <option class="cursor-pointer" @if ($search['role'] == '') selected @endif value="">
                            All
                        </option>
                        <option class="cursor-pointer" @if ($search['role'] == 'staf') selected @endif value="staf">
                            Staf
                        </option>
                        <option class="cursor-pointer" @if ($search['role'] == 'manager') selected @endif
                            value="manager">Manager
                        </option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">
                    <i class="icon-sm" data-feather="search"></i>Search</button>
                <a href="{{ route('employee.index') }}" class="btn btn-outline-primary">
                    <i class="icon-sm" data-feather="refresh-cw"></i>Reset</a>
            </div>
        </form>
    </div>

    {{-- Table List --}}
    <div class="card">
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>NIP</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Status</th>
                        <th class="text-end"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($employees as $employee)
                        <tr>
                            <td>{{ $employee->NIP }}</td>
                            <td>
                                {{ $employee->first_name }}
                            </td>
                            <td>
                                {{ $employee->last_name }}
                            </td>
                            <td>{{ $employee->email }}</td>
                            <td>{{ $employee->role }}</td>
                            <td>
                                @if ($employee->isActive)
                                    <i data-feather="check-circle" class="text-success"></i>
                                @else
                                    <i data-feather="x-circle" class="text-danger"></i>
                                @endif
                            </td>
                            <td class="text-end">
                                <div class="dropdown-center text-center">
                                    <i class="dropdown-toggle icon-sm" type="button" data-bs-toggle="dropdown"
                                        aria-expanded="false" data-feather="more-vertical">
                                    </i>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item"
                                                href="{{ route('employee.edit', $employee->id) }}">
                                                <i data-feather="edit" class="icon-sm"></i>
                                                Edit</a></li>
                                        <li>
                                            <button
                                                onclick="deleteEmployee( {{ $employee->id }}, '{{ $employee->last_name }}')"
                                                type="button" class="dropdown-item text-danger" data-bs-toggle="modal"
                                                data-bs-target="#modalConfirm">
                                                <i data-feather="trash" class="icon-sm"></i>
                                                Delete</button>
                                        </li>
                                    </ul>
                                </div>
                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div>
                {{ $employees->links() }}
            </div>
            @if ($employees->isEmpty())
                <x-emptysection></x-emptysection>
            @endif

        </div>
    </div>
</x-layout>
<script>
    function deleteEmployee(id, name) {
        $('#name-employee').text(name);
        $('#formDelete').attr('action', `employees/delete/${id}`).attr('method', 'post');
    }
</script>
