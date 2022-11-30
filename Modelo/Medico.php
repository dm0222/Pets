<?php
    require_once 'Persona.php';
    class Medico extends Persona {
        public  function __construct($Documento){
            parent::__construct($Documento);
        }
    }
?>