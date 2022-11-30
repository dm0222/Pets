<?php
class Database {
        private $hostname = "localhost";
        private $database = "Pets";
        private $username = "administrador";
        private $password = "123456789";
        private $charset = "utf8";

        function conectar(){
            try{
                $conexion = "mysql=host".$this->hostname.";dbname".$this->database.";charset=".$this->charset;
                $pdo = new PDO($conexion, $this->username, $this->password);
                return $pdo; 
            }
            catch (PDOException $e){
                echo 'Error en la conexion: '. $e->getMessage();
                exit;
            }
        }
}
?>