<?php
session_start();
include "$_SERVER[DOCUMENT_ROOT]/Pets/Conexion/Conexion.php";

    class Usuaraio {
        protected $codigo; 
        protected $usuario;
        protected $contrasena;
        protected $rol;
        protected $estado;
        protected $Documento;

        public function RegistrarUsuario($Documento,$usuario,$contrasena){
            $conexion=new Conexion;
            $conecta = $conexion->conexion();
            $insertar="INSERT INTO cuenta VALUES (NULL,'$Documento','$usuario','$contrasena',12, 11)";
            $resultado=mysqli_query($conecta,$insertar);
            echo $insertar;
        }

        public function ValidarUsuario($Documento){
            
        }

        public function ValidarSession($usuario,$contrasena){
            $conexion = new Conexion;
            $conectar = $conexion->conexion();
            $validar = "SELECT * FROM cuenta WHERE Usuario = '$usuario'";
            $resultado = mysqli_query($conectar, $validar);
            if($row = mysqli_fetch_array($resultado)){
                $validar = "SELECT * FROM cuenta WHERE Usuario = '$usuario' AND Contrasena = '$contrasena'";
                $resultado = mysqli_query($conectar, $validar);
                if($row= mysqli_fetch_array($resultado)){
                    $_SESSION['usuario']=$row['Usuario'];
                    echo "
                        <script type='text/javascript'>
                            Swal.fire({
                                icon:'success',
                                title:'Bienvenido',
                                text:'$_SESSION[usuario] a Pets'
                            }).then((result) => {
                                if(result.isConfirmed){
                                    window.location = '../Vista/Medico/DeskMedico.php';
                                }
                            });   
                        </script>
                    ";
                }
                else{
                    $_SESSION['usuario']=NULL;
                    echo "
                        <script type='text/javascript'>
                            Swal.fire({
                                icon:'error',
                                title:'ERROR!!',
                                text:'El usuario $usuario o la contrasena no son correctos'
                            }).then((result) => {
                                if(result.isConfirmed){
                                    window.location = '../index.php';
                                }
                            });   
                        </script>
                    ";
                }
            }
            else{
                $_SESSION['usuario']=NULL;
                echo "
                    <script type='text/javascript'>
                        Swal.fire({
                            icon:'error',
                            title:'ERROR!!,
                            text:'El usuario $usuario no existe'
                        }).then((result) => {
                            if(result.isConfirmed){
                                window.location = '../index.php';
                            }
                        });
                ";
            }
        }
    }

?>