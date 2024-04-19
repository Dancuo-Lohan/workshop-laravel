<form action="" method="post" class="vstack gap-2">
    @csrf
    <div class="form-group">
        <label for="email">Email :</label>
        <input type="email" class="form-control" name="email" value="{{ old('email', $developer->email) }}">
        @error('email')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="form-group">
        <label for="firstName">First name :</label>
        <input type="text" class="form-control" name="firstName"
            value="{{ old('firstName', $developer->firstName) }}">
        @error('firstName')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="form-group">
        <label for="name">Last name :</label>
        <input type="text" class="form-control" name="name" value="{{ old('name', $developer->name) }}">
        @error('name')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="form-group">
        <label for="job">Job :</label>
        <input name="job" id="job" class="form-control" value="{{ old('job', $developer->job) }}">
        @error('job')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    @php
        $projectsIds = $developer->projects()->pluck('id');
    @endphp
    <div class="form-group">
        <label for="projects">Projects :</label>
        <select name="projects[]" id="projects" class="form-control" multiple>
            @foreach ($projects as $project)
                <option value="{{ $project->id }}" @selected(old('projects', $projectsIds->contains($project->id)))>
                    {{ $project->title }}
                </option>
            @endforeach
        </select>
        @error('projects')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    @php
        $tasksIds = $developer->tasks()->pluck('id');
    @endphp
    <div class="form-group">
        <label for="tasks">Tasks :</label>
        <select name="tasks[]" id="tasks" class="form-control" multiple>
            @foreach ($tasks as $task)
                <option value="{{ $task->id }}" @selected(old('tasks', $tasksIds->contains($task->id)))>
                    {{ $task->name }}
                </option>
            @endforeach
        </select>
        @error('tasks')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <button class="btn btn-primary">
        @if ($developer->id)
            Modifier
        @else
            Créer
        @endif
    </button>
</form>
