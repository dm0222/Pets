<?php
    require_once("$_SERVER[DOCUMENT_ROOT]/Pets/Conexion/Conexion.php");

    function ListarEspecie(){
            $Conexion = new Conexion;
            $listar = "SELECT * FROM especie";
            echo $listar;
            $resultado = mysqli_query($Conexion->conexion(), $listar);
            $row = mysqli_fetch_row($resultado);
            do {
                echo "<option value='$row[0]'>$row[1]</option>";
            } while ( $row = mysqli_fetch_row($resultado));
    }
    function ListarRaza(){
        $Cod_especie = $_POST['FK_CodEspecie'];
        $Conexion = new Conexion;
            $listar = "SELECT * FROM Raza WHERE Codigo = '$Cod_especie'";
            echo $listar;
            $resultado = mysqli_query($Conexion->conexion(), $listar);
            $row = mysqli_fetch_row($resultado);
            do {
                echo "<option value='$row[0]'>$row[2]</option>";
            } while ( $row = mysqli_fetch_row($resultado));
    }

?>