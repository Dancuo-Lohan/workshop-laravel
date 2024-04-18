<form action="" method="post" class="vstack gap-2">
    @csrf
    <div class="form-group">
        <label for=""> Company Name :</label>
        <input type="text" class="form-control" name="" value="">
        @error('')
            <span class="text-danger"></span>
        @enderror
    </div>
    <div class="form-group">
        <label for=""> Address :</label>
        <input type="text" class="form-control" name="" value="">
        @error('')
            <span class="text-danger"></span>
        @enderror
    </div>
    <div class="form-group">
        <label for=""> Website :</label>
        <input type="text" class="form-control" name="" value="">
        @error('')
            <span class="text-danger"></span>
        @enderror
    </div>
    <div class="form-group">
        <label for=""> Projects :</label>
        <select name="" id="" class="form-control">
            <option value="">-- Select a project --</option>
            <option value=""></option>
        </select>
        @error('')
            <span class="text-danger"></span>
        @enderror
    </div>
    <button class="btn btn-primary">
        @if
        Modifier
    @else
        Créer
        @endif
    </button>
</form>
