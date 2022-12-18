<?php
    require_once("$_SERVER[DOCUMENT_ROOT]/Pets/Conexion/Conexion.php");

    class FormulaMedica{
        public function CrearFormMedica($CodMedico){
        $Obj_Conexion = new Conexion;
        $Conexion = $Obj_Conexion->conexion();
        $insertar = "INSERT INTO formula_medica (FK_CodMedico) VALUES ('$CodMedico')";
        mysqli_query($Conexion, $insertar);
        }
    }
?>