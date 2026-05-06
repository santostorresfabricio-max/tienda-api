<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro Moderno | Estudiantes</title>
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    

    <style>
        :root {
    --primary-gradient: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    --accent-color: #ff4b2b;
    --glass-bg: rgba(255, 255, 255, 0.95);
    --text-color: #2d3436;
}

body {
    font-family: 'Poppins', sans-serif;
    background: linear-gradient(-45deg, #ee7752, #e73c7e, #23a6d5, #23d5ab);
    background-size: 400% 400%;
    animation: gradientBG 15s ease infinite;
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
    margin: 0;
    padding: 20px;
}

@keyframes gradientBG {
    0% { background-position: 0% 50%; }
    50% { background-position: 100% 50%; }
    100% { background-position: 0% 50%; }
}

.container {
    background: var(--glass-bg);
    padding: 40px;
    border-radius: 20px;
    box-shadow: 0 15px 35px rgba(0,0,0,0.2);
    width: 100%;
    max-width: 450px;
    backdrop-filter: blur(10px);
}

h1 {
    color: var(--text-color);
    text-align: center;
    font-weight: 700;
    margin-bottom: 30px;
    font-size: 2.3rem;
}

h1 i {
    color: #764ba2;
    margin-right: 10px;
}

.form-group {
    margin-bottom: 20px;
    position: relative;
}

.form-group i {
    position: absolute;
    left: 15px;
    top: 40px;
    color: #544ba2;
}

label {
    display: block;
    margin-bottom: 8px;
    font-weight: 500;
    font-size: 0.9rem;
    color: #636e72;
}

input[type="text"],
input[type="email"],
input[type="password"],
select {
    width: 100%;
    padding: 12px 15px 12px 45px;
    border: 2px solid #dfe6e9;
    border-radius: 12px;
    box-sizing: border-box;
    font-family: 'Poppins', sans-serif;
    transition: all 0.3s ease;
}

input:focus, select:focus {
    border-color: #6c5ce7;
    box-shadow: 0 0 10px rgba(108, 92, 231, 0.2);
    outline: none;
}

.checkbox-group {
    display: flex;
    align-items: center;
    gap: 10px;
    font-size: 0.85rem;
    margin: 20px 0;
}

button {
    width: 100%;
    padding: 15px;
    border: none;
    border-radius: 12px;
    background: var(--primary-gradient);
    color: white;
    font-size: 1rem;
    font-weight: 600;
    cursor: pointer;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    text-transform: uppercase;
    letter-spacing: 1px;
}

button:hover {
    transform: translateY(-3px);
    box-shadow: 0 10px 20px rgba(118, 75, 162, 0.3);
}

.alert {
    padding: 15px;
    border-radius: 12px;
    margin-bottom: 20px;
    font-size: 0.85rem;
    display: flex;
    align-items: center;
    gap: 10px;
}
.alert-success { background: #d1fae5; color: #065f46; border-left: 5px solid #10b981; }
.alert-error { background: #fee2e2; color: #991b1b; border-left: 5px solid #ef4444; }


    </style>

</head>
<body>


<div class="container">
    <h1>Registro</h1>

    @if(session('success'))
        <div class="alert alert-success">
            <i class="fas fa-check-circle"></i> {{ session('success') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-error">
            <i class="fas fa-exclamation-triangle"></i>
            <ul style="margin:0; padding-left:15px;">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ url('/register') }}" method="POST">
        @csrf
        
        <div class="form-group">
            <label for="name">Nombre Completo</label>
            <i class="fas fa-user"></i>
            <input type="text" id="name" name="name" placeholder="Tu nombre aquí" required>
        </div>

        <div class="form-group">
            <label for="email">Email Institucional</label>
            <i class="fas fa-envelope"></i>
            <input type="email" id="email" name="email" placeholder="ejemplo@u.edu" required>
        </div>

        <div class="form-group">
            <label for="password">Contraseña</label>
            <i class="fas fa-lock"></i>
            <input type="password" id="password" name="password" placeholder="Mínimo 8 caracteres" required>
        </div>

        <div class="form-group">
            <label for="password_confirmation">Confirmar Contraseña</label>
            <i class="fas fa-shield-alt"></i>
            <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Repite tu clave" required>
        </div>

        <div class="form-group">
            <label for="career_id">Carrera</label>
            <i class="fas fa-book-open" style="top: 40px;"></i>
            <select name="career_id" id="career_id" required>
                <option value="" disabled selected>Selecciona tu especialidad</option>
                @foreach($careers as $career)
                    <option value="{{ $career->id }}">{{ $career->name }}</option>
                @endforeach
            </select>
        </div>

        <label class="checkbox-group">
            <input type="checkbox" name="terms_accepted" id="terms_accepted" required>
            <span>Acepto los términos y condiciones</span>
        </label>

        <button type="submit">
            Finalizar Registro <i class="fas fa-arrow-right" style="margin-left:8px;"></i>
        </button>
    </form>
</div>

</body>
</html>