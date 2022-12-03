@extends('layouts.app-master')
@section('title')
    Editar Asistencia
@endsection
@section('content')
    <div class="mx-auto mt-5" style="width: 500px">
        <form action="/attendances/edit" method="POST">
            @csrf
            @method('PUT')
            @include('layouts.partials.messages')
            <div class="mt-5">
                <h2>DATOS DE LA ASISTENCIA</h2>
                <div class="container-fluid" hidden>
                    <input type="text" class="form-control" id="id_student2" name="id_student2"
                        value="{{ $attendance->id }}">
                </div>
                {{-- <div class="container-fluid" hidden>
                    <input type="text" class="form-control" id="id_student" name="id_student"
                        value="{{ $attendance->id_student }}">
                </div> --}}
                <div class="mt-3">
                    <div class="container-fluid">
                        <label for="id_student" class="form-label">ID del Estudiante</label>
                    </div>
                </div>
                <div class="container-fluid">
                    <input type="text" class="form-control" id="id_student" name="id_student"
                        value="{{ $attendance->id_student }}">
                </div>
                <div class="mt-3">
                    <div class="container-fluid">
                        <label for="id_class" class="form-label">ID de la Clase</label>
                    </div>
                </div>
                <div class="container-fluid">
                    <input type="text" class="form-control" id="id_class" name="id_class"
                        value="{{ $attendance->id_class }}">
                </div>
                <button type="submit" class="btn btn-primary" style="margin-top: 20px" id="edit">Editar</button>
            </div>
        </form>
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            $('#id_student').on('change', function() {
                let id_student = $.trim($(this).val());
                $('#id_student2').val(id_student);
                if (id_student == '') {
                    $('#edit').attr('disabled', 'disabled');
                } else {
                    $('#edit').removeAttr('disabled');
                }
            });
        })
    </script>
@endsection
