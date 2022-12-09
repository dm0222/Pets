<?php
    require_once("$_SERVER[DOCUMENT_ROOT]/Pets/Modelo/Usuario.php");

        $Obj_Usuario = new Usuaraio;
        $Obj_Usuario->ValidarSession($_REQUEST['Correo'], $_REQUEST['Contrasena']);
    ?>
