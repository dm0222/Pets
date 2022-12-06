<?php
    require ("$_SERVER[DOCUMENT_ROOT]/Pets/Modelo/Usuario.php");

    $Obj_Usuario = new Usuaraio;

    if(isset($_POST['agregar'])){
        $Obj_Usuario->ValidarRegistro(
                                        $_POST['Documento'],
                                        $_POST['Usuario'],
                                        $_POST['Contrasena']
                                    );
        exit;
    }

    if(isset($_POST['validar'])){
        $Obj_Usuario->ValidarSession(
                                    $_POST['Usuario'],
                                    $_POST['Contrasena']
                                );
    }
?>