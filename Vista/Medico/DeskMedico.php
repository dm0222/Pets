<?php
session_start();
$inn = 500;
if(isset($_SESSION['timeout'])){
    $_session_life = time() - $_SESSION['timeout'];
    if($_session_life > $inn){
        session_destroy();
        header("location: ../../Index.php");
    }
}
$_SESSION['timeout'] = time();
require_once("$_SERVER[DOCUMENT_ROOT]/Pets/Conexion/Conexion.php");
if($_SESSION['Correo']){
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/glider-js@1.7.7/glider.min.css">
    <link rel="stylesheet" href="../../sw/dist/sweetalert2.min.css">
    <link rel="stylesheet" href="../CSS/DeskStyle.css">
    <link rel="icon" href="../Img/escritorio.png"/>
    <title></title>
</head>
    <h1></h1>
<body>

    <!-- Video - background - inicio -->

    <div class="video-background">
        <video class="video-back" id="video" src="../Videos/Verde.mp4" muted autoplay loop playsinline ></video>
    </div>

    

    </div>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.8.0/dist/chart.min.js"></script>
    <script
        src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2.0.0/dist/chartjs-plugin-datalabels.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.debug.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/glider-js@1.7.7/glider.min.js"></script>
    <script src="../../sw/dist/sweetalert2.min.css"></script>
    <script src="../JS/jquery-3.6.1.min.js"></script>
    <script src="../JS/main.js"></script>
</body>

</html>
<?php
}
else{
    $_SESSION['Correo'] = NULL;
    echo "
        <script>
            Swal.fire({
            icon : 'error',
            title : 'ERROR!!',
            text :  ' Su sesion a caducado'
            }).then((result) => {
                if(result.isConfirmed){
                window.location='../../index.php';
                }
            }); 
        </script>
    ";
}
?>