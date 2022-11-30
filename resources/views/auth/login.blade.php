@extends('layouts.auth-master')
@section('content')
    <form action="/login" method="POST">
        @csrf
        <h1>Login</h1>
        @include('layouts.partials.messages')
        <div class="mt-3">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-1"></div>
                    <div class="col-11">
                        <label for="username" class="form-label">Nombre de usuario</label>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-1">
                    <span class="material-symbols-outlined">
                        assignment_ind
                    </span>
                </div>
                <div class="col-11">
                    <input type="text" class="form-control" id="username" name="username">
                </div>
            </div>
        </div>
        </div>
        <div class="mt-3">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-1"></div>
                    <div class="col-11">
                        <label for="password" class="form-label">Contraseña</label>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-1">
                    <span class="material-symbols-outlined">
                        password
                    </span>
                </div>
                <div class="col-11">
                    <input type="password" class="form-control" id="password" name="password">
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary" style="margin-top: 20px">Iniciar Sesión</button>
    </form>
@endsection
