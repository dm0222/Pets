<?php
require_once("$_SERVER[DOCUMENT_ROOT]/Pets/Modelo/RecuperarContrasena.php");

  $Obj_RecuperarContrasena = new RecuperarContrasena;

    if(isset($_POST['recuperar'])){
        $Obj_RecuperarContrasena->EnviarEmail($_POST['Correo']);
    }
    if(isset($_POST['modificar'])){
        if($_POST['NuevaContrasena'] != $_POST['RepNuContrasena']){
            echo "
            <script>
                Swal.fire({
                icon:'error',
                title:'ERROR!!',
                text : 'Las Contraseñas no son iguales'
                });
            </script>
            ";
        }
        else{
            $Obj_RecuperarContrasena->CambiarContrasena($_POST['NuevaContrasena'],$_POST['email']);
        }
    }
?>
