@extends('base')

@section('title', $projectManager->firstName)

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">{{ $projectManager->name }} {{ $projectManager->firstName }}</h5>
            </div>
            <div class="card-body">
                <p class="card-text">{!! $projectManager->job !!}</p>
            </div>
            <div class="card-footer text-muted">
                Créé le {{ $projectManager->created_at->format('d/m/Y') }}
            </div>
        </div>
    </div>
@endsection
