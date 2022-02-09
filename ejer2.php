<?php //IMPORTANTE: ELIMINA EL ESPACIO ANTES DE LA INTERROGACIÓN
// Instanciamos un nuevo servidor SOAP
$uri="http://192.168.129.91/DWES-UD7";
$server = new SoapServer(null,array('uri'=>$uri));
$server->addFunction("par");
$server->handle();

// Función para obtener si el numero es par
function par($num) {
    if ($num%2==0){
        return true;
        
    }else{
        return false;
    }
  
}
?>