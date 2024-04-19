@extends('base')

@section('title', 'Tasks list')

@section('content')
    <h1>Tasks</h1>
    <div style="padding: 2rem 0;">
        <a href="{{ route('administrator.task.create') }}" class="btn btn-dark btn-white-text font-weight-bold">Create a
            task</a>
    </div>

    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Description</th>
                <th>Project</th>
                <th>Manager</th>
                <th>Developer</th>
                <th>Tags</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tasks as $task)
                <tr>
                    <td>{{ $task->name }}</td>
                    <td>{{ $task->description }}</td>
                    <td>
                        @if ($task->project)
                            {{ $task->project->title }}
                        @endif
                    </td>
                    <td>
                        @foreach ($task->projectManagers as $projectManager)
                            {{ $projectManager->name }}
                        @endforeach
                    </td>
                    <td>
                        @foreach ($task->developers as $developer)
                            {{ $developer->name }}
                        @endforeach
                    </td>
                    <td>

                    </td>
                    <td>

                    </td>
                    <td>
                        <a href="{{ route('administrator.task.show', ['task' => $task->slug]) }}" class="btn btn-primary">Voir
                            plus</a>
                        <a href="{{ route('administrator.task.edit', ['task' => $task->slug]) }}"
                            class="btn btn-warning">Modifier</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
