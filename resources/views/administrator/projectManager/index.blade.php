@extends('base')

@section('title', 'Projects list')

@section('content')
    <h1>Projects manager</h1>
    <div style="padding: 2rem 0;">
        <a href="{{ route('administrator.projectManager.create') }}" class="btn btn-dark btn-white-text font-weight-bold">Create a project manager</a>
    </div>

    <table class="table">
        <thead>
            <tr>
                <th>First name</th>
                <th>Last name</th>
                <th>Function</th>
                <th>Projects</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($projectManagers as $projectManager)
            <tr>
                <td>{{ $projectManager->firstName }}</td>
                <td>{{ $projectManager->name }}</td>
                <td>{{ $projectManager->job }}</td>
                <td></td>
                <td>
                    <a href="" class="btn btn-primary">Voir
                        plus</a>
                    <a href="" class="btn btn-warning">Modifier</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection
