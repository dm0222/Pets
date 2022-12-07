<?php
    include("$_SERVER[DOCUMENT_ROOT]/Pets/Controlador/RecuperarContrasena.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = "stylesheet" href="../css/style.css" />
    <link rel="icon" href="../img/vet.png" />
    <title>Nueva Contraseña</title>
</head>
<body>
    <!-- recuperar contraseña -->
    <div class="contenedor-general-02">
        <form action="http://localhost/Pets/Controlador/RecuperarContrasena.php" method="POST">
            <div class="contendor-titulo">
                <p>Pets ++ </p>
            </div>
            <div class="contenedor-recuperacion">
                <div class="input-password">
                    <input id="NuevaContrasena" name="NuevaContrasena" type="password" class="form-input"
                        placeholder="Contraseña" required>
                </div>
                <div class="input-password">
                    <input id="RepNuContrasena" name="RepNuContrasena" type="password" class="form-input"
                        placeholder="Confirmar Contraseña" required>
                    <input type="hidden" name="email" value="<?php echo $_GET['email']?>">
                </div>
            </div>
            <input type="submit" name="modificar" class="submit04" value="Restablecer">
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.8.0/dist/chart.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2.0.0/dist/chartjs-plugin-datalabels.min.js">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.debug.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/glider-js@1.7.7/glider.min.js"></script>
    <script src="../JS/jquery-3.6.1.min.js"></script>
    <script src="../JS/main.js"></script>
</body>
</html>