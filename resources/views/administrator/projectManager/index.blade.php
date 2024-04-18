@extends('base')

@section('title', 'Projects list')

@section('content')
    <h1>Projects manager</h1>
    <div style="padding: 2rem 0;">
        <a href="{{ route('administrator.projectManager.create') }}"
            class="btn btn-dark btn-white-text font-weight-bold">Create a project manager</a>
    </div>

    <table class="table">
        <thead>
            <tr>
                <th>First name</th>
                <th>Last name</th>
                <th>Function</th>
                <th>Projects</th>
                <th>Tasks</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($projectManagers as $projectManager)
                <tr>
                    <td>{{ $projectManager->firstName }}</td>
                    <td>{{ $projectManager->name }}</td>
                    <td>{{ $projectManager->job }}</td>
                    <td>
                        @foreach ($projectManager->projects as $project)
                            <a href="{{ route('administrator.project.show', ['project' => $project]) }}"
                                class="badge bg-primary">{{ $project->name }}</a>
                        @endforeach
                    </td>
                    <td>
                        @foreach ($projectManager->tasks as $task)
                            <a href="{{ route('administrator.task.show', ['task' => $task]) }}"
                                class="badge bg-primary">{{ $task->name }}</a>
                        @endforeach
                    </td>
                    <td>
                        <a href="{{ route('administrator.projectManager.show', ['projectManager' => $projectManager->id]) }}"
                            class="btn btn-primary">Voir
                            plus</a>
                        <a href="{{ route('administrator.projectManager.edit', ['projectManager' => $projectManager->id]) }}"
                            class="btn btn-warning">Modifier</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
