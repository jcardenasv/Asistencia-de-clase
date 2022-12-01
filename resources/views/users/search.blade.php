@extends('layouts.app-master')
@section('title')
    Editar Usuario
@endsection
@section('content')
    <div class="mx-auto mt-5" style="width: 500px">
        <form action={{ $type == 1 ? "/users/delete" : "/users/edit" }} method="POST">
            @csrf
            @method($type == 1 ? 'delete' : 'post')
            @include('layouts.partials.messages')
            <div>
                <h2>{{ $type == 1 ? 'BUSCAR USUARIO A ELIMINAR' : 'BUSCAR USUARIO A EDITAR' }}</h2>
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
                            <button type="submit" class="btn btn-primary" style="margin-top: 20px" id="create">{{ $type == 1 ? 'Eliminar' : 'Editar' }}</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
