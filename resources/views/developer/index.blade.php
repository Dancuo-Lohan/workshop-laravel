@extends('base')

@section('title', 'Developer dashboard')

@section('content')
    <h1>Developer dashboard</h1>

    <div class="container">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Hello {{ $developer->name }} {{ $developer->firstName }}! The {{ $developer->job }}
                </h5>
            </div>
            <div class="card-body">
                @foreach ($developer->projects as $project)
                    <div class="my-4">
                        <h5 class="card-title">
                            <a href="{{ route('developer.project', ['project' => $project]) }}"
                                class="text-underline text-black">{{ $project->title }}</a>
                        </h5>
                        @foreach ($project->tasks as $task)
                            <a href="{{ route('developer.task', ['task' => $task]) }}"
                                class="badge bg-primary">{{ $task->name }}</a>
                        @endforeach
                    </div>
                @endforeach
            </div>
            <div class="card-footer text-muted">
                Account created on {{ $developer->created_at->format('d/m/Y') }}
            </div>
        </div>
    </div>
@endsection
