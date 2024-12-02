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
                <input type="hidden" name="picture_id" value="{{ $employee->picture ?? null }}">
            </div>

    </x-slot:modalContent>
    <x-slot:modalFooter>
        <button type="submit" class="btn btn-primary">Uplaod</button>
        </form>
    </x-slot:modalFooter>
</x-modal>
<x-layout>
    <x-slot:breadcrumb>

    </x-slot:breadcrumb>
    <x-slot:title>
        My Profile
    </x-slot:title>
    <div class="row">
        <div class="col-4">
            <div class="card">
                <div class="card-body text-center">
                    @if (empty($employee->picture))
                        <img class="w-50 rounded-circle border border-1"
                            src="{{ asset('employee_pictures/no-photo.png') }}" alt="">
                    @else
                        <img class="w-50 rounded-circle border border-1"
                            src="{{ asset('employee_pictures/' . $employee->picture->picture_url) }}" alt="">
                    @endif
                    <div class="mt-3">
                        <button class="btn btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#modal">
                            <i data-feather="upload" class="icon-sm"></i>
                            Upload</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-8">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('employee.update', $employee->id) }}">
                        <div class="row">
                            <h5>Account Information</h5>
                            <hr>
                            <div class="col-12">
                                <label for="" class="form-label">NIP</label>
                                <input type="text" class="form-control" name="NIP" value="{{ $employee->NIP }}"
                                    disabled />
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
                                <input type="text" class="form-control" name="role" value="{{ $employee->role }}"
                                    disabled />
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
