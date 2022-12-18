<?php
$inn = 500;

$CodHC = $_GET['CodHC'];

$_SESSION['CorreoMed'] = $_GET['CorreoMed'];
$CorreoMed = $_SESSION['CorreoMed'];

if (isset($_SESSION['timeout'])) {
    $_session_life = time() - $_SESSION['timeout'];
    if ($_session_life > $inn) {
        session_destroy();
        header("location: ../../Index.php");
    }
}
$_SESSION['timeout'] = time();

if ($_SESSION['CorreoMed']) {
    require_once("$_SERVER[DOCUMENT_ROOT]/Pets/Controlador/listar.php");
    require_once("$_SERVER[DOCUMENT_ROOT]/Pets/Controlador/buscar.php");
    require_once("$_SERVER[DOCUMENT_ROOT]/Pets/Controlador/registros.php");
    require_once("$_SERVER[DOCUMENT_ROOT]/Pets/Controlador/agendar.php");

    $CodMedico = BuscarMedico($CorreoMed);
    $DatosMasc = BuscarDatMasc($CodHC);
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
            <div class="submenu-superiorDerecha">
                <a href="http://localhost/Pets/Vista/Medico/DeskMedico.php?CorreoMed=<?php echo $CorreoMed;?>"><img src="../Img/Iconos/home.png" alt=""></a>
                <a href="http://localhost/Pets/Index.php" <?php session_destroy()?>><img src="../Img/Iconos/cerrarSesion.png" alt=""></a>
            </div>
            <div class="nombreMascota">
                <p>Historia Clinica <?php echo $DatosMasc[2];?></p>
            </div>
        </div>
        <!-- Menu izquierda ////////////////////////////////////////////////////////////////////////////////////////////////// -->
        <div class="menu-izquierda">
            <div class="Perfil01">
                <img src="../Img/Iconos/usuario02.png ">
                <p>Perfil</p>
            </div>
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
        <!-- Menu central ////////////////////////////////////////////////////////////////////////////////////////////////// -->
        <div class="menu-central">
            <div class="Perfil02">
                <img src="../Img/Iconos/usuario02.png ">
                <p>Perfil</p>
            </div>
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
        <!-- Servicios ////////////////////////////////////////////////////////////////////////////////////////////////// -->
        <?php
            $DatosPropMasc = BuscarPropMascHC($CodHC);
        ?>
        <div class="servicio perfil">
            <div class="contendor-titulo perfil-titulo">
                <p>Pefil</p>
            </div>
            <form action="../../Controlador/editar.php" method="POST" class="From-perfil">
                <div class="registro-propietario">
                    <p>Datos del Propietario</p>
                    <input id="name" name="Documento" type="text" class="form-input" value="<?php echo $DatosPropMasc[0];?>" readonly>
                    <input id="name" name="PrimerNombre" type="text" class="form-input" value="<?php echo $DatosPropMasc[1];?>" placeholder="Primer Nombre" readonly>
                    <input id="name" name="SegundoNombre" type="text" class="form-input" value="<?php echo $DatosPropMasc[2];?>" placeholder="Segundo Nombre" readonly>
                    <input id="name" name="PrimerApellido" type="text" class="form-input" value="<?php echo $DatosPropMasc[3];?>" placeholder="Primer Apellido" readonly>
                    <input id="name" name="SegundoApellido" type="text" class="form-input" value="<?php echo $DatosPropMasc[4];?>" placeholder="Segundo Apellido" readonly>
                    <input id="name" name="Direccion" type="text" class="form-input" value="<?php echo $DatosPropMasc[5];?>" placeholder="Dirección" required>
                    <input id="name" name="Correo" type="text" class="form-input" value="<?php echo $DatosPropMasc[6];?>" placeholder="Correo electornico" required>
                    <input id="name" name="Celular" type="text" class="form-input" value="<?php echo $DatosPropMasc[7];?>" placeholder="Celular" required>
                    <input id="name" name="Telefono" type="text" class="form-input" value="<?php echo $DatosPropMasc[8];?>" placeholder="Telefono">
                </div>
                <div class="registro-mascota">
                    <p>Datos del Mascota</p>
                    <input id="name" name="Nombre" type="text" class="form-input" value="<?php echo $DatosPropMasc[11];?>" placeholder="Nombre" required>
                    <input id="name" name="Edad" type="number" class="form-input" value="<?php echo $DatosPropMasc[12];?>" placeholder="Edad" required>
                    <input id="name" name="Genero" type="text" class="form-input" value="<?php echo $DatosPropMasc[13];?>" placeholder="Genero" readOnly>
                    <input id="Especie" type="text" class="form-input" value="<?php echo $DatosPropMasc[18];?>" placeholder="Especie"  readOnly>
                    <input id="Especie" name="Especie" type="hidden" class="form-input" value="<?php echo $DatosPropMasc[14];?>" placeholder="Especie"  readOnly>
                    <input type="text" class="form-input" value="<?php echo $DatosPropMasc[19];?>" placeholder="Raza" readonly>
                    <input name="Raza" type="hidden" class="form-input" value="<?php echo $DatosPropMasc[15];?>" placeholder="Raza" readonly>
                    <input id="name" name="Color" type="text" class="form-input" value="<?php echo $DatosPropMasc[16];?>" placeholder="Color" required>
                    <input id="name" name="Observaciones" type="text" class="form-input" value="<?php echo $DatosPropMasc[17];?>" placeholder="Observaciones" required>

                    <input type="hidden" name="Codigo" class="buscarID-mascota" value="<?php echo $DatosPropMasc[9];?>">
                    <input type="hidden" name="CorreoMed" class="buscarID-mascota" value="<?php echo $CorreoMed; ?>">
                    <input type="hidden" name="CodHC" class="buscarID-mascota" value="<?php echo $CodHC; ?>">
                    <input type="hidden" name="CodMedico" class="buscarID-mascota" value="<?php echo $CodMedico; ?>">
                </div>
                <input type="submit" name="EditarPerfil" class="EditarPerfil" value="Editar">
            </form>
            <img class="cerrarServicio" src="../Img/Iconos/cerrar.png">
        </div>

        <div class="servicio agendar">
            <div class="contendor-titulo agendar-titulo">
                <p>Agendar Cita Medica</p>
            </div>
            <img class="cerrarServicio" src="../Img/Iconos/cerrar.png" alt="">
            <form action="../../Controlador/agendar.php" method="POST" class="From-Agendar">
                <div class="agendarCita">
                    <p>Asignar proxima cita</p>
                    <input id="name" name="FechaAgendar" type="date" class="input-Agendar" placeholder="Identificación">
                    <input id="name" name="TipoCita" type="text" class="form-input" placeholder="Tipo de Cita" list="TipoCita" required>
                    <datalist id="TipoCita">
                        <?php
                        ListarTipoCita();
                        ?>
                    </datalist>
                    <p>Observaciones</p>
                    <textarea pattern="[a-zA-Z0-9áéíóúÁÉÍTipoÓÚñÑ ]{1,40}" type="text" placeholder="Observaciones"
                        name="Observacion_CitaMedica" id="Observacion_CitaMedica" maxlength="400" rows="7"
                        cols="60"></textarea>

                    <input type="hidden" name="CodMedico" class="buscarID-mascota" value="<?php echo $CodMedico; ?>">    
                    <input type="hidden" name="CodHC" class="buscarID-mascota" value="<?php echo $CodHC; ?>">    
                    <input type="hidden" name="CorreoMed" class="buscarID-mascota" value="<?php echo $CorreoMed; ?>">

                    <input type="button" name="ConsultarCita" class="consultarCita" value="Consultar">
                    <input type="submit" name="CrearCita" class="crearCita" value="Crear">
                </div>
            </form>
            <?php
                $CitasMed = ListarCitaMedica($CodHC);
            ?>
            <div class="listarCita">
                <img src="../Img/Iconos/volver.png" alt="" class="volverListaCita">
                <table class="tablaAgendar">
                    <thead>
                        <tr>
                            <th class="columnaFecha">Fecha</th>
                            <th class="columnaObs">Observación</th>
                            <th class="columnaEditar">Editar</th>
                            <th class="columnaEliminar">Eliminar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        for ($i = 0;$i<count($CitasMed);$i++){
                            echo"
                            <tr>
                                <td>".$CitasMed[$i]['Fecha']."</td>
                                <td>".$CitasMed[$i]['Observaciones']."</td>
                            ";
                        ?>
                                <td class="EditCM"> <img src="../Img/Iconos/editar.png" alt=""></td>
                                <td><a href="../../Controlador/eliminar.php?CodHC=<?php echo $CodHC ?>&CorreoMed=<?php echo $CorreoMed ?>&CodCitaMed=<?php echo $CitasMed[$i]['Codigo']?>"><img src="../Img/Iconos/borrar.png" alt=""></a></td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="servicio cirugia">
            <div class="contendor-titulo cirugia-titulo">
                <p>Cirugia</p>
            </div>
            <img class="cerrarServicio" src="../Img/Iconos/cerrar.png">
            <form action="" class="From-Cirugia">
                <div class="datos-mascota">
                    <p>Datos de la Mascota</p>
                    <input id="name" name="Procedimiento" type="text" class="form-input"
                        placeholder="Tipo de Procedimiento" required>
                    <input id="name" name="Edad" type="text" class="form-input" placeholder="Edad" required>
                    <input id="name" name="Peso" type="text" class="form-input" placeholder="Peso">
                    <input id="name" name="Anestecia" type="text" class="form-input" placeholder="Tipo de Anestecia"
                        required>
                    <textarea pattern="[a-zA-Z0-9áéíóúÁÉÍTipoÓÚñÑ ]{1,40}" type="text" value="Observaciones"
                        name="Observacion_CitaMedica" id="Observacion_CitaMedica" maxlength="400" rows="5"
                        cols="60"></textarea>
                </div>
                <div class="datos-propietario">
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
                    <input id="name" name="Correo" type="text" class="form-input" placeholder="Correo electornico"
                        required>
                    <input id="name" name="Celular" type="text" class="form-input" placeholder="Celular" required>
                    <input id="name" name="Telefono" type="text" class="form-input" placeholder="Telefono">
                    <input id="name" name="Pre-quirurgicos" type="text" class="form-input" placeholder="Pre-Quirurgicos"
                        required>
                    <input id="name" name="autorizacion" type="text" class="form-input" placeholder="Autorización"
                        required>
                    <input id="name" name="fechaCirugia" type="date" class="input-Agendar">
                </div>
                <!-- 
                <input type="submit" name="cirugia" class="crearCirugia" value="Crear"> -->
                <div class="Inputs-fye">
                    <input type="button" name="formulaMedical" class="formulaMedicaE" value="Formula Medica">
                    <input type="submit" name="citaM" class="crearCitaM" value="Crear">
                </div>
                <div class="contenedorFormulaE">
                    <img src="../Img/Iconos/volver.png" alt="" class="volverFromulaE">
                    <input id="name" name="NombreM" type="text" class="form-input" placeholder="Nombre del Medicamento" required>
                    <input id="name" name="PresentacionM" type="text" class="form-input" placeholder="Presentación del Medicamento" required>
                    <input id="name" name="TipoM" type="text" class="form-input" placeholder="Tipo de Medicamento"
                        required>
                    <input id="name" name="DosisM" type="text" class="form-input" placeholder="Dosis de Medicamento"
                        required>
                    <input id="name" name="AdministracionM" type="text" class="form-input"
                        placeholder="Administración de Medicamento" required>
                    <input id="name" name="ConcentracionM" type="text" class="form-input"
                        placeholder="Concentración de Medicamento" required>
                    <textarea pattern="[a-zA-Z0-9áéíóúÁÉÍTipoÓÚñÑ ]{1,40}" type="text" value="Observaciones"
                        name="Observacion_CitaMedica" id="Observacion_CitaMedica" maxlength="400" rows="5" cols="60"
                        placeholder="Observaciones"></textarea>
                    <input type="submit" name="crearM" class="crearFormulaE" value="Crear">
                </div>
            </form>
        </div>
        <div class="servicio cita">
            <div class="contendor-titulo cita-titulo">
                <p>Cita Medica</p>
            </div>
            <img class="cerrarServicio" src="../Img/Iconos/cerrar.png">
            <form action="" class="From-citaMedica">
                <div class="datos-citaMedica">
                    <input id="name" name="fechaCitaM" type="date" class="input-Agendar">
                    <input id="name" name="TipoCita" type="text" class="form-input" placeholder="Tipo de Cita" list="TipoCita" required>
                    <datalist id="TipoCita">
                        <?php
                        ListarTipoCita();
                        ?>
                    </datalist>
                    <input id="name" name="Auscultación" type="text" class="form-input" placeholder="Auscultación"
                        required>
                    <input id="name" name="Oidos" type="text" class="form-input" placeholder="Oidos" required>
                    <input id="name" name="Ojos" type="text" class="form-input" placeholder="Ojos" required>
                    <input id="name" name="Mucosas" type="text" class="form-input" placeholder="Mucosas" required>
                    <input id="name" name="FrecuenciaR" type="text" class="form-input" placeholder="Frecuencia Respiratoria" required>
                    <input id="name" name="FrecuenciaC" type="text" class="form-input" placeholder="Frecuencia Cardiaca" required>
                    <input id="name" name="Peso" type="text" class="form-input" placeholder="Peso" required>
                    <input id="name" name="Tilc" type="text" class="form-input" placeholder="Tilc" required>
                    <input id="name" name="Gangleos" type="text" class="form-input" placeholder="Gangleos" required>
                    <input id="name" name="Palpitacion" type="text" class="form-input" placeholder="Palpitación" required>
                    <input id="name" name="CavidadO" type="text" class="form-input" placeholder="Cavidad Oral" required>
                    <input id="name" name="Nervioso" type="text" class="form-input" placeholder="Nervioso" required>
                    <input id="name" name="Temperatura" type="text" class="form-input" placeholder="Temperatura" required>
                    <input id="name" name="Tegumento" type="text" class="form-input" placeholder="Tegumento" required>
                    <textarea pattern="[a-zA-Z0-9áéíóúÁÉÍTipoÓÚñÑ ]{1,40}" type="text" value="Observaciones"
                        name="Observacion_CitaMedica" id="Observacion_CitaMedica" maxlength="400" rows="5" cols="60" placeholder="Observaciones"></textarea>
                </div>
                <div class="Inputs-fyc">
                    <input type="button" name="formulaMedical" class="formulaMedica" value="Formula Medica">
                    <input type="submit" name="citaM" class="crearCitaM" value="Crear">
                </div>
                <div class="contenedorFormula">
                    <img src="../Img/Iconos/volver.png" alt="" class="volverFromula">
                    <input id="name" name="NombreM" type="text" class="form-input" placeholder="Nombre del Medicamento"
                        required>
                    <input id="name" name="PresentacionM" type="text" class="form-input"
                        placeholder="Presentación del Medicamento" required>
                    <input id="name" name="TipoM" type="text" class="form-input" placeholder="Tipo de Medicamento"
                        required>
                    <input id="name" name="DosisM" type="text" class="form-input" placeholder="Dosis de Medicamento"
                        required>
                    <input id="name" name="AdministracionM" type="text" class="form-input"
                        placeholder="Administración de Medicamento" required>
                    <input id="name" name="ConcentracionM" type="text" class="form-input"
                        placeholder="Concentración de Medicamento" required>
                    <textarea pattern="[a-zA-Z0-9áéíóúÁÉÍTipoÓÚñÑ ]{1,40}" type="text" value="Observaciones"
                        name="Observacion_CitaMedica" id="Observacion_CitaMedica" maxlength="400" rows="5" cols="60"
                        placeholder="Observaciones"></textarea>
                    <input type="submit" name="crearM" class="crearFormula" value="Crear">
                </div>
            </form>
        </div>
        <div class="servicio examen">
            <div class="contendor-titulo examen-titulo">
                <p>Examen</p>
            </div>
            <img class="cerrarServicio" src="../Img/Iconos/cerrar.png">
            <form action="" class="From-Examen">
                <div class="datos-Examen">
                    <input id="name" name="FechaExamen" type="date" class="input-Agendar">
                    <input id="name" name="TipoExamen" type="text" class="form-input" placeholder="Tipo de Examen"
                        required>
                    <input id="name" name="correoExamen" type="text" class="form-input" placeholder="Correo Examen"
                        required>
                    <input id="name" name="ResultadoExmane" type="text" class="form-input"
                        placeholder="Resultado Exmane" required>
                    <textarea pattern="[a-zA-Z0-9áéíóúÁÉÍTipoÓÚñÑ ]{1,40}" type="text" value="Observaciones del Examen"
                        name="Observacion_CitaMedica" id="Observacion_CitaMedica" maxlength="400" rows="5" cols="60"
                        placeholder="Observaciones"></textarea>
                </div>
                <input type="submit" name="citaM" class="crearExamen" value="Crear">
            </form>
        </div>
        <div class="servicio hospitalizacion">
            <div class="contendor-titulo hospitalizacion-titulo">
                <p>Hospitalización</p>
            </div>
            <img class="cerrarServicio" src="../Img/Iconos/cerrar.png">
            <form action="" class="From-hospitalizacion">
                <div class="datos-hospitalizacion">
                    <input id="name" name="fechaCitaM" type="date" class="input-Agendar">
                    <input id="name" name="Temperatura" type="text" class="form-input" placeholder="Temperatura"
                        required>
                    <input id="name" name="Apetito" type="text" class="form-input" placeholder="Apetito" required>
                    <input id="name" name="Sed" type="text" class="form-input" placeholder="Sed" required>
                    <input id="name" name="Mucosas" type="text" class="form-input" placeholder="Mucosas" required>
                    <input id="name" name="EstadoA" type="text" class="form-input" placeholder="Estado de Animo"
                        required>
                    <input id="name" name="FrecuenciaR" type="text" class="form-input"
                        placeholder="Frecuencia Respiratoria" required>
                    <input id="name" name="FrecuenciaC" type="text" class="form-input" placeholder="Frecuencia Cardiaca"
                        required>
                    <input id="name" name="Vomito" type="text" class="form-input" placeholder="Vomito" required>
                    <input id="name" name="Orina" type="text" class="form-input" placeholder="Orina" required>
                    <input id="name" name="GradoH" type="text" class="form-input" placeholder="Grado de Hidratación"
                        required>
                    <textarea pattern="[a-zA-Z0-9áéíóúÁÉÍTipoÓÚñÑ ]{1,40}" type="text" value="Observaciones"
                        name="Observacion_CitaMedica" id="Observacion_CitaMedica" maxlength="400" rows="5" cols="60"
                        placeholder="Observaciones"></textarea>
                </div>
                <div class="Inputs-fyh">
                    <input type="button" name="formulaMedical" class="formulaMedicaH" value="Formula Medica">
                    <input type="submit" name="citaM" class="crearCitaM" value="Crear">
                </div>
                <div class="contenedorFormulaH">
                    <img src="../Img/Iconos/volver.png" alt="" class="volverFromulaH">
                    <input id="name" name="NombreM" type="text" class="form-input" placeholder="Nombre del Medicamento"
                        required>
                    <input id="name" name="PresentacionM" type="text" class="form-input"
                        placeholder="Presentación del Medicamento" required>
                    <input id="name" name="TipoM" type="text" class="form-input" placeholder="Tipo de Medicamento"
                        required>
                    <input id="name" name="DosisM" type="text" class="form-input" placeholder="Dosis de Medicamento"
                        required>
                    <input id="name" name="AdministracionM" type="text" class="form-input"
                        placeholder="Administración de Medicamento" required>
                    <input id="name" name="ConcentracionM" type="text" class="form-input"
                        placeholder="Concentración de Medicamento" required>
                    <textarea pattern="[a-zA-Z0-9áéíóúÁÉÍTipoÓÚñÑ ]{1,40}" type="text" value="Observaciones"
                        name="Observacion_CitaMedica" id="Observacion_CitaMedica" maxlength="400" rows="5" cols="60"
                        placeholder="Observaciones"></textarea>
                    <input type="submit" name="crearM" class="crearFormulaH" value="Crear">
                </div>
            </form>
        </div>
        <div class="servicio remision">
            <div class="contendor-titulo remision-titulo">
                <p>Remisión</p>
            </div>
            <img class="cerrarServicio" src="../Img/Iconos/cerrar.png">
            <form action="" class="From-remision">
                <div class="datos-remision">
                    <input id="name" name="fechaRemision" type="date" class="input-Remision">
                    <input id="name" name="Especialista" type="text" class="form-input"
                        placeholder="Especialista Remisión" required>
                    <input id="name" name="CeluarR" type="text" class="form-input" placeholder="Celular Remision"
                        required>
                    <input id="name" name="EntidadR" type="text" class="form-input" placeholder="Entidad Remisión"
                        required>
                    <textarea pattern="[a-zA-Z0-9áéíóúÁÉÍTipoÓÚñÑ ]{1,40}" type="text" value="Observaciones"
                        name="Observacion_CitaMedica" id="Observacion_CitaMedica" maxlength="400" rows="5" cols="60"
                        placeholder="Observaciones"></textarea>
                </div>
            </form>
            <input type="submit" name="citaM" class="crearRemision" value="Crear">
        </div>
        <div class="servicio vacunacion">
            <div class="contendor-titulo vacunacion-titulo">
                <p>Vacunación</p>
            </div>
            <img class="cerrarServicio" src="../Img/Iconos/cerrar.png">
            <form action="" class="From-vacunacion">
                <div class="datos-vacunacion">
                    <input id="name" name="fechaVacunacion" type="date" class="input-Vacunacion">
                    <input id="name" name="NombreP" type="text" class="form-input" placeholder="Nombre Profilactico"
                        required>
                    <input id="name" name="PresentacionP" type="text" class="form-input"
                        placeholder="Presentacion Profilactico" required>
                    <input id="name" name="AdministracionProfilactico" type="text" class="form-input"
                        placeholder="Administracion Profilactico" required>
                    <textarea pattern="[a-zA-Z0-9áéíóúÁÉÍTipoÓÚñÑ ]{1,40}" type="text" value="Observaciones"
                        name="Observacion_CitaMedica" id="Observacion_CitaMedica" maxlength="400" rows="5" cols="60"
                        placeholder="Observaciones"></textarea>
                </div>
            </form>
            <input type="submit" name="citaM" class="crearVacunacion" value="Crear">
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.8.0/dist/chart.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2.0.0/dist/chartjs-plugin-datalabels.min.js">
    </script>
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