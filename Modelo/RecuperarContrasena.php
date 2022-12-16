<?php

    require_once("$_SERVER[DOCUMENT_ROOT]/Pets/Conexion/Conexion.php");
class RecuperarContrasena{
    private $token;
    private $email;

    public function ValidarEmail($email){
        $conexion = new Conexion;
        $verificar = "SELECT * FROM cuenta WHERE email = '$email'";
        $respuesta = mysqli_query($conexion->conexion(), $verificar);
        if(mysqli_num_rows($respuesta) == 0){
            echo "
                <script type='text/javascript'>
                    Swal.fire({
                        icon : 'error',
                        title: 'ERROR!!',
                        text : 'Su correo no se encuentra registrado'
                    }).then((result) =>{
                        if(result.isConfirmed){
                            window.location = '../index.php';
                        }
                    });
                </script>
            ";
        }
        else{
            $this->EnviarEmail($email);
            
        }
    }

    public function EnviarEmail($email)
    {
        $token = $this->token;
        $token = bin2hex(random_bytes(5)) ;
        require_once "EmailRecuperacion.php";
        if($enviado == true){
        $conexion = new Conexion();
        $insertar = "INSERT INTO reset_contrasena (correo,token) VALUES ('$email','$token')";
            mysqli_query($conexion->conexion(), $insertar);
            echo "
            <script>
                Swal.fire({
                    icon:'success',
                    title:'Bienvenido',
                    text:'Enlace de recuperacion enviado a $email'
                }).then((result) => {
                    if(result.isConfirmed){
                        window.location = '../index.php';
                    }
                });   
            </script>
        ";
            
        }
    }

    public function CambiarContrasena($Contrasena,$email){
        $conexion = new Conexion;
        $modificar = "UPDATE cuenta SET Contrasena = '$Contrasena' WHERE email = $email";
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

    public function MsnContrasenasIguales(){
        echo "
            <script>
                Swal.fire({
                icon:'error',
                title:'ERROR!!',
                text : 'Las Contraseñas no son iguales'
                }).then((result) => {
                    if(result.isConfirmed){
                        window.location = '../Vista/Administrador/FormContrasena.php';
                    }
                });
            </script>
        ";
    }

    public function ValidarToken($token,$email){
        $conexion = new Conexion;
        $validar = "SELECT * FROM reset_contrasena WHERE token = '$token' AND correo = '$email'";
        $respuesta = mysqli_query($conexion->conexion(), $validar);
        if(mysqli_num_rows($respuesta) > 0){
            $datos = mysqli_fetch_row($respuesta);
            $fecha = $datos[3];
            $fecha_actual = date("Y-m-d H:m:s");
            $segundos = strtotime($fecha_actual) - strtotime($fecha);
            $minutos = $segundos / 60;
            if($minutos > 10){
                header("Location: ../Vista/Administrador/FormContrasena.php?email='$email'");
            }
            else{
                echo "
                    <script>
                        Swal.fire({
                            icon : 'error',
                            title: 'ERROR!!',
                            text : 'Su codigo de verificacion a caducado'
                        }).then((result) =>{
                            if(result.isConfirmed){
                                window.location = '../index.php';
                            }
                        });
                    <script/>
                ";
            }
        }
        else{
            header("Location: ../index.php");
        }
    }
}

?>
