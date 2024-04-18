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
                <th>Project manager / Dev</th>
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
                    <td></td>
                    <td></td>
                    <td>
                        @if ($task->tag)
                            <span>{{ $task->tag->label }}</span>
                        @else
                            Aucun tag
                        @endif
                    </td>
                    <td>
                        @if ($task->status)
                            <span>{{ $task->status->label }}</span>
                        @else
                            Aucun statut
                        @endif
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
