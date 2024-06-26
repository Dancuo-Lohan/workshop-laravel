<form action="" method="post" class="vstack gap-2">
    @csrf
    <div class="form-group">
        <label for="company_name">Company Name:</label>
        <input type="text" class="form-control" name="company_name"
            value="{{ old('company_name', $client->company_name) }}">
        @error('company_name')
            <span class="text-danger"></span>
        @enderror
    </div>
    <div class="form-group">
        <label for="address">Address:</label>
        <input type="text" class="form-control" name="address" value="{{ old('address', $client->address) }}">
        @error('address')
            <span class="text-danger"></span>
        @enderror
    </div>
    <div class="form-group">
        <label for="website">Website:</label>
        <input type="text" class="form-control" name="website" value="{{ old('website', $client->website) }}">
        @error('website')
            <span class="text-danger"></span>
        @enderror
    </div>
    <button class="btn btn-primary">
        @if ($client->id)
            Update
        @else
            Create
        @endif
    </button>
</form>
