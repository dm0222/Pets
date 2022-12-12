<?php
    require_once("$_SERVER[DOCUMENT_ROOT]/Pets/Conexion/Conexion.php");

    function ListarEspecie(){
            $Conexion = new Conexion;
            $listar = "SELECT * FROM especie";
            $resultado = mysqli_query($Conexion->conexion(), $listar);
            $row = mysqli_fetch_row($resultado);
            do {
                echo "
                <option value='$row[1]'></option>";
            } while ( $row = mysqli_fetch_row($resultado));
    }

    if(isset($_POST['Nom_Especie'])){
            $Especie = $_POST['Nom_Especie'];
            $Conexion = new Conexion;
                $especie = "SELECT Codigo FROM especie WHERE nombre_especie = '$Especie'";
                echo $especie;
                $resultado = mysqli_query($Conexion->conexion(), $especie);
                $row = mysqli_fetch_row($resultado);
                $Cod_Especie = $row[0];

                $listar = "SELECT * FROM Raza WHERE FK_CodEspecie = '$Cod_Especie'";
                echo $listar;
                $resultado = mysqli_query($Conexion->conexion(), $listar);
                $row = mysqli_fetch_row($resultado);
                do {
                    echo "
                        <option value='$row[1]'></option>
                    ";
                } while ( $row = mysqli_fetch_row($resultado));
    }
    

?>