<?php
require_once ("$_SERVER[DOCUMENT_ROOT]/Pets/Conexion/Conexion.php");
class RecuperarContrasena{
    private $token;
    private $email;

    public function EnviarEmail($email)
    {
        $token = $this->token;
        $token = bin2hex(random_bytes(5)) ;
        $codigo = rand(1000, 9999);
        require_once "EmailRecuperacion.php";
        if($enviado == true){
        $conexion = new Conexion();
        $insertar = "INSERT INTO reset_contrasena (codigo,correo,token,codigo,fecha_creacion) VALUES (NULL,'$email','$token', $codigo, NULL)";
            echo $insertar;
        }
    }
}
?>