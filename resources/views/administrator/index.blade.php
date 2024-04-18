@extends('base')

@section('title', 'Admin dashboard')

@section('content')
    <h1>Admin dashboard</h1>
    <div style="padding: 2rem 0;">
        <a href="" class="btn btn-dark btn-white-text font-weight-bold">Create a projects
            manager</a>
        <a href="{{ route('project.create') }}" class="btn btn-dark btn-white-text font-weight-bold">Create a project</a>
        <a href="" class="btn btn-dark btn-white-text font-weight-bold">Create a developer</a>
        <a href="" class="btn btn-dark btn-white-text font-weight-bold">Create a client</a>
        <a href="{{ route('administrator.task.index') }}" class="btn btn-dark btn-white-text font-weight-bold">Create a
            task</a>
    </div>
@endsection
