@extends('base')

@section('title', $developer->name . ' ' . $developer->firstName)

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">{{ $developer->name }} {{ $developer->firstName }}</h5>
            </div>
            <div class="card-body">
                <p class="card-text">{{ $developer->role->name }}</p>
            </div>
            <div class="card-footer text-muted">
                Créé le {{ $developer->created_at->format('d/m/Y') }}
            </div>
        </div>
    </div>
@endsection
