<form action="" method="post" class="vstack gap-2">
    @csrf
    <div class="form-group">
        <label for="name">Name :</label>
        <input type="text" class="form-control" name="name" value="{{ old('name', $task->name) }}">
        @error('name')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="form-group">
        <label for="slug">Slug :</label>
        <input type="text" class="form-control" name="slug" value="{{ old('slug', $task->slug) }}">
        @error('slug')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="form-group">
        <label for="project_id">Project :</label>
        <select name="project_id" id="project_id" class="form-control">
            <option value="">-- Select a project --</option>
            @foreach ($projects as $project)
                <option @selected(old('project_id', $task->project_id) == $project->id) value="{{ $project->id }}">{{ $project->title }}</option>
            @endforeach
        </select>
        @error('project_id')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    @php
        $projectManagersIds = $task->projectManagers->pluck('id');
    @endphp
    <div class="form-group">
        <label for="projectManagers">Manager :</label>
        <select name="projectManagers[]" id="projectManagers" class="form-control" multiple>
            @foreach ($projectManagers as $projectManager)
                <option value="{{ $projectManager->id }}" @selected(old('projectManagers', $projectManagersIds->contains($projectManager->id)))>
                    {{ $projectManager->name }}
                </option>
            @endforeach
        </select>
        @error('projectManagers')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    @php
        $developersIds = $task->developers->pluck('id');
    @endphp
    <div class="form-group">
        <label for="developers">Developer :</label>
        <select name="developers[]" id="developers" class="form-control" multiple>
            @foreach ($developers as $developer)
                <option value="{{ $developer->id }}" @selected(old('developers', $developersIds->contains($developer->id)))>
                    {{ $developer->name }}
                </option>
            @endforeach
        </select>
        @error('developers')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="form-group">
        <label for="status_tag_id">Status :</label>
        <select name="status_tag_id" id="status_tag_id" class="form-control">
            <option value="">-- Select task status --</option>
            @foreach ($status_tags as $statut)
                <option @selected(old('status_tag_id', $task->status_tag_id) == $statut->id) value="{{ $statut->id }}">{{ $statut->label }}</option>
            @endforeach
        </select>
        @error('status_tag_id')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="form-group">
        <label for="task_tag_id">Tag :</label>
        <select name="task_tag_id" id="task_tag_id" class="form-control">
            <option value="">-- Select task tag --</option>
            @foreach ($task_tags as $tag)
                <option @selected(old('task_tag_id', $task->task_tag_id) == $tag->id) value="{{ $tag->id }}">{{ $tag->label }}</option>
            @endforeach
        </select>
        @error('status_tag_id')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="form-group">
        <label for="description">Contenu :</label>
        <textarea name="description" id="description" class="form-control">{{ old('description', $task->description) }}</textarea>
        @error('description')
            <span class="text-danger">{{ $message }}</span>
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
