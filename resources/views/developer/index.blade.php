@extends('base')

@section('title', 'Developer dashboard')

@section('content')
    <h2 class="mb-4">Developer dashboard</h2>

    <div class="card" style="max-width: 600px;">
        <div class="card-header">
            <h3 class="card-title">Hello {{ $developer->name }} {{ $developer->firstName }}!
            </h3>
        </div>
        <div class="card-body">
            <p><strong>Job: </strong>{{ $developer->job }}</p>
            @foreach ($developer->projects as $project)
                <div>
                    <p class="card-title"><strong>Project: </strong>
                        <a href="{{ route('developer.project', ['project' => $project]) }}"
                            class="text-underline text-black">{{ $project->title }}</a>
                    </p>
                    @foreach ($project->tasks as $task)
                        <a href="{{ route('developer.task', ['task' => $task]) }}" class="link-dark">{{ $task->name }}</a>
                    @endforeach
                </div>
            @endforeach
        </div>
        <div class="card-footer text-muted">
            Account created on {{ $developer->created_at->format('d/m/Y') }}
        </div>
    </div>

@endsection
