@extends('base')

@section('title', 'Projects list')

@section('content')
    <h1>Projets</h1>
    <div style="padding: 2rem 0;">
        <a href="{{ route('administrator.project.create') }}" class="btn btn-dark btn-white-text font-weight-bold">Create a
            project</a>
    </div>

    <table class="table">
        <thead>
            <tr>
                <th>Title</th>
                <th>Description</th>
                <th>Client</th>
                <th>Chef de projet</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($projects as $project)
                <tr>
                    <td>{{ $project->title }}</td>
                    <td>{{ $project->description }}</td>
                    <td>
                        @if ($project->client)
                            <a href="{{ route('administrator.client.show', ['client' => $project->client->id]) }}"
                                class="link-dark">{{ $project->client?->company_name }}</a>
                        @endif
                    </td>
                    <td>
                        @foreach ($project->projectManagers as $projectManager)
                            {{ $projectManager->name }}
                        @endforeach
                    </td>
                    <td>
                        <a href="{{ route('administrator.project.show', ['project' => $project->slug]) }}"
                            class="btn btn-primary">Voir
                            plus</a>
                        <a href="{{ route('administrator.project.edit', ['project' => $project->slug]) }}"
                            class="btn btn-warning">Modifier</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
