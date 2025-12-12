<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="shortcut icon" href="{{ asset('Img/LogoSolyLuna.png') }}" type="image/x-icon">
    <title>Web Inmobiliaria - Inicio</title>
</head>
<body>
    <nav class="menu">
        <div class="logo"><img src="{{asset('Img/LogoSolyLuna.png')}}" alt="" ></div>
        <div class="hamburguesa" id="hamburguesa">☰</div>
        <ul class="menu-links">
            <li><a href="#"><i class="fa-solid fa-house"></i> Inicio</a></li>
            <li><a href="#"><i class="fa-solid fa-list"></i> Propiedades</a></li>
            <li><a href="#"><i class="fa-solid fa-key"></i> Alquileres</a></li>
            <li><a href="#"><i class="fa-solid fa-user-group"></i> Nosotros</a></li>
            <li><a href="#"><i class="fa-solid fa-envelope"></i> Contacto</a></li>
            @if(session()->has('usuario_id') && session('rol_id') == 1)
            <li><a href="{{url('admin_panel') }}"><i class="fas fa-gear"></i>Administracion</a></li>
            @endif
            @if(!session()->has('usuario_id') && !session()->has('rol_id'))
            <li><a href="{{url('login') }}" class="btn-iniciar-registrar"><i class="fas fa-sign-in-alt"></i> Iniciar sesión / Registrarse</a></li>
            @else
            <li>
                <form action="{{ url('logout') }} " method="POST">
                    @csrf
                    <button type="submit" class="btn-logout"> <i class="fas fa-sign-out-alt"></i> Cerrar Session</button>
                </form>
            </li>
            @endif
        </ul>
    </nav>
    
    
    <section class="inicio" id="inicio">
        <div class="inicio-cont">
            <h1>SOL && LUNA - INMOBILIARIA</h1>
            <p>En Sol & Luna Inmobiliaria trabajamos cada día para acompañarte en uno de los pasos más importantes de tu vida: encontrar el lugar ideal para vos y tu familia. Con compromiso, transparencia y una atención personalizada, te ofrecemos soluciones en alquileres, ventas y administración de propiedades. Nuestro objetivo es que vivas una experiencia simple, segura y confiable, guiándote de principio a fin para que tu próximo hogar o inversión brille con la tranquilidad y la confianza que merecés.</p>
        </div>
    </section>
</body>
</html>