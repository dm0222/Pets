<?php
    require_once("$_SERVER[DOCUMENT_ROOT]/Pets/Conexion/Conexion.php");

    class HistoriaClinica{

        public function RegistrarHistClin($DocumentoMed){
        $Conexion = new Conexion;
        $Conectar = $Conexion->conexion();
        $query = "SELECT Codigo FROM mascota ORDER BY Codigo DESC LIMIT 1";
        $resultado = mysqli_query($Conectar, $query);
        $row = mysqli_fetch_row($resultado);
        $FK_CodMascota = $row[0];

        $query = "INSERT INTO historia_clinica (FK_CodMedico,FK_CodMascota,FK_CodEstado) VALUES ('$DocumentoMed', $FK_CodMascota, 12)";
        mysqli_query($Conectar, $query);
        }

    }

?>