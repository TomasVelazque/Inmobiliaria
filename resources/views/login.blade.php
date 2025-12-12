<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="shortcut icon" href="{{ asset('Img/LogoSolyLuna.png') }}" type="image/x-icon">
    <title>Web Inmobiliaria - Login</title>
</head>
<body>
    <nav class="menu">
        <div class="logo"><img src="{{asset('Img/LogoSolyLuna.png')}}" alt="" ></div>
    </nav>

    <section class="login">
        <div class="login-cont">
            <form class="loginForm" id="loginForm">
                <h1>¡INICIAR SESSION!</h1>
                <div class="campos-login">
                    <label for="gmail"><i class="fa-solid fa-envelope"></i>Gmail: </label>
                    <input type="text" id="loginGmail" name="loginGmail" placeholder="Ingrese su gmail.">
                </div>
                <div class="campos-login">
                    <label for="clave"><i class="fa-solid fa-lock"></i>Contraseña: </label>
                    <input type="text" id="loginClave" name="loginClave" placeholder="Ingrese su clave">
                </div>
                <div class="botones-login">
                    <a href="{{ url('/register') }}">¿No tienes cuenta? Registrate.</a>
                    <button type="submit">Iniciar Session</button>
                </div>
            </form>
        </div>
    </section>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="{{ asset('js/usuarios.js') }}"></script>
</body>
</html>