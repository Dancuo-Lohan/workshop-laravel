@extends('base')

@section('title', 'Projects list')

@section('content')
    <h1>Projets</h1>
    <div style="padding: 2rem 0;">
        <a href="{{ route('project.create') }}" class="btn btn-dark btn-white-text font-weight-bold">Create a project</a>
    </div>

    <table class="table">
        <thead>
            <tr>
                <th>Title</th>
                <th>Description</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($projects as $project)
                <tr>
                    <td>{{ $project->title }}</td>
                    <td>{{ $project->description }}</td>
                    <td>
                        <a href="{{ route('project.show', ['project' => $project->slug]) }}" class="btn btn-primary">Voir
                            plus</a>
                        <a href="{{ route('project.edit', ['project' => $project->slug]) }}"
                            class="btn btn-warning">Modifier</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
