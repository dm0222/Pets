<?php
    require_once ("$_SERVER[DOCUMENT_ROOT]/Pets/Modelo/Persona.php");
    require_once ("$_SERVER[DOCUMENT_ROOT]/Pets/Modelo/Usuario.php");
    require_once ("$_SERVER[DOCUMENT_ROOT]/Pets/Modelo/Mascota.php");

        $Obj_Usuario = new Usuaraio;
        $Obj_Persona = new Persona;
        $Obj_Mascota = new Mascota;
    
    if(isset($_POST['BuscarProp'])){
        $Obj_Persona->BuscarPropietario($_POST['Documento'],$_POST['CorreoMed']);
    }

    if(isset($_POST['BuscarHistClin'])){
        $Obj_Persona->BuscarPropietario($_POST['Documento'],$_POST['CorreoMed']);
    }

    

    

    

?>