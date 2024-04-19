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
                <p class="card-text">
                    <strong>Tasks:</strong>
                <ul>
                    @foreach ($projectManager->tasks as $task)
                        <li>
                            <a href="{{ route('projectManager.task', ['task' => $task]) }}"
                                class="badge bg-primary">{{ $task->name }}</a>
                        </li>
                    @endforeach
                </ul>
                <strong>Projects:</strong>
                <ul>
                    @foreach ($projectManager->projects as $project)
                        <li>
                            <a href="{{ route('projectManager.project', ['project' => $project]) }}"
                                class="badge bg-primary">{{ $project->title }}</a>
                        </li>
                    @endforeach
                </ul>
                </p>
            </div>
            <div class="card-footer text-muted">
                Account created on {{ $projectManager->created_at->format('d/m/Y') }}
            </div>
        </div>
    </div>
@endsection
