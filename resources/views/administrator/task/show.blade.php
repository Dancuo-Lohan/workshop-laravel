@extends('base')

@section('title', $task->name)

@section('content')
    <div>
        <div class="card" style="max-width: 600px;">
            <div class="card-header">
                <h3 class="card-title">{{ $task->name }}</h3>
            </div>
            <div class="card-body">
                <div><strong>Managers</strong>
                    <ul>
                        @foreach ($task->projectManagers as $projectManager)
                            <li><a class="link-dark"
                                    href="{{ route('administrator.projectManager.show', ['projectManager' => $projectManager]) }}">{{ $projectManager->name }}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>

                <div><strong>
                        Developers</strong>
                    <ul>
                        @foreach ($task->developers as $developer)
                            <li><a class="link-dark"
                                    href="{{ route('administrator.developer.show', ['developer' => $developer]) }}">{{ $developer->name }}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <p><strong>Description: </strong>{!! $task->description !!}</p>
            </div>
            <div class="card-footer text-muted">
                Created on {{ $task->created_at->format('d/m/Y') }}
            </div>
        </div>
    </div>
@endsection
