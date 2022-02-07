<?php //IMPORTANTE: ELIMINA EL ESPACIO ANTES DE LA INTERROGACIÓN
// Vaciamos algunas variables
$error = "";
$resultado = "";


// Iniciamos el cliente SOAP
// Escribimos la dirección donde se encuentra el servicio
$url = "http://192.168.129.91/DWS/DWES-UD7/index1.php";
$uri = "http://192.168.129.91/DWS/DWES-UD7";
$cliente = new SoapClient(null, array('location' => $url, 'uri' => $uri));

// Ejecutamos las siguientes líneas al enviar el formulario
if (isset($_POST['enviar'])) {
    // Establecemos los parámetros de envío
    if (!empty($_POST['n1']) && !empty($_POST['n2'])) {

        // Si los parámetros son correctos, llamamos a la función letra de suma.php
        $resultado = "el resultado es: " . $cliente->suma($_POST['n1'], $_POST['n2']);
    } else {
        $error = "<strong>Error:</strong> resultado incorrecto, formato no soportado<br/><br/>Ej: 1";
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Calculo de suma</title>
    <link rel="stylesheet" type="text/css" href="/estilo.css">
</head>

<body>
    <h1>Introduce numeros</h1>
    <h2>Servicio Web + PHP + SOAP</h2>
    <form action="ejer1.php" method="post">
        <?php //IMPORTANTE: ELIMINA EL ESPACIO ANTES DE LA INTERROGACIÓN
        print "<input type='text' name='n1'>";
        print "<input type='text' name='n2' >";
        print "<input type='submit' name='enviar' value='Calcular numero'>";
        print "<p class='error'>$error</p>";
        print "<p style='font-size: 12pt;font-weight: bold;color: #0066CC;'>$resultado</p>";
        ?>
    </form>

</body>

</html>