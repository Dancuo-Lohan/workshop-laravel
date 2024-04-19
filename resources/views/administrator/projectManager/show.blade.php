@extends('base')

@section('title', $projectManager->firstName)

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">{{ $projectManager->name }} {{ $projectManager->firstName }}</h5>
            </div>
            <div class="card w-75 mx-auto mt-4">
                <div class="card-header">
                    Role
                </div>
                <div class="card-body">
                    <p class="card-text">{{ $projectManager->role->name }}</p>
                </div>
            </div>
            <div class="card w-75 mx-auto mt-4">
                <div class="card-header">
                    Fonction
                </div>
                <div class="card-body">
                    <p class="card-text">{!! $projectManager->job !!}</p>
                </div>
            </div>
            <div class="card w-75 mx-auto my-4">
                <div class="card-header">
                    Email
                </div>
                <div class="card-body">
                    <p class="card-text">{!! $projectManager->email !!}</p>
                </div>
            </div>
            <div class="card-footer text-muted">
                Created on {{ $projectManager->created_at->format('d/m/Y') }}
            </div>
        </div>
    </div>
@endsection
