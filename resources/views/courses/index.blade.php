@extends('layouts.app-master')
@section('title')
    Usuarios
@endsection
@section('content')
    <table class="table table-bordered" style="margin-top: 100px">
        <thead>
            <tr>
                <th>ID</th>
                <th>CÓDIGO</th>
                <th>NOMBRE</th>
                <th>DESCRIPCIÓN</th>
                <th>METODOLOGÍA</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($courses as $course)
                <tr>
                    <td>{{ $course->id }}</td>
                    <td>{{ $course->code }}</td>
                    <td>{{ $course->name }}</td>
                    <td>{{ $course->description }}</td>
                    <td>{{ $course->methodology_name }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
