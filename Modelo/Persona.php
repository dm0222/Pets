<?php
    require_once("$_SERVER[DOCUMENT_ROOT]/Pets/Conexion/Conexion.php");
        
    class Persona
    {
            public function AgregarPersona($Documento,$PrimerNombre,$SegundoNombre,$PrimerApellido,$SegundoApellido,$Direccion,$Email,$Celular,$Telefono,$Tipo){
            $Obj_Conexion = new Conexion;
            $Conexion= $Obj_Conexion->conexion();
            switch($Tipo){
                case 1: //Administrador
                    $queyvalidar = "SELECT * FROM administrador WHERE Documento = '$Documento'";
                    $validar = mysqli_query($Conexion, $queyvalidar);
                    if (mysqli_fetch_array($validar)){
                        
                    }
                    else{
                        $queryadmin ="INSERT INTO administrador VALUES ('$Documento','$PrimerNombre','$SegundoNombre','$PrimerApellido','$SegundoApellido','$Email','$Celular','$Telefono')";
                        mysqli_query($Conexion,$queryadmin);
                    }
                break;

                case 2: //Medico
                    $queyvalidar = "SELECT * FROM medico WHERE Documento = '$Documento'";
                    $validar = mysqli_query($Conexion, $queyvalidar);
                    if (mysqli_fetch_array($validar)){
                        
                    }
                    else{
                        $querymedico ="INSERT INTO medico VALUES ('$Documento','$PrimerNombre','$SegundoNombre','$PrimerApellido','$SegundoApellido','$Email','$Celular','$Telefono')";
                        mysqli_query($Conexion,$querymedico);
                    }
                break;
                case 3: //Propietario
                    $queyvalidar = "SELECT * FROM propietario WHERE Documento = '$Documento'";
                    $validar = mysqli_query($Conexion, $queyvalidar);
                    if (mysqli_fetch_array($validar)){
                        echo "
                            <script>
                                Swal.fire({
                                    icon:'error',
                                    title:'ERROR!',
                                    text:'El cliente ya se encuentra registrado'
                                }).then((result) => {
                                    if(result.isConfirmed){
                                        window.location = '../Vista/Medico/DeskMedico.php';
                                    }
                                });   
                            </script>
                        ";
                    }
                    else{
                        $queryprop ="INSERT INTO propietario VALUES ('$Documento','$PrimerNombre','$SegundoNombre','$PrimerApellido','$SegundoApellido','$Direccion','$Email','$Celular','$Telefono')";
                        mysqli_query($Conexion,$queryprop);
                        echo "
                            <script>
                                Swal.fire({
                                    icon:'success',
                                    title:'Bienvenido',
                                    text:'El cliente a sido registrado correctamente'
                                }).then((result) => {
                                    if(result.isConfirmed){
                                        window.location = '../Vista/Medico/DeskMedico.php';
                                    }
                                });   
                            </script>
                        ";
                    }
                break;
            }
        }

            public function BuscarPropietario($Documento){
                $Obj_Conexion = new Conexion;
                $Conexion= $Obj_Conexion->conexion();
                $queybuscar = "SELECT * FROM propietario WHERE Documento = '$Documento'";
                $buscar = mysqli_query($Conexion, $queybuscar);
                if(mysqli_fetch_array($buscar)){
                    echo "
                    <script>
                        Swal.fire({
                            icon:'success',
                            title:'Bienvenido',
                            text:'Propietario encontrado'
                        });  
                    </script>
                    ";
                    header('Location: ../Medico/DeskMedico.php?Documento='.$Documento.''); 
                }
                else{
                    echo "
                    <script>
                        Swal.fire({
                            icon:'error',
                            title:'ERROR!',
                            text:'El cliente no se encuentra registrado en la base de datos'
                        }).then((result) => {
                            if(result.isConfirmed){
                                window.location = '../Medico/DeskMedico.php';
                            }
                        });   
                    </script>
                "; 
                }
            }
    }


    ?>