@extends('layouts.app-master')
@section('content')
    <h2>Hola {{ auth()->user()->name }}. Bievenido al asistente de clase!</h2>
@endsection

