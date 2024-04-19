@extends('base')

@section('title', 'Welcome' . ' ' . $projectManager->name . ' ' . $projectManager->firstName . ' !')

@section('content')
    <h2>Project Manager dashboard</h2>

    <div class="container">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Hello {{ $projectManager->name }} {{ $projectManager->firstName }}! The
                    {{ $projectManager->job }}</h5>
            </div>
            <div class="card-body">
                @foreach ($projectManager->projects as $project)
                    <h5 class="card-title>
                        <a href="{{ route('projectManager.project', ['project' => $project]) }}"
                        class="badge bg-primary">{{ $project->title }}</a>
                    </h5>
                    @foreach ($project->tasks as $task)
                        <a href="{{ route('projectManager.task', ['task' => $task]) }}"
                            class="badge bg-primary">{{ $task->name }}</a>
                    @endforeach
                @endforeach
            </div>
            <div class="card-footer text-muted">
                Account created on {{ $projectManager->created_at->format('d/m/Y') }}
            </div>
        </div>
    </div>
@endsection
