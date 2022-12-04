@extends('layouts.app-master')
@section('title')
    Asistencia Estudiante
@endsection
@section('content')
    <div class="mx-auto mt-5" style="width: 500px">
        <form action={{ '/attendances/student' }} method="GET">
            @csrf
            @method('get')
            @include('layouts.partials.messages')
            <div>
                <h2>{{ 'BUSCAR ASISTENCIA DE ESTUDIANTE' }}</h2>
                <div class="mt-3">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-1"></div>
                            <div class="col-11">
                                <label for="id" class="form-label">ID Estudiante</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container-fluid mx-auto">
                    <div class="row justify-content-center align-items-center">
                        <div class="col-1">
                            <span class="material-symbols-outlined">
                                search
                            </span>
                        </div>
                        <div class="col-8">
                            <input type="text" class="form-control" id="id" name="id">
                        </div>
                        <div class="col-3">
                            <button type="submit" class="btn btn-primary" style="margin-top: 20px"
                                id="create">{{ 'Buscar' }}</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
