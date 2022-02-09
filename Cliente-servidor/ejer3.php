
<?php //IMPORTANTE: ELIMINA EL ESPACIO ANTES DE LA INTERROGACIÓN
// Vaciamos algunas variables
$error = "";
$resultado = [];


// Iniciamos el cliente SOAP
// Escribimos la dirección donde se encuentra el servicio
$url = "http://192.168.129.193/DWES-UD7/Cliente-servidor/index1.php";
$uri = "http://192.168.129.193/DWES-UD7/Cliente-servidor";
$cliente = new SoapClient(null, array('location' => $url, 'uri' => $uri));

// Ejecutamos las siguientes líneas al enviar el formulario
if (isset($_POST['enviar'])) {
    // Establecemos los parámetros de envío
    if (!empty($_POST['poblacion']) && !empty($_POST['poblacion']))  {
    
        // Si los parámetros son correctos, llamamos a la función letra de suma.php
        $resultado = $cliente->getCiudad($_POST['poblacion']);
       var_dump($resultado);
       foreach($resultado as $ciudad) {
        print "<p style='font-size: 12pt;font-weight: bold;color: #0066CC;'>" . $ciudad['ciudad'] . "</p>";
    }
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
   
<form action="ejer3.php" method="post">
    <?php //IMPORTANTE: ELIMINA EL ESPACIO ANTES DE LA INTERROGACIÓN
     
      print "<input type='number' name='poblacion'>";
  
      print "<input type='submit' name='enviar' value='Calcular numero'>";
      print "<p class='error'>$error</p>";
      
    
  ?>
    
    </form>
  
</body>
</html>