<?php
function formulario()
{
    $error = "";
    $resultado = [];


    // Iniciamos el cliente SOAP
    // Escribimos la dirección donde se encuentra el servicio
    $url = "http://192.168.129.193/DWES-UD7/ejercicio4-servidor/index.php?controller=ciudades&action=servicioCiudades";
    $uri = "http://192.168.129.193/DWES-UD7/";
    $cliente = new SoapClient(null, array('location' => $url, 'uri' => $uri));

    // Ejecutamos las siguientes líneas al enviar el formulario
    if (isset($_POST['enviar'])) {
        // Establecemos los parámetros de envío
        if (!empty($_POST['poblacion']) && !empty($_POST['poblacion'])) {

            // Si los parámetros son correctos, llamamos a la función letra de suma.php
            $resultado = $cliente->getCiudad($_POST['poblacion']);
            var_dump($resultado);
            foreach ($resultado as $ciudad) {
                print "<p style='font-size: 12pt;font-weight: bold;color: #0066CC;'>" . $ciudad['ciudad'] . "</p>";
            }
        } else {
            $error = "<strong>Error:</strong> resultado incorrecto, formato no soportado<br/><br/>Ej: 1";
        }
    }
    include 'views/ciudadesForm.php';
}
