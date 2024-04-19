@extends('base')

@section('title', 'Developer dashboard')

@section('content')
    <h1>Developer dashboard</h1>
    
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Hello {{ $developer->name }} {{ $developer->firstName }}! The {{ $developer->job }}</h5>
            </div>
            <div class="card-body">
                <p class="card-text">
                    <td>
                        @foreach ($developer->tasks as $task)
                            <a href="{{ route('developer.task', ['task' => $task]) }}"
                                class="badge bg-primary">{{ $task->name }}</a>
                        @endforeach
                    </td>
                    <td>
                        @foreach ($developer->projects as $project)
                            <a href="{{ route('developer.project', ['project' => $project]) }}"
                                class="badge bg-primary">{{ $project->title }}</a>
                        @endforeach
                    </td>
                </p>
            </div>
            <div class="card-footer text-muted">
                Account created on {{ $developer->created_at->format('d/m/Y') }}
            </div>
        </div>
    </div>
@endsection
