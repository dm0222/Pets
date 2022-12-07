<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../sw/dist/sweetalert2.min.css"/>
</head>
<body>
<?php
class Conexion{
    private $hostname = "localhost";
    private $database = "Pets";
    private $user ="root";
    private $password = "1234567890";
    public function conexion(){
        $link=mysqli_connect($this->hostname,$this->user,$this->password) 
            or die ("ERROR Al conectar la BD".mysqli_error($link));
        //seleccionar la BD
        mysqli_select_db($link,$this->database) 
            or die ("ERROR Al seleccionar la BD".mysqli_error($link));
        return $link;
    }
}
?>
<script src="../sw/dist/sweetalert2.min.js"></script>
</body>
</html>
