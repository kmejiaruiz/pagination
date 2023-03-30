<?php
include("./conector.php");
if (!empty($_POST['enviar'])) {
    if (!empty($_POST['nombre']) && !empty($_POST['apellido'])) {
        $nombre = trim($_POST['nombre']);
        $apellido = trim($_POST['apellido']);

        $insertar = "INSERT INTO `personas`(`Nombre`, `Apellido`) VALUES ('$nombre','$apellido')";
        mysqli_query($conectar, $insertar);
        echo "<script>M.toast({html: 'Exito al registrar.', classes: 'rounded'});</script>";
        header("location:./");
    } else {
        echo "<script>M.toast({html: 'Hay campos vacios, favor rellene todos los campos para continuar.', classes: 'rounded'});</script>";
    }
}

mysqli_close($conectar);
