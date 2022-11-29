let validarMenuD = 0

$(".submit02").click(function () {
    if (validarMenuD == 0) {
        $(".contenedor-derecha-registro").css("display", "block"), function () {
            $(".submit02").css("background", "#F0F0F0");
            $(".submit02").css("color", "#36A420");
            validarMenuD = 1
        };

    };
    if (validarMenuD == 1) {
        $(".contenedor-derecha-registro").css("display", "none"), function () {
            $(".submit02").css("background", "#36A420");
            $(".submit02").css("color", "#FFF");
            validarMenuD = 0
        };
    };
});

$(".cerrar").click(function () {
    $(".contenedor-derecha-registro").css("display", "none");
    $(".submit02").css("background", "#36A420");
    $(".submit02").css("color", "#FFF");
    validarMenuD = 0
});