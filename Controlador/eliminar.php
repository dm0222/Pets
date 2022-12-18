<?php
    require_once ("$_SERVER[DOCUMENT_ROOT]/Pets/Modelo/CitaMedica.php");

    $Obj_CitaMedica = new CitaMedica;

    if(isset($_GET['CodCitaMed'])){
        $Obj_CitaMedica->ConfirmarEliminacion($_GET['CodHC'], $_GET['CorreoMed'], $_GET['CodCitaMed']);
    }

?>