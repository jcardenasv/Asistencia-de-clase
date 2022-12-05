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
                <li class="nav-item">
                    <a class="nav-link text-light" aria-current="page" href="/">Inicio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-light" aria-current="page" href="/enroll">Matricular estudiante</a>
                </li>
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
                            Ver usuarios
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
                        Cursos
                    </a>
                    <div class="dropdown-menu" aria-labelledby="dropdownUser">
                        <a class="dropdown-item" href="/courses">
                            <span class="material-symbols-outlined">
                                visibility
                            </span>
                            Ver cursos
                        </a>
                        <a class="dropdown-item" href="/courses/new">
                            <span class="material-symbols-outlined">
                                person_add
                            </span>
                            Crear curso
                        </a>
                        <a class="dropdown-item" href="/courses/edit">
                            <span class="material-symbols-outlined">
                                edit
                            </span>
                            Editar curso
                        </a>
                        <a class="dropdown-item" href="/courses/delete">
                            <span class="material-symbols-outlined">
                                delete
                            </span>
                            Eliminar curso
                        </a>
                        <a class="dropdown-item" href="/courses/teacher_assign">
                            <span class="material-symbols-outlined">
                                assignment_ind
                            </span>
                            Asignar Profesor
                        </a>
                    </div>
                </div>
                <div class="dropdown">
                    <a id="dropdownUser" class="nav-link dropdown-toggle text-light" href="#" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        Clases
                    </a>
                    <div class="dropdown-menu" aria-labelledby="dropdownUser">
                        <a class="dropdown-item" href="/classes">
                            <span class="material-symbols-outlined">
                                visibility
                            </span>
                            Ver clases
                        </a>
                        <a class="dropdown-item" href="/classes/new">
                            <span class="material-symbols-outlined">
                                person_add
                            </span>
                            Crear clase
                        </a>
                        <a class="dropdown-item" href="/classes/edit">
                            <span class="material-symbols-outlined">
                                edit
                            </span>
                            Editar clase
                        </a>
                        <a class="dropdown-item" href="/classes/delete">
                            <span class="material-symbols-outlined">
                                delete
                            </span>
                            Eliminar clase
                        </a>
                    </div>
                </div>
                <div class="dropdown">
                    <a id="dropdownUser" class="nav-link dropdown-toggle text-light" href="#" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        Asistencias
                    </a>
                    <div class="dropdown-menu" aria-labelledby="dropdownUser">
                        <a class="dropdown-item" href="/attendances">
                            <span class="material-symbols-outlined">
                                visibility
                            </span>
                            Ver asistencias
                        </a>
                        <a class="dropdown-item" href="/attendances/students">
                            <span class="material-symbols-outlined">
                                search
                            </span>
                            Por estudiante
                        </a>
                        <a class="dropdown-item" href="/attendances/new">
                            <span class="material-symbols-outlined">
                                person_add
                            </span>
                            Crear asitencia
                        </a>
                        <a class="dropdown-item" href="/attendances/edit">
                            <span class="material-symbols-outlined">
                                edit
                            </span>
                            Editar asistencia
                        </a>
                        <a class="dropdown-item" href="/attendances/delete">
                            <span class="material-symbols-outlined">
                                delete
                            </span>
                            Eliminar asistencia
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
