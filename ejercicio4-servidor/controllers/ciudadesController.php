
<?php

function servicioCiudades()
{
    require 'models/ciudadesModel.php';
    $uri = "http://192.168.129.193/DWES-UD7/ejercicio4-servidor";
    $server = new SoapServer(null, array('uri' => $uri));
    $server->addFunction("getCiudad");
    $server->handle();
}

?>
