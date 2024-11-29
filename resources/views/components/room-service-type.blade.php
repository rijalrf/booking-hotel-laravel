<form action="{{ route('roomServiceType.create') }}" method="POST">
    @csrf
    @method('POST')
    <div class="mb-3">
        <label for="" class="form-label">Name</label>
        <input type="text" class="form-control" placeholder="e.g Safe" name="name" id="name"
            aria-describedby="helpId" @error('name')
            is-invalid
        @enderror>
        @error('name')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="mt-3 text-end">
        <button type="submit" class="btn btn-primary">
            <i data-feather="plus" class="icon-sm"></i>
            Add</button>
    </div>
</form>
