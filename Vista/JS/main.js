/* imagen del menu superior del escritorio del medico */
function ImgAleatoria() {
    var imgan = Math.floor(Math.random() * 2);
    switch (imgan) {
        case 0:
            $(".icon01").attr("src", "../Img/Iconos/gato.png");
            break;
        case 1:
            $(".icon01").attr("src", "../Img/Iconos/perro.png");
            break;
    }
}

/* imagen de backgound */
function ImgBackgound() {
    var imgan = Math.floor(Math.random() * 9);
    switch (imgan) {
        case 0:
            $(".imgBackground").attr("src", "../Img/Background/001.jpg");
            break;
        case 1:
            $(".imgBackground").attr("src", "../Img/Background/002.jpg");
            break;
        case 2:
            $(".imgBackground").attr("src", "../Img/Background/003.jpg");
            break;
        case 3:
            $(".imgBackground").attr("src", "../Img/Background/004.jpg");
            break;
        case 4:
            $(".imgBackground").attr("src", "../Img/Background/005.jpg");
            break;
        case 5:
            $(".imgBackground").attr("src", "../Img/Background/006.jpg");
            break;
        case 6:
            $(".imgBackground").attr("src", "../Img/Background/007.jpg");
            break;
        case 7:
            $(".imgBackground").attr("src", "../Img/Background/008.jpg");
            break;
        case 8:
            $(".imgBackground").attr("src", "../Img/Background/009.jpg");
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

/* formato de recuperacion de contrase??a*/

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
            $(".contenedor-registro").animate({ "left": "24.5%" }, 1000);
            ValidarRegistroPropietario = 1;
            break;
        case 1:
            $(".contenedor-registro").animate({ "left": "150%" }, 1000);
            ValidarRegistroPropietario = 0;
            break;
    }
});

// Boton del menu central 

$(".registroP").click(function () {
    $(".contenedor-registro").animate({ "left": "24.5%" }, 1000);
});

// Boton Cerrar

$(".cerrarRegistroP").click(function () {
    $(".contenedor-registro").animate({ "left": "150%" }, 1000);
    $(".FormPropietario").css("display", "none");
    $(".FromMascota").css("display", "none");
});

// Mune central Registro de propietario y mascota

$(".RegPropietario").click(function () {
    $(".FormPropietario").css("display", "block");
});

$(".RegMascota").click(function () {
    $(".FromMascota").css("display", "block");
});

// volver

$(".volver01").click(function () {
    $(".FormPropietario").css("display", "none");
    $(".FromMascota").css("display", "none");
});

/* Historia Clinica */

// Boton del menu de la Izquierda

let ValidarHistoriaClinica = 0

$(".historiaClinica01").click(function () {
    switch (ValidarHistoriaClinica) {
        case 0:
            $(".contenedor-historia").animate({ "left": "24.5%" }, 1000);
            ValidarHistoriaClinica = 1;
            break;
        case 1:
            $(".contenedor-historia").animate({ "left": "150%" }, 1000);
            ValidarHistoriaClinica = 0;
            break;
    }
});

$(".historiaC").click(function () {
    $(".contenedor-historia").animate({ "left": "24.5%" }, 1000);
});

// Boton Cerrar Historia clinica

$(".cerrarHistoria").click(function () {
    $(".contenedor-historia").animate({ "left": "150%" }, 1000);
});


/////////////////////////////////////////////////////////////////

// Servicios de Historia Clinica

// Menu Izquierda de Historia

// Perfil

let ValidarPerfil = 0;

$(".Perfil01").click(function () {
    switch (ValidarPerfil) {
        case 0:
            $(".perfil").animate({ "left": "24.5%" }, 1000);
            ValidarPerfil = 1;
            break;
        case 1:
            $(".perfil").animate({ "left": "150%" }, 1000);
            ValidarPerfil = 0;
            break;
    }
});

$(".Perfil02").click(function () {
    $(".perfil").animate({ "left": "24.5%" }, 1000);
    ValidarPerfil = 1;
});

// hover para boton editar

$(".EditarPerfil").hover(function () {
    $(".EditarPerfil").css({ "background": "#36A420" }, 1000);
    $(".EditarPerfil").val("Guardar");
}, function () {
    $(".EditarPerfil").css({ "background": "#FFA300" }, 1000);
    $(".EditarPerfil").val("Editar");
});

// Agemdar Cita medica

let ValidarAgendar = 0

$(".Agendar01").click(function () {
    switch (ValidarAgendar) {
        case 0:
            $(".agendar").animate({ "left": "24.5%" }, 1000);
            ValidarAgendar = 1;
            break;
        case 1:
            $(".agendar").animate({ "left": "150%" }, 1000);
            ValidarAgendar = 0;
            break;
    }
});

$(".Agendar02").click(function () {
    $(".agendar").animate({ "left": "24.5%" }, 1000);
    ValidarAgendar = 1;
});

$(".consultarCita").click(function () {
    $(".listarCita").css("display", "block");
});

$(".volverListaCita").click(function () {
    $(".listarCita").css("display", "none");
});

// Cirugia

let ValidarCirugia = 0

$(".Cirugia01").click(function () {
    switch (ValidarCirugia) {
        case 0:
            $(".cirugia").animate({ "left": "24.5%" }, 1000);
            ValidarCirugia = 1;
            break;
        case 1:
            $(".cirugia").animate({ "left": "150%" }, 1000);
            ValidarCirugia = 0;
            break;
    }
});

$(".Cirugia02").click(function () {
    $(".cirugia").animate({ "left": "24.5%" }, 1000);
    ValidarCirugia = 1;
});

// Cita Medica

let ValidarCita = 0

$(".Cita01").click(function () {
    switch (ValidarCita) {
        case 0:
            $(".cita").animate({ "left": "24.5%" }, 1000);
            ValidarCita = 1;
            break;
        case 1:
            $(".cita").animate({ "left": "150%" }, 1000);
            ValidarCita = 0;
            break;
    }
});

$(".Cita02").click(function () {
    $(".cita").animate({ "left": "24.5%" }, 1000);
    ValidarCita = 1;
});

// Examen

let ValidarExamen = 0

$(".Examen01").click(function () {
    switch (ValidarExamen) {
        case 0:
            $(".examen").animate({ "left": "24.5%" }, 1000);
            ValidarExamen = 1;
            break;
        case 1:
            $(".examen").animate({ "left": "150%" }, 1000);
            ValidarExamen = 0;
            break;
    }
});

$(".Examen02").click(function () {
    $(".examen").animate({ "left": "24.5%" }, 1000);
    ValidarExamen = 1;
});

// Hospitalizacion

let ValidarHospitalizacion = 0

$(".Hospitalizacion01").click(function () {
    switch (ValidarHospitalizacion) {
        case 0:
            $(".hospitalizacion").animate({ "left": "24.5%" }, 1000);
            ValidarHospitalizacion = 1;
            break;
        case 1:
            $(".hospitalizacion").animate({ "left": "150%" }, 1000);
            ValidarHospitalizacion = 0;
            break;
    }
});

$(".Hospitalizacion02").click(function () {
    $(".hospitalizacion").animate({ "left": "24.5%" }, 1000);
    ValidarHospitalizacion = 1;
});

// Remision

let ValidarRemision = 0

$(".Remision01").click(function () {
    switch (ValidarRemision) {
        case 0:
            $(".remision").animate({ "left": "24.5%" }, 1000);
            ValidarRemision = 1;
            break;
        case 1:
            $(".remision").animate({ "left": "150%" }, 1000);
            ValidarRemision = 0;
            break;
    }
});

$(".Remision02").click(function () {
    $(".remision").animate({ "left": "24.5%" }, 1000);
    ValidarRemision = 1;
});

// Vacunacion

let ValidarVacunacion = 0

$(".Vacunacion01").click(function () {
    switch (ValidarVacunacion) {
        case 0:
            $(".vacunacion").animate({ "left": "24.5%" }, 1000);
            ValidarVacunacion = 1;
            break;
        case 1:
            $(".vacunacion").animate({ "left": "150%" }, 1000);
            ValidarVacunacion = 0;
            break;
    }
});

$(".Vacunacion02").click(function () {
    $(".vacunacion").animate({ "left": "24.5%" }, 1000);
    ValidarVacunacion = 1;
});

// Formula Medica 

$(".formulaMedica").click(function () {
    $(".contenedorFormula").css("display", "block");
});

$(".volverFromula").click(function () {
    $(".contenedorFormula").css("display", "none");
});

// Formula Medica de Cirugia

$(".formulaMedicaE").click(function () {
    $(".contenedorFormulaE").css("display", "block");
});

$(".volverFromulaE").click(function () {
    $(".contenedorFormulaE").css("display", "none");
});

// Formula Medica de Hospitalizaci??n

$(".formulaMedicaH").click(function () {
    $(".contenedorFormulaH").css("display", "block");
});

$(".volverFromulaH").click(function () {
    $(".contenedorFormulaH").css("display", "none");
});


// Boton cerrar servicios

$(".cerrarServicio").click(function () {
    $(".perfil").animate({ "left": "150%" }, 1000);
    $(".agendar").animate({ "left": "150%" }, 1000);
    $(".cirugia").animate({ "left": "150%" }, 1000);
    $(".cita").animate({ "left": "150%" }, 1000);
    $(".examen").animate({ "left": "150%" }, 1000);    
    $(".hospitalizacion").animate({ "left": "150%" }, 1000);
    $(".remision").animate({ "left": "150%" }, 1000);
    $(".vacunacion").animate({ "left": "150%" }, 1000);
});

//Scripts Administrador

// Perfil

let ValidarPerfilAdm = 0

$(".PerfilAdm01").click(function () {
    switch (ValidarPerfilAdm) {
        case 0:
            $(".perfil").animate({ "left": "24.5%" }, 1000);
            $(".perfil").css("z-index", "1");
            $(".listar").css("z-index", "0");
            ValidarPerfilAdm = 1;
            break;
        case 1:
            $(".perfil").animate({ "left": "150%" }, 1000);
            $(".perfil").css("z-index", "0");
            ValidarPerfilAdm = 0;
            break;
    }
});

$(".PerfilAdm02").click(function () {
    $(".perfil").animate({ "left": "24.5%" }, 1000);
    $(".perfil").css("z-index", "1");
    $(".listar").css("z-index", "0");
    ValidarPerfilAdm = 1;
});

$(".cerrarperfil").click(function () {
    $(".perfil").animate({ "left": "150%" }, 1000);
    $(".perfil").css("z-index", "0");
    ValidarPerfilAdm = 0;
});

// Listar

let ValidarListar = 0

$(".Listar01").click(function () {
    switch (ValidarListar) {
        case 0:
            $(".listar").animate({ "left": "24.5%" }, 1000);
            $(".listar").css("z-index", "1");
            $(".perfil").css("z-index", "0");
            ValidarListar = 1;
            break;
        case 1:
            $(".listar").animate({ "left": "150%" }, 1000);
            $(".listar").css("z-index", "0");
            ValidarListar = 0;
            break;
    }
});

$(".Listar02").click(function () {
    $(".listar").animate({ "left": "24.5%" }, 1000);
    $(".listar").css("z-index", "1");
    $(".perfil").css("z-index", "0");
    ValidarListar = 1;
});

$(".cerrarListar").click(function () {
    $(".listar").animate({ "left": "150%" }, 1000);
    $(".listar").css("z-index", "0");
    ValidarListar = 0;
});
