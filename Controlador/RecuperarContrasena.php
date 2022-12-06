<?php
    require ("$_SERVER[DOCUMENT_ROOT]/Pets/Modelo/RecuperarContrasena.php");

    $Obj_RecuperarContrasena = new RecuperarContrasena;

    if(isset($_POST['recuperar'])){
        $Obj_RecuperarContrasena->EnviarEmail($_POST['email']);
    }
?>