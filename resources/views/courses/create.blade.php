@extends('layouts.app-master')
@section('title')
    Crear Curso
@endsection
@section('content')
    <div class="mx-auto mt-5" style="width: 500px">
        <form action="/courses" method="POST">
            @csrf
            @include('layouts.partials.messages')
            <div>
                <h2>DATOS DEL CURSO</h2>
                <div class="container-fluid" hidden>
                    <input type="text" class="form-control" id="methodology2" name="methodology2">
                </div>
                <div class="mt-3">
                    <div class="container-fluid">
                        <label for="code" class="form-label">Código</label>
                    </div>
                </div>
                <div class="container-fluid">
                    <input type="text" class="form-control" id="code" name="code">
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
                        <label for="description" class="form-label">Descripción</label>
                    </div>
                </div>
                <div class="container-fluid">
                    <input type="text" class="form-control" id="description" name="description">
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
                            <option value=1>Presencial</option>
                            <option value=2>Remota</option>
                        </select>
                    </div>
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
            $('#methodology').on('change', function() {
                let methodology = $.trim($(this).val());
                if (methodology != 0) {
                    $('#create').removeAttr('disabled');
                    $('#methodology2').val(methodology);
                } else {
                    $('#create').attr('disabled', 'disabled');
                }
            });
        })
    </script>
@endsection
