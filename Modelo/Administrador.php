<?php
    require_once 'Persona.php';
    class Administrador extends Persona{
        public function __construct($Documento, $Primer_Nombre, $Segundo_Nombre, $Primer_Apellido, $Segundo_Apellido, $Direccion, $Telefono, $Celular, $Email){
            parent::__construct($Documento, $Primer_Nombre, $Segundo_Nombre, $Primer_Apellido, $Segundo_Apellido, $Direccion, $Telefono, $Celular, $Email);
        }
    }
?>

