<?php

$error = "";
$resultado = [];

$url = "http://localhost/DWES-UD7/prueba_soap/index.php";
$uri = "http://localhost/DWES-UD7/prueba_soap";
$cliente = new SoapClient(null, array('location' => $url, 'uri' => $uri));

if (count($_POST) > 0) {
    function seguro($valor)
    {
        $valor = strip_tags($valor);
        $valor = stripslashes($valor);
        $valor = htmlspecialchars($valor);
        return $valor;
    }
   
    $id = $cliente->setPlayers(seguro($_POST["nombre"]), $_POST["equipo"], $_POST["nacionalidad"], $_POST["edad"], $_POST["altura"],$_POST["fechaNacimiento"], $_POST["imagen"]);
    if ($id != 0) {
        echo "jugador añadido";
        exit();
    } else {
        $error = "Datos incorrectos";
    }
}


?>




<!DOCTYPE html>
<html>

<head>
    <title>Jugadores mayores</title>
    <link rel="stylesheet" type="text/css" href="/estilo.css">
</head>

<body>
<form class="form-register" action="crear.php" method="POST" enctype="multipart/form-data">
        <h2 class="form-titulo">Características:</h2>
        <div class="contenedor-inputs">
            <input type="text" name="nombre" placeholder="nombre" class="input-100" required>
            <input type="text" name="equipo" placeholder="equipo" class="input-100" required>
            <input type="text" name="nacionalidad" placeholder="nacionalidad" class="input-100" required>
            <input type="number" name="edad" placeholder="edad" class="input-48" required>
            <input type="number" name="altura" placeholder="altura" class="input-48" required>
            <input type="date" name="fechaNacimiento" placeholder="Fecha de Nacimiento" class="input-100" required>
            <input type="text" name="imagen" placeholder="imagen" class="input-100">
            <input type="submit" value="Registrar" class="btn-enviar">
            <div id="errores"><?php echo $error; ?></div>
        </div>
    </form>

</body>

</html>