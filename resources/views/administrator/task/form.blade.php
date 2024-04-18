<form action="" method="post" class="vstack gap-2">
    @csrf
    <div class="form-group">
        <label for="name"> Name :</label>
        <input type="text" class="form-control" name="name" value="{{ old('name', $task->name) }}">
        @error('name')
            <span class="text-danger"></span>
        @enderror
    </div>
    <div class="form-group">
        <label for="slug">Slug :</label>
        <input type="text" class="form-control" name="slug" value="{{ old('slug', $task->slug) }}">
        @error('slug')
            <span class="text-danger"></span>
        @enderror
    </div>
    <div class="form-group">
        <label for="description">Description :</label>
        <textarea name="description" id="description" class="form-control" value="{{ old('description', $task->description) }}"></textarea>
        @error('description')
            <span class="text-danger"></span>
        @enderror
    </div>
    <button class="btn btn-primary">
        @if ($task->id)
            Update
        @else
            Create
        @endif
    </button>
</form>
