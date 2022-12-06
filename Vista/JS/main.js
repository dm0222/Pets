/* formulario de registro */

let validarMenuD = 0

$(".submit02").click(function () {
    switch (validarMenuD){
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
    switch (validarRecuperacion){
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

