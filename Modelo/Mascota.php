<?php
    require_once 'Propietario.php';
    class Mascota{
        private $Codigo;
        private $Nombre;
        private $Edad;
        private $Genero;
        private $Especie;
        private $Raza;
        private $Color;

        public $Obj_Propietario = new Propietario($this->Documento);

        public function __construct($Codigo,$Nombre,$Edad,$Genero,$Especie,$Raza,$Color){
            $this->Codigo = $Codigo;
            $this->Nombre = $Nombre;
            $this->Edad = $Edad;
            $this->Genero = $Genero;
            $this->Especie= $Especie;
            $this->Raza = $Raza;
            $this->$Color = $Color;
        }
    }

?>