@extends('base')

@section('title', $client->company_name)

@section('content')
    <div>
        <div class="card" style="max-width: 600px;">
            <div class="card-header">
                <h3 class="card-title">{{ $client->company_name }}</h3>
            </div>
            <div class="card-body">
                <p class="card-text"> <strong>Address :</strong> {{ $client->address }}</p>
                <p class="card-text"> <strong>Website :</strong> {{ $client->website }}</p>
            </div>
            <div class="card-footer text-muted">
                Created on {{ $client->created_at->format('d/m/Y') }}
            </div>
        </div>
    </div>
@endsection
