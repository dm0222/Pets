<?php
    
    class Persona{
        private $Documento;
        private $Primer_Nombre;
        private $Segundo_Nombre;
        private $Primer_Apellido;
        private $Segundo_Apellido;
        private $Direccion;
        private $Telefono;
        private $Celular;
        private $Email;

        public function __construct($Documento){
            $this->Documento = $Documento;
        }
    }
    
?>