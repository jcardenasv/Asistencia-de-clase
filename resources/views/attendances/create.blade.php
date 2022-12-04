@extends('layouts.app-master')
@section('title')
    Crear Asistencia
@endsection
@section('content')
    <div class="mx-auto mt-5" style="width: 500px">
        <form action="/attendances" method="POST">
            @csrf
            @include('layouts.partials.messages')
            <div>
                <h2>DATOS DE LA ASISTENCIA</h2>
                <div class="container-fluid" hidden>
                    <input type="text" class="form-control" id="id_student2" name="id_student2">
                </div>
                <div class="mt-3">
                    <div class="container-fluid">
                        <label for="id_student" class="form-label">Cédula del Estudiante</label>
                    </div>
                </div>
                <div class="container-fluid">
                    <input type="text" class="form-control" id="id_student" name="id_student">
                </div>
                <div class="mt-3">
                    <div class="container-fluid">
                        <label for="id_class" class="form-label">ID de la Clase</label>
                    </div>
                </div>
                <div class="container-fluid">
                    <input type="text" class="form-control" id="id_class" name="id_class">
                </div>
                <button type="submit" class="btn btn-primary" style="margin-top: 20px" id="create"
                    disabled>Crear</button>
            </div>
        </form>
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            $('#id_student').on('change', function() {
                let id_student = $.trim($(this).val());
                if (id_student != '') {
                    $('#create').removeAttr('disabled');
                    $('#id_student2').val(id_student);
                } else {
                    $('#create').attr('disabled', 'disabled');
                }
            });
        })
    </script>
@endsection
