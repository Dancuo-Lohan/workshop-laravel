@extends('base')

@section('title', $developer->name . ' ' . $developer->firstName)

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">{{ $developer->name }} {{ $developer->firstName }}</h5>
            </div>
            <div class="card w-75 mx-auto mt-4">
                <div class="card-header">
                    Role
                </div>
                <div class="card-body">
                    <p class="card-text">{{ $developer->role->name }}</p>
                </div>
            </div>
            <div class="card w-75 mx-auto my-4">
                <div class="card-header">
                    Email
                </div>
                <div class="card-body">
                    <p class="card-text">{!! $developer->email !!}</p>
                </div>
            </div>
            <div class="card-footer text-muted">
                Créé le {{ $developer->created_at->format('d/m/Y') }}
            </div>
        </div>
    </div>
@endsection
