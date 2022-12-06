<?php
    // Varios destinatarios
    // atención a la coma
    // título
    $titulo = "Recuperacion de Contraseña";
    // mensaje
    $mensaje =" 
    <html>
    <head>
        <title>Recordatorio de cumpleaños para Agosto</title>
    </head>
    <body>
        <p>¡Estos son los cumpleaños para Agosto!</p>
        <table>
        <tr>
        <th>Quien</th><th></th><th>Mes</th><th>Año</th>
        </tr>
        <tr>
        <td>Joe</td><td>3</td><td>Agosto</td><td>1970</td>
        </tr>
        <tr>
        <td>Sally</td><td>17</td><td>Agosto</td><td>1973</td>
        </tr>
        </table>
    </body>
    </html>
    ";
    // Para enviar un correo HTML, debe establecerse la cabecera Content-type
    $cabeceras  = "MIME-Version: 1.0" . "\r\n";
    $cabeceras .= "Content-type: text/html; charset=iso-8859-1" . "\r\n";
    // Enviarlo
    $enviado = false;

echo $email;
echo $titulo;
echo $mensaje;
echo $cabeceras;
echo $enviado;
mail($email, $titulo, $mensaje, $cabeceras)
   /* if(){
        $enviado = true;
    }  */  
?>