@extends('base')

@section('title', $project->title)

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">{{ $project->title }}</h5>
            </div>
            
            <div class="card w-75 mx-auto mt-4">
                <div class="card-header">
                    Description
                </div>
                <div class="card-body">
                    <p class="card-text">{!! $project->description !!}</p>
                </div>
            </div>
            
            <div class="card w-75 mx-auto mt-4">
                <div class="card-header">
                    Projects Managers
                </div>
                <div class="card-body">
                    @foreach($project->projectManagers as $projectManager)
                    <a href="{{ route('administrator.projectManager.show', ['projectManager' => $projectManager]) }}" class="card-text">{!! $projectManager->email !!}</a>                        
                    @endforeach
                </div>
            </div>
            
            <div class="card w-75 mx-auto mt-4">
                <div class="card-header">
                    Developers
                </div>
                <div class="card-body">
                    @foreach($project->developers as $developer)
                    <a href="{{ route('administrator.developer.show', ['developer' => $developer]) }}" class="card-text">{!! $developer->email !!}</a>                        
                    @endforeach
                </div>
            </div>
            
            <div class="card w-75 mx-auto my-4">
                <div class="card-header">
                    Client
                </div>
                <div class="card-body">
                    <a href="{{ route('administrator.client.show', ['client' => $project->client]) }}" class="card-text">{!! $project->client->company_name !!}</a>                        
                </div>
            </div>
            <div class="card-footer text-muted">
                Created on {{ $project->created_at->format('d/m/Y') }}
            </div>
        </div>
    </div>
@endsection
