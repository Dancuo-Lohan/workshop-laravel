@extends('base')

@section('title', 'Tasks list')

@section('content')
    <h1>Tasks</h1>

    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Description</th>
                <th>Project</th>
                <th>Prject manager / Dev</th>
                <th>Tags</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tasks as $task)
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
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
