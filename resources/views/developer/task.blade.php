@extends('base')

@section('title', $task->name)

@section('content')
    <div style="max-width: 600px;">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">{{ $task->name }}</h5>
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
