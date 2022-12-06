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
