@extends('layouts.app-master')
@section('title')
    Crear Clase
@endsection
@section('content')
    <div class="mx-auto mt-5" style="width: 500px">
        <form action="/classes" method="POST">
            @csrf
            @include('layouts.partials.messages')
            <div>
                <h2>DATOS DE LA CLASE</h2>
                <div class="container-fluid" hidden>
                    <input type="text" class="form-control" id="id_course2" name="id_course2">
                </div>
                <div class="mt-3">
                    <div class="container-fluid">
                        <label for="id_course" class="form-label">Código del Curso</label>
                    </div>
                </div>
                <div class="container-fluid">
                    <input type="text" class="form-control" id="id_course" name="id_course">
                </div>
                <div class="mt-3">
                    <div class="container-fluid">
                        <label for="number" class="form-label">Número de clase</label>
                    </div>
                </div>
                <div class="container-fluid">
                    <input type="text" class="form-control" id="number" name="number">
                </div>
                <div class="mt-2">
                    <div class="container-fluid">
                        <label for="topic" class="form-label">Tópico</label>
                    </div>
                </div>
                <div class="container-fluid">
                    <input type="text" class="form-control" id="topic" name="topic">
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
            $('#id_course').on('change', function() {
                let id_course = $.trim($(this).val());
                if (id_course != '') {
                    $('#create').removeAttr('disabled');
                    $('#id_course2').val(id_course);
                } else {
                    $('#create').attr('disabled', 'disabled');
                }
            });
        })
    </script>
@endsection
