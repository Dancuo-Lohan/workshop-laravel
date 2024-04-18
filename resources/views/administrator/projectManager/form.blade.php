
<form action="" method="post" class="vstack gap-2">
    @csrf
    <div class="form-group">
        <label for="">First name :</label>
        <input type="text" class="form-control" name="" value="">
        @error('')
            <span class="text-danger"></span>
        @enderror
    </div>
    <div class="form-group">
        <label for="">Last name :</label>
        <input type="text" class="form-control" name="" value="">
        @error('')
            <span class="text-danger"></span>
        @enderror
    </div>
    <div class="form-group">
        <label for="">Function :</label>
        <textarea name="" id="" class="form-control"></textarea>
        @error('')
            <span class="text-danger"></span>
        @enderror
    </div>
    <div class="form-group">
        <label for=""> Projects :</label>
        <select name="" id="" class="form-control">
            <option value="">-- Select a project  --</option>
            <option value=""></option>
        </select>
        @error('')
            <span class="text-danger"></span>
        @enderror
    </div>
    <button class="btn btn-primary">
        @if ()
            Modifier
        @else
            Créer
        @endif
    </button>
</form>
