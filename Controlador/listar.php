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
    

    function BuscarMedico($Correo){
        $Conexion = new Conexion;
        $query = "SELECT * FROM medico WHERE email = '$Correo'";
        $resultado = mysqli_query($Conexion->conexion(),$query);
        $row = mysqli_fetch_row($resultado);
        $Doc_Medico = $row[0];
        
        return $Doc_Medico;
    }

    function BuscarAdmin($Correo){
        $Conexion = new Conexion;
        $query = "SELECT Documento FROM medico WHERE email = '$Correo'";
        $resultado = mysqli_query($Conexion->conexion(),$query);
        $row = mysqli_fetch_row($resultado);
    }

    if(isset($_POST['Nom_Especie'])){
        $Especie = $_POST['Nom_Especie'];
        $Conexion = new Conexion;
            $especie = "SELECT Codigo FROM especie WHERE nombre_especie = '$Especie'";
            echo $especie;
            $resultado = mysqli_query($Conexion->conexion(), $especie);
            $row = mysqli_fetch_row($resultado);
            $Cod_Especie = $row[0];

            $listar = "SELECT * FROM raza WHERE FK_CodEspecie = '$Cod_Especie'";
            echo $listar;
            $resultado = mysqli_query($Conexion->conexion(), $listar);
            $row = mysqli_fetch_row($resultado);
            do {
                echo "
                    <option value='$row[1]'></option>
                ";
            } while ( $row = mysqli_fetch_row($resultado));
}

    function ListarHistClic(){
        $Conexion = new Conexion;
            $Conectar = $Conexion->conexion();
            $query = "SELECT hc.Codigo, p.PrimerNombre, p.PrimerApellido, m.Nombre FROM historia_clinica hc,mascota m, propietario p WHERE hc.FK_CodMascota = m.Codigo AND p.Documento = m.FK_CodPropietario";
            $resultado = mysqli_query($Conectar,$query);
            while($row = mysqli_fetch_assoc($resultado)){
                $listaHistClic[] = $row;
            }
        return $listaHistClic;
    }

    function ListarMedico(){
        $listarMed = array();
        $Conexion = new Conexion;
            $Conectar = $Conexion->conexion();
            $query = "SELECT * FROM medico";
            $resultado = mysqli_query($Conectar,$query);
            while($row = mysqli_fetch_assoc($resultado)){
                $listarMed[] = $row;
            }
        return $listarMed;
    }



    
    

?>