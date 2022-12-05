@extends('layouts.app-master')
@section('title')
    Buscar Profesor
@endsection
@section('content')
    <div class="mx-auto mt-5" style="width: 500px">
        <form
            action="/courses/teacher_assign/assign"
            method="POST">
            @csrf
            @include('layouts.partials.messages')
            <div>
                <h2>ASIGNAR PROFESOR</h2>
                </h2>
                <div class="mt-3">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-1"></div>
                            <div class="col-11">
                                <label for="num_id" class="form-label">Número de identificación</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container-fluid mx-auto">
                    <div class="container-fluid" hidden>
                        <input type="text" class="form-control" id="id_course" name="id_course" value="{{ $id_course }}">
                    </div>
                    <div class="row justify-content-center align-items-center">
                        <div class="col-1">
                            <span class="material-symbols-outlined">
                                search
                            </span>
                        </div>
                        <div class="col-8">
                            <input type="text" class="form-control" id="num_id" name="num_id">
                        </div>
                        <div class="col-3">
                            <button type="submit" class="btn btn-primary" style="margin-top: 20px"
                                id="create">Asignar</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
