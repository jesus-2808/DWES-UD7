
<?php

function servicioCiudades()
{
    $uri = "http://192.168.129.193/DWES-UD7/Cliente-servidor";
    $server = new SoapServer(null, array('uri' => $uri));
    $server->addFunction("getCiudad");
    $server->handle();
}

?>