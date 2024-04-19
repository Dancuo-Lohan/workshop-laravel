@extends('base')

@section('title', 'Welcome' . ' ' . $projectManager->name . ' ' . $projectManager->firstName . ' !')

@section('content')

    <div style="max-width: 600px;">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Hello {{ $projectManager->name }} {{ $projectManager->firstName }}!</h3>
            </div>
            <div class="card-body">
                <p><strong>Fonction: </strong>{{ $projectManager->job }}</p>
                @foreach ($projectManager->projects as $project)
                    <div>
                        <p class="card-title"><strong>Projects:</strong>
                            <a href="{{ route('projectManager.project', ['project' => $project]) }}"
                                class="text-underline text-black">{{ $project->title }}</a>
                        </p>
                        @foreach ($project->tasks as $task)
                            <a href="{{ route('projectManager.task', ['task' => $task]) }}"
                                class="link-dark">{{ $task->name }}</a>
                        @endforeach
                    </div>
                @endforeach
            </div>
            <div class="card-footer text-muted">
                Account created on {{ $projectManager->created_at->format('d/m/Y') }}
            </div>
        </div>
    </div>
@endsection
