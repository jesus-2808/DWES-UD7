<?php

function getConnection(){
    $user='root';
    $pwd='root';
    return new PDO('mysql:host=localhost;dbname=baloncesto', $user, $pwd);
}

function getPlayer($edad){
    $con = getConnection();
    $sql = $con->prepare('SELECT * FROM datos where Edad >= :Edad');
    $sql->bindParam(":Edad", intval($edad));
    $sql->execute();
    $filas = [];
    while ($fila = $sql->fetch()) {
       $filas[] = $fila;
    }
    $con = null;
    return $filas;
   
   

}

var_dump(getPlayer(30));

?>