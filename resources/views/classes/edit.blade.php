@extends('layouts.app-master')
@section('title')
    Editar Clase
@endsection
@section('content')
    <div class="mx-auto mt-5" style="width: 500px">
        <form action="/classes/edit" method="POST">
            @csrf
            @method('PUT')
            @include('layouts.partials.messages')
            <div class="mt-5">
                <h2>DATOS DE LA CLASE</h2>
                <div class="container-fluid" hidden>
                    <input type="text" class="form-control" id="id_course2" name="id_course2"
                        value="{{ $classe->id }}">
                </div>
                <div class="container-fluid" hidden>
                    <input type="text" class="form-control" id="id_course" name="id_course"
                        value="{{ $classe->id_course }}">
                </div>
                <div class="mt-3">
                    <div class="container-fluid">
                        <label for="id_course" class="form-label">Código del Curso</label>
                    </div>
                </div>
                <div class="container-fluid">
                    <input type="text" class="form-control" id="id_course" name="id_course"
                        value="{{ $classe->id_course }}">
                </div>
                <div class="mt-3">
                    <div class="container-fluid">
                        <label for="number" class="form-label">Número</label>
                    </div>
                </div>
                <div class="container-fluid">
                    <input type="text" class="form-control" id="number" name="number" value="{{ $classe->number }}">
                </div>
                <div class="mt-2">
                    <div class="container-fluid">
                        <label for="topic" class="form-label">Tópico</label>
                    </div>
                </div>
                <div class="container-fluid">
                    <input type="text" class="form-control" id="topic" name="topic" value="{{ $classe->topic }}">
                </div>
                <button type="submit" class="btn btn-primary" style="margin-top: 20px" id="edit">Editar</button>
            </div>
        </form>
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            $('#id_course').on('change', function() {
                let id_course = $.trim($(this).val());
                $('#id_course2').val(id_course);
                if (id_course == '') {
                    $('#edit').attr('disabled', 'disabled');
                } else {
                    $('#edit').removeAttr('disabled');
                }
            });
        })
    </script>
@endsection
