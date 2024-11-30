<x-layout>
    <x-slot:breadcrumb>
        <li class="breadcrumb-item"><a href="{{ route('home.index') }}">
                <i class="icon-sm" data-feather="home"></i>
                Home</a></li>
        <li class="breadcrumb-item"><a href="{{ route('employee.index') }}">
                <i class="icon-sm" data-feather="align-right"></i>
                Employeee List</a></li>
        <li class="breadcrumb-item active" aria-current="page">
            <i class="icon-sm" data-feather="user-check"></i>
            {{ $page_meta['title'] }}
        </li>
    </x-slot:breadcrumb>
    <x-slot:title>
        {{ $page_meta['title'] }}
    </x-slot:title>
    <x-slot:action>
        @if ($employee->id != null)
            <form action="{{ route('employee.setStatus', $employee->id) }}" method="POST">
                @csrf
                @method('POST')
                @if ($employee->isActive)
                    <button type="submit" class="btn btn-danger">
                        <i data-feather="user-x" class="icon-sm"></i>
                        Deactived
                    </button>
                @else
                    <button type="submit" class="btn btn-primary">
                        <i data-feather="user-check" class="icon-sm"></i>
                        Actived
                    </button>
                @endif
            </form>
        @endif
    </x-slot:action>
    @if (empty($page_meta))
        <x-message>
            <x-slot:type>danger</x-slot:type>
            <x-slot:message>{{ $page_meta['message'] }}</x-slot:message>
        </x-message>
    @endif
    <div class="row">

        <div class="card col-6">
            <div class="card-body">
                <form action="{{ $page_meta['url'] }}" method="POST">

                    @csrf
                    @method('POST')
                    <div class="mb-3">
                        <label for="NIP" class="form-label">NIP</label>
                        <input type="number" name="NIP" class="form-control @error('NIP') is-invalid @enderror"
                            id="NIP" value="{{ old('NIP', $employee->NIP) }}">
                        @error('NIP')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="first_name" class="form-label">First Name</label>
                        <input type="text" name="first_name" placeholder="e.g John"
                            class="form-control @error('first_name') is-invalid @enderror" id="first_name"
                            value="{{ old('first_name', $employee->first_name) }}">
                        @error('firstname')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="last_name" class="form-label">Last Name</label>
                        <input type="text" name="last_name" placeholder="e.g Due"
                            class="form-control @error('last_name') is-invalid @enderror" id="last_name"
                            value="{{ old('last_name', $employee->last_name) }}">
                        @error('lastname')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                            id="email" value="{{ old('email', $employee->email) }}">
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="role" class="form-label">Role</label>
                        <select name="role" id="role" class="form-select">
                            <option value="staf">Staf</option>
                            <option value="manager">Manager</option>
                        </select>
                        @error('role')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <input type="hidden" name="isActive" value="1">
                    </div>
                    {{-- Button Submit --}}
                    <div class="row mt-3">
                        <div class="w-auto">
                            <a href="{{ route('employee.index') }}" class="btn btn-outline-primary">
                                <i data-feather="arrow-left" class="icon-sm"></i>
                                Back
                            </a>
                        </div>
                        <div class="col-9">
                            <button class="btn btn-primary" type="submit">
                                <i data-feather="send" class="icon-sm"></i>
                                Submit
                            </button>

                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-6 text-center">
            <img class="w-75" src="{{ asset('img/vector2.png') }}" alt="">
        </div>
    </div>

</x-layout>
