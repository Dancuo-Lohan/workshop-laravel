@extends('base')

@section('title', $project->title)

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">{{ $project->title }}</h5>
            </div>
            <div class="card-body">
                <p class="card-text">{!! $project->description !!}</p>
            </div>
            <div class="card-footer text-muted">
                Créé le {{ $project->created_at->format('d/m/Y') }}
            </div>
        </div>
    </div>
@endsection
