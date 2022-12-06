<?php
class Conexion{
    private $hostname = "192.168.1.2";
    private $database = "Pets";
    private $user ="administrador";
    private $password = "123456789";

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
