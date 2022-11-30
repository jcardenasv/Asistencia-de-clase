@extends('layouts.app-master')
@section('title')
    Crear Usuario
@endsection
@section('content')
    <div class="mx-auto mt-5" style="width: 500px">
        <form action="/users" method="POST">
            @csrf
            @include('layouts.partials.messages')
            <div>
                <h2>CREAR USUARIO</h2>
                <div class="mt-3">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-1"></div>
                            <div class="col-11">
                                <label for="role" class="form-label">Tipo de usuario</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-1">
                            <span class="material-symbols-outlined">
                                perm_contact_calendar
                            </span>
                        </div>
                        <div class="col-11">
                            <select class="form-select" aria-label="Default select example" id="role">
                                <option value="0" selected>Seleccione un tipo</option>
                                <option value="1">Administrador</option>
                                <option value="2">Profesor</option>
                                <option value="3">Estudiante</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-5">
                <h2>DATOS DEL USUARIO</h2>

                <div class="container-fluid" hidden>
                    <input type="text" class="form-control" id="role2" name="role2">
                </div>
                <div class="mt-3">
                    <div class="container-fluid">
                        <label for="name" class="form-label">Nombre</label>
                    </div>
                </div>
                <div class="container-fluid">
                    <input type="text" class="form-control" id="name" name="name">
                </div>
                <div class="mt-2">
                    <div class="container-fluid">
                        <label for="num_id" class="form-label">Cedula</label>
                    </div>
                </div>
                <div class="container-fluid">
                    <input type="text" class="form-control" id="num_id" name="num_id">
                </div>
                <div class="mt-2">
                    <div class="container-fluid">
                        <label for="email" class="form-label">Email</label>
                    </div>
                </div>
                <div class="container-fluid">
                    <input type="email" class="form-control" id="email" name="email">
                </div>
                <div class="mt-2">
                    <div class="container-fluid">
                        <label for="username" class="form-label">Username</label>
                    </div>
                </div>
                <div class="container-fluid">
                    <input type="username" class="form-control" id="username" name="username">
                </div>
                <div class="mt-2">
                    <div class="container-fluid">
                        <label for="password" class="form-label">Contraseña</label>
                    </div>
                </div>
                <div class="container-fluid">
                    <input type="password" class="form-control" id="password" name="password">
                </div>
                <div id="teacher" style="display: none">
                    <div class="mt-2">
                        <div class="container-fluid">
                            <label for="department" class="form-label">Departamento</label>
                        </div>
                    </div>
                    <div class="container-fluid">
                        <input type="department" class="form-control" id="department" name="department">
                    </div>
                    <div class="mt-2">
                        <div class="container-fluid">
                            <label for="knowledge_area" class="form-label">Area de conocimiento</label>
                        </div>
                    </div>
                    <div class="container-fluid">
                        <input type="department" class="form-control" id="knowledge_area" name="knowledge_area">
                    </div>
                </div>
                <div id="student" style="display: none">
                    <div class="mt-2">
                        <div class="container-fluid">
                            <label for="career" class="form-label">Carrera</label>
                        </div>
                    </div>
                    <div class="container-fluid">
                        <input type="career" class="form-control" id="career" name="career">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary" style="margin-top: 20px" id="create" disabled>Crear</button>
            </div>
        </form>
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            $('#role').on('change', function() {

                let role = $.trim($(this).val());
                if (role != '') {
                    $('#create').removeAttr('disabled');
                    if (role == 2) {
                        $('#teacher').show();
                        $('#student').hide();
                    } else if (role == 3) {
                        $('#student').show();
                        $('#teacher').hide();
                    } else if (role == 1) {
                        $('#teacher').hide();
                        $('#student').hide();
                    } else {
                        $('#create').attr('disabled', 'disabled');
                    }
                    $('#role2').val(role);
                }
            });
        })
    </script>
@endsection
