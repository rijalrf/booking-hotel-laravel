@if ($employee)
    <x-modal>
        <x-slot:modalTitle>
            Upload Photo
        </x-slot:modalTitle>
        <x-slot:modalContent>
            <div class="d-flex justify-content-center">
                <img class="w-50" src="" id="preview" alt="" style="display: none">
            </div>
            <form class="mt-3" action="{{ route('employee.uplaod_img', $employee->id) }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                @method('POST')
                <div class="input-group mb-3 mt-3">
                    <input id="fileInput" type="file" class="form-control" name="picture_url" id="inputGroupFile01">
                    <input type="hidden" name="picture_id" value="{{ $employee->picture->id ?? null }}">
                </div>
                <div class="modal-footer px-0 pb-0">
                    <button type="submit" class="btn btn-primary">Upload</button>
                </div>
            </form>
        </x-slot:modalContent>
        <x-slot:modalFooter>
            {{-- Footer is now inside content to keep button inside form --}}
        </x-slot:modalFooter>
    </x-modal>
@endif
<x-layout>
    <x-slot:breadcrumb>
        <li class="breadcrumb-item"><a href="{{ route('home.index') }}">
                <i class="icon-sm" data-feather="home"></i> Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">
            <i class="icon-sm" data-feather="user"></i> My Profile
        </li>
    </x-slot:breadcrumb>
    <x-slot:title>
        My Profile
    </x-slot:title>

    @if ($employee)
        <div class="row">
            <div class="col-4">
                <div class="card">
                    <div class="card-body text-center">
                        <div class="mb-3">
                            @php
                                $pictureUrl = (isset($employee->picture) && !empty($employee->picture->picture_url) && file_exists(public_path('employee_pictures/' . $employee->picture->picture_url))) 
                                    ? asset('employee_pictures/' . $employee->picture->picture_url) 
                                    : 'https://ui-avatars.com/api/?name=' . urlencode($employee->first_name) . '&background=random&size=256';
                            @endphp
                            <img class="w-75 rounded-circle border border-1 shadow-sm"
                                src="{{ $pictureUrl }}" alt="Profile Picture" style="aspect-ratio: 1/1; object-fit: cover;">
                        </div>
                        <div class="mt-3 d-flex flex-column gap-2 align-items-center">
                            <button class="btn btn-sm btn-outline-secondary w-75" data-bs-toggle="modal" data-bs-target="#modal">
                                <i data-feather="upload" class="icon-sm"></i>
                                Change Photo</button>

                            @if(isset($employee->picture) && !empty($employee->picture->picture_url))
                                <form action="{{ route('employee.delete_img', $employee->id) }}" method="POST" class="w-75">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger w-100" onclick="return confirm('Are you sure you want to delete your profile photo?')">
                                        <i data-feather="trash-2" class="icon-sm"></i>
                                        Delete Photo
                                    </button>
                                </form>
                            @endif
                        </div>

                        @error('picture_url')
                            <div class="text-danger mt-2 small">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="col-8">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('employee.update', $employee->id) }}" method="POST">
                            @csrf
                            @method('POST')
                            <div class="row">
                                <h5>Account Information</h5>
                                <hr>
                                <div class="col-12">
                                    <label for="" class="form-label">NIP</label>
                                    <input type="text" class="form-control" name="NIP"
                                        value="{{ $employee->NIP }}" />
                                </div>
                                <div class="col-6 mt-3">
                                    <label for="" class="form-label">First Name</label>
                                    <input type="text" class="form-control" name="first_name"
                                        value="{{ $employee->first_name }}" />
                                </div>
                                <div class="col-6 mt-3">
                                    <label for="" class="form-label">Last Name</label>
                                    <input type="text" class="form-control" name="last_name"
                                        value="{{ $employee->last_name }}" />
                                </div>
                                <div class="col-6 mt-3">
                                    <label for="" class="form-label">Email</label>
                                    <input type="text" class="form-control" name="email"
                                        value="{{ $employee->email }}" />
                                </div>
                                <div class="col-6 mt-3">
                                    <label for="" class="form-label">Role</label>
                                    <input type="text" class="form-control" name="role"
                                        value="{{ $employee->role }}" disabled />
                                </div>
                                <div class="col-12 mt-4 text-end">
                                    <button type="submit" class="btn btn-primary">Update Profile</button>
                                </div>
                            </div>
                        </form>
                        <div class="mt-5 rounded boder border-1 p-2">
                            <h5>Deactived Account</h5>
                            <hr>
                            <small>Are you sure you want to deactivate your account? If you just want to stop receiving
                                notifications, you can change the notification settings in the settings menu.</small>
                            <form action="{{ route('employee.setStatus', $employee->id) }}">
                                @csrf
                                @method('POST')
                                <div class="mt-3">
                                    <button type="submit" class="btn btn-danger">Deactived</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="card">
            <div class="card-body">
                <x-empty-section></x-empty-section>
                <div class="text-center mt-3">
                    <p>Your user account is not linked to any employee record. Please contact the administrator.</p>
                </div>
            </div>
        </div>
    @endif
</x-layout>

<script>
    document.getElementById('fileInput').addEventListener('change', function(event) {
        const file = event.target.files[0];
        const previewImage = document.getElementById('preview');

        if (file && file.type.startsWith('image/')) {
            const reader = new FileReader();

            // Ketika file selesai dibaca
            reader.onload = function(e) {
                previewImage.src = e.target.result; // Set URL dari image ke src tag <img>
                previewImage.style.display = 'block'; // Tampilkan elemen img
            };

            // Membaca file sebagai data URL
            reader.readAsDataURL(file);
        } else {
            // Jika file bukan gambar
            previewImage.style.display = 'none';
            previewImage.src = '';
            alert('Please select a valid image file.');
        }
    });
</script>
