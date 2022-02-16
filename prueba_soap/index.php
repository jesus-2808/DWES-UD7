<?php
$uri="http://localhost/DWES-UD7/prueba_soap/";
$server=new SoapServer(null,array('uri'=>$uri));
$server->addFunction("getPlayer");
$server->addFunction("setPlayers");
$server->handle();

function getConnection(){
    $user='root';
    $pwd='root';
    return new PDO('mysql:host=localhost;dbname=baloncesto', $user, $pwd);
}

function getPlayer($edad){
    $db=getConnection();
    $sqlQuery="SELECT Nombre FROM datos WHERE edad >=?";
    $stmt=$db->prepare($sqlQuery);
    $stmt->bindParam(1, $edad);
    $stmt->execute();
    $jugadores=$stmt->fetchAll();
    return $jugadores;

}

function setPlayers($nombre,$equipo, $nacionalidad, $edad, $altura, $nacimiento, $imagen){
    $con = getConnection();
    $sql = $con->prepare('INSERT into datos values(null,:Nombre,:Equipo,:Nacionalidad, :Edad, :Altura, :Nacimiento, :Imagen)');
    $sql->bindParam(":Nombre", $nombre);
    $sql->bindParam(":Equipo", $equipo);
    $sql->bindParam(":Nacionalidad", $nacionalidad);
    $sql->bindParam(":Edad", $edad);
    $sql->bindParam(":Altura", $altura);
    $sql->bindParam(":Nacimiento", $nacimiento);
    $sql->bindParam(":Imagen", $imagen);
    $sql->execute();
    $con = null;
 }

?>