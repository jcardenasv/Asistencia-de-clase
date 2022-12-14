@extends('layouts.app-master')
@section('title')
    {{ $type == 1 ? "Eliminar Curso" : ($type == 0 ? "Editar Curso" : ($type == 2 ? "Asignar Profesor" : "Matricular Estudiante")) }}
@endsection
@section('content')
    <div class="mx-auto mt-5" style="width: 500px">
        <form action={{ $type == 1 ? "/courses/delete" : ($type == 0 ? "/courses/edit" : ($type == 2 ? "/courses/teacher_assign/search_course" : "/enroll/search_course")) }} method="POST">
            @csrf
            @method($type == 1 ? 'delete' : 'post')
            @include('layouts.partials.messages')
            <div>
                <h2>{{ $type == 1 ? 'BUSCAR CURSO A ELIMINAR' : ($type == 0 ? 'BUSCAR CURSO A EDITAR' : ($type == 2 ? 'BUSCAR CURSO PARA ASIGNARLE UN PROFESOR' : 'BUSCAR CURSO A MATRICULAR')) }}</h2>
                <div class="mt-3">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-1"></div>
                            <div class="col-11">
                                <label for="code" class="form-label">Código</label>
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
                            <input type="text" class="form-control" id="code" name="code">
                        </div>
                        <div class="col-3">
                            <button type="submit" class="btn btn-primary" style="margin-top: 20px" id="create">{{ $type == 1 ? 'Eliminar' : ($type == 0 ? 'Editar' : 'Continuar') }}</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
