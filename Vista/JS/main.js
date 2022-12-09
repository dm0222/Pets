/* imagen del menu superior del escritorio del medico */
function ImgAleatoria() {
    var imgan = Math.floor(Math.random() * 2);
    switch (imgan) {
        case 0:
            $(".icon01").attr("src", "../Img/gato.png");
            break;
        case 1:
            $(".icon01").attr("src", "../Img/perro.png");
            break;
    }
}

/* formulario de registro */

let validarMenuD = 0

$(".submit02").click(function () {
    switch (validarMenuD) {
        case 0:
            $(".contenedor-registro").css("display", "block");
            $(".submit02").css("background", "#F0F0F0");
            $(".submit02").css("color", "#36A420");
            validarMenuD = 1;
            break;
        case 1:
            $(".contenedor-registro").css("display", "none");
            $(".submit02").css("background", "#36A420");
            $(".submit02").css("color", "#FFF");
            validarMenuD = 0;
            break;
    }
});

$(".cerrar").click(function () {
    $(".contenedor-registro").css("display", "none");
    $(".submit02").css("background", "#36A420");
    $(".submit02").css("color", "#FFF");
    validarMenuD = 0
});

/* formato de recuperacion de contraseña*/

let validarRecuperacion = 0

$(".recuperar").click(function () {
    switch (validarRecuperacion) {
        case 0:
            $(".submenu-recuperar").css("display", "block");
            validarRecuperacion = 1;
            break;
        case 1:
            $(".submenu-recuperar").css("display", "none");
            validarRecuperacion = 0;
            break;
    }
});

/* Registro de propietario y mascota */

// Boton del menu de la Izquierda

let ValidarRegistroPropietario = 0

$(".RegistroPropietario").click(function () {
    switch (ValidarRegistroPropietario) {
        case 0:
            $(".contenedor-registro").animate({"left":"24.5%"},1000);
            ValidarRegistroPropietario = 1;
            break;
        case 1:
            $(".contenedor-registro").animate({"left":"150%"},1000);
            ValidarRegistroPropietario = 0;
            break;
    }
});

// Boton del menu central 

$(".registroP").click(function () {
    $(".contenedor-registro").animate({"left":"24.5%"},1000);
});

// Boton Cerrar
 
$(".cerrarRegistroP").click(function () {
    $(".contenedor-registro").animate({"left":"150%"},1000);
});

