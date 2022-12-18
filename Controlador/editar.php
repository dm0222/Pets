<?php

    require_once ("$_SERVER[DOCUMENT_ROOT]/Pets/Modelo/Persona.php");
    require_once ("$_SERVER[DOCUMENT_ROOT]/Pets/Modelo/Usuario.php");
    require_once ("$_SERVER[DOCUMENT_ROOT]/Pets/Modelo/Mascota.php");

    $Obj_Persona = new Persona;
    $Obj_Mascota = new Mascota;

    if(isset($_POST['EditarPerfil'])){
    $Obj_Persona->EditarPersona(
                                    $_POST['Documento'],
                                    $_POST['PrimerNombre'],
                                    $_POST['SegundoNombre'],
                                    $_POST['PrimerApellido'],
                                    $_POST['SegundoApellido'],
                                    $_POST['Direccion'],
                                    $_POST['Correo'],
                                    $_POST['Celular'],
                                    $_POST['Telefono'],
                                    3,
                                    $_POST['CorreoMed']
                                );
    $Obj_Mascota->EditarMascota(
                                    $_POST['Codigo'],
                                    $_POST['Documento'],
                                    $_POST['Nombre'],
                                    $_POST['Edad'],
                                    $_POST['Genero'],
                                    $_POST['Especie'],
                                    $_POST['Raza'],
                                    $_POST['Color'],
                                    $_POST['Observaciones'],
                                    $_POST['CorreoMed'],
                                    $_POST['CodHC']
                                );
    }

    
?>