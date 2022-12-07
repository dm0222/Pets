<?php

    include ("$_SERVER[DOCUMENT_ROOT]/Pets/Modelo/Persona.php");
    include ("$_SERVER[DOCUMENT_ROOT]/Pets/Modelo/Usuario.php");

        $Obj_Usuario = new Usuaraio;
        $Obj_Persona = new Persona;


    //Funcion encargada de hacer el POST para agregr 'medico o administrador' y usuario
        if(isset($_POST['agregar'])){
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
                                                $_POST['Celular'],
                                                $_POST['Telefono'],
                                                $_POST['Correo'],
                                                $_POST['Contrasena'],
                                                2
                                            );

                $Obj_Usuario->ValidarRegistro(
                                                $_POST['Documento'],
                                                $_POST['Correo'],
                                                $_POST['Contrasena']
                                            );
            } 
        }
    ?>