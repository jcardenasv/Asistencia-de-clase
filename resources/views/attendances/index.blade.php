@extends('layouts.app-master')
@section('title')
    Asistencias
@endsection
@section('content')
    <table class="table table-bordered" style="margin-top: 100px">
        <thead>
            <tr>
                <th>ID</th>
                <th>ID CLASE</th>
                <th>CÉDULA ESTUDIANTE</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($attendances as $attendance)
                <tr>
                    <td>{{ $attendance->id }}</td>
                    <td>{{ $attendance->id_class }}</td>
                    <td>{{ $attendance->id_student }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
