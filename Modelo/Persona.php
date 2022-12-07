<?php
    include("$_SERVER[DOCUMENT_ROOT]/Pets/Conexion/Conexion.php");
        
    class Persona
    {
            public function AgregarPersona($Documento,$PrimerNombre,$SegundoNombre,$PrimerApellido,$SegundoApellido,$Direccion,$Celular,$Telefono,$Email,$Contrasena,$Tipo){
            $Obj_Conexion = new Conexion;
            $Conexion= $Obj_Conexion->conexion();
            switch($Tipo){
                case 1: //Administrador
                    
                break;
                case 2: //Medico
                    $queyvalidar = "SELECT * FROM medico WHERE Documento = '$Documento'";
                    $validar = mysqli_query($Conexion, $queyvalidar);
                    if (mysqli_fetch_array($validar)){
                        
                    }
                    else{
                        $querymedico ="INSERT INTO medico VALUES ('$Documento','$PrimerNombre','$SegundoNombre','$PrimerApellido','$SegundoApellido','$Email','$Celular','$Telefono')";
                        $insertmedico= mysqli_query($Conexion,$querymedico);
                    }
                break;
                case 3: //Propietario


                break;
            }
        }
    }


    ?>