<?php
    require_once './Conexion/Conexion.php';

    $conexion = new Conexion();
    $conexion->conexion();
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/glider-js@1.7.7/glider.min.css">
    <link rel="stylesheet" href="./vista/css/style.css">
    <link rel="icon" href="./vista/img/vet.png" />
    <title>Pets ++</title>
</head>

<body>

    <!-- Video - background - inicio -->

    <div class="video-background">
        <video class="video-back" id="video" src="./Vista/Videos/Azul.mp4" muted autoplay loop playsinline ></video>
    </div>

    <!-- Contenedor General -->

    <div class="contenedo-general">
        <div class="contendor-titulo">
            <p>Pets ++</p>
        </div>
        <div class="contenedor-derecha">
            <p><strong>Bienvenido a nuestro Software Veterinario.</strong><br><br>
                Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quam non amet sunt dolorem iusto dignissimos
                earum reprehenderit deserunt quae dicta architecto velit possimus, sed quas cupiditate itaque ullam
                beatae illo.
            </p>
        </div>
        <div class="contenedor-izquierda">
            <div class="sub-contenedor-izquierda">
                <div class="input-user">
                    <input id="name" type="text" class="form-input" placeholder="Numero de Identificación ">
                </div>
                <div class="input-password">
                    <input id="name" type="password" class="form-input" placeholder="Contraseña">
                </div>
                <input type="button" class="submit01" value="Iniciar Sesión">
                <p class="recuperar">¿Has olvidado la contraseña?</p>
                <div class="linea"></div>
                <input type="button" class="submit02" value="Crear cuenta nueva">
            </div>
        </div>

        <div class="contenedor-derecha-registro">
            <img class="cerrar" src="./Vista/Img/cerrar.png">
            <div class="input-user">
                <input id="name" type="text" class="form-input" placeholder="Numero de Identificación">
            </div>
            <div class="input-email">
                <input id="name" type="email" class="form-input" placeholder="Correo Eletronico">
            </div>
            <div class="input-password">
                <input id="name" type="password" class="form-input" placeholder="Contraseña">
            </div>
            <div class="input-password">
                <input id="name" type="password" class="form-input" placeholder="Confirmar Contraseña">
            </div>
            <div class="linea02"></div>
            <input type="button" class="submit03" value="Registrarte">
        </div>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.8.0/dist/chart.min.js"></script>
    <script
        src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2.0.0/dist/chartjs-plugin-datalabels.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.debug.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/glider-js@1.7.7/glider.min.js"></script>
    <script src="./Vista/JS/jquery-3.6.1.min.js"></script>
    <script src="./Vista/JS/main.js"></script>
</body>

</html>