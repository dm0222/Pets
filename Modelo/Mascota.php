<?php
    require_once("$_SERVER[DOCUMENT_ROOT]/Pets/Conexion/Conexion.php");
    class Mascota{
    
        public function AgregarMascota($Documento,$Nombre,$Edad,$Genero,$Especie,$Raza,$Color,$Observaciones,$CorreoMed){
            $Obj_Conexion = new Conexion;
            $Conexion = $Obj_Conexion->conexion();

            $BuscarEsp = "SELECT Codigo FROM especie WHERE nombre_especie = '$Especie'";
            $query = mysqli_query($Conexion,$BuscarEsp);
            $row = mysqli_fetch_row($query);
            $FK_CodEspecie = $row[0];

            $BuscarRaza = "SELECT Codigo FROM raza WHERE FK_CodEspecie = '$FK_CodEspecie' AND nombre_raza = '$Raza'";
            $query = mysqli_query($Conexion,$BuscarRaza);
            $row = mysqli_fetch_row($query);
            $FK_CodRaza = $row[0];

            $insertar = "INSERT INTO mascota VALUES(
                                                NULL,
                                                '$Documento',
                                                '$Nombre',
                                                '$Edad',
                                                '$Genero',
                                                '$FK_CodRaza',
                                                '$FK_CodEspecie',
                                                '$Color',
                                                '$Observaciones'
                                            )";
            $query = mysqli_query($Conexion, $insertar);
            echo "
                <script>
                    Swal.fire({
                        icon:'success',
                        title:'Bienvenido',
                        text:'La Mascota a sido registrada con Exito'
                    }).then((result) => {
                        if(result.isConfirmed){
                            window.location = '../Vista/Medico/DeskMedico.php?CorreoMed=".$CorreoMed."';
                        }
                    });   
                </script>
            ";
            
        }

        public function EditarMascota($Codigo,$Documento,$Nombre,$Edad,$Genero,$Raza,$Especie,$Color,$Observaciones,$CorreoMed,$CodHC){
            $Obj_Conexion = new Conexion;
            $Conexion = $Obj_Conexion->conexion();
            $modificar = "UPDATE mascota SET Codigo = '$Codigo',
                                            FK_CodPropietario = '$Documento',
                                            Nombre = '$Nombre',
                                            Edad = '$Edad',
                                            Genero = '$Genero',
                                            Raza = '$Raza',
                                            Especie = '$Especie',
                                            Observaciones = '$Observaciones'
                                        WHERE Codigo = '$Codigo'
                        ";
            mysqli_query($Conexion, $modificar);
            echo "
                <script>
                    Swal.fire({
                        icon:'success',
                        title:'Editado',
                        text:'los Datos han sido modificados Exitosamente!!'
                    }).then((result) => {
                        if(result.isConfirmed){
                            window.location = '../Vista/Medico/DeskHistory.php?CorreoMed=".$CorreoMed."&CodHC=".$CodHC."';
                        }
                    });   
                </script>
            ";
        }

        public function EliminarMascota($Codigo){

        }

        public function ListarMascota($Codigo,$Documento,$Nombre,$Edad,$Genero,$Raza,$Especie,$Color,$Observaciones){

        }

        public function AgregarRaza($Raza,$Especie){
            $Obj_Conexion = new Conexion;
            $Conexion = $Obj_Conexion->conexion();

            $buscar = "SELECT * FROM especie WHERE nombre_especie = '$Especie'";
            $query = mysqli_query($Conexion,$buscar);
            $row = mysqli_fetch_row($query);
            $FK_CodEspecie = $row[0];

            $buscar = "SELECT * FROM raza WHERE nombre_raza = '$Raza' AND FK_CodEspecie = '$FK_CodEspecie'";
            $query = mysqli_query($Conexion,$buscar);

            if(mysqli_fetch_array($query)){

            }
            else{
                $insertar = "INSERT INTO raza (nombre_raza,FK_CodEspecie) VALUES ('$Raza','$FK_CodEspecie')";
                mysqli_query($Conexion,$insertar);
            }

        }

        public function AgregarEspecie($Especie){
            $Obj_Conexion = new Conexion;
            $Conexion = $Obj_Conexion->conexion();
            $buscar = "SELECT * FROM especie WHERE nombre_especie = '$Especie'";
            $query =mysqli_query($Conexion,$buscar);
            if(mysqli_fetch_array($query)){

            }else{
                $insertar = "INSERT INTO especie (nombre_especie) VALUES = '$Especie'";
                mysqli_query($Conexion,$insertar);
            }
        }

        public function ListarRaza(){
            
        }

        public function ListarEspecie(){

        }
    }

?>