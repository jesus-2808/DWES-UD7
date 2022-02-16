<?php

function jugadoresServidor(){
    include_once "./models/jugadores_model.php";
    $uri="http://localhost/DWES-UD7/pruebaSoapServidor/controllers/";
    $server = new SoapServer(null,array('uri'=>$uri));
    $server->addFunction("getPlayer");
    $server->handle();
}

?>