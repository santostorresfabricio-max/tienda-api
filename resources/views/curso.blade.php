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
    <h2 class="table-title">Gestión de Cursos</h2>

    <button class="btn-add">
        <i class="fa-solid fa-plus"></i> Nuevo Curso
    </button>

    <div class="table-card">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre del Curso</th>
                    <th>Descripción</th>
                    <th>Créditos</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($cursos as $curso)
                <tr>
                    <td>{{ $curso->id_curso }}</td>
                    <td><strong>{{ $curso->nombre_curso }}</strong></td>
                    <td style="color: var(--text-light)">{{ $curso->descripcion }}</td>
                    <td>
                        <span class="badge" style="background: #dcfce7; color: #166534;">
                            {{ $curso->creditos }} pts
                        </span>
                    </td>
                    <td class="actions">
                        <button class="btn-action btn-edit"><i class="fa-solid fa-pen"></i></button>
                        <button class="btn-action btn-delete"><i class="fa-solid fa-trash"></i></button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

