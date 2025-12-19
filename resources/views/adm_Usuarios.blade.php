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

    <div class="tabla-cont">
        <h1>ADMINISTRADOR DE USUARIOS 📝</h1>
        <button class="btn-crear-usuario" id="btn-crear-usuario">CREAR USUARIO</button>
        <table class="tabla">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre y Apellido</th>
                    <th>Gmail</th>
                    <th>Telefono</th>
                    <th>Estado</th>
                    <th>Rol</th>
                    <th>Fecha de Creacion</th>
                </tr>
            </thead>
            <tbody id="tabla_usuarios"></tbody>
        </table>
    </div>

    <div class="createModal" id="createModal">
	<div class="modal-content">
		<h2>CREAR USUARIO</h2>
		<form id="formCrearUsuario">
			<div class="form-group">
				<label for="createNombreyApellido">Nombre y Apellido:</label>
				<input type="text" id="createNombreyApellido" placeholder="Ingrese el nombre y apellido." required>
			</div>
			<div class="form-group">
				<label for="createGmail">Gmail:</label>
				<input type="text" id="createGmail" placeholder="Ingrese el gmail." required>
			</div>
			<div class="form-group">
				<label for="createTelefono">Telefono:</label>
				<input type="text" id="createTelefono" placeholder="Ingrese el numero de telefono (2954)" required>
			</div>
			<div class="form-group">
				<label for="createEstado"></label>
				<select id="createEstado" required>
					<option value="Activo">Activo</option>
					<option value="Inactivo">Inactivo</option>
				</select>
			</div>
			<div class="form-group">
				<label for="createRol"></label>
				<select id="createRol">
					<option value="">Seleccione un rol.</option>
				</select>
			</div>
            	<div class="form-group">
				<label for="createClave">Contraseña:</label>
				<input type="text" id="createClave" placeholder="Ingrese una contraseña." required>
			</div>
            	<div class="form-group">
				<label for="createRClave">Repetir contraseña:</label>
				<input type="text" id="createRClave" placeholder="Repita la contraseña." required>
			</div>
			 <div class="modal-buttons">
                <button type="button"class="cancelar-btn" onclick="cerrarModalCrear()">Cancelar</button>
                <button type="submit" class="btn-crear-usuario">Crear Libro</button>
            </div>
		</form>
	</div>
</div>



    
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    const btn = document.getElementById('toggleMenu');
    const menu = document.getElementById('menuVertical');

    btn.addEventListener('click', () => {
        menu.classList.toggle('activo');
    });
</script>
<script src="{{asset('js/usuarios.js') }}"></script>
</body>
</html>