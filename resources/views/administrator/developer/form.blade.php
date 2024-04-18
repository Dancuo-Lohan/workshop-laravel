<form action="" method="post" class="vstack gap-2">
    @csrf
    <div class="form-group">
        <label for="">First name :</label>
        <input type="text" class="form-control" name="" value="">
        @error('')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="form-group">
        <label for="slug">Last name :</label>
        <input type="text" class="form-control" name="slug" value="">
        @error('slug')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="form-group">
        <label for="">Function :</label>
        <textarea name="" id="" class="form-control"></textarea>
        @error('')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="form-group">
        <label for="">Tasks :</label>
        <textarea name="" id="" class="form-control"></textarea>
        @error('')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <button class="btn btn-primary">
        @if ($project->id)
            Modifier
        @else
            Créer
        @endif
    </button>
</form>
