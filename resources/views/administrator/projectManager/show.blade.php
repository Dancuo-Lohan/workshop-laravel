@extends('base')

@section('title', $projectManager->firstName)

@section('content')
    <div class="container">
        <div class="card" style="max-width: 500px;">
            <div class="card-header">
                <h3 class="card-title">{{ $projectManager->name }} {{ $projectManager->firstName }}</h3>
            </div>
            <div class="card-body">
                <p><strong>Role:</strong> {{ $projectManager->role->name }}</p>
                <p><strong>Fonction:</strong> {{ $projectManager->job }}</p>
                <p><strong>Email:</strong> {{ $projectManager->email }}</p>
            </div>
            <div class="card-footer text-muted">
                Created on {{ $projectManager->created_at->format('d/m/Y') }}
            </div>
        </div>
    </div>
@endsection
