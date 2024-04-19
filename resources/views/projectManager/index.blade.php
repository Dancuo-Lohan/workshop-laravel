@extends('base')

@section('title', 'Welcome' . ' ' . $projectManager->name . ' ' . $projectManager->firstName . ' !')

@section('content')
    <h1>Project Manager dashboard</h1>

    <div class="container">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Hello {{ $projectManager->name }} {{ $projectManager->firstName }}! The
                    {{ $projectManager->job }}
                </h5>
            </div>
            <div class="card-body">
                <p class="card-text">
                    <td>
                        @foreach ($projectManager->tasks as $task)
                            <a href="{{ route('projectManager.task', ['task' => $task]) }}"
                                class="badge bg-primary">{{ $task->name }}</a>
                        @endforeach
                    </td>
                    <td>
                        @foreach ($projectManager->projects as $project)
                            <a href="{{ route('projectManager.project', ['project' => $project]) }}"
                                class="badge bg-primary">{{ $project->title }}</a>
                        @endforeach
                    </td>
                </p>
            </div>
            <div class="card-footer text-muted">
                Account created on {{ $projectManager->created_at->format('d/m/Y') }}
            </div>
        </div>
    </div>
@endsection
