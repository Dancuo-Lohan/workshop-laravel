@extends('base')

@section('title', $task->name)

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">{{ $task->name }}</h5>
                @if ($task->tag)
                    <span class="badge bg-dark">{{ $task->tag->label }}</span>
                @else
                    <span class="badge bg-secondary">Aucune catégorie</span>
                @endif
            </div>
            <div class="card-body">
                <p class="card-text"> <strong>Developers : </strong>
                <ul>
                    @foreach ($task->developers as $developer)
                        <li>{{ $developer->name }}</li>
                    @endforeach
                </ul>
                </p>
                <p class="card-text"> <strong>Managers : </strong>
                <ul>
                    @foreach ($task->projectManagers as $manager)
                        <li>{{ $manager->name }}</li>
                    @endforeach
                </ul>
                </p>
                <p class="card-text"> <strong>Description : </strong>{!! $task->description !!}</p>
            </div>
            <div class="card-footer text-muted">
                Created on {{ $task->created_at->format('d/m/Y') }}
            </div>
        </div>
    </div>
@endsection
