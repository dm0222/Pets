<?php
    require_once "$_SERVER[DOCUMENT_ROOT]/Pets/Controlador/Usuario.php";
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/glider-js@1.7.7/glider.min.css">
    <link rel="stylesheet" href="./sw/dist/sweetalert2.min.css">
    <link rel="stylesheet" href="./Vista/css/style.css">
    <link rel="icon" href="./vista/img/vet.png" />
    <title>Pets ++</title>
</head>

<body>

    <!-- Video - background - inicio -->
    <div class="video-background">
        <video class="video-back" id="video" src="./Vista/Videos/Azul.mp4" muted autoplay loop playsinline></video>
    </div>

    <!-- Contenedor General -->
    <div class="contenedor-general">
        <div class="contendor-titulo">
            <p>Pets ++</p>
        </div>
        <div class="contenedor-Izquierda">
            <p><strong>Bienvenido a nuestro Software Veterinario.</strong><br><br>
                Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quam non amet sunt dolorem iusto dignissimos
                earum reprehenderit deserunt quae dicta architecto velit possimus, sed quas cupiditate itaque ullam
                beatae illo.
            </p>
        </div>
        <div class="contenedor-Derecha">
            <div class="sub-contenedor-Derecha">
                <form action="./Controlador/Usuario.php" method="post">
                    <div class="input-user">
                        <input id="name" name="Usuarios" type="text" class="form-input"
                            placeholder="Numero de Identificación ">
                    </div>
                    <div class="input-password">
                        <input id="name" name="Contrasenas" type="password" class="form-input" placeholder="Contraseña">
                    </div>
                    <input type="submit" name="validar" class="submit01" value="Iniciar Sesión">
                </form>
                <form action="#" method="post">
                    <p class="recuperar">¿Has olvidado la contraseña?</p>
                    <div class="submenu-recuperar">
                        <div class="input-email">
                            <input id="name" name="Usuario" type="text" class="form-input"
                                placeholder="Correo Eletronico">
                        </div>
                        <input type="submit" name="validar" class="submit04" value="Enviar Solicitud">
                    </div>
                </form>
                <input type="button" class="submit02" value="Crear cuenta nueva">
            </div>
        </div>
        <div class="contenedor-registro">
            <form action="" method="POST">
                <img class="cerrar" src="./Vista/Img/cerrar.png">
                <div class="Inputs-izquierda">
                    <div class="input-user">
                        <input id="name" name="First-name" type="text" class="form-input" placeholder="Primer Nombre">
                    </div>
                    <div class="input-email">
                        <input id="name" name="Second-name" type="text" class="form-input" placeholder="Segundo Nombre">
                    </div>
                    <div class="input-password">
                        <input id="name" name="First-surname" type="text" class="form-input"
                            placeholder="Primer Apellido">
                    </div>
                    <div class="input-password">
                        <input id="name" name="Second-surname" type="text" class="form-input"
                            placeholder="Segundo Apellido">
                    </div>
                </div>
                <div class="Inputs-derecha">
                    <div class="input-user">
                        <input id="name" name="Documento" type="text" class="form-input"
                            placeholder="Numero de Identificación">
                    </div>
                    <div class="input-email">
                        <input id="name" name="Usuario" type="text" class="form-input" placeholder="Correo Eletronico">
                    </div>
                    <div class="input-password">
                        <input id="name" name="Contrasena" type="password" class="form-input" placeholder="Contraseña">
                    </div>
                    <div class="input-password">
                        <input id="name" name="Contrasena" type="password" class="form-input"
                            placeholder="Confirmar Contraseña">
                    </div>
                </div>
                <input type="submit" name="agregar" class="submit03" value="Registrarte">
            </form>
        </div>
    </div>

    <!-- recuperar contraseña -->

    <div class="contenedor-general-02">
        <form action="" method="POST">
            <div class="contendor-titulo">
                <p>Pets ++ </p>
            </div>
            <div class="contenedor-recuperacion">
                <div class="input-password">
                    <input id="name" name="Contrasena" type="password" class="form-input" placeholder="Contraseña">
                </div>
                <div class="input-password">
                    <input id="name" name="Contrasena" type="password" class="form-input"
                        placeholder="Confirmar Contraseña">
                </div>
            </div>
            <input type="submit" name="agregar" class="submit04" value="Restablecer">
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.8.0/dist/chart.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2.0.0/dist/chartjs-plugin-datalabels.min.js">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.debug.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/glider-js@1.7.7/glider.min.js"></script>
    <script src="./sw/dist/sweetalert2.min.js"></script>
    <script src="./Vista/JS/jquery-3.6.1.min.js"></script>
    <script src="./Vista/JS/main.js"></script>
</body>

</html>