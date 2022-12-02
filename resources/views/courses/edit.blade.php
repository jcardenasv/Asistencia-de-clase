@extends('layouts.app-master')
@section('title')
    Editar Curso
@endsection
@section('content')
    <div class="mx-auto mt-5" style="width: 500px">
        <form action="/courses/edit" method="POST">
            @csrf
            @method('PUT')
            @include('layouts.partials.messages')
            <div class="mt-5">
                <h2>DATOS DEL CURSO</h2>
                <div class="container-fluid" hidden>
                    <input type="text" class="form-control" id="methodology2" name="methodology2"
                        value="{{ $course->methodology }}">
                </div>
                <div class="container-fluid" hidden>
                    <input type="text" class="form-control" id="id_course" name="id_course" value="{{ $course->id }}">
                </div>
                <div class="mt-3">
                    <div class="container-fluid">
                        <label for="code" class="form-label">Código</label>
                    </div>
                </div>
                <div class="container-fluid">
                    <input type="text" class="form-control" id="code" name="code" value="{{ $course->code }}">
                </div>
                <div class="mt-3">
                    <div class="container-fluid">
                        <label for="name" class="form-label">Nombre</label>
                    </div>
                </div>
                <div class="container-fluid">
                    <input type="text" class="form-control" id="name" name="name" value="{{ $course->name }}">
                </div>
                <div class="mt-2">
                    <div class="container-fluid">
                        <label for="description" class="form-label">Descripción</label>
                    </div>
                </div>
                <div class="container-fluid">
                    <input type="text" class="form-control" id="description" name="description" value="{{ $course->description }}">
                </div>
                <div class="mt-2">
                    <div class="container-fluid">
                        <label for="methodology" class="form-label">Metodología</label>
                    </div>
                </div>
                <div class="mt-2">
                    <div class="container-fluid">
                        <select class="form-select" aria-label="Default select example" id="methodology">
                            <option value=0 selected>Seleccione una metodología</option>
                            <option value=1 {{ $course->methodology == 1 ? 'selected' : null }} >Presencial</option>
                            <option value=2 {{ $course->methodology == 2 ? 'selected' : null }} >Remota</option>
                        </select>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary" style="margin-top: 20px" id="edit">Editar</button>
            </div>
        </form>
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            $('#methodology').on('change', function() {
                let methodology = $.trim($(this).val());
                $('#methodology2').val(methodology);
                if (methodology == 0) {
                    $('#edit').attr('disabled', 'disabled');
                } else {
                    $('#edit').removeAttr('disabled');
                }
            });
        })
    </script>
@endsection
