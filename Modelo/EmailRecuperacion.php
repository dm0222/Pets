
<?php
    // Varios destinatarios
    // atención a la coma
    // título
    $titulo = "Recuperacion de Contraseña";
    // mensaje
    $mensaje =' 
    <!DOCTYPE html>
    <html lang="es">
    <head>
        
    </head>
    <body>
        <p > Hola Mundo <p>
    </body>
    </html>
    ';
    // Para enviar un correo HTML, debe establecerse la cabecera Content-type
    $cabeceras  = "MIME-Version: 1.0" . "\r\n";
    $cabeceras .= "Content-type: text/html; charset=iso-8859-1" . "\r\n";
    // Enviarlo
    $enviado = false;
   if(mail($email, $titulo, $mensaje, $cabeceras)){
        $enviado = true;
    }  
?>