<?php
//session_start();
$inn = 500;

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
    <link rel="stylesheet" href="http://localhost/Pets/Vista/css/DeskAdmin.css">
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
            <div class="PerfilAdm01">
                <img src="../Img/Iconos/agendarCita.png ">
                <p>Perfil</p>
            </div>
            <div class="Listar01">
                <img src="../Img/Iconos/cirugia.png ">
                <p>Listar Medicos</p>
            </div>
        </div>

        <!-- Menu central  -->
        <div class="menu-central">
            <div class="PerfilAdm02">
                <img src="../Img/Iconos/agendarCita.png ">
                <p>Perfil</p>
            </div>
            <div class="Listar02">
                <img src="../Img/Iconos/cirugia.png ">
                <p>Listar Medicos</p>
            </div>
        </div>

        
        

        <div class="menu perfil">
            <div class="contendor-titulo perfil-titulo">
                <p>Perfil</p>
            </div>
            <img class="cerrar cerrarperfil" src="../Img/Iconos/cerrar.png">
            <div class="datos-administrador">
                <p>Informacion</p>
                <input id="name" name="Documento" type="text" class="form-input" placeholder="Identificación"
                    required>
                <input id="name" name="PrimerNombre" type="text" class="form-input" placeholder="Primer Nombre"
                    required>
                <input id="name" name="SegundoNombre" type="text" class="form-input" placeholder="Segundo Nombre">
                <input id="name" name="PrimerApellido" type="text" class="form-input" placeholder="Primer Apellido"
                    required>
                <input id="name" name="SegundoApellido" type="text" class="form-input"
                    placeholder="Segundo Apellido">
                <input id="name" name="Direccion" type="text" class="form-input" placeholder="Dirección" required>
                <input id="name" name="Correo" type="text" class="form-input" placeholder="Correo electornico"
                    required>
                <input id="name" name="Celular" type="text" class="form-input" placeholder="Celular" required>
                <input id="name" name="Telefono" type="text" class="form-input" placeholder="Telefono">
            </div>

        <!-- Listar Medicos-->
        <?php
            $listarMed = ListarMedico();
        ?>
        <div class="menu listar">
            <div class="contendor-titulo listar-titulo">
                <p>Listar Medicos</p>
            </div>
            <img class="cerrar cerrarlistar" src="../Img/Iconos/cerrar.png">
            <table class="tablaMedicos">
            <thead>
                <tr>
                    <th class="columnaID">ID</th>
                    <th class="columnaPropietario">Nombre del Medico</th>
                    <th class="columnaMascota">Correo</th>
                    <th class="columnaCargar">Cargar</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    for($i=0;$i<count($listarMed);$i++){
                        echo "
                            <tr>
                                <td>" . $listarMed[$i]['Documento'] . "</td>
                                <td>" . $listarMed[$i]['PrimerNombre'] . ' ' . $listarMed[$i]['PrimerApellido'] . "</td>
                                <td>" . $listarMed[$i]['email'] . "</td>
                        ";
                ?>
                                <td><img src="../Img/Iconos/comprobado.png" alt=""></a></td>
                            </tr>
                <?php
                    }
                ?>
            </tbody>
        </table>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.8.0/dist/chart.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2.0.0/dist/chartjs-plugin-datalabels.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.debug.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/glider-js@1.7.7/glider.min.js"></script>
    <script src="http://localhost/Pets/Vista/js/jquery-3.6.1.min.js"></script>
    <script src="http://localhost/Pets/Vista/js/main.js"></script>
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