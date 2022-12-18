<?php
    require_once("$_SERVER[DOCUMENT_ROOT]/Pets/Conexion/Conexion.php");

    
    

    function BuscarMedico($Correo){
        $Conexion = new Conexion;
        $query = "SELECT Documento FROM medico WHERE email = '$Correo'";
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

    function BuscarPropMascHC($Codigo){
        $Conexion = new Conexion;
        $Conectar = $Conexion->conexion();
        $query = "SELECT p.*,m.*,e.nombre_especie,r.nombre_raza FROM pets.propietario p INNER JOIN pets.mascota m ON p.Documento = m.FK_CodPropietario INNER JOIN pets.historia_clinica hc ON m.Codigo = hc.FK_CodMascota INNER JOIN pets.especie e ON m.FK_CodEspecie = e.Codigo INNER JOIN pets.raza r ON r.Codigo = m.FK_CodRaza WHERE hc.Codigo = $Codigo";
        $resultado = mysqli_query($Conectar, $query);
        $PropMascHC = mysqli_fetch_row($resultado);
        return $PropMascHC;
    }

    function BuscarDatMasc($CodHC){
        $Obj_Conexion = new Conexion;
        $Conexion = $Obj_Conexion->conexion();
        $buscar = "SELECT * FROM mascota m INNER JOIN historia_clinica hc ON m.Codigo = hc.FK_CodMascota WHERE hc.Codigo = $CodHC";
        $resultado = mysqli_query($Conexion, $buscar);
        $DatosMasc = mysqli_fetch_row($resultado);

        return $DatosMasc;
    }

    if(isset($_POST['Nom_Especie'])){
        $Especie = $_POST['Nom_Especie'];
        $Conexion = new Conexion;
            $especie = "SELECT Codigo FROM especie WHERE nombre_especie = '$Especie'";
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

    function ListarHistClic(){
        $listaHistClic = array();
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

    function ListarCitaMedica($CodHC){
        $ListarHC = array();
        $Obj_Conexion = new Conexion;
        $Conexion = $Obj_Conexion->conexion();
        $listar = "SELECT Codigo, Fecha, Observaciones FROM pets.cita_medica WHERE FK_CodHistoriaClinica = $CodHC AND FK_CodEstado != 21";
        $resultado = mysqli_query($Conexion,$listar);
        while ($row = mysqli_fetch_assoc($resultado)){
            $ListarHC[] = $row;
        }
        return $ListarHC;
    }

    function ListarTipoCita(){
        $Obj_Conexion = new Conexion;
        $Conectar = $Obj_Conexion->conexion();
        $listar = "SELECT * FROM tipo_cita";
        $resultado = mysqli_query($Conectar, $listar);
        $row = mysqli_fetch_row($resultado);
        do {
            echo "
            <option value='$row[1]'></option>";
        } while ( $row = mysqli_fetch_row($resultado));
    }



    
    

?>