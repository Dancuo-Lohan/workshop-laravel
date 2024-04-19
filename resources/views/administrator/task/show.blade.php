@extends('base')

@section('title', $task->name)

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">{{ $task->name }}</h5>
            </div>
            <div class="card w-75 mx-auto mt-4">
                <div class="card-header">
                    Managers
                </div>
                <div class="card-body">
                    <ul>
                        @foreach ($task->projectManagers as $projectManager)
                            <li><a href="{{ route('administrator.projectManager.show', ['projectManager' => $projectManager]) }}">{{ $projectManager->name }}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="card w-75 mx-auto mt-4">
                <div class="card-header">
                    Developers
                </div>
                <div class="card-body">
                    <ul>
                        @foreach ($task->developers as $developer)
                            <li><a href="{{ route('administrator.developer.show', ['developer' => $developer]) }}">{{ $developer->name }}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="card w-75 mx-auto my-4">
                <div class="card-header">
                    Description
                </div>
                <div class="card-body">
                    <p class="card-text"> <strong>Description : </strong>{!! $task->description !!}</p>
                </div>
            </div>
            <div class="card-footer text-muted">
                Created on {{ $task->created_at->format('d/m/Y') }}
            </div>
        </div>
    </div>
@endsection
