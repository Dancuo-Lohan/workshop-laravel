@extends('base')

@section('title', $project->title)

@section('content')
    <div>
        <div class="card" style="max-width: 600px;">
            <div class="card-header">
                <h3 class="card-title">{{ $project->title }}</h3>
            </div>
            <div class="card-body">
                <p><strong>Client: </strong> <a
                        href="{{ route('administrator.client.show', ['client' => $project->client]) }}"
                        class="link-dark">{!! $project->client->company_name !!}</a>
                </p>
                <p> <strong>Developers: </strong>
                    @foreach ($project->developers as $developer)
                        <ul>
                            <li><a href="{{ route('administrator.developer.show', ['developer' => $developer]) }}"
                                    class="link-dark">{!! $developer->name . ' ' . $developer->firstName !!}</a></li>
                        </ul>
                    @endforeach
                </p>
                <p> <strong>Projects Managers: </strong>
                    @foreach ($project->projectManagers as $projectManager)
                        <ul>
                            <li><a href="{{ route('administrator.projectManager.show', ['projectManager' => $projectManager]) }}"
                                    class="link-dark">{!! $projectManager->name . ' ' . $projectManager->firstName !!}</a></li>
                        </ul>
                    @endforeach
                </p>
                <p><strong>Description: </strong> {!! $project->description !!}
            </div>
            <div class="card-footer text-muted">
                Created on {{ $project->created_at->format('d/m/Y') }}
            </div>
        </div>
    </div>
    </div>
@endsection
