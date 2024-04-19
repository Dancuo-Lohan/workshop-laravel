@extends('base')

@section('title', 'Developers list')

@section('content')
    <h1>Developers</h1>
    <div style="padding: 2rem 0;">
        <a href="{{ route('administrator.developer.create') }}" class="btn btn-dark btn-white-text font-weight-bold">Create a
            developer</a>
    </div>

    <table class="table">
        <thead>
            <tr>
                <th>First name</th>
                <th>Last name</th>
                <th>Job</th>
                <th>Tasks</th>
                <th>Projects</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($developers as $developer)
                <tr>
                    <td>{{ $developer->firstName }}</td>
                    <td>{{ $developer->name }}</td>
                    <td>{{ $developer->job }}</td>
                    <td>
                        @foreach ($developer->tasks as $task)
                            <a href="{{ route('administrator.task.show', ['task' => $task]) }}"
                                class="link-dark">{{ $task->name }}</a>
                        @endforeach
                    </td>
                    <td>
                        @foreach ($developer->projects as $project)
                            <a href="{{ route('administrator.project.show', ['project' => $project]) }}"
                                class="link-dark">{{ $project->title }}</a>
                        @endforeach
                    </td>
                    <td>
                        <a href="{{ route('administrator.developer.show', ['developer' => $developer->id]) }}"
                            class="btn btn-primary">Voir plus</a>
                        <a href="{{ route('administrator.developer.edit', ['developer' => $developer->id]) }}"
                            class="btn btn-warning">Modifier</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
