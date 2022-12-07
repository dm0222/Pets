<?php

    require_once("$_SERVER[DOCUMENT_ROOT]/Pets/Conexion/Conexion.php");
class RecuperarContrasena{
    private $token;
    private $email;

    public function EnviarEmail($email)
    {
        $token = $this->token;
        $token = bin2hex(random_bytes(5)) ;
        require_once "EmailRecuperacion.php";
        if($enviado == true){
        $conexion = new Conexion();
        $insertar = "INSERT INTO reset_contrasena (correo,token) VALUES ('$email','$token')";
            mysqli_query($conexion->conexion(), $insertar);
            echo $insertar;
        }
    }

    public function CambiarContrasena($Contrasena,$email){
        $conexion = new Conexion;
        $modificar = "UPDATE cuenta SET Contrasena = '$Contrasena' WHERE email = '$email'";
        mysqli_query($conexion->conexion(), $modificar);
        echo "
            <script>
                Swal.fire({
                    icon:'success',
                    title:'Bienvenido',
                    text:'La Contraseña a sido modificada'
                }).then((result) => {
                    if(result.isConfirmed){
                        window.location = '../index.php';
                    }
                });   
            </script>
        ";
    }
}

?>
