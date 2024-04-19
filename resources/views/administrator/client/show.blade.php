@extends('base')

@section('title', $client->company_name)

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">{{ $client->company_name }}</h5>
            </div>
            <div class="card-body">
                <p class="card-text">{{ $client->address }}</p>
                <p class="card-text">{{ $client->website }}</p>
            </div>
            <div class="card-footer text-muted">
                Créé le {{ $client->created_at->format('d/m/Y') }}
            </div>
        </div>
    </div>
@endsection
