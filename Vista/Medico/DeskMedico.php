<?php
session_start();
$inn = 500;
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
    <link rel="stylesheet" href="http://localhost/Pets/Vista/css/DeskStyle.css">
    <link rel="icon" href="http://localhost/Pets/Img/Iconos/escritorio.png" />
    <title>Desk</title>
</head>

<body onload="ImgAleatoria()">
    <!-- Video - background - inicio -->

    <!-- <div class="video-background">
        <video class="video-back" id="video" src="../Videos/Azul.mp4" muted autoplay loop playsinline></video>
    </div> -->

    <!-- Contenedor General -->

    <div class="contenedor-general">

        <!-- Menus -->

        <div class="menu-superior">
            <p>Pets ++</p>
            <img class="icon01">
        </div>

        <!-- Menu izquierda  -->
        <div class="menu-izquierda">
            <div class="RegistroPropietario">
                <img src="../Img/Iconos/usuario01.png ">
                <p>Registro de Usuario</p>
            </div>
            <div class="historiaClinica01">
                <img src="../Img/Iconos/historiaMedica.png ">
                <p>Historia Clinica</p>
            </div>
        </div>
        <!-- Menu derecha  -->
        <div class="menu-central">
            <div class="sub-menu01 registroP">
                <img src="../Img/Iconos/usuario01.png ">
                <p>Registro de Usuario</p>
            </div>
            <div class="sub-menu01 historiaC">
                <img src="../Img/Iconos/historiaMedica.png ">
                <p>Historia Clinica</p>
            </div>
        </div>

        <!-- Formatos de registro -->

        <div class="contenedor-registro">
            <div class="contendor-titulo">
                <p>Registro</p>
            </div>
            <img class="cerrarRegistroP" src="../Img/Iconos/cerrar.png">
            <div class="RegPropietario">
                <p>Registrar Propietario y Mascota</p>
            </div>
            <div class="RegMascota">
                <p>Registrar Mascota</p>
            </div>

            <!--Formulario para agregar Propietario y Mascota-->
            <form action="../../Controlador/registros.php" method="POST" class="FormPropietario">
                <div class="contendor-titulo">
                    <p>Registro</p>
                </div>
                <img class="cerrarRegistroP" src="../Img/Iconos/cerrar.png">
                <div class="registro-propietario">
                    <img class="volver01" src="../Img/Iconos/volver.png">
                    <p>Datos del Propietario</p>
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
                <div class="registro-mascota">
                    <p>Datos del Mascota</p>
                    <input id="name" name="Nombre" type="text" class="form-input" placeholder="Nombre" required>
                    <input id="name" name="Edad" type="number" class="form-input" placeholder="Edad" required>
                    <input id="name" name="Genero" type="text" class="form-input" placeholder="Genero" required>
                    <input id="Especie" name="Especie" type="text" class="form-input" placeholder="Especie"
                        list="SelectEspecie" required>
                    <datalist id="SelectEspecie" name="SelectEspecie">
                    <?php
                        ListarEspecie();
                    ?>
                    </datalist>
                    <input name="Raza" type="text" class="form-input" placeholder="Raza" list="SelectRaza" required>
                    <datalist id="SelectRaza">
                    </datalist>
                    <input id="name" name="Color" type="text" class="form-input" placeholder="Color" required>
                    <input id="name" name="Observaciones" type="text" class="form-input" placeholder="Observaciones" required>
                    <input type="hidden" name="DocumentoMed" class="buscarID-mascota" value="<?php echo BuscarMedico($_SESSION['Correo']); ?>">
                </div>
                <input type="submit" name="AgregarPropMasc" class="RegistroProp" value="Registrar">
            </form>

            <!--Formulario para agregar solo Mascota-->
            <div class="FromMascota">
                <form method="post">
                    <div class="registro-mascota02">
                        <img class="volver01" src="../Img/Iconos/volver.png">
                        <p id="FromMascota">Consultar Propietario</p>
                        <input type="text" name="Documento" id="" placeholder="Buscar por ID" class="buscarID-mascota" required>
                        <input type="submit" name="BuscarProp" id="" value="Consultar" class="consultarID-mascota">
                </form>
                <?php
            if (isset($_GET['Documento'])) {
                ?>
                <form action="../../Controlador/registros.php" method="POST">
                    <p>Datos del Mascota</p>
                    <input id="name" name="Nombre" type="text" class="form-input" placeholder="Nombre">
                    <input id="name" name="Edad" type="number" class="form-input" placeholder="Edad">
                    <input id="name" name="Genero" type="text" class="form-input" placeholder="Genero">
                    <input id="Especie02" name="Especie" type="text" class="form-input" placeholder="Especie"
                        list="SelectEspecie02" required>
                    <datalist id="SelectEspecie02" name="SelectEspecie">
                        <?php
                            ListarEspecie();
                        ?>
                    </datalist>
                    <input name="Raza" type="text" class="form-input" placeholder="Raza" list="SelectRaza02" required>
                    <datalist id="SelectRaza02">

                    </datalist>
                    <input id="name" name="Color" type="text" class="form-input" placeholder="Color">
                    <input id="name" name="Observaciones" type="text" class="form-input" placeholder="Observaciones">
                    <input type="hidden" name="Documento" class="buscarID-mascota" value="<?php echo $_GET['Documento'] ?>">
                    <input type="hidden" name="DocumentoMed" class="buscarID-mascota" value="<?php echo BuscarMedico($_SESSION['Correo']); ?>">
            </div>
                <input type="submit" name="AgregarMascota" class="RegistroProp02" value="Registrar">
                </form>
                <?php
            }
                ?>
        </div>
    </div>
    </div>

    <!-- Historia Clinica -->
    <?php
        $HistClic = ListarHistClic();
    ?>

    <div class="contenedor-historia">
        <form action="" class="">
            <div class="contendor-titulo-historia">
                <p>Historia Clinica</p>
            </div>
            <img class="cerrarHistoria" src="../Img/Iconos/cerrar.png">
            <input type="text" name="Documento" id="" placeholder="Documento Propietario" class="buscarID">
            <input type="submit" name="BuscarHistClin" id="" value="Consultar" class="consultarID">
        </form>
        <table class="tablaHistoria">
            <thead>
                <tr>
                    <th class="columnaID">ID</th>
                    <th class="columnaPropietario">Nombre del Propietario</th>
                    <th class="columnaMascota">Nombre Mascota</th>
                    <th class="columnaCargar">Cargar</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    for($i=0;$i<count($HistClic);$i++){
                        echo "
                            <tr>
                                <td>" . $HistClic[$i]['Codigo'] . "</td>
                                <td>" . $HistClic[$i]['PrimerNombre'] . ' ' . $HistClic[$i]['PrimerApellido'] . "</td>
                                <td>" . $HistClic[$i]['Nombre'] . "</td>
                        ";
                ?>
                                <td><a href="DeskHistory.html?CodHc=<?php echo $HistClic[$i]['Codigo'] ?>"> <img src="../Img/Iconos/comprobado.png" alt=""></a></td>
                            </tr>
                <?php
                    }
                ?>
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.8.0/dist/chart.min.js"></script>
    <script
        src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2.0.0/dist/chartjs-plugin-datalabels.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.debug.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/glider-js@1.7.7/glider.min.js"></script>
    <script src="http://localhost/Pets/Vista/js/jquery-3.6.1.min.js"></script>
    <script src="http://localhost/Pets/Vista/js/main.js"></script>
    <script>
        $(document).ready(function () {
            $('#Especie').val();
            recargarLista();
            $('#Especie02').val();
            recargarLista2();
            $('#Especie').change(function () {
                recargarLista();
            });
            $('#Especie02').change(function () {
                recargarLista2();
            });
        })
    </script>
    <script>
        function recargarLista() {
            $.ajax({
                type: "POST",
                url: "http://localhost/Pets/Controlador/listar.php",
                data: "Nom_Especie=" + $('#Especie').val(),
                success: function (r) {
                    $('#SelectRaza').html(r);
                }
            });
        }

        function recargarLista2() {
            $.ajax({
                type: "POST",
                url: "http://localhost/Pets/Controlador/listar.php",
                data: "Nom_Especie=" + $('#Especie02').val(),
                success: function (r) {
                    $('#SelectRaza02').html(r);
                }
            });
        }
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