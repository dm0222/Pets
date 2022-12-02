<?php

class Persona
{
    protected $Documento;
    protected $Primer_Nombre;
    protected $Segundo_Nombre;
    protected $Primer_Apellido;
    protected $Segundo_Apellido;
    protected $Direccion;
    protected $Telefono;
    protected $Celular;
    protected $Email;

    public function __construct($Documento){
        $Documento = $this->Documento;
    }

    public function AgregarPersona($Documento,$Primer_Nombre,$Segundo_Nombre,$Primer_Apellido,$Segundo_Apellido,$Direccion,$Telefono,$Celular,$Email){

    }

    public function EditarPersona($Documento,$Primer_Nombre,$Segundo_Nombre,$Primer_Apellido,$Segundo_Apellido,$Direccion,$Telefono,$Celular,$Email){

    }

    public function EliminarPersona($Documento){

    }

    public function ListarPersona($Documento){

    }
}

?>