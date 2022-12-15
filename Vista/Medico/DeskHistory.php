<?php
//session_start();
$inn = 500;

$Cod_Medico = $_GET['CodMedico'];
$Cod_HistClinc = $_GET['CodHC'];
$_SESSION['Correo'] = $_GET['Correo'];

if (isset($_SESSION['timeout'])) {
    $_session_life = time() - $_SESSION['timeout'];
    if ($_session_life > $inn) {
        session_destroy();
        header("location: ../../Index.php");
    }
}
$_SESSION['timeout'] = time();

if ($_SESSION['Correo']) {
    require_once("$_SERVER[DOCUMENT_ROOT]/Pets/Controlador/listar.php");
    require_once("$_SERVER[DOCUMENT_ROOT]/Pets/Controlador/buscar.php");
    require_once("$_SERVER[DOCUMENT_ROOT]/Pets/Controlador/registros.php");
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/glider-js@1.7.7/glider.min.css">
    <link rel="stylesheet" href="http://localhost/Pets/Vista/CSS/DeskHistoria.css">
    <link rel="icon" href="../Img/Iconos/icon.png" />

    <title>Desk Pet</title>
</head>
<body>
    <!-- background -->
    <div class="img-background">
        <img class="imgBackground" alt="">
    </div>
    <!-- Contenedor General -->
    <div class="contenedor-general">
        <!-- Menu superior -->
        <div class="menu-superior">
            <p>Pets ++</p>
            <img class="icon01">
        </div>
        <!-- Menu izquierda  -->
        <div class="menu-izquierda">
            <div class="Agendar01">
                <img src="../Img/Iconos/agendarCita.png ">
                <p>Agendar Cita Medica</p>
            </div>
            <div class="Cirugia01">
                <img src="../Img/Iconos/cirugia.png ">
                <p>Cirugia</p>
            </div>
            <div class="Cita01">
                <img src="../Img/Iconos/citaMedica.png ">
                <p>Cita Medica</p>
            </div>
            <div class="Examen01">
                <img src="../Img/Iconos/examenes.png ">
                <p>Examenes Medicos</p>
            </div>
            <div class="Formula01">
                <img src="../Img/Iconos/formulaMedica.png ">
                <p>Formula Medica</p>
            </div>
            <div class="Hospitalizacion01">
                <img src="../Img/Iconos/hospitalización.png ">
                <p>Hospitalización</p>
            </div>
            <div class="Remision01">
                <img src="../Img/Iconos/remisión.png ">
                <p>Remisión</p>
            </div>
            <div class="Vacunacion01">
                <img src="../Img/Iconos/vacunación.png ">
                <p>Vacunación</p>
            </div>
        </div>

        <!-- Menu central  -->
        <div class="menu-central">
            <div class="Agendar02">
                <img src="../Img/Iconos/agendarCita.png ">
                <p>Agendar Cita <br>Medica</p>
            </div>
            <div class="Cirugia02">
                <img src="../Img/Iconos/cirugia.png ">
                <p>Cirugia</p>
            </div>
            <div class="Cita02">
                <img src="../Img/Iconos/citaMedica.png ">
                <p>Cita Medica</p>
            </div>
            <div class="Examen02">
                <img src="../Img/Iconos/examenes.png ">
                <p>Examenes Medicos</p>
            </div>
            <div class="Formula02">
                <img src="../Img/Iconos/formulaMedica.png ">
                <p>Formula Medica</p>
            </div>
            <div class="Hospitalizacion02">
                <img src="../Img/Iconos/hospitalización.png ">
                <p>Hospitalización</p>
            </div>
            <div class="Remision02">
                <img src="../Img/Iconos/remisión.png ">
                <p>Remisión</p>
            </div>
            <div class="Vacunacion02">
                <img src="../Img/Iconos/vacunación.png ">
                <p>Vacunación</p>
            </div>
        </div>

        
        <!-- Servicios  -->
        <div class="servicio agendar">
            <div class="contendor-titulo agendar-titulo">
                <p>Agendar Cita Medica</p>
            </div>
            <img class="cerrarServicio" src="../Img/Iconos/cerrar.png">
        </div>
        <div class="servicio cirugia">
            <div class="contendor-titulo cirugia-titulo">
                <p>Cirugia</p>
            </div>
            <img class="cerrarServicio" src="../Img/Iconos/cerrar.png">
        </div>
        <div class="servicio cita">
            <div class="contendor-titulo cita-titulo">
                <p>Cita Medica</p>
            </div>
            <img class="cerrarServicio" src="../Img/Iconos/cerrar.png">
        </div>
        <div class="servicio examen">
            <div class="contendor-titulo examen-titulo">
                <p>Examen</p>
            </div>
            <img class="cerrarServicio" src="../Img/Iconos/cerrar.png">
        </div>
        <div class="servicio formula">
            <div class="contendor-titulo formula-titulo">
                <p>Formula Medica</p>
            </div>
            <img class="cerrarServicio" src="../Img/Iconos/cerrar.png">
        </div>
        <div class="servicio hospitalizacion">
            <div class="contendor-titulo hospitalizacion-titulo">
                <p>Hospitalización</p>
            </div>
            <img class="cerrarServicio" src="../Img/Iconos/cerrar.png">
        </div>
        <div class="servicio remision">
            <div class="contendor-titulo remision-titulo">
                <p>Remisión</p>
            </div>
            <img class="cerrarServicio" src="../Img/Iconos/cerrar.png">
        </div>
        <div class="servicio vacunacion">
            <div class="contendor-titulo vacunacion-titulo">
                <p>Vacunación</p>
            </div>
            <img class="cerrarServicio" src="../Img/Iconos/cerrar.png">
        </div>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.8.0/dist/chart.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2.0.0/dist/chartjs-plugin-datalabels.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.debug.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/glider-js@1.7.7/glider.min.js"></script>
    <script src="../JS/jquery-3.6.1.min.js"></script>
    <script src="../JS/main.js"></script>
    <script>
        window.onload = ImgAleatoria();
        window.onload = ImgBackgound();
    </script>

</body>
</html>
<?php
} else {
    $_SESSION['Correo'] = NULL;
    echo "
        <script>
            Swal.fire({
            icon : 'error',
            title : 'ERROR!!',
            text :  ' Su sesion a caducado'
            }).then((result) => {
                if(result.isConfirmed){
                window.location='../../index.php';
                }
            }); 
        </script>
    ";
}
?>