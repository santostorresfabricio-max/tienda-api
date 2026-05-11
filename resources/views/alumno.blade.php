<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Alumnos</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <style>
        :root {
            --primary-color: #2563eb;
            --secondary-color: #f8fafc;
            --text-dark: #1e293b;
            --text-light: #64748b;
            --white: #ffffff;
            --accent-edit: #fbbf24;
            --accent-delete: #ef4444;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f1f5f9;
            margin: 0;
            padding: 0;
            color: var(--text-dark);
        }

        /* --- Navbar --- */
        .navbar {
            background-color: var(--white);
            padding: 1rem 2rem;
            display: flex;
            justify-content: center;
            gap: 40px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.05);
            margin-bottom: 2rem;
        }

        .nav-item {
            text-decoration: none;
            color: var(--text-dark);
            font-weight: 500;
            display: flex;
            align-items: center;
            gap: 8px;
            transition: color 0.3s;
        }

        .nav-item:hover { color: var(--primary-color); }

        /* --- Container & Table --- */
        .container { max-width: 1200px; margin: 0 auto; padding: 0 20px; }
        .table-title { font-size: 24px; color: #1e3a8a; margin-bottom: 1.5rem; }

        .btn-add {
            background-color: var(--primary-color);
            color: var(--white);
            padding: 10px 20px;
            border-radius: 8px;
            text-decoration: none;
            display: inline-block;
            font-weight: 500;
            margin-bottom: 2rem;
            cursor: pointer;
            border: none;
        }

        .table-card {
            background: var(--white);
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.05);
        }

        table { width: 100%; border-collapse: collapse; }
        thead { background-color: var(--secondary-color); border-bottom: 2px solid #e2e8f0; }
        th, td { padding: 15px; text-align: left; font-size: 14px; }
        tr:hover { background-color: #f8fafc; }

        .btn-action {
            padding: 6px 12px;
            border-radius: 6px;
            text-decoration: none;
            color: white;
            font-size: 13px;
            border: none;
            cursor: pointer;
        }
        .btn-edit { background-color: var(--accent-edit); }
        .btn-delete { background-color: var(--accent-delete); }

        .badge {
            padding: 4px 10px;
            border-radius: 20px;
            font-size: 12px;
            background: #e2e8f0;
        }

        /* --- MODALES --- */
        .modal {
            display: none;
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0,0,0,0.5);
            backdrop-filter: blur(4px);
        }

        .modal-content {
            background-color: var(--white);
            margin: 5% auto;
            padding: 2rem;
            border-radius: 12px;
            width: 500px;
            box-shadow: 0 20px 25px -5px rgba(0,0,0,0.1);
        }

        .modal-header {
            font-size: 20px;
            font-weight: 600;
            margin-bottom: 1.5rem;
            color: var(--primary-color);
        }

        .form-group { margin-bottom: 1rem; }
        .form-group label { display: block; font-size: 13px; margin-bottom: 5px; color: var(--text-light); }
        .form-group input, .form-group select {
            width: 100%;
            padding: 10px;
            border: 1px solid #e2e8f0;
            border-radius: 6px;
            font-family: 'Poppins';
        }

        .modal-footer {
            display: flex;
            justify-content: flex-end;
            gap: 10px;
            margin-top: 2rem;
        }

        .btn-cancel { background: #94a3b8; color: white; padding: 10px 20px; border-radius: 6px; cursor: pointer; border: none; }
        .btn-save { background: var(--primary-color); color: white; padding: 10px 20px; border-radius: 6px; cursor: pointer; border: none; }
    </style>
</head>
<body>

    <nav class="navbar">
        <a href="#" class="nav-item"><i class="fa-solid fa-house"></i> Dashboard</a>
        <a href="#" class="nav-item"><i class="fa-solid fa-gear"></i> Gestión</a>
        <a href="#" class="nav-item"><i class="fa-solid fa-right-from-bracket"></i> Cerrar sesión</a>
    </nav>

    <div class="container">
        <h2 class="table-title">Tabla de alumnos</h2>

        <button class="btn-add" onclick="openModal('modalAdd')">
            <i class="fa-solid fa-plus"></i> Agregar Alumno
        </button>

        <div class="table-card">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Apellidos</th>
                        <th>DNI</th>
                        <th>Estado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($alumnos as $alumno)
                    <tr>
                        <td>{{ $alumno->id_alumno }}</td>
                        <td>{{ $alumno->nombre }}</td>
                        <td>{{ $alumno->apellidos }}</td>
                        <td>{{ $alumno->dni }}</td>
                        <td><span class="badge">{{ $alumno->estado_matricula }}</span></td>
                        <td class="actions">
                        <button class="btn-action btn-edit" 
        onclick="prepareEdit(this)"
        data-id="{{ $alumno->id_alumno }}"
        data-nombre="{{ $alumno->nombre }}"
        data-apellidos="{{ $alumno->apellidos }}"
        data-dni="{{ $alumno->dni }}">
    <i class="fa-solid fa-pen"></i> Editar
</button>
                            
                            <form action="{{ route('alumnos.destroy', $alumno->id_alumno) }}" method="POST" style="display:inline;" onsubmit="return confirm('¿Eliminar alumno?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn-action btn-delete">
                                    <i class="fa-solid fa-trash"></i> Eliminar
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div id="modalAdd" class="modal">
        <div class="modal-content">
            <div class="modal-header">Nuevo Alumno</div>
            <form action="{{ route('alumnos.store') }}" method="POST">
    @csrf
    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 10px;">
        <div class="form-group">
            <label>Nombre</label>
            <input type="text" name="nombre" required>
        </div>
        <div class="form-group">
            <label>Apellidos</label>
            <input type="text" name="apellidos" required>
        </div>
    </div>

    <div class="form-group">
        <label>DNI</label>
        <input type="text" name="dni" required maxlength="8">
    </div>

    <div class="form-group">
        <label>Fecha de Nacimiento</label>
        <input type="date" name="fecha_nacimiento" required>
    </div>

    <div class="form-group">
        <label>Email</label>
        <input type="email" name="email">
    </div>

    <div class="form-group">
        <label>Estado</label>
        <select name="estado_matricula">
            <option value="matriculado">Matriculado</option>
            <option value="inactivo">Inactivo</option>
        </select>
    </div>

    <div class="modal-footer">
        <button type="button" class="btn-cancel" onclick="closeModal('modalAdd')">Cancelar</button>
        <button type="submit" class="btn-save">Guardar Alumno</button>
    </div>
</form>
        </div>
    </div>

    <div id="modalEdit" class="modal">
        <div class="modal-content">
            <div class="modal-header">Editar Alumno</div>
            <form id="formEdit" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label>Nombre</label>
                    <input type="text" name="nombre" id="edit_nombre" required>
                </div>
                <div class="form-group">
                    <label>Apellidos</label>
                    <input type="text" name="apellidos" id="edit_apellidos" required>
                </div>
                <div class="form-group">
                    <label>DNI</label>
                    <input type="text" name="dni" id="edit_dni" required>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn-cancel" onclick="closeModal('modalEdit')">Cancelar</button>
                    <button type="submit" class="btn-save">Actualizar</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function openModal(id) {
            document.getElementById(id).style.display = "block";
        }

        function closeModal(id) {
            document.getElementById(id).style.display = "none";
        }

        function prepareEdit(btn) {
    // Leemos los datos desde los atributos del botón
    const id = btn.getAttribute('data-id');
    const nombre = btn.getAttribute('data-nombre');
    const apellidos = btn.getAttribute('data-apellidos');
    const dni = btn.getAttribute('data-dni');

    // Llenamos el formulario del modal
    document.getElementById('edit_nombre').value = nombre;
    document.getElementById('edit_apellidos').value = apellidos;
    document.getElementById('edit_dni').value = dni;
    
    // Actualizamos la ruta del formulario
    const form = document.getElementById('formEdit');
    form.action = `/alumnos/${id}`;
    
    openModal('modalEdit');
}

        // Cerrar modal si se hace clic fuera de él
        window.onclick = function(event) {
            if (event.target.className === 'modal') {
                event.target.style.display = "none";
            }
        }
    </script>
</body>
</html>