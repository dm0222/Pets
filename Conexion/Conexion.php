<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/glider-js@1.7.7/glider.min.css">
    <link rel="stylesheet" href="../sw/dist/sweetalert2.min.css">
    <link rel="stylesheet" href="../Vista/css/style.css">
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

    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.8.0/dist/chart.min.js"></script>
    <script
        src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2.0.0/dist/chartjs-plugin-datalabels.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.debug.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/glider-js@1.7.7/glider.min.js"></script>
    <script src="../sw/dist/sweetalert2.min.js"></script>
    <script src="../Vista/JS/jquery-3.6.1.min.js"></script>
    <script src="../Vista/JS/main.js"></script>
</body>
</html>

