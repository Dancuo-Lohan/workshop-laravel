@extends('base')

@section('title', 'Projects list')

@section('content')
    <h1>Clients</h1>
    <div style="padding: 2rem 0;">
        <a href="{{ route('administrator.client.create') }}" class="btn btn-dark btn-white-text font-weight-bold">Create a
            client</a>
    </div>

    <table class="table">
        <thead>
            <tr>
                <th>Company Name </th>
                <th>Address</th>
                <th>Website</th>
                <th>Projects</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($clients as $client)
                <tr>
                    <td>{{ $client->company_name }}</td>
                    <td>{{ $client->address }}</td>
                    <td>{{ $client->website }}</td>
                    <td>
                        @foreach ($client->projects as $project)
                            <a href="{{ route('administrator.project.show', ['project' => $project]) }}"
                                class="link-dark">{{ $project->title }}</a>
                        @endforeach
                    </td>
                    <td>
                        <a href="{{ route('administrator.client.show', ['client' => $client->id]) }}"
                            class="btn btn-primary">Voir plus</a>
                        <a href="{{ route('administrator.client.edit', ['client' => $client->id]) }}"
                            class="btn btn-warning">Modifier</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
