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
    <title>Document</title>
</head>
<body>
    <nav class="menu">
        <div class="logo"><a href="{{ url('/') }}"><img src="{{asset('Img/LogoSolyLuna.png')}}" alt="" ></a></div>
    </nav>
    <section class="register">
        <div class="register-cont">
            <h1>¡UNITE A NUESTRA FAMILIA! 🏡</h1>
            <form id="registerForm">
                <div class="campos-register">
                    <label for="nombre_apellido"><i></i>Nombre y apellido: </label>
                    <input type="text" id="registerNombreApellido" name="registerNombreApellido" placeholder="Ingrese su nombre y apellido.">
                </div>
                <div class="campos-register">
                    <label for="gmail"><i></i>Gmail: </label>
                    <input type="text" id="registerGmail" name="registerGmail" placeholder="Ingrese su gmail.">
                </div>
                <div class="campos-register">
                    <label for="telefono"><i></i>Telefono: </label>
                    <input type="text" id="registerTelefono" name="registerTelefono" placeholder="Ingrese su numero de telefono (2954...)">
                </div>
                <div class="campos-register">
                    <label for="clave"><i></i>Contraseña: </label>
                    <input type="text" id="registerClave" name="registerClave" placeholder="Ingrese su clave">
                </div>
                <div class="campos-register">
                    <label for="rclave"><i></i>Repetir Clave: </label>
                    <input type="text" id="registerRClave" name="registerRClave" placeholder="Ingrese su clave nuevamente.">
                </div>

                <div class="botones-register">
                    <a href="{{ url('/login') }}">¿Tienes cuenta? Inicia Session.</a>
                    <button type="submit">Registrar</button>
                </div>
            </form>
        </div>
    </section>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="{{ asset('js/usuarios.js') }}"></script>

</body>
</html>