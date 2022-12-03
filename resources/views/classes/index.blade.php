@extends('layouts.app-master')
@section('title')
    Clases
@endsection
@section('content')
    <table class="table table-bordered" style="margin-top: 100px">
        <thead>
            <tr>
                <th>ID</th>
                <th>ID CURSO</th>
                <th>NÚMERO</th>
                <th>TÓPICO</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($classes as $classe)
                <tr>
                    <td>{{ $classe->id }}</td>
                    <td>{{ $classe->id_course }}</td>
                    <td>{{ $classe->number }}</td>
                    <td>{{ $classe->topic }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
