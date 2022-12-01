@extends('layouts.app-master')
@section('title')
    Editar Usuario
@endsection
@section('content')
    <div class="mx-auto mt-5" style="width: 500px">
        <form action="/users/edit" method="POST">
            @csrf
            @method('PUT')
            @include('layouts.partials.messages')
            <div class="mt-5">
                <h2>DATOS DEL USUARIO</h2>
                <div class="container-fluid" hidden>
                    <input type="text" class="form-control" id="active2" name="active2"
                        value="{{ $user->active }}">
                </div>
                <div class="container-fluid" hidden>
                    <input type="text" class="form-control" id="id_teacher" name="id_teacher"
                        value="{{ $user->id_teacher }}">
                </div>
                <div class="container-fluid" hidden>
                    <input type="text" class="form-control" id="id_student" name="id_student"
                        value="{{ $user->id_student }}">
                </div>
                <div class="container-fluid" hidden>
                    <input type="text" class="form-control" id="id_user" name="id_user" value="{{ $user->id }}">
                </div>
                <div class="container-fluid" hidden>
                    <input type="text" class="form-control" id="role2" name="role2">
                </div>
                <div class="mt-3">
                    <div class="container-fluid">
                        <label for="name" class="form-label">Nombre</label>
                    </div>
                </div>
                <div class="container-fluid">
                    <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}">
                </div>
                <div class="mt-2">
                    <div class="container-fluid">
                        <label for="num_id" class="form-label">Cedula</label>
                    </div>
                </div>
                <div class="container-fluid">
                    <input type="text" class="form-control" id="num_id" name="num_id" value="{{ $user->num_id }}">
                </div>
                <div class="mt-2">
                    <div class="container-fluid">
                        <label for="email" class="form-label">Email</label>
                    </div>
                </div>
                <div class="container-fluid">
                    <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}">
                </div>
                <div class="mt-2">
                    <div class="container-fluid">
                        <label for="username" class="form-label">Username</label>
                    </div>
                </div>
                <div class="container-fluid">
                    <input type="username" class="form-control" id="username" name="username"
                        value="{{ $user->username }}">
                </div>
                <div id="teacher" style="display: none">
                    <div class="mt-2">
                        <div class="container-fluid">
                            <label for="department" class="form-label">Departamento</label>
                        </div>
                    </div>
                    <div class="container-fluid">
                        <input type="department" class="form-control" id="department" name="department"
                            value="{{ $user->department }}">
                    </div>
                    <div class="mt-2">
                        <div class="container-fluid">
                            <label for="knowledge_area" class="form-label">Area de conocimiento</label>
                        </div>
                    </div>
                    <div class="container-fluid">
                        <input type="department" class="form-control" id="knowledge_area" name="knowledge_area"
                            value="{{ $user->knowledge_area }}">
                    </div>
                </div>
                <div id="student" style="display: none">
                    <div class="mt-2">
                        <div class="container-fluid">
                            <label for="career" class="form-label">Carrera</label>
                        </div>
                    </div>
                    <div class="container-fluid">
                        <input type="career" class="form-control" id="career" name="career"
                            value="{{ $user->career }}">
                    </div>
                </div>
                <div class="mt-2">
                    <div class="container-fluid">
                        <label for="active" class="form-label">Activo</label>
                    </div>
                </div>
                <div class="container-fluid">
                    <select class="form-select" aria-label="Default select example" id="active">
                        <option>Seleccione un estado</option>
                        <option value="1" {{ $user->active == 1 ? 'selected' : null }}>Activo</option>
                        <option value="0" {{ $user->active == 0 ? 'selected' : null }}>Inactivo</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary" style="margin-top: 20px" id="edit">Editar</button>
            </div>
        </form>
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            $('#active').on('change', function() {
                let active = $.trim($(this).val());
                $('#active2').val(active);
                if(active != "1" && active != "0"){
                    $('#edit').attr('disabled', 'disabled');
                }else{
                    $('#edit').removeAttr('disabled');
                }
            });
        })
    </script>
@endsection
