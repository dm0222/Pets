    <?php
    require_once("$_SERVER[DOCUMENT_ROOT]/Pets/Conexion/Conexion.php");
    session_start();
    class Usuaraio {
        protected $codigo; 
        protected $usuario;
        protected $contrasena;
        protected $rol;
        protected $estado;
        protected $Documento;

        // Validacion del usuario//
        public function ValidarRegistro($Documento,$Email,$contrasena){
            $conexion = new Conexion;
            $conectar = $conexion->conexion();
            $validar = "SELECT * FROM cuenta WHERE email = '$Email' AND FK_CodUsuario = '$Documento' ";
            $resultado = mysqli_query($conectar, $validar);
            if($row = mysqli_fetch_array($resultado)){
                echo "
                    <script>
                        Swal.fire({
                            icon:'error',
                            title:'ERROR!',
                            text:'El correo ya tiene una cuenta registrada'
                        }).then((result) => {
                            if(result.isConfirmed){
                                window.location = '../index.php';
                            }
                        });   
                    </script>
                ";
            }
            else{
                $this->RegistrarUsuario($Documento,$Email,$contrasena);
            }
        }

        //Registro del Usuario //
        public function RegistrarUsuario($Documento,$Email,$contrasena){
            $conexion=new Conexion;
            $conecta = $conexion->conexion();
            $insertar="INSERT INTO cuenta VALUES (NULL,'$Documento','$Email','$contrasena',12, 11)";
            $resultado=mysqli_query($conecta,$insertar);
            echo "
                <script>
                    Swal.fire({
                        icon:'success',
                        title:'Bienvenido',
                        text:'$Email a sido registrado correctamente'
                    }).then((result) => {
                        if(result.isConfirmed){
                            window.location = '../index.php';
                        }
                    });   
                </script>
            ";
        }

        //Validacion del Inicio de Sesion// 
        public function ValidarSession($Email,$contrasena){
            $conexion = new Conexion;
            $conectar = $conexion->conexion();
            $validar = "SELECT * FROM cuenta WHERE email = '$Email'";
            $resultado = mysqli_query($conectar, $validar);
            if($row = mysqli_fetch_array($resultado)){
                $validar = "SELECT * FROM cuenta WHERE email = '$Email' AND Contrasena = '$contrasena'";
                $resultado = mysqli_query($conectar, $validar);
                if($row= mysqli_fetch_array($resultado)){
                    $this->ValidarEstado($Email);
                }
                else{
                    $_SESSION['Correo']= NULL;
                    echo "
                        <script>
                            Swal.fire({
                                icon:'error',
                                title:'ERROR!!',
                                text:'El correo $Email o la contrasena no son correctos'
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
                $_SESSION['Correo']=NULL;
                echo "
                    <script>
                        Swal.fire({
                            icon:'error',
                            title:'ERROR!!',
                            text:'El correo $Email no existe'
                        }).then((result) => {
                            if(result.isConfirmed){
                                window.location = '../index.php';
                            }
                        });
                    </script>
                ";
            }
            
        }

        public function ValidarEstado($Email){
            $conexion = new Conexion;
            $conectar = $conexion->conexion();
            $validar = "SELECT * FROM cuenta WHERE email = '$Email'";
            $resultado = mysqli_query($conectar, $validar);
            $row = mysqli_fetch_row($resultado);
            $Email = $row[2];
            $Rol =$row[4];            
            $Estado = $row[5];
            switch ($Estado){
                case 11:
                    echo "
                        <script>
                            Swal.fire({
                                icon:'error',
                                title:'ERROR!!',
                                text:'Su cuenta aun no a sido activada, Comuniquese con el administrador'
                            }).then((result) => {
                                if(result.isConfirmed){
                                    window.location = '../index.php';
                                }
                            });
                        </script>
                    ";
                break;
                case 12:
                    $this->ValidarRol($Rol,$Email);
                break;
            }
        }

        public function ValidarRol($Rol,$Email){

            switch ($Rol){
                case 11:
                    $_SESSION['Correo'] = $Email;
                    echo "
                        <script>
                            Swal.fire({
                                icon:'success',
                                title:'Bienvenido',
                                text:'$_SESSION[Correo] a Pets'
                            }).then((result) => {
                                if(result.isConfirmed){
                                    window.location = '../Vista/Administrador/DeskAdmin.php';
                                }
                            });   
                        </script>
                    "; 
                break;
                case 12:
                    $_SESSION['Correo']= $Email;
                    echo "
                        <script>
                            Swal.fire({
                                icon:'success',
                                title:'Bienvenido',
                                text:'$_SESSION[Correo] a Pets'
                            }).then((result) => {
                                if(result.isConfirmed){
                                    window.location = '../Vista/Medico/DeskMedico.php';
                                }
                            });   
                        </script>
                    "; 
                break;
            }
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
                            window.location = '../index.php';
                        }
                    });
                </script>
            ";
        }
    } 
    ?>