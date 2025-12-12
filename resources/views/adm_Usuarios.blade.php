<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="shortcut icon" href="{{ asset('Img/LogoSolyLuna.png') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{asset('css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <title>Web Inmobiliaria - Admin</title>
</head>
<body>
    <button class="toggle-menu" id="toggleMenu">
        <i class="fa-solid fa-bars"></i>
    </button>
    <nav class="menu-vertical" id="menuVertical">
        <div class="logo-menu">
            <img src="{{ asset('Img/LogoSolyLuna.png') }}" alt="Sol & Luna">
        </div>

        <ul class="opciones-menu">
            <li><a href="#"><i class="fa-solid fa-user"></i> Usuarios</a></li>
            <li><a href="#"><i class="fa-solid fa-tags"></i> Productos</a></li>
            <li><a href="#"><i class="fa-solid fa-chart-line"></i> Estadísticas</a></li>
            <li><a href="#"><i class="fa-solid fa-gear"></i> Configuración</a></li>
        </ul>
    </nav>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    const btn = document.getElementById('toggleMenu');
    const menu = document.getElementById('menuVertical');

    btn.addEventListener('click', () => {
        menu.classList.toggle('activo');
    });
</script>
</body>
</html>