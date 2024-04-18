<form action="" method="post" class="vstack gap-2">
    @csrf
    <div class="form-group">
        <label for="title">Title :</label>
        <input type="text" class="form-control" name="title" value="{{ old('title', $project->title) }}">
        @error('title')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="form-group">
        <label for="client_id">Client :</label>
        <select name="client_id" id="client_id" class="form-control">
            <option value="">-- Sélectionner un client --</option>
            <option value=""></option>
        </select>
        @error('client_id')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="form-group">
        <label for="">Chef de projet :</label>
        <select name="" id="" class="form-control">
            <option value="">-- Sélectionner un chef de projet --</option>
            <option value=""></option>
        </select>
        @error('')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="form-group">
        <label for="slug">Slug :</label>
        <input type="text" class="form-control" name="slug" value="{{ old('slug', $project->slug) }}">
        @error('slug')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="form-group">
        <label for="description">Description :</label>
        <textarea name="description" id="description" class="form-control">{{ old('description', $project->description) }}</textarea>
        @error('description')
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
