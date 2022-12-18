<?php
    require_once("$_SERVER[DOCUMENT_ROOT]/Pets/Conexion/Conexion.php");

    class CitaMedica{
        public function CrearCita($CodHC,$CodMedico,$Fecha,$TipoCita,$Observaciones,$CorreoMed){
        $Obj_Conexion = new Conexion;
        $Conexion = $Obj_Conexion->conexion();

        $buscarFM = "SELECT Codigo FROM formula_medica ORDER BY Codigo DESC LIMIT 1";
        $resultado = mysqli_query($Conexion, $buscarFM);
        $row = mysqli_fetch_row($resultado);
        $FK_CodFormulaMedica = $row[0];

        $BuscarTC = "SELECT Codigo FROM tipo_cita WHERE Tipo_Cita = '$TipoCita'";
        $query = mysqli_query($Conexion,$BuscarTC);
        $row = mysqli_fetch_row($query);
        $FK_CodTipoCita = $row[0];


        $insertar = "INSERT INTO cita_medica (FK_CodHistoriaClinica,FK_CodFormulaMedica,FK_CodMedico,FK_CodEstado,Fecha,FK_CodTipoCita,Observaciones)
                                        VALUES($CodHC, $FK_CodFormulaMedica,'$CodMedico', 25, '$Fecha', $FK_CodTipoCita,'$Observaciones')";
        mysqli_query($Conexion, $insertar);
        echo "
                <script>
                    Swal.fire({
                        icon:'success',
                        title:'Agendado',
                        text:'Cita Medica agendada para el dia $Fecha'
                    }).then((result) => {
                        if(result.isConfirmed){
                            window.location = '../Vista/Medico/DeskHistory.php?CodHC=".$CodHC."&CorreoMed=".$CorreoMed."';
                        }
                    });   
                </script>
        ";
        }

        public function ConfirmarEliminacion($CodHC,$CorreoMed,$CodCitaMed){
        echo"
            <script>
                Swal.fire({
                title: 'Estas Seguro',
                text: 'Estas a punto de Cancelar Esta Cita',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si, Deseo Cancelarla'
                }).then((result) => {
                    if (result.isConfirmed) {
                        ".$this->EliminarCita($CodCitaMed)."
                        window.location = '../Vista/Medico/DeskHistory.php?CorreoMed=".$CorreoMed."&CodHC=".$CodHC."';
                    }
                    else if(result.dismiss === Swal.DismissReason.cancel){
                        window.location = '../Vista/Medico/DeskHistory.php?CorreoMed=".$CorreoMed."&CodHC=".$CodHC."';
                    }
                });
            </script>
        ";
        }

        public function EliminarCita($CodCitaMed){
        $Obj_Conexion = new Conexion;
        $Conexion = $Obj_Conexion->conexion();
        $eliminar = "UPDATE cita_medica SET FK_CodEstado = 21 WHERE Codigo = $CodCitaMed";
        mysqli_query($Conexion, $eliminar);
        }
    }      
?>