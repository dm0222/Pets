<?php
    require_once ("$_SERVER[DOCUMENT_ROOT]/Pets/Modelo/CitaMedica.php");
    require_once ("$_SERVER[DOCUMENT_ROOT]/Pets/Modelo/FormulaMedica.php");

    $Obj_CitaMedica = new CitaMedica;
    $Obj_FormulaMedica = new FormulaMedica;

    if(isset($_POST['CrearCita'])){
        $Obj_FormulaMedica->CrearFormMedica($_POST['CodMedico']);

        $Obj_CitaMedica->CrearCita($_POST['CodHC'],
                                    $_POST['CodMedico'],
                                    $_POST['FechaAgendar'],
                                    $_POST['TipoCita'],
                                    $_POST['Observacion_CitaMedica'],
                                    $_POST['CorreoMed']
                                    );
    }

?>