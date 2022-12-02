<?php
    require_once '../Modelo/Medico.php';

    $obj_Medico = new Medico($Documento);

    if(isset($_POST['agregar'])){
        $obj_Medico->AgregarPersona($_POST['Documento'],
                                    $_POST['Primer_Nombre'],
                                    $_POST['Segundo_Nombre'],
                                    $_POST['Primer_Apellido'],
                                    $_POST['Segundo_Apellido'],
                                    $_POST['Direccion'],
                                    $_POST['Telefono'],
                                    $_POST['Celular'],
                                    $_POST['Email']);
        exit;
    }

    if(isset($_POST['editar'])){
        $obj_Medico->EditarPersona($_POST['Documento'],
                                    $_POST['Primer_Nombre'],
                                    $_POST['Segundo_Nombre'],
                                    $_POST['Primer_Apellido'],
                                    $_POST['Segundo_Apellido'],
                                    $_POST['Direccion'],
                                    $_POST['Telefono'],
                                    $_POST['Celular'],
                                    $_POST['Email']);
    }

    if(isset($_POST['eliminar'])){
        $obj_Medico->EliminarPersona($_POST['Documento']);
    }
    
    if(isset($_POST['Listar'])){
        $obj_Medico->ListarPersona($_POST['Documento']);
    }
?>