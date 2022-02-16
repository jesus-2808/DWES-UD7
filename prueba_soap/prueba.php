<?php

$error = "";
$resultado = [];

$url = "http://localhost/DWES-UD7/prueba_soap/index.php";
$uri = "http://localhost/DWES-UD7/prueba_soap";
$cliente = new SoapClient(null, array('location' => $url, 'uri' => $uri));

if (isset($_POST['enviar'])) {
    if (!empty($_POST['edad'])) {
        $resultado = $cliente->getPlayer($_POST['edad']);

        foreach ($resultado as $jugador) {
            print "<p style='font-size: 12pt;font-weight: bold;color: #0066CC;'>" . $jugador['Nombre'] . "</p>";
        }
    } else {
        $error = "<strong>Error:</strong> resultado incorrecto, formato no soportado<br/><br/>Ej: 1";
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

    <form action="prueba.php" method="post">
        <?php //IMPORTANTE: ELIMINA EL ESPACIO ANTES DE LA INTERROGACIÓN

        print "<input type='number' name='edad'>";

        print "<input type='submit' name='enviar' value='postea'>";
        print "<p class='error'>$error</p>";


        ?>

    </form>

</body>

</html>