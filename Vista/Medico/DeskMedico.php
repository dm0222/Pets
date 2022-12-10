<?php
session_start();
$inn = 500;
if(isset($_SESSION['timeout'])){
    $_session_life = time() - $_SESSION['timeout'];
    if($_session_life > $inn){
        session_destroy();
        header("location: ../../Index.php");
    }
}
$_SESSION['timeout'] = time();
require_once("$_SERVER[DOCUMENT_ROOT]/Pets/Controlador/listar.php");

if($_SESSION['Correo']){





?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/glider-js@1.7.7/glider.min.css">
    <link rel="stylesheet" href="http://localhost/Pets/Vista/css/DeskStyle.css">
    <link rel="icon" href="../Img/escritorio.png" />
    <title>Desk</title>
</head>

<body onload="ImgAleatoria ()">
    <!-- Video - background - inicio -->

    <!-- <div class="video-background">
        <video class="video-back" id="video" src="../Videos/Azul.mp4" muted autoplay loop playsinline></video>
    </div> -->

    <!-- Contenedor General -->

    <div class="contenedor-general">

        <!-- Muenus -->

        <div class="menu-superior">
            <p>Pets ++</p>
            <img class="icon01">
        </div>
        <div class="menu-izquierda">
            <div class="RegistroPropietario">
                <img src="../Img/usuario01.png ">
                <p>Registro de Usuario</p>
            </div>
            <div>
                <img src="../Img/historiaMedica.png ">
                <p>Historia Clinica</p>
            </div>
        </div>
        <div class="menu-central">
            <div class="sub-menu01 registroP">
                <img src="../Img/usuario01.png ">
                <p>Registro de Usuario</p>
            </div>
            <div class="sub-menu01 historiaC">
                <img src="../Img/historiaMedica.png ">
                <p>Historia Clinica</p>
            </div>
        </div>

        <!-- Formatos -->

        <div class="contenedor-registro">
            <form action="">
                <div class="contendor-titulo">
                    <p>Registro</p>
                </div>
                <img class="cerrarRegistroP" src="../Img/cerrar.png">
                <div class="registro-propietario">
                    <p>Datos del Propietario</p>
                    <input id="name" name="dni" type="text" class="form-input" placeholder="Identificación">
                    <input id="name" name="name" type="text" class="form-input" placeholder="Primer Nombre">
                    <input id="name" name="name" type="text" class="form-input" placeholder="Segundo Nombre">
                    <input id="name" name="surname" type="text" class="form-input" placeholder="Primer Apellido">
                    <input id="name" name="surname" type="text" class="form-input" placeholder="Segundo Apellido">
                    <input id="name" name="phone" type="text" class="form-input" placeholder="Celular">
                    <input id="name" name="phone" type="text" class="form-input" placeholder="Telefono">
                    <input id="name" name="address" type="text" class="form-input" placeholder="Dirección">
                    <input id="name" name="email" type="text" class="form-input" placeholder="Correo electornico">
                </div>
                <div class="registro-mascota">
                    <p>Datos del Mascota</p>
                    <input id="name" name="name" type="text" class="form-input" placeholder="Nombre">
                    <input id="name" name="surname" type="number" class="form-input" placeholder="Edad">
                    <input id="name" name="dni" type="text" class="form-input" placeholder="Genero">
                    <select name="FK_CodEspecie" id="FK_CodEspecie" type="text" class="form-input" placeholder="Especie">
                    <?php
                        ListarEspecie();
                    ?>
                    <input id="name" name="address" type="text" class="form-input" placeholder="Especie">
                    <select name="FK_CodRaza" id="selectraza" type="text" class="form-input" placeholder="Especie">

                    <?php
                        ListarRaza();
                    ?>
                    <input id="name" name="phone" type="text" class="form-input" placeholder="Raza">
                    <input id="name" name="email" type="text" class="form-input" placeholder="Color">
                    <input id="name" name="email" type="text" class="form-input" placeholder="Observaciones">
                </div>
                <input type="submit" name="AgregarPropMasc" class="RegistroProp" value="Registrar">
            </form>
        </div>

    </div>


    </div>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.8.0/dist/chart.min.js"></script>
    <script
        src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2.0.0/dist/chartjs-plugin-datalabels.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.debug.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/glider-js@1.7.7/glider.min.js"></script>
    <script src="http://localhost/Pets/Vista/js/jquery-3.6.1.min.js"></script>
    <script src="http://localhost/Pets/Vista/js/main.js"></script>

</body>

</html>
<?php
}
else{
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