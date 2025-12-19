$(document).ready(function(){
    registrarUsuario();
    iniciarSession();
    crearUsuario();
})

function registrarUsuario(){
    
    //VALIDAMOS QUE EL FORMULARIO EXISTA
    const formulario = $("#registerForm");
    if(formulario.length === 0) return;

    //CAPTURAMOS EL ENVIO DEL FORMULARIO
    formulario.on("submit", function(e){
        //PREVENIMOS EL ENVIO POR DEFECTO
        e.preventDefault();

        //CREAMOS UN FORMDATA
        let formData = {
            //TOMAMOS LOS VALORES DE LOS INPUTS
            nombre_apellido: $("#registerNombreApellido").val(),
            gmail: $("#registerGmail").val(),
            telefono: $("#registerTelefono").val(),
            clave: $("#registerClave").val(),
            rclave: $("#registerRClave").val(),
        }

        $.ajax({
            url: "registrarUsuario",
            method: "POST",
            data: formData,
            dataType: "json",
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
            },
            success: function(res){
                if(res.success){
                    Swal.fire({
                        icon: "success",
                        title: "Bienvenido",
                        text: res.message
                    });
                }else{
                    Swal.fire({
                        icon: "error",
                        title: "Error",
                        text: res.message
                    });
                }
            }, 
            error: function(xhr){
                console.log(xhr.responseText);
                Swal.fire({
                    icon: "error",
                    title: "ERROR.",
                    text: "Ha ocurrido un error inesperado."
                });
            }
        })
    })
}

//FUNCION PARA INICIAR SESSION
function iniciarSession(){

    //VALIDAMOS QUE EL FORMULARIO DE LOGIN EXISTA
    const formulario = $("#loginForm");
    if(formulario.length === 0) return;

    //CAPTURAMOS EL EVENTO SUBMIT
    formulario.on("submit", function(e){
        //PREVENIMOS EL ENVIO POR DEFECTO DEL FORMULARIO
        e.preventDefault();

        //CREAMOS EL FORMDATA Y TOMAMOS LOS VALORES
        let formData = {
            gmail: $("#loginGmail").val(),
            clave: $("#loginClave").val(),
        }

        $.ajax({
            url: "iniciarSession",
            method: "POST",
            data: formData,
            dataType: "json",
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
            },
            success: function(res){
                if(res.success){
                    Swal.fire({
                        icon: "success",
                        title: "Inicio de Session exitoso",
                        text: res.message,
                    }).then(() => {
                        window.location.href = "/";
                    });
                }else{
                    Swal.fire({
                        icon: "error",
                        title: "Ha ocurrido un error.",
                        text: res.message,
                    });
                }
            },
            error: function(xhr){
                console.log(xhr.responseText);
                Swal.fire({
                    icon: "error",
                    title: "ERROR",
                    text: "Ha ocurrido un error inesperado.",
                });
            }
        })
    })
}

//ABRIR MODAL
$('#btn-crear-usuario').on("click", function(){
    $('#createModal').fadeIn(200);
});

function crearUsuario(){
    const formulario = $('#formCrearUsuario');
    if(formulario.length === 0) return;

    formulario.on("submit", function(e){
        //PREVENIMOS EL ENVIO POR DEFECTO
        e.preventDefault();

        //CREAMOS EL FORM DATA
        let formData = {
            nombre_apellido: $("#createNombreyApellido").val(),
            gmail: $("#createGmail").val(),
            telefono: $("#createTelefono").val(),
            estado: $("#createEstado").val(),
            rol_id: $("#createRol").val(),
            clave: $("#createClave").val(),
            rclave: ("#createRClave").val(),
        }

        //AJAX
        $.ajax({
            url: "crearUsuario",
            method: "POST",
            data: formData,
            dataType: "json",
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
            },
            success: function(res){
                if(res.success){
                    Swal.fire({
                        icon: "success",
                        title: "Usuario creado exitosamente",
                        text: res.message,
                    });
                }else{
                    Swal.fire({
                        icon: "error",
                        title: "Ha ocurrido un error",
                        text: res.message,
                    });
                }
            },
            error: function(xhr){
                console.log(xhr.responseText)
                Swal.fire({
                    icon: "error",
                    title: "Ha ocurrido un error inesperado.",
                    text: res.message,
                });
            }
        })
    })
}