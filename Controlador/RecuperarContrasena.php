<?php
require_once("$_SERVER[DOCUMENT_ROOT]/Pets/Modelo/RecuperarContrasena.php");

  $Obj_RecuperarContrasena = new RecuperarContrasena;

    if(isset($_POST['recuperar'])){
        $Obj_RecuperarContrasena->ValidarEmail($_POST['Correo']);
    }

    if(isset($_GET['email']) && isset($_GET['token'])){
        $email = $_GET['email'];
        $token = $_GET['token'];
        $Obj_RecuperarContrasena->ValidarToken($token,$email);
    }

    if(isset($_POST['modificar'])){
        if($_POST['NuevaContrasena'] != $_POST['RepNuContrasena']){
            $Obj_RecuperarContrasena->MsnContrasenasIguales();
        }
        else{
            $Obj_RecuperarContrasena->CambiarContrasena($_POST['NuevaContrasena'],$_POST['email']);
        }
    }

    


?>
