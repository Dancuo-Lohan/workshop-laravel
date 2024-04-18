@extends('base')

@section('title', $task->name)

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">{{ $task->name }}</h5>
                @if ($task->tags)
                    <span class="badge bg-dark">{{ $task->tag->label }}</span>
                @else
                    <span class="badge bg-secondary">Aucune catégorie</span>
                @endif
            </div>
            <div class="card-body">
                <p class="card-text">{!! $task->description !!}</p>
            </div>
            <div class="card-footer text-muted">
                Created on {{ $task->created_at->format('d/m/Y') }}
            </div>
        </div>
    </div>
@endsection
