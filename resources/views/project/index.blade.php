@extends('base')

@section('title', 'Projects list')

@section('content')
    <h1>Liste des Projets</h1>
    <div style="padding: 2rem 0;">
        <a href="" class="btn btn-dark btn-white-text font-weight-bold">Create a project</a>
    </div>

    <table class="table">
        <thead>
            <tr>
                <th>Title</th>
                <th>Description</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
@endsection
