@extends('layouts.app-master')
@section('title')
    Editar Asistencia
@endsection
@section('content')
    <div class="mx-auto mt-5" style="width: 500px">
        <form action={{ $type == 1 ? '/attendances/delete' : '/attendances/edit' }} method="POST">
            @csrf
            @method($type == 1 ? 'delete' : 'post')
            @include('layouts.partials.messages')
            <div>
                <h2>{{ $type == 1 ? 'BUSCAR ASISTENCIA A ELIMINAR' : 'BUSCAR ASISTENCIA A EDITAR' }}</h2>
                <div class="mt-3">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-1"></div>
                            <div class="col-11">
                                <label for="id" class="form-label">ID Asistencia</label>
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
                                id="create">{{ $type == 1 ? 'Eliminar' : 'Editar' }}</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
