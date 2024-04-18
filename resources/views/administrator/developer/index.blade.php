@extends('base')

@section('title', 'Developers list')

@section('content')
    <h1>Developers</h1>
    <div style="padding: 2rem 0;">
        <a href="{{ route('administrator.developer.create') }}" class="btn btn-dark btn-white-text font-weight-bold">Create a
            developer</a>
    </div>

    <table class="table">
        <thead>
            <tr>
                <th>First name</th>
                <th>Last name</th>
                <th>Function</th>
                <th>Tasks</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>

            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td>
                    <a href="" class="btn btn-primary">Voir plus</a>
                    <a href="" class="btn btn-warning">Modifier</a>
                </td>
            </tr>

        </tbody>
    </table>
@endsection
