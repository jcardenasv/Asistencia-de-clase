@extends('layouts.app-master')
@section('title')
    Usuarios
@endsection
@section('content')
    <table class="table table-bordered" style="margin-top: 100px">
        <thead>
            <tr>
                <th>ID</th>
                <th>NOMBRE</th>
                <th>CEDULA</th>
                <th>USERNAME</th>
                <th>EMAIL</th>
                <th>ROL</th>
                <th>ACTIVO</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->num_id }}</td>
                    <td>{{ $user->username }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->role_name }}</td>
                    <td style="color: {{$user->active_color}}">{{ $user->active_name }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
