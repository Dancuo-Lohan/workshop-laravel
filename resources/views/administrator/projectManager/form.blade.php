<form action="" method="post" class="vstack gap-2">
    @csrf
    <div class="form-group">
        <label for="email">Email :</label>
        <input type="email" class="form-control" name="email" value="{{ old('email', $projectManager->email) }}">
        @error('email')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="form-group">
        <label for="firstName">First name :</label>
        <input type="text" class="form-control" name="firstName"
            value="{{ old('firstName', $projectManager->firstName) }}">
        @error('firstName')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="form-group">
        <label for="name">Last name :</label>
        <input type="text" class="form-control" name="name" value="{{ old('name', $projectManager->name) }}">
        @error('name')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="form-group">
        <label for="job">Function :</label>
        <input name="job" id="job" class="form-control" value="{{ old('job', $projectManager->job) }}">
        @error('job')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    @php
        $projectsIds = $projectManager->projects()->pluck('id');
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
        $tasksIds = $projectManager->tasks()->pluck('id');
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
        @if ($projectManager->id)
            Modifier
        @else
            Créer
        @endif
    </button>
</form>
