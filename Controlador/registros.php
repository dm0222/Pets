<?php
    require_once ("$_SERVER[DOCUMENT_ROOT]/Pets/Modelo/Persona.php");
    require_once ("$_SERVER[DOCUMENT_ROOT]/Pets/Modelo/Usuario.php");
    require_once ("$_SERVER[DOCUMENT_ROOT]/Pets/Modelo/Mascota.php");
    require_once ("$_SERVER[DOCUMENT_ROOT]/Pets/Modelo/HistoriaClinica.php");

        $Obj_Usuario = new Usuaraio;
        $Obj_Persona = new Persona;
        $Obj_Mascota = new Mascota;
        $Obj_HistClinc = new HistoriaClinica;

    //Funcion encargada de hacer el POST para agregr 'Medico'
    if(isset($_POST['AgregarMedico'])){
        if($_POST['Contrasena'] != $_POST['RepContrasena']){
            $Obj_Usuario->MsnContrasenasIguales();
        }
        else{
            $Obj_Persona->AgregarPersona(   $_POST['Documento'],
                                            $_POST['PrimerNombre'],
                                            $_POST['SegundoNombre'],
                                            $_POST['PrimerApellido'],
                                            $_POST['SegundoApellido'],
                                            '',
                                            $_POST['Correo'],
                                            $_POST['Celular'],
                                            $_POST['Telefono'],
                                            2,
                                            ''
                                        );
            $Obj_Usuario->ValidarRegistro(
                                            $_POST['Documento'],
                                            $_POST['Correo'],
                                            $_POST['Contrasena']
                                        );
        }
    }

    //Funcion encargada de hacer el POST para agregr 'Administrador'
    if(isset($_POST['AgregarAdmin'])){
        if($_POST['Contrasena'] != $_POST['RepContrasena']){
            $Obj_Usuario->MsnContrasenasIguales();
        }
        else{
            $Obj_Persona->AgregarPersona(   $_POST['Documento'],
                                            $_POST['PrimerNombre'],
                                            $_POST['SegundoNombre'],
                                            $_POST['PrimerApellido'],
                                            $_POST['SegundoApellido'],
                                            '',
                                            $_POST['Correo'],
                                            $_POST['Celular'],
                                            $_POST['Telefono'],
                                            1,
                                            ''
                                        );
            $Obj_Usuario->ValidarRegistro(
                                            $_POST['Documento'],
                                            $_POST['Correo'],
                                            $_POST['Contrasena']
                                        );
        }
    }

    //Funcion encargada de hacer el POST para agregr 'Propietario y Mascota'
    if(isset($_POST['AgregarPropMasc'])){
            $Obj_Persona->AgregarPersona(   $_POST['Documento'],
                                            $_POST['PrimerNombre'],
                                            $_POST['SegundoNombre'],
                                            $_POST['PrimerApellido'],
                                            $_POST['SegundoApellido'],
                                            $_POST['Direccion'],
                                            $_POST['Correo'],
                                            $_POST['Celular'],
                                            $_POST['Telefono'],
                                            3,
                                            $_POST['CorreoMed']
                                        );
                                        
            $Obj_Mascota->AgregarEspecie($_POST['Especie']);

            $Obj_Mascota->AgregarRaza($_POST['Raza'],$_POST['Especie']);

            $Obj_Mascota->AgregarMascota(
                                            $_POST['Documento'],
                                            $_POST['Nombre'],
                                            $_POST['Edad'],
                                            $_POST['Genero'],
                                            $_POST['Especie'],
                                            $_POST['Raza'],
                                            $_POST['Color'],
                                            $_POST['Observaciones']
                                        );

        $Obj_HistClinc->RegistrarHistClin($_POST['DocumentoMed']);
    }

    //Funcion encargada de hacer el POST para agregr 'Mascota'
    if(isset($_POST['AgregarMascota'])){
        $Obj_Mascota->AgregarEspecie($_POST['Especie']);

        $Obj_Mascota->AgregarRaza($_POST['Raza'],$_POST['Especie']);
        
        $Obj_Mascota->AgregarMascota(
                                        $_POST['Documento'],
                                        $_POST['Nombre'],
                                        $_POST['Edad'],
                                        $_POST['Genero'],
                                        $_POST['Especie'],
                                        $_POST['Raza'],
                                        $_POST['Color'],
                                        $_POST['Observaciones']
                                    );

        $Obj_HistClinc->RegistrarHistClin($_POST['DocumentoMed']);
    }
?>