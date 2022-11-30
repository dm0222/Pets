<?php
require_once 'Persona.php';

class Propietario extends Persona {
    public function __construct($Documento){
        parent::__construct($Documento);
    }
}
?>