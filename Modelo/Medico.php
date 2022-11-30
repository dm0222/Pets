<?php
    require_once 'Persona.php';
    class Medico extends Persona {
        public  function __construct($Documento, $Primer_Nombre, $Segundo_Nombre, $Primer_Apellido, $Segundo_Apellido, $Direccion, $Telefono, $Celular, $Email){
            parent::__construct($Documento, $Primer_Nombre, $Segundo_Nombre, $Primer_Apellido, $Segundo_Apellido, $Direccion, $Telefono, $Celular, $Email);
        }
    }
?>