<?php
    class Usuario{
        private $Codigo;
        private $Usuario;
        private $Contrasena;
        private $Rol;
        private $Estado;

        public function __construct($Codigo,$Usuario,$Contrasena,$Rol,$Estado){
            $this->Codigo=$Codigo;
            $this->Usuario = $Usuario;
            $this->Contrasena = $Contrasena;
            $this->Rol = $Rol;
            $this->Estado = $Estado;
        }
    }
?>