<nav class="navbar navbar-expand-lg bg-primary">
    <div class="container-fluid text-light">
        <a class="navbar-brand text-light" href="/home">
            <span class="material-symbols-outlined">
                edit_square
            </span>
            Asistente de Clase
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto">
                <div class="dropdown">
                    <a id="dropdownUser" class="nav-link dropdown-toggle text-light" href="#" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        Usuarios
                    </a>
                    <div class="dropdown-menu" aria-labelledby="dropdownUser">
                        <a class="dropdown-item" href="/users">
                            <span class="material-symbols-outlined">
                                visibility
                            </span>
                            Ver Usuarios
                        </a>
                        <a class="dropdown-item" href="/users/new">
                            <span class="material-symbols-outlined">
                                person_add
                            </span>
                            Crear usuario
                        </a>
                        <a class="dropdown-item" href="/users/edit">
                            <span class="material-symbols-outlined">
                                edit
                            </span>
                            Editar usuario
                        </a>
                        <a class="dropdown-item" href="/users/delete">
                            <span class="material-symbols-outlined">
                                delete
                            </span>
                            Eliminar usuario
                        </a>
                    </div>
                </div>
                <div class="dropdown">
                    <a id="dropdownUser" class="nav-link dropdown-toggle text-light" href="#" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        Menú
                    </a>
                    <div class="dropdown-menu" aria-labelledby="dropdownUser">
                        <a class="dropdown-item" href="#">
                            Opcion2
                        </a>
                    </div>
                </div>
                <div class="dropdown">
                    <a id="dropdownUser" class="nav-link dropdown-toggle text-light" href="#" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        {{ auth()->user()->name }}
                    </a>
                    <div class="dropdown-menu" aria-labelledby="dropdownUser">
                        <a class="dropdown-item text-danger" href="/logout">
                            <span class="material-symbols-outlined">
                                logout
                            </span>
                            Salir
                        </a>
                    </div>
                </div>
            </ul>
        </div>
    </div>
</nav>
