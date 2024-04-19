@extends('base')

@section('title', $developer->name . ' ' . $developer->firstName)

@section('content')
    <div class="card" style="max-width: 600px;">
        <div class="card-header">
            <h3 class="card-title">{{ $developer->name }} {{ $developer->firstName }}</h3>
        </div>
        <div class="card-body">
            <p>
                <strong>Job: </strong>{{ $developer->role->name }}
            </p>
            <p><strong>Email: </strong>{!! $developer->email !!}</p>
        </div>
        <div class="card-footer text-muted">
            Created on {{ $developer->created_at->format('d/m/Y') }}
        </div>
    </div>
@endsection
